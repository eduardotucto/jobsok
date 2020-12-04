@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- boton1 --}}
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('oficios.index') }}">Deseo solicitar servicio</a>
                        </div>
                    </div>
                    
                    {{-- boton2 --}}
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('index') }}">Ver progreso de trabajos</a>
                        </div>
                    </div>

                    @if (auth()->user()->idType_User == 1)
                        {{-- boton3 --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('user.edit') }}">Deseo ser parte de Jobsok</a>
                            </div>
                        </div>
                    @else
                        {{-- boton4 --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('user.show2') }}">Panel de control de técnico</a>
                            </div>
                        </div>                        
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
