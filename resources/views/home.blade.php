@extends('layouts.app')

@section('content')
<div id="fullheight" style="background-image: url('../img/fondo_home.png')">
    <div class="container" style="padding-top: 6rem">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <h3 class="display-4 mt-5"><b>Bienvenido a jobsok, lugar donde encontrarás a los mejores tecnicos de la región</b></h3><br>
                <h3 class="pb-2">Puedes solicitar atención si necesitas alguna reparación ya mismo o ser parte de nuestro gran equipo de tecnicos profesionales</h3><br>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="row">
                    {{-- Boton 1 --}}
                    <div class="col-lg-6 col-md-12">
                        <a class="btn btn-lg btn-block text-white" style="background-color: #235B74"
                            href="{{ route('oficios.index') }}" role="button">Deseo solicitar servicio</a>
                    </div>

                    {{-- Boton 2 --}}
                    <div class="col-lg-6 col-md-12">
                        <a class="btn btn-lg btn-block text-white" style="background-color: #1E4C61"
                        href="{{ route('trabajo.listaSolicitudes') }}" role="button">Ver progreso de trabajos</a>
                    </div>

                    {{-- Boton 3 y 4 --}}
                    @if (auth()->user()->idType_User == 1)
                        <div class="col-lg-12 col-md-12 pt-2">
                            <a class="btn btn-lg btn-block text-white" style="background-color: #804545"
                            href="{{ route('user.edit') }}" role="button">Deseo ser parte de Jobsok</a>
                        </div>
                    @else
                        <div class="col-lg-12 col-md-12 pt-2">
                            <a class="btn btn-lg btn-block text-white" style="background-color: #302727"
                            href="{{ route('user.show2') }}" role="button">Panel de control de técnico</a>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
