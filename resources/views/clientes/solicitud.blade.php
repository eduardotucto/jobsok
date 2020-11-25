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

                    {{-- Una fila --}}
                    <div class="form-group row mb-0">

                        {{-- Información basica de tecnico --}}
                        <div class="col-md-4 offset-md-12">
                            <div class="card card-body">
                                <h4>{{ $userdata->name }}</h4><br>
                                Localizado en {{ ucwords($userdata->ciudad) }} <br>
                                <button class="btn btn-secondary disabled" disabled>Solicitar asistencia</button>
                                Número telefonico: {{ $userdata->telefono }}
                            </div>
                        </div>

                        {{-- Perfil de cliente --}}
                        <div class="col-md-8 offset-md-12">
                            <div class="card card-body">
                                <h4>Perfil de cliente</h4><hr>
                                Nombre: {{ ucwords(auth()->user()->name) }} <br>
                                <i>Fecha de nacimiento: me falta jiji</i>
                                <i>Genero: me falta jiji</i>
                                Teléfono: {{ auth()->user()->telefono }}
                            </div>
                        </div>

                    </div>

                    {{-- Otra fila xd --}}
                    <div class="form-group row mb-0">

                        {{-- Haciendo espacio a la izquierda xd --}}
                        <div class="col-md-4 offset-md-12"></div>

                        {{-- Descripción de la necesidad --}}
                        <div class="col-md-8 offset-md-12" style="padding-top: 20px">
                            <div class="card card-body">

                                <form action="POST" action="{{ route('trabajo.store', $userdata) }}">
                                    <h4>Descripción de la necesidad</h4>
                                    <hr>
                                    <i>N° salocitud generado automáticamente: not aviable</i>
                                    {{-- Fecha actual laragon --}}
                                    Fecha: {{ date('d-m-Y') }} <br> 
                                    Estado: Solicitanto <br>
                                    Descripción:
                                    <textarea name="txtDescripcion" cols="30" rows="10" maxlength="800"></textarea> <br>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection