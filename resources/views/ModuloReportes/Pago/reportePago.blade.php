@extends('adminlte::page')

@section('title', 'Reporte pagos')

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

        <table id="ReportePago" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Codigo pago</th>
                    <th>Codigo plan</th>
                    <th>Codigo prestamo</th>
                    <th>Codigo cliente</th>
                    <th>Nombre del cliente</th>
                    <th>Numero de cuota</th>
                    <th>Monto de cuota</th>
                    <th>Monto de pago</th>
                    <th>Fecha de pago</th>
                    <th>Metodo de pago</th>
                    <th>Referencia</th>
                    <th>Mora pagada</th>
                    <th>Monto mora pagada</th>
                    <!-- <th>Acciones</th> -->
                </tr>
            </thead>
            <tbody>
                @if($ResulTodosReportesPago)
                @foreach($ResulTodosReportesPago as $pago)
                <tr>
                    <td>{{$pago["ID_PAGO"]}}</td>
                    <td>{{$pago["ID_PLAN"]}}</td>
                    <td>{{$pago["ID_PRESTAMO"]}}</td>
                    <td>{{$pago["COD_CLIENTE"]}}</td>
                    <td>{{$pago["NOMBRE_CLIENTE"]}}</td>
                    <td>{{$pago["NUMERO_CUOTA"]}}</td>
                    <td>{{$pago["MONTO_CUOTA"]}}</td>
                    <td>{{$pago["MONTO_PAGO"]}}</td>
                    <td>{{$pago["FECHA_PAGO"]}}</td>
                    <td>{{$pago["METODO_PAGO"]}}</td>
                    <td>{{$pago["REFERENCIA"]}}</td>
                    <td>{{$pago["MORA_PAGADA"]}}</td>
                    <td>{{$pago["MONTO_MORA_PAGADA"]}}</td>
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
<!-- CSS de DataTables y Bootstrap 5 -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script> <!-- pdfmake (Required for DataTables Buttons) -->
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script> <!-- vfs_fonts (Required for DataTables Buttons PDF Export) -->
<script src="//cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js" type="text/javascript"></script> <!-- DataTables Buttons HTML5 -->
<script src="//cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js" type="text/javascript"></script> <!-- DataTables Buttons Print -->
<script>
    $(document).ready(function() {
        $('#ReportePago').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copy',
                    text: '<i class="bi bi-clipboard-check-fill"></i>',
                    titleAttr: 'Copiar',
                    className: 'btn btn-secondary'
                },
                {
                    extend: 'excel',
                    text: '<i class="bi bi-file-earmark-spreadsheet"></i>',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend: 'csv',
                    text: '<i class="bi bi-filetype-csv"></i>',
                    titleAttr: 'Exportar a csv',
                    className: 'btn btn-success'
                },
                {
                    extend: 'pdf',
                    text: '<i class="bi bi-file-earmark-pdf"></i>',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger'
                },
                {
                    extend: 'print',
                    text: '<i class="bi bi-printer"></i>',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                }
            ]
        });
    });
</script>

<script>
    // Función para ocultar automáticamente las alertas después de 5 segundos
    setTimeout(function() {
        $('#alert-success, #alert-error').alert('close');
    }, 4000);
</script>
@endsection