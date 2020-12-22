@extends('layouts.app')

@section('content')

<div class="container-fluid" style="padding-top: 4rem">
    <div class="container pb-4">
        <div class="row justify-content-center">

            @if (isset($userdata->id))

            {{-- Información basica de tecnico --}}
            <div class="col-lg-4 col-md-12 mt-4">
                <div class="card" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title"><b>{{ $userdata->name }}</b></h5>
                        <hr>
                        <p class="m-0">Localizado en {{ ucwords($userdata->ciudad) }}</p>
                        <p class="m-0">Numero telefono: {{ $userdata->telefono }}</p><br>
                        <a href="{{ route('trabajo.create', $userdata->id) }}">
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
                        {{-- <h5 class="card-title"><b>{{ $userdata->name }}</b></h5><hr> --}}
                        <p class="m-0"><b>Nombre: </b>{{ ucwords(auth()->user()->name) }}</p>
                        <p class="m-0"><b>Fecha de nacimiento: </b>{{ auth()->user()->f_nacimiento }}</p>
                        <p class="m-0"><b>Genero: </b>{{ auth()->user()->sexo }}</p>
                        <p class="m-0"><b>Teléfono: </b>{{ auth()->user()->telefono }}</p>
                    </div>
                </div>
            </div>

            {{-- Fila relleno --}}
            <div class="col-lg-4 col-md-12"></div>

            {{-- Descripción de la necesidad --}}
            <div class="col-lg-6 col-md-12 mt-4">
                <div class="card" style="border-radius: 20px;">
                    <div class="card-body">

                        <form method="POST" action="{{ route('trabajo.store') }}">
                        @csrf

                            <h5 class="card-title"><b>Descripción de la necesidad</b></h5><hr>
                            <p class="m-0"><b>Fecha: </b>{{ date('d-m-Y') }}</p>
                            <p class="m-0"><b>Estado: </b>Solicitando</p>
                            <p class="m-0"><b>Descripción de la necesidad:</b></p>
                            <textarea class="form-control my-2" name="txtDescripcion" cols="55" rows="10" maxlength="800" style="border-radius: 10px;"
                                placeholder="Ingrese la descripción de su problema" required></textarea>
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                            <input type="hidden" name="idTecnico" value="{{ $userdata->id }}">
                            <input type="hidden" name="idUser" value="{{ auth()->user()->id }}">

                        </form>

                    </div>
                </div>
            </div>

            @else
            <span class="display-4 mt-5">Usuario no encontrado.</span>
            @endif

        </div>
    </div>
</div>


@endsection