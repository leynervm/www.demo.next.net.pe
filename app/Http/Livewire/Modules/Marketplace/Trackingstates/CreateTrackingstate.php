<?php

namespace App\Http\Livewire\Modules\Marketplace\Trackingstates;

use App\Rules\CampoUnique;
use App\Rules\DefaultValue;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Modules\Marketplace\Entities\Trackingstate;

class CreateTrackingstate extends Component
{

    use AuthorizesRequests;

    public $open = false;
    public $name, $background, $finish = 0;

    protected function rules()
    {
        return [
            'name' => [
                'required',  'string', 'min:3',
                new CampoUnique('trackingstates', 'name', null, true)
            ],
            'background' => [
                'required',  'string', 'min:4', 'max:7', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
                new CampoUnique('trackingstates', 'background', null, true)
            ],
            'finish' => [
                'required',  'integer', 'min:0',
                new DefaultValue('trackingstates', 'finish', null, true)
            ]
        ];
    }

    public function render()
    {
        return view('livewire.modules.marketplace.trackingstates.create-trackingstate');
    }

    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset(['name', 'background', 'finish']);
            $this->resetValidation();
        }
    }

    public function save($closemodal = false)
    {
        $this->authorize('admin.marketplace.trackingstates.create');
        $this->name = trim($this->name);
        $this->finish = $this->finish ? 1 : 0;
        $validateData = $this->validate();
        Trackingstate::create($validateData);
        $this->resetValidation();
        if ($closemodal) {
            $this->reset();
        } else {

            $this->resetExcept(['open']);
        }
        $this->emitTo('modules.marketplace.trackingstates.show-trackingstates', 'render');
        $this->dispatchBrowserEvent('toast', toastJSON('Estado registrado correctamente'));
    }
}
