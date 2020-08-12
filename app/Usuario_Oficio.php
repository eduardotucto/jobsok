<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Oficio extends Model
{
    //
    protected $fillable = [
        "idUsuaro",
        "idOficio"
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'idUsuaro');
    }

    public function oficio()
    {
        return $this->belongsTo('App\Oficio', 'idOficio');
    }
}
