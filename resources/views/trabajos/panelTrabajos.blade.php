@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    {{-- Fila 1 - Info basica de tecnico y perfil de cliente--}}
                    <div class="form-group row mb-0">

                        {{-- Información basica de tecnico --}}
                        <div class="col-md-4 offset-md-12">
                            <div class="card card-body">
                                <h4>{{ $tecnico->name }}</h4><br>
                                Localizado en {{ ucwords($tecnico->ciudad) }} <br>
                                <button class="btn btn-secondary disabled" disabled>Solicitar asistencia</button>
                                Número telefonico: {{ $tecnico->telefono }}
                            </div>
                        </div>

                        {{-- Perfil de cliente --}}
                        <div class="col-md-8 offset-md-12">
                            <div class="card card-body">
                                <h4>Perfil de cliente</h4>
                                <hr>
                                Nombre: {{ $cliente->name }} <br>
                                Fecha de nacimiento: {{ $cliente->f_nacimiento }} <br>
                                Genero: {{ $cliente->sexo }} <br>
                                Teléfono: {{ $cliente->telefono }}
                            </div>
                        </div>

                    </div>

                    {{-- Fila 2 - Descrip de la necesidad--}}
                    <div class="form-group row mb-0">

                        {{-- Haciendo espacio a la izquierda xd --}}
                        <div class="col-md-4 offset-md-12"></div>

                        {{-- Descripción de la necesidad --}}
                        <div class="col-md-8 offset-md-12" style="padding-top: 20px">
                            <div class="card card-body">
                                <h4>Descripción de la necesidad</h4><hr>
                                Fecha de solicutud: {{ $trabajo->created_at->format('Y-m-d') }} <br>
                                Estado: {{ $trabajo->estado }} <br>
                                Descripción: <br>
                                <p>{{ $trabajo->descripcion }}</p><br>
                            </div>
                        </div>
                    </div><br>

                    {{-- Fila 3 - Botones--}}
                    <div class="form-group row mb-0">

                        {{-- Haciendo espacio a la izquierda xd --}}
                        <div class="col-md-4 offset-md-12"></div>

                        {{-- botones --}}
                        @if ($trabajo->estado == 'Esperando' and auth()->user()->idType_User != 1)
                            <div class="col-md-4 offset-md-12">
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
                            <div class="col-md-4 offset-md-12">
                                <div class="row">
                                    <a class="col-md-6" href="{{ route('trabajo.rateView', $trabajo->id ) }}">
                                        <button type="submit" class=" btn btn-primary">Confirmar trabajo terminado</button>
                                    </a>                                
                                </div>
                            </div>
                        @endif

                        {{-- en caso terminado muestra puntaje del trabajo --}}
                        @if ($trabajo->estado == 'Terminado')
                            <div class="col-md-6 offset-md-12">
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
                        @endif

                    </div>
                    
                </div>
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