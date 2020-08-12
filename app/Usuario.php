<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $fillable = [
        "nombre",
        "apellido",
        "ciudad",
        "telefono",
        "correo",
        "password",
        "idType_User",
        "idEmpresa",
        "nro_trabajos",
        "experiencia"
    ];

    public function typeUser()
    {
        return $this->belongsTo('App/Type_User', 'idType_User');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'idEmpresa');
    }
}
