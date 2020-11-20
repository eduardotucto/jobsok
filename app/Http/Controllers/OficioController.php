<?php

namespace App\Http\Controllers;

use App\Oficio;
use Illuminate\Http\Request;

class OficioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $oficios = Oficio::all();

        return view('clientes.servicios',[
            'oficios' => $oficios
        ]);
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
        $oficio = Oficio::create($request->all());
        return $oficio;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function show(Oficio $oficio)
    {
        return $oficio;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function edit(Oficio $oficio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oficio $oficio)
    {
        $oficio->update($request->all());
        return $oficio;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oficio $oficio)
    {
        $oficio->delete();
        return $oficio;
    }
}
