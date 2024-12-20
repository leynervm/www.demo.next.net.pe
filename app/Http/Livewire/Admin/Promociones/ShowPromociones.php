<?php

namespace App\Http\Livewire\Admin\Promociones;

use App\Models\Pricetype;
use App\Models\Producto;
use App\Models\Promocion;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPromociones extends Component
{

    use WithPagination;
    use AuthorizesRequests;

    protected $queryString = [
        'estado' => ['except' => Promocion::ACTIVO],
    ];
    protected $listeners = ['render'];
    public $pricetype_id, $pricetype;
    public $estado = Promocion::ACTIVO;

    public function mount()
    {
        $empresa = view()->shared('empresa');
        if ($empresa->usarLista()) {
            $pricetypes = Pricetype::activos()->default();
            if (count($pricetypes->get()) > 0) {
                $this->pricetype = $pricetypes->first();
                $this->pricetype_id = $this->pricetype->id ?? null;
            } else {
                $this->pricetype = Pricetype::activos()->orderBy('id', 'asc')->first();
                $this->pricetype_id = $this->pricetype->id ?? null;
            }
        }
    }

    public function render()
    {
        $pricetypes = Pricetype::activos()->orderBy('id', 'asc')->get();
        $promociones = Promocion::query()->with([
            'producto' => function ($query) {
                $query->select('id', 'name', 'pricebuy', 'pricesale', 'precio_1', 'precio_2', 'precio_3', 'precio_4', 'precio_5', 'requireserie', 'unit_id')
                    ->with(['unit'])->addSelect(['image' => function ($q) {
                        $q->select('url')->from('images')
                            ->whereColumn('images.imageable_id', 'productos.id')
                            ->where('images.imageable_type', Producto::class)
                            ->orderBy('default', 'desc')->limit(1);
                    }]);
            },
            'itempromos' => function ($query) {
                $query->with(['producto' => function ($subQuery) {
                    $subQuery->with(['unit'])->addSelect(['image' => function ($q) {
                        $q->select('url')->from('images')
                            ->whereColumn('images.imageable_id', 'productos.id')
                            ->where('images.imageable_type', Producto::class)
                            ->orderBy('default', 'desc')->limit(1);
                    }]);
                }]);
            }
        ]);
        if (trim($this->estado) != '') {
            $promociones->where('status', $this->estado);
        }
        $promociones = $promociones->orderBy('id', 'desc')->paginate();
        return view('livewire.admin.promociones.show-promociones', compact('promociones', 'pricetypes'));
    }

    public function updatedDisponibles($value)
    {
        $this->resetPage();
    }

    public function delete(Promocion $promocion)
    {
        $this->authorize('admin.promociones.delete');
        $producto = $promocion->producto;
        $producto = $promocion->producto->load(['promocions' => function ($query) {
            $query->with(['itempromos.producto' => function ($subQuery) {
                $subQuery->with('unit')->addSelect(['image' => function ($q) {
                    $q->select('url')->from('images')
                        ->whereColumn('images.imageable_id', 'productos.id')
                        ->where('images.imageable_type', Producto::class)
                        ->orderBy('default', 'desc')->limit(1);
                }]);
            }])->availables()->disponibles()->take(1);
        }]);


        if ($promocion->itempromos()->exists()) {
            $promocion->itempromos()->delete();
        }
        $promocion->delete();
        $producto->assignPrice();
        $this->dispatchBrowserEvent('toast', toastJSON('Promoción eliminado correctamente'));
    }

    public function finalizarpromocion(Promocion $promocion)
    {
        $this->authorize('admin.promociones.edit');
        $promocion->status = Promocion::FINALIZADO;
        $promocion->save();
        $promocion->producto->load(['promocions' => function ($query) {
            $query->with(['itempromos.producto' => function ($subQuery) {
                $subQuery->with('unit')->addSelect(['image' => function ($q) {
                    $q->select('url')->from('images')
                        ->whereColumn('images.imageable_id', 'productos.id')
                        ->where('images.imageable_type', Producto::class)
                        ->orderBy('default', 'desc')->limit(1);
                }]);
            }])->availables()->disponibles()->take(1);
        }]);
        $promocion->producto->assignPrice($promocion);
        $this->dispatchBrowserEvent('toast', toastJSON('Promoción finalizado correctamente'));
    }

    public function disablepromocion(Promocion $promocion)
    {
        $this->authorize('admin.promociones.edit');
        $promocion->status = $promocion->isActivo() ? Promocion::DESACTIVADO : Promocion::ACTIVO;
        if ($promocion->isActivo()) {
            if (!is_null($promocion->expiredate)) {
                if (Carbon::now('America/Lima')->gt(Carbon::parse($promocion->expiredate)->format('d-m-Y'))) {
                    $mensaje = response()->json([
                        'title' => 'PROMOCIÓN NO DISPONIBLE, LA FECHA HA EXPIRADO !',
                        'text' => null
                    ])->getData();
                    $this->dispatchBrowserEvent('validation', $mensaje);
                    return false;
                }
            }

            $existotherpromociones = Promocion::disponibles()->where('producto_id', $promocion->producto_id)->exists();
            if ($existotherpromociones) {
                $mensaje = response()->json([
                    'title' => "PRODUCTO YA CUENTA CON PROMOCIONES ACTIVAS !",
                    'text' => null
                ])->getData();
                $this->dispatchBrowserEvent('validation', $mensaje);
                return false;
            }

            $existproductoitemcombos = Promocion::disponibles()->withWhereHas('itempromos', function ($query) use ($promocion) {
                $query->where('producto_id', $promocion->producto_id);
            })->exists();

            if ($existproductoitemcombos) {
                $mensaje = response()->json([
                    'title' =>  "PRODUCTO SE ENCUENTRA INCLUIDO DENTRO DE UNA PROMOCIÓN (COMBO) !",
                    'text' => null
                ])->getData();
                $this->dispatchBrowserEvent('validation', $mensaje);
                return false;
            }
        }
        $promocion->save();
        $promocion->producto->load(['promocions' => function ($query) {
            $query->with(['itempromos.producto' => function ($subQuery) {
                $subQuery->with('unit')->addSelect(['image' => function ($q) {
                    $q->select('url')->from('images')
                        ->whereColumn('images.imageable_id', 'productos.id')
                        ->where('images.imageable_type', Producto::class)
                        ->orderBy('default', 'desc')->limit(1);
                }]);
            }])->availables()->disponibles()->take(1);
        }]);
        $promocion->producto->assignPrice($promocion);
        $this->dispatchBrowserEvent('updated');
    }

    public function updatedPricetypeId($value)
    {
        if ($value) {
            $this->pricetype = Pricetype::find($value);
            $this->pricetype_id = $this->pricetype->id;
        }
    }
}
