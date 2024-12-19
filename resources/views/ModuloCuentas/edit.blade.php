
@extends('adminlte::page')

@section('title', 'Editar Cuenta')

@section('content_header')
    <h1>Editar Cuenta</h1>
@stop

@section('content')
    <div class="container">
        <main class="mt-3">
            <form action="{{ route('Cuentas.update', ['Cuenta' => $Cuentas[0]['COD_CUENTAS']]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <!-- Campos de la primera columna -->


                        <div class="mb-3">
                            <label for="COD_CUENTAS" class="form-label">Código Cuenta</label>
                            <input type="text" class="form-control" id="COD_CUENTAS" name="COD_CUENTAS"
                                   value="{{ $Cuentas[0]['COD_CUENTAS'] }}" readonly>
                        </div>


                        <div class="mb-3">
                            <label for="SALDO" class="form-label">SALDO</label>
                            <input type="text" class="form-control" id="SALDO" name="SALDO"
                                   value="{{ $Cuentas[0]['SALDO'] }}">
                        </div>


                        <div class="mb-3">
                            <label for="TIP_CUENTA" class="form-label">Tipo de Cuenta</label>
                            <select class="form-control" id="TIP_CUENTA" name="TIP_CUENTA">
                                <option value="B" {{ $Cuentas[0]['TIP_CUENTA'] === 'B' ? 'selected' : '' }}>Básica</option>
                                <option value="V" {{ $Cuentas[0]['TIP_CUENTA'] === 'V' ? 'selected' : '' }}>VIP</option>
                                <option value="P" {{ $Cuentas[0]['TIP_CUENTA'] === 'P' ? 'selected' : '' }}>Premium</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="FEC_REGISTRO" class="form-label">FEC REGISTRO</label>
                            <input type="date" class="form-control" id="FEC_REGISTRO" name="FEC_REGISTRO"
                                   value="{{ $Cuentas[0]['FEC_REGISTRO'] }}">

                                   
                        </div>

                        <div class="mb-3">
                            <label for="I_TRANSFERENCIA" class="form-label">I_TRANSFERENCIA</label>
                            <input type="text" class="form-control" id="I_TRANSFERENCIA" name="I_TRANSFERENCIA"
                                   value="{{ $Cuentas[0]['I_TRANSFERENCIA'] }}">
                        </div>

                        <div class="mb-3">
                            <label for="FEC_II" class="form-label">FEC_II</label>
                            <input type="date" class="form-control" id="FEC_II" name="FEC_II"
                                   value="{{ $Cuentas[0]['FEC_II'] }}">
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('Cuentas.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </main>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop



