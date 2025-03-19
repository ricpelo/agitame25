<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricado extends Model
{
    /** @use HasFactory<\Database\Factories\FabricadoFactory> */
    use HasFactory;

    public function mueble()
    {
        return $this->morphOne(Mueble::class, 'mueblable');
    }

    public function precioFinal()
    {
        return $this->mueble->precio * $this->ancho * $this->alto;
    }
}
