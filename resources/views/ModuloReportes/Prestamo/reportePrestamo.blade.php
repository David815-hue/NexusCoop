@extends('adminlte::page')

@section('title', 'Reporte prestamos')

@section('content_header')
<h1>Generar reporte</h1>

@if(session('success'))
<div id="alert-success" class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div id="alert-error" class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
</div>
@endif
@stop

@section('content')
<div class="container">
    <div class="table-responsive">
        <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearReporte">Crear reporte</a>
        <!--En este caso preferiblemente usar combox-->
        <form action="{{ route('Generar.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="TIPO_REPORTE" class="form-label">Tipo de reporte: </label>
                        <select class="form-select" id="TIPO_REPORTE" name="TIPO_REPORTE" style="width: 60%;" required>
                            <option value="" selected disabled>Seleccione...</option>
                            <option value="Reporte de movimiento de cuenta">Reporte de Movimiento de Cuenta</option><!--Reporte de movimiento de cuenta-->
                            <option value="Reporte de prestamo">Reporte de Préstamo</option><!--Reporte de prestamo-->
                            <option value="Reporte de pago">Reporte de Pago</option><!--Reporte de pago-->
                            <option value="Reporte de empleado">Reporte de Empleado</option><!--Reporte de empleado-->
                            <option value="Reporte de cliente">Reporte de Cliente</option><!--Reporte de cliente-->
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" href="{{ route('Generar.store') }}" class="btn btn-success btn-block" id="Buscar" name="Buscar" value="Buscar">
                        Filtrar
                    </button>
                </div>
            </div>
        </form>

        <table id="ReportePrestamo" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Codigo reporte</th>
                    <th>Codigo prestamo</th>
                    <th>Codigo cliente</th>
                    <th>Numero cuenta</th>
                    <th>Tipo cliente</th>
                    <th>Monto prestamo</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>Tasa interes</th>
                    <th>Estado</th>
                    <th>Tipo prestamo</th>
                    <th>Fecha utimo pago</th>
                    <th>Dias mora</th>
                    <th>Monto mora</th>
                    <!-- <th>Acciones</th> -->
                </tr>
            </thead>
            <tbody><!--ResulTodosReportesPrestamo -->
                @if($ResulTodosReportesPrestamo)
                @foreach($ResulTodosReportesPrestamo as $prestamo)
                <tr>
                    <td>{{$prestamo["COD_REPORTE"]}}</td>
                    <td>{{$prestamo["ID_PRESTAMO"]}}</td>
                    <td>{{$prestamo["COD_CLIENTE"]}}</td>
                    <td>{{$prestamo["NUM_CUENTA"]}}</td>
                    <td>{{$prestamo["TIP_CLIENTE"]}}</td>
                    <td>{{$prestamo["MONTO_PRESTAMO"]}}</td>
                    <td>{{$prestamo["FECHA_INICIO"]}}</td>
                    <td>{{$prestamo["FECHA_FIN"]}}</td>
                    <td>{{$prestamo["TASA_INTERES"]}}</td>
                    <td>{{$prestamo["ESTADO"]}}</td>
                    <td>{{$prestamo["TIPO_PRESTAMO"]}}</td>
                    <td>{{$prestamo["FECHA_ULTIMO_PAGO"]}}</td>
                    <td>{{$prestamo["DIAS_MORA"]}}</td>
                    <td>{{$prestamo["MONTO_MORA"]}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>


<!--Modal -->
<div class="modal fade" id="modalCrearReporte" tabindex="-1" aria-labelledby="modalCrearReporteLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto" id="modalCrearReporteLabel">Crear nuevo reporte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Generar.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="TITULO_REPORTE" class="form-label">T&iacute;tulo reporte</label>
                                <input type="text" class="form-control" id="TITULO_REPORTE" name="TITULO_REPORTE" required>
                            </div>

                            <!--En este caso preferiblemente usar combox-->
                            <div class="mb-3">
                                <label for="TIPO_REPORTE" class="form-label">Tipo de reporte</label>
                                <select class="form-select" id="TIPO_REPORTE" name="TIPO_REPORTE" style="width: 100%;" required>
                                    <option value="" selected disabled>Seleccione...</option>
                                    <option value="Reporte de movimiento de cuenta">Reporte de Movimiento de Cuenta</option><!--Reporte de movimiento de cuenta-->
                                    <option value="Reporte de prestamo">Reporte de Préstamo</option><!--Reporte de prestamo-->
                                    <option value="Reporte de pago">Reporte de Pago</option><!--Reporte de pago-->
                                    <option value="Reporte de empleado">Reporte de Empleado</option><!--Reporte de empleado-->
                                    <option value="Reporte de cliente">Reporte de Cliente</option><!--Reporte de cliente-->
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="ARC_REPORTE" class="form-label">Tipo de archivo</label>
                                <select class="form-select" id="ARC_REPORTE" name="ARC_REPORTE" style="width: 100%;" required>
                                    <option value="" selected disabled>Seleccione...</option>
                                    <option value="Excel">Excel</option><!--Excel-->
                                    <option value="PDF">PDF</option><!--PDF-->
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="FECHA_INICIO" class="form-label">Fecha inicio</label>
                                <input type="date" class="form-control" id="FECHA_INICIO" name="FECHA_INICIO" required>
                            </div>

                            <div class="mb-3">
                                <label for="FECHA_FINAL" class="form-label">Fecha final</label>
                                <input type="date" class="form-control" id="FECHA_FINAL" name="FECHA_FINAL" required>
                            </div>

                            <div class="mb-3">
                                <label for="CORREO_ENVIO" class="form-label">Correo de env&iacute;o</label>
                                <input type="email" class="form-control" id="CORREO_ENVIO" name="CORREO_ENVIO" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Crear reporte</button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('Generar.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" href="{{ route('Generar.store') }}" class="btn btn-success btn-block" id="Exportar" name="Exportar" value="Exportar">
                                Exportar reporte
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.13.7/i18n/es-MX.json"></script>
<script>
    $(document).ready(function() {
        $('#ReportePrestamo').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-MX.json',
            }
        });
    });
</script>
@endsection