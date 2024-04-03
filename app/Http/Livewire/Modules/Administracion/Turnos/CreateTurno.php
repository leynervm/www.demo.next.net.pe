<?php

namespace App\Http\Livewire\Modules\Administracion\Turnos;

use App\Models\Sucursal;
use App\Models\Turno;
use App\Rules\CampoUnique;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateTurno extends Component
{

    public $open = false;
    public $name, $horaingreso, $horasalida;

    protected function rules()
    {
        return [
            'name' => [
                'required', 'string', 'min:3',
                new CampoUnique('turnos', 'name')
            ],
            'horaingreso' => ['required', 'date_format:H:i'],
            'horasalida' => ['required', 'date_format:H:i'],
            // 'sucursal_id' => ['required', 'integer', 'min:1', 'exists:sucursals,id'],
        ];
    }

    public function render()
    {
        // $sucursals = Sucursal::orderBy('name', 'asc')->get();
        return view('livewire.modules.administracion.turnos.create-turno');
    }

    public function updatingOpen()
    {
        if ($this->open == true) {
            $this->resetExcept(['open']);
            $this->resetValidation();
        }
    }

    public function save()
    {

        $validateData = $this->validate();
        try {
            DB::beginTransaction();
            $existsturno = Turno::where('horaingreso', $this->horaingreso)->where('horasalida', $this->horasalida)->exists();
            if ($existsturno) {
                $mensaje = response()->json([
                    'title' => 'YA EXISTE TURNO CON EL MISMO HORARIO SELECCIOANADO !',
                    'text' => 'Horario laboral ya existe con los datos seleccionados, eliga nuevo horario por favor.',
                    'type' => 'warning'
                ])->getData();
                $this->dispatchBrowserEvent('validation', $mensaje);
                return false;
            } else {
                $turno = Turno::create($validateData);
            }
            DB::commit();
            $this->reset();
            $this->resetValidation();
            $this->emitTo('modules.administracion.turnos.show-turnos', 'render');
            $this->dispatchBrowserEvent('created');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
