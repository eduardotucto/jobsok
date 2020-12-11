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
        Trabajo::create([
            'descripcion' => request('txtDescripcion'),
            'idUser_Tecnico'=>request('idTecnico'),
            'idUser_Cli'=>request('idUser'),
        ]);
        
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
    public function edit($id)
    {
        $trabajo = Trabajo::find($id);
        $cliente = User::find($trabajo['idUser_Cli']);
        $tecnico = User::find($trabajo['idUser_Tecnico']);

        return view('trabajos.panelTrabajos',[
            'trabajo' => $trabajo,
            'cliente' => $cliente,
            'tecnico' => $tecnico
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function update($id, $estado)
    {
        Trabajo::where('id',$id)
        ->update([
            'estado' => $estado
        ]);

        return redirect('home')->with('status', 'Aceptaste un nuevo trabajo, será comunicado al cliente');
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

    public function listaSolicitudes()
    {
        $id = auth()->user()->id;
        $trabajos = Trabajo::where('idUser_Cli', $id)->get();
        
        if (empty($trabajos)) {
            return redirect('home')->with('status', 'Aún no solicitaste ningun servicio, gracias. :)');
        } else {
            return view('trabajos.solicitados',[
                'trabajos' => $trabajos,
            ]);
        }
    }

    public function rateView($id)
    {
        $trabajo = Trabajo::find($id);
        return view('trabajos.calificar',[
            'trabajo' => $trabajo
        ]);
        // $trabajo = Trabajo::find($id);
        // $cliente = User::find($trabajo['idUser_Cli']);
        // $tecnico = User::find($trabajo['idUser_Tecnico']);

        // return view('trabajos.panelTrabajos',[
        //     'trabajo' => $trabajo,
        //     'cliente' => $cliente,
        //     'tecnico' => $tecnico
        // ]);
    }

    public function rateSave()
    {
        
        $idTrabajo = request('id');
        $confiabilidad = request('range1');
        $cortesia = request('range2');
        $orden = request('range3');
        $manoObra = request('range4');
        $cotizacion = request('range5');
        $result = request('result');

        Trabajo::where('id',$idTrabajo)
        ->update([
            'estado' => 'Terminado',
            'confiabilidad' => $confiabilidad,
            'cortesía' => $cortesia,
            'orden' => $orden,
            'Mano_de_obra' => $manoObra,
            'Precision_cotizacion' => $cotizacion
        ]);
        return redirect('home')->with('status', 'Gracias por calificar el trabajo que recibiste. :)');
    }
}
