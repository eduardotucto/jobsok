@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    {{-- Perfil de tecnico --}}
                    <div class="col-md-8 offset-md-12">
                        <div class="card card-body">
                            <h4>Perfil</h4><hr>
                            Nombre: {{ ucwords(auth()->user()->name) }} <br>
                            Fecha de nacimiento: {{ auth()->user()->f_nacimiento }} <br>
                            Genero: {{ auth()->user()->sexo }} <br>
                            Nro de trabajos hechos: {{ auth()->user()->nro_trabajos }}
                        </div>
                    </div> <br>

                    {{-- Informacion de contacto --}}
                    <div class="col-md-8 offset-md-12">
                        <div class="card card-body">
                            <h4>Informacion de contacto</h4>
                            <hr>
                            Correo: {{ auth()->user()->email }} <br>
                            Telefono: {{ auth()->user()->telefono }}
                        </div>
                    </div> <br>

                    {{-- Trabajos solicitados --}}
                    <div class="col-md-8 offset-md-12">
                        <div class="card card-body">
                            <h4>Trabajos solicitados</h4><hr>

                            @foreach ($trabajos as $trab)                            
                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-12">
                                    @if ($trab['estado'] == 'Esperando')
                                        <a href="{{ route('trabajo.edit', $trab->id) }}">
                                            <button class="btn btn-info" style="text-align: left">
                                                Fecha: {{ $trab->created_at->format('Y-m-d') }}<br>
                                                Descripción: {{ $trab->descripcion }}
                                            </button>
                                        </a>
                                    @else
                                        <i>No hay registros aún</i>
                                    @endif
                                </div>
                            </div> <br>                            
                            @endforeach

                        </div>
                    </div><br>

                    {{-- Trabajos proceso --}}
                    <div class="col-md-8 offset-md-12">
                        <div class="card card-body">
                            <h4>Trabajos proceso</h4>
                            <hr>
                    
                            @foreach ($trabajos as $trab)
                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-12">
                                    @if ($trab['estado'] == 'En proceso')
                                        <a href="{{ route('trabajo.edit', $trab->id) }}">
                                            <button class="btn btn-info" style="text-align: left">
                                                Fecha: {{ $trab->created_at->format('Y-m-d') }}<br>
                                                Descripción: {{ $trab->descripcion }}
                                            </button>
                                        </a>
                                    @else
                                        <i>No hay registros aún</i>
                                    @endif
                                </div>
                            </div> <br>
                            @endforeach
                    
                        </div>
                    </div><br>

                    {{-- Trabajos realizados --}}
                    <div class="col-md-8 offset-md-12">
                        <div class="card card-body">
                            <h4>Trabajos realizados</h4>
                            <hr>
                    
                            @foreach ($trabajos as $trab)
                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-12">
                                    @if ($trab['estado'] == 'Terminado')
                                        <a href="{{ route('trabajo.show', $trab->id) }}">
                                            <button class="btn btn-info" style="text-align: left">
                                                Fecha: {{ $trab->created_at->format('Y-m-d') }}<br>
                                                Descripción: {{ $trab->descripcion }}
                                            </button>
                                        </a>
                                    @else
                                        <i>No hay registros aún</i>
                                    @endif
                                </div>
                            </div> <br>
                            @endforeach
                    
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection