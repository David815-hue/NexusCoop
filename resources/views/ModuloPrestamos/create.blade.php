@extends('adminlte::page')

@section('title', 'Insertar Prestamo')

@section('content_header')
    <h1>Insertar Nuevo Prestamo</h1>
@stop

<body>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ingrese los datos del prestamo</div>

                    <div class="card-body">
                        <form action="{{ route('prestamos.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="COD_CLIENTE" class="form-label">COD Cliente</label>
                                        <input type="text" class="form-control" id="COD_CLIENTE" name="COD_CLIENTE">
                                    </div>

                                    <div class="mb-3">
                                        <label for="MONTO_PRESTAMO" class="form-label">Monto Prestamo</label>
                                        <input type="text" class="form-control" id="MONTO_PRESTAMO" name="MONTO_PRESTAMO">
                                    </div>

                                    <div class="mb-3">
                                        <label for="FECHA_INICIO" class="form-label">Fecha Inicio</label>
                                        <input type="date" class="form-control" id="FECHA_INICIO" name="FECHA_INICIO">
                                    </div>

                                    <div class="mb-3">
                                        <label for="FECHA_FIN" class="form-label">Fecha Fin</label>
                                        <input type="date" class="form-control" id="FECHA_FIN" name="FECHA_FIN">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="TASA_INTERES" class="form-label">Tasa Interes</label>
                                        <input type="text" class="form-control" id="TASA_INTERES" name="TASA_INTERES">
                                    </div>

                                    <div class="mb-3">
                                        <label for="ESTADO" class="form-label">Estado</label>
                                        <input type="text" class="form-control" id="ESTADO" name="ESTADO">
                                    </div>

                                    <div class="mb-3">
                                        <label for="TIPO_PRESTAMO" class="form-label">Tipo Prestamo</label>
                                        <input type="text" class="form-control" id="TIPO_PRESTAMO" name="TIPO_PRESTAMO">
                                    </div>

                                    <div class="mb-3">
                                        <label for="FECHA_ULTIMO_PAGO" class="form-label">Fecha Ultimo Pago</label>
                                        <input type="date" class="form-control" id="FECHA_ULTIMO_PAGO" name="FECHA_ULTIMO_PAGO">
                                    </div>
                            </div>

                    <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Insertar Prestamo</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
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
    <script> console.log('Hi!'); </script>
@stop