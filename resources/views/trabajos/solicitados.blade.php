@extends('layouts.app')

@section('content')


<div class="container" style="padding-top: 5rem">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    {{-- Lista de solicitudes --}}
                    <div class="col-md-12 offset-md-12">
                        <div class="card card-body">
                            <h4>Listas de solicitudes hechos por: {{ ucwords(auth()->user()->name) }}</h4><hr>
                            <table class="table" style="text-align: center">
                                <caption>Click en ver para ver detalles</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" style="text-align: left">Descripcion</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trabajos as $index => $trab)
                                        <tr>
                                            <th>{{ $index + 1 }}</th>
                                            <td style="text-align: left"> {{ $trab['descripcion'] }} </td>
                                            <td> {{ $trab['created_at']->format('Y-m-d') }} </td>
                                            <td> {{ $trab['estado'] }} </td>
                                            <td><a href="{{ route('trabajo.edit', $trab) }}">Ver</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection