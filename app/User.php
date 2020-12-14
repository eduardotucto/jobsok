<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "apellido",
        "ciudad",
        "telefono",
        "f_nacimiento",
        "sexo",
        "email",
        "password",
        "idType_User",
        "informacion",
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
