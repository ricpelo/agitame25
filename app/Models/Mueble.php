<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mueble extends Model
{
    /** @use HasFactory<\Database\Factories\MuebleFactory> */
    use HasFactory;

    public $fillable = ['denominacion', 'precio'];

    public function mueblable()
    {
        return $this->morphTo('mueblable');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    public function precioFinal()
    {
        return $this->mueblable->precioFinal();
    }
}
