<?php

namespace App\Http\Livewire\Modules\Almacen\Compras;

use App\Enums\MovimientosEnum;
use App\Models\Cajamovimiento;
use App\Models\Concept;
use App\Models\Kardex;
use App\Models\Methodpayment;
use App\Models\Moneda;
use App\Models\Monthbox;
use App\Models\Openbox;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\Almacen\Entities\Compra;

class ShowCompra extends Component
{

    use AuthorizesRequests;

    public $compra;
    public $open = false;
    public $showtipocambio = false;
    public $paymentactual = 0;
    public $pendiente = 0;
    public $openbox, $monthbox, $methodpayment_id, $concept_id, $detalle, $moneda_id;
    public $totalamount, $tipocambio;

    public function mount(Compra $compra)
    {
        $this->compra = $compra;
        $this->moneda_id = $compra->moneda_id;
        $this->openbox = Openbox::mybox(auth()->user()->sucursal_id)->first();
        $this->monthbox = Monthbox::usando($this->compra->sucursal_id)->first();
        $this->pendiente = $compra->total - $this->compra->cajamovimientos()->sum('amount');
    }

    public function render()
    {
        $methodpayments = Methodpayment::orderBy('name', 'asc')->get();
        if ($this->monthbox && $this->openbox) {
            $diferencias = Cajamovimiento::with('moneda')->withWhereHas('sucursal', function ($query) {
                $query->where('id', auth()->user()->sucursal_id);
            })->selectRaw("moneda_id, SUM(CASE WHEN typemovement = 'INGRESO' THEN totalamount ELSE -totalamount END) as diferencia")
                ->where('openbox_id', $this->openbox->id)->where('monthbox_id', $this->monthbox->id)
                ->groupBy('moneda_id')->orderBy('diferencia', 'desc')->get();
        } else {
            $diferencias = [];
        }

        return view('livewire.modules.almacen.compras.show-compra', compact('methodpayments', 'diferencias'));
    }

