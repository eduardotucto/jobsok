<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    //
    protected $fillable = [
        "descripcion",
        "estado",
        "tiempo_inicial",
        "tiempo_final",
        "precio_inicial",
        "precio_final",
        "confiabilidad",
        "cortesía",
        "orden",
        "Mano_de_obra",
        "Precision_cotizacion",
        "idUser_Cli",
        "idUser_Tecnico"
    ];

    public function user_cli()
    {
        return $this->belongsTo('App\Usuario', 'idUser_Cli');
    }

    public function user_tecnico()
    {
        return $this->belongsTo('App\Usuario', 'idUser_Tecnico');
    }
}
