@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p style="font-size: 25px">Lista de trabajores para este servicio</p>
                    <small style="">{{ ucwords(auth()->user()->ciudad) }} / {{ $usersOficios->first()->nombre }}</small>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach ($usersOficios as $usOf)

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-12">
                            <a href="{{ route('user.show', $usOf->id) }}">
                                <button class="btn btn-info" style="text-align: left">
                                    <h3>{{ $usOf->name }}</h3><br>
                                    {{ $usOf->nro_trabajos }} trabajos hechos a lo largo de su carrera. <br>
                                    {{ $usOf->experiencia }} de experiencia como tecnico.
                                </button>
                            </a>
                        </div>
                    </div> <br>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection