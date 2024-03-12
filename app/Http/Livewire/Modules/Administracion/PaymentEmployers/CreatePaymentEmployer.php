<?php

namespace App\Http\Livewire\Modules\Administracion\PaymentEmployers;

use App\Enums\MovimientosEnum;
use App\Models\Cajamovimiento;
use App\Models\Concept;
use App\Models\Employer;
use App\Models\Methodpayment;
use App\Models\Moneda;
use App\Models\Monthbox;
use App\Models\Openbox;
use App\Rules\ValidateEmployerpayment;
use App\Traits\CajamovimientoTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreatePaymentEmployer extends Component
{

    use CajamovimientoTrait;

    public $employer, $employerpayment;
    public $open = false;
    public $amount = 0;
    public $descuentos = 0;
    public $adelantos = 0;
    public $bonus = 0;
    public $amountmax = 0;
    public $methodpayment_id, $month,
        $concept_id, $openbox, $monthbox, $moneda_id, $detalle;

    protected function rules()
    {
        return [
            'amount' => [
                'required', 'numeric', $this->amountmax > 0 ? 'gt:0' : 'min:0', 'decimal:0,4', 'max:' . $this->amountmax,
                new ValidateEmployerpayment($this->employer->id, $this->monthbox->month)
            ],
            'descuentos' => ['nullable', 'numeric', 'min:0', 'decimal:0,4'],
            'adelantos' => ['nullable', 'numeric', 'min:0', 'decimal:0,4'],
            'bonus' => ['nullable', 'numeric', 'min:0', 'decimal:0,4'],
            'month' => ['required', 'date_format:Y-m'],
            'methodpayment_id' => ['required', 'integer', 'min:1', 'exists:methodpayments,id'],
            'concept_id' => ['required', 'integer', 'min:1', 'exists:concepts,id'],
            'openbox.id' => ['required', 'integer', 'min:1', 'exists:openboxes,id'],
            'monthbox.id' => ['required', 'integer', 'min:1', 'exists:monthboxes,id'],
            'moneda_id' => ['required', 'integer', 'min:1', 'exists:monedas,id'],
            'detalle' => ['nullable', 'string'],
        ];
    }


    public function mount(Employer $employer)
    {
        $this->employer = $employer;
        $this->openbox =  Openbox::mybox(auth()->user()->employer->sucursal_id)->first();
        $this->monthbox = Monthbox::usando(auth()->user()->employer->sucursal_id)->first();
        $this->concept_id = Concept::payemployer()->first()->id ?? null;
        $this->moneda_id = Moneda::default()->first()->id ?? null;
        $this->methodpayment_id = Methodpayment::default()->first()->id ?? null;
        $this->adelantos =   $employer->cajamovimientos()
            ->where('monthbox_id', $this->monthbox->id)->sum('amount');
    }


    public function render()
    {
        $methodpayments = Methodpayment::orderBy('name', 'asc')->get();
        return view('livewire.modules.administracion.payment-employers.create-payment-employer',  compact('methodpayments'));
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset(['descuentos', 'bonus', 'detalle', 'amount']);
            $this->resetValidation();
            $this->methodpayment_id = Methodpayment::default()->first()->id ?? null;
        }

        $this->adelantos = $this->employer->cajamovimientos()
            ->where('monthbox_id', $this->monthbox->id)->sum('amount');
    }

    public function updatedBonus($value)
    {
        if (trim($value) != '') {
            $this->bonus = number_format($value, 2, '.', '');
        } else {
            $this->bonus = 0;
        }
    }

    public function updatedDescuentos($value)
    {
        if (trim($value) != '') {
            $this->descuentos = number_format($value, 2, '.', '');
        } else {
            $this->descuentos = 0;
        }
    }

    public function save()
    {

        if (!$this->monthbox->isUsing()) {
            $mensaje =  response()->json([
                'title' => 'APERTURAR NUEVA CAJA MENSUAL !',
                'text' => "No se encontraron cajas mensuales aperturadas para registrar movimiento."
            ])->getData();
            $this->dispatchBrowserEvent('validation', $mensaje);
            return false;
        }

        if (!$this->openbox->isActivo()) {
            $this->dispatchBrowserEvent('validation', getMessageOpencaja());
            return false;
        }

        $this->amountmax = ($this->employer->sueldo + $this->bonus ?? 0) - ($this->adelantos + $this->descuentos ?? 0);
        $this->month = $this->monthbox->month;
        $validateData = $this->validate();
        try {

            DB::beginTransaction();

            $methodpayment = Methodpayment::find($this->methodpayment_id)->type;
            $moneda = Moneda::find($this->moneda_id);
            $saldocaja = Cajamovimiento::withWhereHas('methodpayment', function ($query) use ($methodpayment) {
                $query->where('type', $methodpayment);
            })->where('sucursal_id', $this->employer->sucursal_id)
                ->where('openbox_id', $this->openbox->id)->where('monthbox_id', $this->monthbox->id)
                ->where('moneda_id', $this->moneda_id)
                ->selectRaw("COALESCE(SUM(CASE WHEN typemovement = 'INGRESO' THEN amount ELSE -amount END), 0) as diferencia")
                ->first()->diferencia ?? 0;
            $saldocaja = $saldocaja < 0 ? 0 : $saldocaja;
            $forma = $methodpayment == Methodpayment::EFECTIVO ? 'EFECTIVO' : 'TRANSFERENCIAS';
            $amountsaldo = $moneda->code == 'PEN' ? $saldocaja + $this->openbox->aperturarestante : $saldocaja;

            if (($amountsaldo - $this->amount) < 0) {
                $mensaje =  response()->json([
                    'title' => 'SALDO DE CAJA INSUFICIENTE PARA REALIZAR PAGO DEL PERSONAL !',
                    'text' => "Monto de egreso en moneda seleccionada supera el saldo disponible en caja, mediante $forma."
                ])->getData();
                $this->dispatchBrowserEvent('validation', $mensaje);
                return false;
            }

            $descontar = $saldocaja - $this->amount;
            if ($descontar < 0) {
                $this->openbox->aperturarestante = $this->openbox->aperturarestante + ($descontar);
                $this->openbox->save();
            }

            $employerpayment = $this->employer->employerpayments()->create($validateData);
            $employerpayment->savePayment(
                $this->employer->sucursal_id,
                $this->amount,
                $this->moneda_id,
                $this->methodpayment_id,
                MovimientosEnum::EGRESO->value,
                $this->concept_id,
                $this->openbox->id,
                $this->monthbox->id,
                $this->employer->name,
                $this->detalle,
            );

            DB::commit();
            $this->reset(['descuentos', 'bonus', 'detalle', 'open', 'amount']);
            $this->resetValidation();
            $this->dispatchBrowserEvent('created');
            $this->emitTo('modules.administracion.payment-employers.show-payment-employers', 'render');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}