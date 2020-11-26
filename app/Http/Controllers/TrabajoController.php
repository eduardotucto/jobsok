<?php

namespace App\Http\Controllers;

use App\Trabajo;
use App\User;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return Trabajo::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idTec)
    {
        $userdata = User::find($idTec);
        // return $currentuser;
        return view('clientes.solicitud',[
            'userdata' => $userdata
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // Guardando los datos
        // Trabajo::create([
        //     'descripcion' => request('txtDescripcion'),
        //     'idUser_Tecnico'=>request('idTecnico'),
        //     'idUser_Cli'=>request('idUser'),
        // ]);
        
        // para devolver nuevamente datos del tecnico
        $idTec = request('idTecnico');
        $userdata = User::find($idTec);
        return view('clientes.solicitudhecha',[
            'userdata' => $userdata
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajo $trabajo)
    {
        return $trabajo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabajo $trabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajo $trabajo)
    {
        $trabajo->update($request->all());
        return $trabajo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabajo $trabajo)
    {
        $trabajo->delete();
        return $trabajo;
    }
}
