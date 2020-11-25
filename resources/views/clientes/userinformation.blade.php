@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p style="font-size: 25px;text-align:center;">Información de persona</p>            
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="form-group row mb-0">
                        <div class="col-md-4 offset-md-12">
                            <div class="card card-body">
                                <h4>{{ $userdata->name }}</h4><br>
                                Localizado en {{ ucwords($userdata->ciudad) }} <br>
                                <a href="{{ route('trabajo.create', $userdata->id) }}">
                                    <button class="btn btn-secondary">Solicitar asistencia</button>
                                </a>
                                Número telefonico: {{ $userdata->telefono }}
                            </div>
                        </div>

                        <div class="col-md-8 offset-md-12">
                            <div class="card card-body">
                                Informacion: <br>
                                {{ $userdata->informacion }} <br><br>
                                - {{ $userdata->nro_trabajos }} trabajos hechos a lo largo de su carrera. <br>
                                - {{ $userdata->experiencia }} de experiencia como tecnico.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection