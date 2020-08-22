<?php

namespace App\Http\Controllers;

use App\Usuario_Oficio;
use Illuminate\Http\Request;

class UsuarioOficioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function show(Usuario_Oficio $usuario_Oficio)
    {
        return $usuario_Oficio
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
