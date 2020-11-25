<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Type_User;
use App\Empresa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\mysql_fetch_array;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        // $usuario = User::create($request->all());
        // return $usuario;
        return User::create([
            'name' => $data['name'],
            'apellido' => $data['apellido'],
            'ciudad' => $data['ciudad'],
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'idType_User'=> $data['idType_User'],
            'informacion' => $data['informacion'],
            'idEmpresa' => $data['idEmpresa'],
            'nro_trabajos'=> $data['nro_trabajos'],
            'experiencia'=> $data['experiencia'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $usuario = User::find($user);
        // $oficioUser = DB::table('user__oficios')->where('idUser',$user->id)->get();
        return view('clientes.userinformation',[
            'userdata' => $usuario
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $user;
    }
}
