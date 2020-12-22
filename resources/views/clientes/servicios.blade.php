@extends('layouts.app')

@section('content')

<div class="container-fluid" style="padding-top: 4rem">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-12 mt-4">
                <h2 class="display-4 mt-4"><b>¿Qué tipo de servicio buscas?</b></h2>
                <p class="pb-2">Selecciona el servicio que buscas</p>
                <div class="container">
                    <div class="row">

                        {{-- Oficios con imagenes --}}
                        @foreach ($oficios as $ofi)
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-5">
                                <div class="col shadow card py-4 px-4 hand-click" style="width: 12rem;height: 13rem;border-radius: 20px;"
                                    onclick="window.location='{{ route('oficios.show', $ofi) }}'">
                                    <img src="{{ URL::asset('img/jobs/'.$ofi['nombre'].'.png') }}">
                                    <p class="text-center pt-3">{{ $ofi['nombre'] }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12" style="padding-top: 3rem">
                <img src="{{ URL::asset('img/image_3.png') }}" class="img-fluid" alt="Responsive image"
                    style="width: 250px">
            </div>
        </div>
    </div>
</div>
@endsection