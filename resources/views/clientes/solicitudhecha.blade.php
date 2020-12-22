@extends('layouts.app')

@section('content')

<div class="container-fluid" style="padding-top: 4rem">
    <div class="container pb-4">
        <div class="row justify-content-center">

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

            {{-- aviso --}}
            <div class="col-lg-6 col-md-12 mt-4">
                <div class="card" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title display-4 text-center"><b>¡Solicitud enviada!</b></h5><hr>
                        <a href="{{ route('home') }}">
                            <button class="btn btn-secondary btn-block" style="background-color: #2A6DB6">
                                Terminar
                            </button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection