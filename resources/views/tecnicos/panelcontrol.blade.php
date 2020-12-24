@extends('layouts.app')

@section('content')

<div class="container pb-4" style="padding-top: 5rem">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title display-4">Panel de control</h5><hr>
                    <div class="row justify-content-center">
                        {{-- Perfil de tecnico --}}
                        <div class="col-lg-8 col-md-12 my-2">
                            <div class="card card-body shadow" style="border-radius: 20px">
                                <h4>Perfil</h4><hr>
                                <p class="my-0"><b>Nombre: </b>{{ ucwords(auth()->user()->name) }}</p>
                                <p class="my-0"><b>Fecha de nacimiento: </b>{{ auth()->user()->f_nacimiento }}</p>
                                <p class="my-0"><b>Genero: </b>{{ auth()->user()->sexo }}</p>
                                <p class="my-0"><b>Nro de trabajos hechos: </b>{{ auth()->user()->nro_trabajos }}</p>
                            </div>
                        </div> <br>

                        {{-- Informacion de contacto --}}
                        <div class="col-lg-8 col-md-12 my-2">
                            <div class="card card-body shadow" style="border-radius: 20px">
                                <h4>Informacion de contacto</h4>
                                <hr>
                                <p class="my-0"><b>Correo: </b>{{ auth()->user()->email }} <br></p>
                                <p class="my-0"><b>Telefono: </b>{{ auth()->user()->telefono }}</p>
                            </div>
                        </div> <br>

                        {{-- Trabajos solicitados --}}
                        <div class="col-lg-8 col-md-12 my-2">
                            <div class="card card-body shadow" style="border-radius: 20px">
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
                                            {{-- <i>No hay registros aún</i> --}}
                                        @endif
                                    </div>
                                </div> <br>                            
                                @endforeach

                            </div>
                        </div><br>

                        {{-- Trabajos proceso --}}
                        <div class="col-lg-8 col-md-12 my-2">
                            <div class="card card-body shadow" style="border-radius: 20px">
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
                                            {{-- <i>No hay registros aún</i> --}}
                                        @endif
                                    </div>
                                </div> <br>
                                @endforeach
                        
                            </div>
                        </div><br>

                        {{-- Trabajos realizados --}}
                        <div class="col-lg-8 col-md-12 my-2">
                            <div class="card card-body shadow" style="border-radius: 20px">
                                <h4>Trabajos realizados</h4>
                                <hr>
                        
                                @foreach ($trabajos as $trab)
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 offset-md-12">
                                        @if ($trab['estado'] == 'Terminado')
                                            <a href="{{ route('trabajo.edit', $trab->id) }}">
                                                <button class="btn btn-info" style="text-align: left">
                                                    Fecha: {{ $trab->created_at->format('Y-m-d') }}<br>
                                                    Descripción: {{ $trab->descripcion }}
                                                </button>
                                            </a>
                                        @else
                                            {{-- <i>No hay registros aún</i> --}}
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
</div>
@endsection