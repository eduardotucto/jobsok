<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa_Oficio extends Model
{
    //
    protected $fillable = [
        "idEmpresa",
        "idOficio"
    ];

    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'idEmpresa');
    }

    public function oficio()
    {
        return $this->belongsTo('App\Oficio', 'idOficio');
    }
}