    public function delete()
    {

        $this->authorize('admin.almacen.compras.delete');
        if ($this->compra->compraitems->count() > 0) {
            $seriesouts = $this->compra->compraitems()
                ->WhereHas('series', function ($query) {
                    $query->whereNotNull('dateout');
                })->count();

            if ($seriesouts) {
                $message = response()->json([
                    'title' => 'No se puede eliminar el registro seleccionado !',
                    'text' => 'Existen series relacionados en salidas, eliminarlo causará conflictos en los datos'
                ])->getData();
                $this->dispatchBrowserEvent('validation', $message);
                return false;
            }
        }

        if ($this->compra->cuotas()->withWhereHas('cajamovimiento')->count() > 0) {
            $mensaje = response()->json([
                'title' => 'No se puede eliminar la compra seleccionada',
                'text' => "La compra contiene cuotas de pago realizadas, eliminar pagos manualmente e inténtelo nuevamente."
            ])->getData();
            $this->dispatchBrowserEvent('validation', $mensaje);
            return false;
        }

        DB::beginTransaction();
        try {
            $this->compra->compraitems()->each(function ($compraitem) {

                $productoAlmacen = $compraitem->producto->almacens()
                    ->where('almacen_id', $compraitem->almacen_id)->first();

                // $compraitem->deleteKardex($compraitem->id);
                if ($compraitem->kardex) {
                    $compraitem->kardex()->delete();
                }

                $compraitem->producto->almacens()->updateExistingPivot($compraitem->almacen_id, [
                    'cantidad' => $productoAlmacen->pivot->cantidad - $compraitem->cantidad,
                ]);
                $compraitem->producto->pricebuy = $compraitem->oldpricebuy;
                $compraitem->producto->pricesale = $compraitem->oldpricesale;
                $compraitem->producto->save();
                $compraitem->series()->forceDelete();
                $compraitem->forceDelete();
            });

            if ($this->compra->cajamovimientos()->count() > 0) {
                $this->compra->cajamovimientos()->delete();
            }
            $this->compra->delete();
            DB::commit();
            $this->dispatchBrowserEvent('deleted');
            return redirect()->route('admin.almacen.compras');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function openmodal()
    {
        $this->authorize('admin.almacen.compras.pagos');
        $this->reset(['tipocambio', 'totalamount', 'showtipocambio', 'moneda_id']);
        $this->resetValidation();
        $this->pendiente = $this->compra->total - $this->compra->cajamovimientos()->sum('amount');
        $this->paymentactual = number_format($this->pendiente, 3, '.', '');
        $this->methodpayment_id = Methodpayment::default()->first()->id ?? null;
        $this->moneda_id = $this->compra->moneda_id;
        $this->open = true;
    }

    public function savepayment()
    {
        $this->authorize('admin.almacen.compras.pagos');
        if ($this->compra->sucursal_id <> auth()->user()->sucursal_id) {
            $mensaje =  response()->json([
                'title' => 'SUCURSAL DE COMPRA DIFERENTE A SUCURSAL DE APERTURA DE CAJA !',
                'text' => "No se pueden realizar movimientos en caja de una sucursal diferente a caja aperturada."
            ])->getData();
            $this->dispatchBrowserEvent('validation', $mensaje);
            return false;
        }

        if (!$this->monthbox || !$this->monthbox->isUsing()) {
            $this->dispatchBrowserEvent('validation', getMessageMonthbox());
            return false;
        }

        if (!$this->openbox || !$this->openbox->isActivo()) {
            $this->dispatchBrowserEvent('validation', getMessageOpencaja());
            return false;
        }

        $this->totalamount = number_format($this->paymentactual, 3, '.', '');
        $this->concept_id = Concept::Compra()->first()->id ?? null;
        $this->validate([
            'paymentactual' => ['required', 'numeric', 'min:1', 'decimal:0,4', 'lte:' . $this->pendiente, 'regex:/^\d{0,8}(\.\d{0,4})?$/',],
            'openbox.id' => ['required', 'integer', 'min:1', 'exists:openboxes,id'],
            'totalamount' => ['required', 'numeric', 'min:0', 'gt:0', 'decimal:0,4'],
            'tipocambio' => [
                'nullable',
                Rule::requiredIf($this->showtipocambio),
                'numeric', 'min:0', 'gt:0', 'decimal:0,3'
            ],
            'openbox.id' => ['required', 'integer', 'min:1', 'exists:openboxes,id'],
            'monthbox.id' => ['required', 'integer', 'min:1', 'exists:monthboxes,id'],
            'moneda_id' => ['required', 'integer', 'min:1', 'exists:monedas,id'],
            'concept_id' => ['required', 'integer', 'min:1', 'exists:concepts,id'],
            'methodpayment_id' => ['required', 'integer', 'min:1', 'exists:methodpayments,id'],
            'detalle' => ['nullable'],
        ]);
        if ($this->showtipocambio) {
            $monedaConvertir = $this->compra->moneda->code == 'USD' ? 'PEN' : 'USD';
            $this->totalamount = convertMoneda($this->paymentactual, $monedaConvertir, $this->tipocambio);
        }

        try {

            DB::beginTransaction();
            $methodpayment = Methodpayment::find($this->methodpayment_id);
            $saldocaja = Cajamovimiento::withWhereHas('methodpayment', function ($query) use ($methodpayment) {
                $query->where('type', $methodpayment->type);
            })->where('sucursal_id', $this->compra->sucursal_id)
                ->where('openbox_id', $this->openbox->id)->where('monthbox_id', $this->monthbox->id)
                ->where('moneda_id', $this->moneda_id)
                ->selectRaw("COALESCE(SUM(CASE WHEN typemovement = '" . MovimientosEnum::INGRESO->value . "' THEN totalamount ELSE -totalamount END), 0) as diferencia")
                ->first()->diferencia ?? 0;
            $forma = $methodpayment->isEfectivo() ? 'EFECTIVO' : 'TRANSFERENCIA';


            if (($saldocaja - $this->totalamount) < 0) {
                $mensaje =  response()->json([
                    'title' => 'SALDO DE CAJA INSUFICIENTE PARA REALIZAR PAGO DE COMPRA MEDIANTE ' . $forma . ' !',
                    'text' => "Monto de egreso en moneda seleccionada supera el saldo disponible en caja, mediante $forma."
                ])->getData();
                $this->dispatchBrowserEvent('validation', $mensaje);
                return false;
            }

            $payment = $this->compra->savePayment(
                $this->compra->sucursal_id,
                number_format($this->paymentactual, 3, '.', ''),
                $this->totalamount,
                $this->showtipocambio ? number_format($this->tipocambio, 3, '.', '') : null,
                $this->moneda_id,
                $this->methodpayment_id,
                MovimientosEnum::EGRESO->value,
                $this->concept_id,
                $this->openbox->id,
                $this->monthbox->id,
                $this->compra->referencia,
                trim($this->detalle)
            );

            DB::commit();
            $this->resetValidation();
            $this->reset(['open', 'methodpayment_id', 'detalle', 'paymentactual', 'tipocambio', 'totalamount', 'showtipocambio', 'moneda_id']);
            $this->compra->refresh();
            $this->dispatchBrowserEvent('created');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function deletepay(Cajamovimiento $cajamovimiento)
    {

        $this->authorize('admin.almacen.compras.pagos');
        DB::beginTransaction();
        try {
            $cajamovimiento->delete();
            DB::commit();
            $this->compra->refresh();
            $this->dispatchBrowserEvent('deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function closecompra()
    {
        $this->authorize('admin.almacen.compras.close');
        $this->compra->status = 1;
        $this->compra->save();
        $this->dispatchBrowserEvent('updated');
    }
}
