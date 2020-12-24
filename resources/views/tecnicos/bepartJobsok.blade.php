@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        {{-- imagen --}}
        <div class="col-lg-6 col-md-12 px-0">
            <div id="fullheight" style="background-image: url('../img/fondo_joining.png')"></div>
        </div>

        {{-- formulario --}}
        <div class="col-lg-4 col-md-12">
            <div class="container" style="padding-top: 6rem;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Necesitamos datos extra para que seas parte de nosotros</h5>
                        <hr>
                
                        <form method="POST" action="{{ route('user.update') }}">
                            @csrf
                
                            {{-- Tiempo de experiencia --}}
                            <div class="form-group input-group">
                                <input id="tExp" type="text" class="form-control @error('tExp') is-invalid @enderror" name="tExp"
                                    value="{{ old('tExp') }}" placeholder="Ingrese tiempo de experiencia en meses o años" autofocus>
                
                                @error('tExp')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                
                            {{-- En que destacas --}}
                            <h5 class="card-title">Dinos en que destacas: </h5>
                            <hr>
                            <div class="form-group input-group">
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
                
                            {{-- Información de tecnico --}}
                            <div class="form-group input-group">
                                <textarea name="descripcion" id="descripcion"
                                    class="form-control @error('descripcion') is-invalid @enderror" cols="30" rows="5"
                                    value="{{ old('descripcion') }}" placeholder="Agrege una descripción a su perfil"
                                    required></textarea>
                
                                @error('descripcion')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                
                            {{-- Trabajos hechos --}}
                            <div class="form-group input-group">
                                <input id="nroTrabajos" type="number" class="form-control @error('nroTrabajos') is-invalid @enderror"
                                    name="nroTrabajos" value="{{ old('nroTrabajos') }}"
                                    placeholder="Ingrese números de trabajos hechos">
                
                                @error('nroTrabajos')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                
                            {{-- boton --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block btn-lg" style="background-color: #2A6DB6">
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
</div>
@endsection