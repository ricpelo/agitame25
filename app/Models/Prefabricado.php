<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefabricado extends Model
{
    /** @use HasFactory<\Database\Factories\PrefabricadoFactory> */
    use HasFactory;

    public function mueble()
    {
        return $this->morphOne(Mueble::class, 'mueblable');
    }

    public function precioFinal()
    {
        return $this->mueble->precio;
    }
}
