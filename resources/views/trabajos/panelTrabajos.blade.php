@extends('layouts.app')

@section('content')

<div class="container-fluid" style="padding-top: 5rem">
    <div class="container pb-4">
        <div class="row justify-content-center">

            {{-- Información basica de tecnico --}}
            <div class="col-lg-4 col-md-12 mt-4">
                <div class="card" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title"><b>{{ $tecnico->name }}</b></h5><hr>
                        <p class="m-0">Localizado en {{ ucwords($tecnico->ciudad) }}</p>
                        <p class="m-0">Numero telefono: {{ $tecnico->telefono }}</p><br>
                        <a href="{{ route('trabajo.create', $tecnico->id) }}">
                            <button class="btn btn-primary btn-block" disabled>Solicitar asistencia</button>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Perfil de cliente --}}
            <div class="col-lg-6 col-md-12 mt-4">
                <div class="card" style="border-radius: 20px;">
                    <div class="card-body">
                        <h2 class="display-5 text-center">Perfil de cliente</h2><hr>
                        <p class="m-0"><b>Nombre: </b>{{ ucwords( $cliente->name ) }}</p>
                        <p class="m-0"><b>Fecha de nacimiento: </b>{{ $cliente->f_nacimiento }}</p>
                        <p class="m-0"><b>Genero: </b>{{ $cliente->sexo }}</p>
                        <p class="m-0"><b>Teléfono: </b>{{ $cliente->telefono }}</p>
                    </div>
                </div>
            </div>

            {{-- Fila relleno --}}
            <div class="col-lg-4 col-md-12"></div>

            {{-- Descripción de la necesidad --}}
            <div class="col-lg-6 col-md-12 mt-4">
                <div class="card" style="border-radius: 20px;">
                    <div class="card-body">

                        <h5 class="card-title"><b>Descripción de la necesidad</b></h5><hr>
                        <p class="m-0"><b>Fecha de solicitud: </b>{{ $trabajo->created_at->format('Y-m-d') }}</p>
                        <p class="m-0"><b>Estado: </b>{{ $trabajo->estado }}</p>
                        <p class="m-0"><b>Descripción de la necesidad:</b></p>
                        <p class="m-0">{{ $trabajo->descripcion }}</p>

                    </div>
                </div>
            </div>

            {{-- Fila relleno --}}
            <div class="col-lg-4 col-md-12"></div>

            {{-- Botones --}}
            <div class="col-lg-6 col-md-12 mt-4">

                {{-- Para que tecnico acepte solicitudes de trabajo o no --}}
                @if ($trabajo->estado == 'Esperando' and auth()->user()->idType_User != 1)
                <div class="col-12">
                    <div class="row">
                        <a class="col-md-6" href="{{ route('trabajo.update',array($trabajo->id, 'En proceso')) }}">
                            <button type="submit" class=" btn btn-primary">Aceptar</button>
                        </a>
                        <a class="col-md-6" href="{{ route('trabajo.update',array($trabajo->id, 'Rechazado')) }}">
                            <button type="submit" class="btn btn-secondary">Rechazar</button>
                        </a>
                
                    </div>
                </div>
                @endif

                {{-- Solo puede confirmar si es tipo 1 es decir cliente
                    Provocara error cuando un tecnico quiera confirmar trabajo confirmado --}}
                @if ($trabajo->estado == 'En proceso' and auth()->user()->idType_User == 1)
                <div class="col-12">
                    <div class="row">
                        <a class="col-md-12" href="{{ route('trabajo.rateView', $trabajo->id ) }}">
                            <button type="submit" class=" btn btn-primary btn-block">Confirmar trabajo terminado</button>
                        </a>
                    </div>
                </div>
                @endif
                
                {{-- en caso 'terminado' muestra puntaje del trabajo --}}
                @if ($trabajo->estado == 'Terminado')
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="row">
                            <label class="col-md-10 text-md-left">Puntaje obtenido de este trabajo: </label>
                            <label class="col-md-2 text-md-left" id="promedio"></label>
                        </div>
                    
                        {{-- Confiabilidad --}}
                        <div class="row">
                            <label for="confiabilidad" class="col-md-10 text-md-left">Confiabilidad</label>
                            <label class="col-md-2">{{ $trabajo->confiabilidad }}</label>
                            <input type="hidden" id="range1" value="{{ $trabajo->confiabilidad }}">
                        </div>
                    
                        {{-- Cortesía --}}
                        <div class="row">
                            <label for="cortesia" class="col-md-10 text-md-left">Cortesía</label>
                            <label class="col-md-2">{{ $trabajo->cortesía }}</label>
                            <input type="hidden" id="range2" value="{{ $trabajo->cortesía }}">
                        </div>
                    
                        {{-- Orden --}}
                        <div class="row">
                            <label for="orden" class="col-md-10 text-md-left">Orden</label>
                            <label class="col-md-2">{{ $trabajo->orden }}</label>
                            <input type="hidden" id="range3" value="{{ $trabajo->orden }}">
                        </div>
                    
                        {{-- Mano de obra --}}
                        <div class="row">
                            <label for="ManoObra" class="col-md-10 text-md-left">Mano de obra</label>
                            <label class="col-md-2">{{ $trabajo->Mano_de_obra }}</label>
                            <input type="hidden" id="range4" value="{{ $trabajo->Mano_de_obra }}">
                        </div>
                    
                        <div class="row">
                            <a class="col-md-12" href="{{ route('home') }}">
                                <button type="submit" class=" btn btn-primary">Este trabajo esta marcado como terminado</button>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
<script>
    window.onload=function() {
        let conf = parseFloat(document.getElementById('range1').value);
        let cort = parseFloat(document.getElementById('range2').value);
        let orden = parseFloat(document.getElementById('range3').value);
        let m_obra = parseFloat(document.getElementById('range4').value);
        // let p_coti = parseFloat(document.getElementById('range5').value);
        let prom
        
        prom = (conf + cort + orden + m_obra)/4;
        console.log(prom);
        // alert('El promedio de tu puntaje fue ' + prom)
        document.getElementById("promedio").innerHTML = prom;
    }
</script>