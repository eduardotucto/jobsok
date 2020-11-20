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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function show(User $user)
    {
        // lo que hace es buscar un tipo de user por la llave foranea que tiene user(idType_User)
        $tipoUser = Type_User::findOrFail($user->idType_User);
        $empresa = Empresa::find($user->idEmpresa);
        $oficioUser = DB::table('user__oficios')->where('idUser',$user->id)->get();

        if( sizeof($oficioUser) == 0 ){
            $oficioUser = null;
            $re2 = null;
        } else {
            foreach ($oficioUser as $ofU) {
                $re = $ofU->idOficio;
                $re1 = DB::table('oficios')->where('id',$re)->get();
                $re2[] = $re1;
            }
            $groupConcat = implode(" OR ", $re2);
        }

        return response()->json([
            "user" => $user,
            "tipouser" => $tipoUser,
            "empresa" => $empresa,
            "oficioUser" => $oficioUser,
            "oficio" => $re2,
            "status" => Response::HTTP_OK, // 200
        ],Response::HTTP_OK);
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
