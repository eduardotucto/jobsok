@extends('layouts.app')

@section('content')

<div class="container-fluid" style="padding-top: 4rem">
    <div class="container">
        <div class="row justify-content-center">

            @if (isset($userdata->id))

                {{--Información basica de tecnico --}}
                <div class="col-lg-4 col-md-12 mt-4">
                    <div class="card" style="border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $userdata->name }}</b></h5><hr>
                            <p class="m-0">Localizado en {{ ucwords($userdata->ciudad) }}</p>
                            <p class="m-0">Numero telefono: {{ $userdata->telefono }}</p><br>
                            <a href="{{ route('trabajo.create', $userdata->id) }}"><button class="btn btn-primary btn-block">Solicitar asistencia</button></a>
                        </div>
                    </div>
                </div>

                {{--Información basica 2 de tecnico --}}
                <div class="col-lg-6 col-md-12 mt-4">
                    <h2 class="display-5 text-center">Información del técnico</h2>
                    <div class="card" style="border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="card-title"><b>Descripción dada por el técnico</b></h5><hr>
                            <span>{{ $userdata->informacion }}</span><br><br>
                            <h5 class="card-title"><b>Datos de su experiencia</b></h5><hr>
                            <p class="m-0"><b>- {{ $userdata->nro_trabajos }} trabajos</b> hechos a lo largo de su carrera</p>
                            <p class="m-0"><b>- {{ $userdata->experiencia }} </b> de experiencia en el sector</p>
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