<?php

namespace App\Http\Livewire\Modules\Marketplace\Shipmenttypes;

use App\Rules\CampoUnique;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Marketplace\Entities\Shipmenttype;

class ShowShipmenttypes extends Component
{

    use WithPagination, AuthorizesRequests;

    public $open = false;
    public $shipmenttype;

    protected function rules()
    {
        return [
            'shipmenttype.name' => [
                'required', 'string', 'min:6',
                new CampoUnique('shipmenttypes', 'name', $this->shipmenttype->id, true)
            ],
            'shipmenttype.descripcion' => [
                'nullable', 'string', 'min:6',
            ]
        ];
    }

    public function mount()
    {
        $this->shipmenttype = new Shipmenttype();
    }

    public function render()
    {
        $shipementtypes = Shipmenttype::orderBy('id', 'asc')->paginate();
        return view('livewire.modules.marketplace.shipmenttypes.show-shipmenttypes', compact('shipementtypes'));
    }

    public function edit(Shipmenttype $shipmenttype)
    {
        $this->authorize('admin.marketplace.shipmenttypes.edit');
        $this->resetValidation();
        $this->resetExcept(['shipmenttype']);
        $this->shipmenttype = $shipmenttype;
        $this->open = true;
    }

    public function update()
    {
        $this->authorize('admin.marketplace.shipmenttypes.edit');
        $this->shipmenttype->name = trim($this->shipmenttype->name);
        $this->shipmenttype->descripcion = trim($this->shipmenttype->descripcion);
        $this->validate();
        $this->shipmenttype->save();
        $this->resetValidation();
        $this->resetExcept(['shipmenttype']);
        $this->dispatchBrowserEvent('updated');
    }
}
