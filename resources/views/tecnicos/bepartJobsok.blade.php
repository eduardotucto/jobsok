@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Quiero ser parte de Jobsok</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('user.update') }}">
                        @csrf

                        {{-- Tiempo de experiencia --}}
                        <div class="form-group row">
                            <label for="tExp" class="col-md-4 col-form-label text-md-right">Tiempo de experiencia</label>
                        
                            <div class="col-md-6">
                                <input id="tExp" type="text" class="form-control @error('tExp') is-invalid @enderror" name="tExp"
                                    value="{{ old('tExp') }}" required autocomplete="tExp" autofocus placeholder="en meses o años">
                        
                                @error('tExp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- En que destacas --}}
                        <div class="form-group row">
                            <label for="Destacas" class="col-md-4 col-form-label text-md-right">
                                Dinos en que destacas:
                            </label>
                        
                            <div class="col-md-6">
                                <label for="oficios">
                                    <input type="checkbox" name="oficios[]" value="1">Plomeria <br>
                                    <input type="checkbox" name="oficios[]" value="2">Construcción <br>
                                    <input type="checkbox" name="oficios[]" value="3">Electricista <br>
                                    <input type="checkbox" name="oficios[]" value="4">Pintor
                                </label>
                                <br><small>Puede ser más de uno</small>
                            </div>
                        </div>

                        {{-- Informacion de tecnico --}}
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Describe lo que haces</label>
                        
                            <div class="col-md-6">
                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                                    value="{{ old('descripcion') }}" required autocomplete="descripcion" cols="30" rows="10"></textarea>
                        
                                @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Trabajos hechos --}}
                        <div class="form-group row">
                            <label for="nroTrabajos" class="col-md-4 col-form-label text-md-right">Nro de trabajos hechos</label>
                        
                            <div class="col-md-6">
                                <input id="nroTrabajos" type="number" class="form-control @error('nroTrabajos') is-invalid @enderror" name="nroTrabajos"
                                    value="{{ old('nroTrabajos') }}" required autocomplete="nroTrabajos" placeholder="Aproximado en tu carrera" >
                        
                                @error('nroTrabajos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Boton --}}
                        <div class="row justify-content-center">
                            <button type="submit" class="col-md-6 btn btn-primary" style="background-color: #2A6DB6">
                                Actualizar datos
                            </button>
                        </div>

                        {{-- hidden --}}
                        <input type="hidden" name="tipoUsuario" value="2">
                        <input type="hidden" name="idUser" value="{{ auth()->user()->id }}">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection