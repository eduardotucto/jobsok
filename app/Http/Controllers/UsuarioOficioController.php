<?php

namespace App\Http\Controllers;

use DB;
use App\Usuario_Oficio;
use Illuminate\Http\Request;

class UsuarioOficioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return Usuario_Oficio::all();
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
        $usuario_Oficio = Usuario_Oficio::create($request->all());
        return $usuario_Oficio;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario_Oficio  $usuario_Oficio
     * @return \Illuminate\Http\Response
     */
    public function show($userOfId)
    {
        $datosDeTecnico = DB::table('users')
                    ->join('usuario__oficios', 'users.id', '=', 'usuario__oficios.idUser')
                    ->join('oficios', 'usuario__oficios.idOficio', '=', 'oficios.id')
                    ->select('users.*','usuario__oficios.idOficio', 'oficios.nombre')
                    ->where('usuario__oficios.idOficio', '=', $userOfId)
                    ->get();
        // return $datosUser;
        return view('clientes.userOficio',[
            'usersOficios' => $datosDeTecnico
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario_Oficio  $usuario_Oficio
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario_Oficio $usuario_Oficio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario_Oficio  $usuario_Oficio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario_Oficio $usuario_Oficio)
    {
        $usuario_Oficio->update($request->all());
        return $usuario_Oficio;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario_Oficio  $usuario_Oficio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario_Oficio $usuario_Oficio)
    {
        $usuario_Oficio->delete();
        return $usuario_Oficio;
    }
}
