<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Combo extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['limit', 'outs', 'startdate', 'expiredate', 'producto_id'];

    public function itemcombos(): HasMany
    {
        return $this->hasMany(Itemcombo::class);
    }

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }

    public function scopeActivos($query)
    {
        return $query->where('status', '0');
    }

    public function isActivo()
    {
        return $this->status == 0;
    }

    public function isDisponible()
    {
        return $this->expiredate >= Carbon::now('America/Lima')->format('Y-m-d');
    }

    public function scopeDisponibles($query)
    {
        return $query->activos()->whereDate('startdate', '<=', Carbon::now('America/Lima')->format('Y-m-d'))
            ->whereDate('expiredate', '>=', Carbon::now('America/Lima')->format('Y-m-d'))
            ->orderBy('startdate', 'asc')->orderBy('status', 'asc')
            ->orderBy('id', 'asc');
    }
}
