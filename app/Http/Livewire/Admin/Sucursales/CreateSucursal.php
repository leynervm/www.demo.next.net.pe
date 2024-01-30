<?php

namespace App\Http\Livewire\Admin\Sucursales;

use App\Models\Empresa;
use App\Models\Sucursal;
use App\Models\Ubigeo;
use App\Rules\CampoUnique;
use App\Rules\DefaultValue;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateSucursal extends Component
{

    public $open = false;
    public $name, $direccion, $codeanexo, $default, $ubigeo_id, $empresa;

    protected function rules()
    {
        return [
            'name' => [
                'required', 'min:3', 'max:255',
                new CampoUnique('sucursals', 'name', null, true),
            ],
            'direccion' => [
                'required', 'string', 'min:3', 'max:255'
            ],
            'ubigeo_id' => [
                'required', 'integer', 'min:1', 'exists:ubigeos,id',
            ],
            'codeanexo' => [
                'required', 'string', 'min:4', 'max:4',
                new CampoUnique('sucursals', 'codeanexo', null, true),
            ],
            'default' => [
                'required', 'integer', 'min:0', 'max:1',
                new DefaultValue('sucursals', 'default', null, true)
            ],
            'empresa.id' => [
                'required', 'integer', 'min:1', 'exists:empresas,id'
            ]
        ];
    }

    public function mount(Empresa $empresa)
    {
        $this->empresa = $empresa;
    }

    public function render()
    {
        $ubigeos = Ubigeo::orderBy('region', 'asc')->orderBy('provincia', 'asc')->orderBy('distrito', 'asc')->get();
        return view('livewire.admin.sucursales.create-sucursal', compact('ubigeos'));
    }


    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->resetValidation();
            $this->reset(['name', 'direccion', 'ubigeo_id', 'default', 'codeanexo']);
        }
    }

    public function save()
    {

        $this->name = trim($this->name);
        $this->direccion = trim($this->direccion);
        $this->default = $this->default == 1 ? 1 : 0;
        $this->codeanexo = trim($this->codeanexo);
        $validateData = $this->validate();

        try {
            DB::beginTransaction();
            $sucursal = Sucursal::withTrashed()
                ->whereRaw('UPPER(name) = ?', [mb_strtoupper($this->name, "UTF-8")])->first();

            if ($sucursal) {
                $sucursal->direccion = $this->direccion;
                $sucursal->ubigeo_id = $this->ubigeo_id;
                $sucursal->codeanexo = $this->codeanexo;
                $sucursal->default = $this->default;
                $sucursal->empresa_id = $this->empresa->id;
                if ($sucursal->trashed()) {
                    $sucursal->restore();
                }
            } else {
                $this->empresa->sucursals()->create($validateData);
            }

            DB::commit();
            $this->resetValidation();
            $this->reset(['open', 'name', 'direccion', 'ubigeo_id', 'default', 'codeanexo']);
            $this->emitTo('admin.sucursales.show-sucursales', 'render');
            $this->dispatchBrowserEvent('created');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function hydrate()
    {
        $this->dispatchBrowserEvent('render-create-sucursal');
    }
}
