@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{-- Fila 1 --}}
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

                    {{-- Fila 2 --}}
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

                    {{-- Fila 3 --}}
                    <div class="form-group row mb-0">

                        {{-- Haciendo espacio a la izquierda xd --}}
                        <div class="col-md-4 offset-md-12"></div>
                        
                        @if ($trabajo->estado == 'Esperando')
                            {{-- botones --}}
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
                        @else
                            {{--  --}}
                            @if ( auth()->user()->idType_User == 1)
                                <div class="col-md-4 offset-md-12">
                                    <div class="row">
                                        <a class="col-md-6" href="{{ route('trabajo.update',array($trabajo->id, 'Terminado')) }}">
                                            <button type="submit" class=" btn btn-primary">Confirmar trabajo terminado</button>
                                        </a>                                
                                    </div>
                                </div>
                            @endif

                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection