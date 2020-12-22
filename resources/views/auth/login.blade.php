@extends('layouts.app')

@section('content')
<div id="fullheight" style="background-image: url('../img/fondo_login.jpg')">
    <div class="container" style="padding-top: 15rem">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Iniciar sesión</h5>
                        <hr>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- Correo --}}
                            <div class="form-group input-group">
                                {{-- <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div> --}}
                                <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Ingrese correo electrónico" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Contraseña --}}
                            <div class="form-group input-group">
                                <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" placeholder="Ingrese su contraseña">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- boton --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">
                                    Iniciar sesión
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
