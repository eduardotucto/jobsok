<?php

namespace App\Http\Controllers;

use DB;
use App\Usuario;
use App\Type_User;
use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\mysql_fetch_array;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Usuario::all();
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
    public function store(Request $request)
    {
        $usuario = Usuario::create($request->all());
        return $usuario;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        // lo que hace es buscar un tipo de usuario por la llave foranea que tiene usuario(idType_User)
        $tipoUsuario = Type_User::findOrFail($usuario->idType_User);
        $empresa = Empresa::find($usuario->idEmpresa);
        $oficioUser = DB::table('usuario__oficios')->where('idUsuaro',$usuario->id)->get();

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
            "usuario" => $usuario,
            "tipousuario" => $tipoUsuario,
            "empresa" => $empresa,
            "oficioUser" => $oficioUser,
            "oficio" => $re2,
            "status" => Response::HTTP_OK, // 200
        ],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update($request->all());
        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return $usuario;
    }
}
