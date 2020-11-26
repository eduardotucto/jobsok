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

                        {{-- aviso --}}
                        <div class="col-md-8 offset-md-12">
                            <div class="card card-body">
                                <h1 style="text-align: center"> ¡Solicitud enviada! </h1>
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
    </div>
</div>
@endsection