<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $fillable = [
        "nombre",
        "telefono",
        "direccion",
        "ruc",
        "correo",
        "nro_trabajos"
    ];
}
