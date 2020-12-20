@extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding-top: 4rem">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="display-4 mt-5"><b>Genera ganancias con las labores que disfrutas hacer</b></h1><br>
                <h2 class="pb-2">Únete a nuestra plataforma y gana clientes fácilmente</h2><br>
                <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Deseo unirme</a>
            </div>
            <div class="col-4">
                <img src="{{ URL::asset('img/image_1.png') }}" class="img-fluid" alt="Responsive image" style="width: 250px">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-5">
                <img src="{{ URL::asset('img/image_2.png') }}" class="img-fluid" alt="Responsive image" style="width: 450px">
            </div>
            <div class="col-7">
                <h1 class="display-4 mt-5"><b>¿Necesitas alguna reparación?</b></h1><br>
                <h2 class="pb-2">Registrate y solicita un servicio facilmente, tenemos a los mejores en el campo que necesites</h2><br>
                <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Deseo registrarme</a>
            </div>
        </div>
    </div>
</div>
@endsection