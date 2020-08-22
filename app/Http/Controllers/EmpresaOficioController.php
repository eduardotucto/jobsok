<?php

namespace App\Http\Controllers;

use App\Empresa_Oficio;
use Illuminate\Http\Request;

class EmpresaOficioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmpresaOficio::all();
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
        $empresa_Oficio = EmpresaOficio::create($request->all());
        return $empresa_Oficio;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa_Oficio  $empresa_Oficio
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa_Oficio $empresa_Oficio)
    {
        return $empresa_Oficio;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa_Oficio  $empresa_Oficio
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa_Oficio $empresa_Oficio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa_Oficio  $empresa_Oficio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa_Oficio $empresa_Oficio)
    {
        $empresa_Oficio->update($request->all());
        return $empresa_Oficio;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa_Oficio  $empresa_Oficio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa_Oficio $empresa_Oficio)
    {
        $empresa_Oficio->delete();
        return $empresa_Oficio;
    }
}
