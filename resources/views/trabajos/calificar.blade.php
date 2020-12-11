@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    {{-- Lista de solicitudes --}}
                    <div class="col-md-12 offset-md-12">
                        <div class="card card-body">
                            <div class="form-group mb-0">
                                <h4>Ayudenos a mejorar su experiencia</h4>
                                <small>Califique al técnico del 1 al 10 segun:</small><hr>
                            </div>

                            @if (is_null($trabajo->orden))
                                <form method="POST" action="{{ route('trabajo.rateSave') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $trabajo->id }}">
                                <input type="hidden" id="result" name="result">
                                
                                    {{-- Confiabilidad --}}
                                    <div class="form-group row">
                                        <label for="confiabilidad" class="col-md-5 text-md-right">Confiabilidad</label>
                                        <div class="col-md-6">
                                            <input type="range" list="tickmarks" name="range1" id="range1" min="0" max="10" value="5" oninput="Promedio()">
                                            <datalist id="tickmarks">
                                                <option value="0" label="0%">
                                                <option value="1">
                                                <option value="2">
                                                <option value="3">
                                                <option value="4">
                                                <option value="5" label="5%">
                                                <option value="6">
                                                <option value="7">
                                                <option value="8">
                                                <option value="9">
                                                <option value="10" label="10%">
                                            </datalist>
                                        </div>
                                    </div>

                                    {{-- Cortesía --}}
                                    <div class="form-group row">
                                        <label for="cortesia" class="col-md-5 text-md-right">Cortesía</label>
                                        <div class="col-md-6">
                                            <input type="range" list="tickmarks" name="range2" id="range2" min="0" max="10" value="5" oninput="Promedio()">
                                            <datalist id="tickmarks">
                                                <option value="0" label="0%">
                                                <option value="1">
                                                <option value="2">
                                                <option value="3">
                                                <option value="4">
                                                <option value="5" label="5%">
                                                <option value="6">
                                                <option value="7">
                                                <option value="8">
                                                <option value="9">
                                                <option value="10" label="10%">
                                            </datalist>
                                        </div>
                                    </div>

                                    {{-- Orden --}}
                                    <div class="form-group row">
                                        <label for="orden" class="col-md-5 text-md-right">Orden</label>
                                        <div class="col-md-6">
                                            <input type="range" list="tickmarks" name="range3" id="range3" min="0" max="10" value="5" oninput="Promedio()">
                                            <datalist id="tickmarks">
                                                <option value="0" label="0%">
                                                <option value="1">
                                                <option value="2">
                                                <option value="3">
                                                <option value="4">
                                                <option value="5" label="5%">
                                                <option value="6">
                                                <option value="7">
                                                <option value="8">
                                                <option value="9">
                                                <option value="10" label="10%">
                                            </datalist>
                                        </div>
                                    </div>

                                    {{-- Mano de obra --}}
                                    <div class="form-group row">
                                        <label for="ManoObra" class="col-md-5 text-md-right">Mano de obra</label>
                                        <div class="col-md-6">
                                            <input type="range" list="tickmarks" name="range4" id="range4" min="0" max="10" value="5" oninput="Promedio()">
                                            <datalist id="tickmarks">
                                                <option value="0" label="0%">
                                                <option value="1">
                                                <option value="2">
                                                <option value="3">
                                                <option value="4">
                                                <option value="5" label="5%">
                                                <option value="6">
                                                <option value="7">
                                                <option value="8">
                                                <option value="9">
                                                <option value="10" label="10%">
                                            </datalist>
                                        </div>
                                    </div>

                                    {{-- Mostrando promedio --}}
                                    <div class="form-group row">
                                        <label for="" class="col-md-5 text-md-right">El promedio del puntaje es: </label>
                                        <div class="col-md-6">
                                            <label id="resultado">5</label>
                                        </div>
                                    </div>

                                    {{-- Boton enviar --}}
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Enviar respuestas
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            @else
                                <div>trabajo calificado</div>
                            @endif
                            

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function Promedio() {
        let conf = parseFloat(document.getElementById('range1').value);
        let cort = parseFloat(document.getElementById('range2').value);
        let orden = parseFloat(document.getElementById('range3').value);
        let m_obra = parseFloat(document.getElementById('range4').value);
        // let p_coti = parseFloat(document.getElementById('range5').value);
        let prom

        prom = (conf + cort + orden + m_obra)/4;
        // console.log(prom);
        // alert('El promedio de tu puntaje fue ' + prom)
        document.getElementById("resultado").innerHTML = prom;
        document.getElementById("result").value = prom;
    }
</script>
    