<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Oficio extends Model
{
    //
    protected $fillable = [
        "idUser",
        "idOficio"
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User', 'idUser');
    }

    public function oficio()
    {
        return $this->belongsTo('App\Oficio', 'idOficio');
    }
}
