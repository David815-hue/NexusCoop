@extends('adminlte::page')

@section('title', 'Crear Nueva Cuenta')

@section('content_header')
    <h1>Crear cuenta</h1>
@stop

<body>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ingrese los datos de la cuenta /div>

                    <div class="card-body">
                        <form action="{{ route('Cuentas.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="COD_CLIENTE" class="form-label">COD_CLIENTE</label>
                                        <input type="text" class="form-control" id="COD_CLIENTE" name="COD_CLIENTE">
                                    </div>

                                    <div class="mb-3">
                                        <label for="SALDO_INICIAL" class="form-label">SALDO_INICIAL</label>
                                        <input type="text" class="form-control" id="SALDO_INICIAL" name="SALDO_INICIAL">
                                    </div>

                                    <div class="mb-3">
                                        <label for="TIP_CUENTA" class="form-label">TIP_CUENTA</label>
                                        <input type="text" class="form-control" id="TIP_CUENTA" name="TIP_CUENTA">
                                    </div>

                                    <div class="mb-3">
                                        <label for="FEC_REGISTRO" class="form-label">FEC_REGISTRO</label>
                                        <input type="date" class="form-control" id="FEC_REGISTRO" name="FEC_REGISTRO">
                                    </div>

                                    <div class="mb-3">
                                        <label for="I_TRANSFERENCIA" class="form-label">DESCRIPCION</label>
                                        <input type="text" class="form-control" id="I_TRANSFERENCIA" name="I_TRANSFERENCIA">
                                    </div>

                                    <div class="mb-3">
                                        <label for="USR_REGISTRO" class="form-label">USR_REGISTRO</label>
                                        <input type="text" class="form-control" id="USR_REGISTRO" name="USR_REGISTRO">
                                    </div>
                                </div>
                            </div>

                    <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Insertar Cuenta</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('Cuentas.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
<!-- Agregar enlaces a los archivos JS de Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    
</body>
</html>


@section('js')
    <script> console.log('Hi!'); </script>
