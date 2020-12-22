@extends('layouts.app')

@section('content')

<div class="container-fluid" style="padding-top: 4rem">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lista de trabajadores para este servicio</h5>

                        @if ($usersOficios->isEmpty())<p><hr>Aun no tenemos trabajadores en este servicio :'(</p>
                        @else
                            <p style="">{{ ucwords(auth()->user()->ciudad) }} / {{ $usersOficios->first()->nombre }}</p><hr>
                            <div class="row justify-content-center">
                                
                                @foreach ($usersOficios as $usOf)
                                    <div class="col-lg-6 col-md-6 col-sm-12 my-3">
                                        <div class="col shadow card py-4 px-4 hand-click" style="border-radius: 20px;"
                                            onclick="window.location='{{ route('user.show', $usOf->id) }}'">
                                            <h4>{{ $usOf->name }}</h4>
                                            <p class="m-0"><b>- {{ $usOf->nro_trabajos }} trabajos</b> hechos a lo largo de su carrera</p>
                                            <p class="m-0"><b>- {{ $usOf->experiencia }}</b> de experiencia en el sector</p>
                                            <span class="d-inline-block text-truncate m-0" style="max-width: 300px;">
                                                <b>- Descripción:</b> {{ $usOf->informacion }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection