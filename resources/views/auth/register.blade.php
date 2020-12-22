@extends('layouts.app')

@section('content')

<div id="fullheight" style="background-image: url('../img/fondo_registro.png')">
    <div class="container" style="padding-top: 6rem">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Registrate ahora</h5><hr>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- Nombres y apellidos --}}
                            <div class="form-group row">
                                <div class="col-lg-6 col-md-12">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                        placeholder="Nombre" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{ old('lastname') }}" placeholder="Apellidos">
                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Ciudad --}}
                            <div class="form-group">
                                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}"
                                    placeholder="Ciudad">
                            
                                @error('city')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Telefono --}}
                            <div class="form-group">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" placeholder="Número celular">
                            
                                @error('phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Genero --}}
                            <div class="form-group">
                                <select class="form-control" name="genero">
                                    <option value="null" selected disabled>Genero</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>

                            {{-- Fecha de nacimiento --}}
                            <div class="form-group">
                                <input class="form-control" type="date" name="fNacimiento" id="fNacimiento-date-input">
                            </div>

                            {{-- Correo --}}
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="Correo electrónico">
                            
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Contraseña --}}
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password" placeholder="Crear contraseña">
                                
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Confirmar contraseña --}}
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                                    autocomplete="new-password" placeholder="Confirmar contraseña">
                            </div>

                            {{-- boton --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">
                                    Registrar
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
