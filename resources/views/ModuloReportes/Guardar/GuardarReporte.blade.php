

@extends('adminlte::page')

@section('title', 'Reporte guardado')

@section('content_header')
    <h1>Reportes guardados</h1>
@stop

@section('content')
    <div class="container">
        <div class="table-responsive">
            <!-- <a  //ponerellink class="btn btn-primary mb-3">Crear reporte</a> -->
            <table id="GenReporte" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Codigo reporte generado</th>
                        <th>Codigo reporte</th>
                        <th>Titulo reporte</th>
                        <th>Tipo de reporte</th>
                        <th>Periodo de tiempo</th>
                        <th>Archivo de reporte</th>
                        <th>Fecha inicio</th>
                        <th>Fecha final</th>
                        <th>Correo de envio</th>
                        <!-- <th>Acciones</th> -->
                    </tr>
                </thead>
                <tbody><!--ResulTodosRepGuardados -->
                    @if($ResulTodosRepGuardados)
                        @foreach($ResulTodosRepGuardados as $guardar)
                        <tr>
                            <td>{{$guardar["COD_REPORTES_GENERADOS"]}}</td>
                            <td>{{$guardar["COD_REPORTE"]}}</td>
                            <td>{{$guardar["TITULO_REPORTE"]}}</td>
                            <td>{{$guardar["TIPO_REPORTE"]}}</td>
                            <td>{{$guardar["PERIODO_TIEMPO"]}}</td>
                            <td>{{$guardar["ARC_REPORTE"]}}</td>
                            <td>{{$guardar["FECHA_INICIO"]}}</td>
                            <td>{{$guardar["FECHA_FINAL"]}}</td>
                            <td>{{$guardar["CORREO_ENVIO"]}}</td>
                            <!-- <td>
                                <a //ponerellink
                                    class="btn btn-info btn-sm">Editar
                                </a>
                            </td> -->
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
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
        $(document).ready( function () {
            $('#GenReporte').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    { extend: 'copy', text: '<i class="bi bi-clipboard-check-fill"></i>', titleAttr:'Copiar', className:'btn btn-secondary' },
                    { extend: 'excel', text: '<i class="bi bi-file-earmark-spreadsheet"></i>', titleAttr:'Exportar a Excel', className:'btn btn-success' },
                    { extend: 'csv', text: '<i class="bi bi-filetype-csv"></i>', titleAttr:'Exportar a csv', className:'btn btn-success' },
                    { extend: 'pdf', text: '<i class="bi bi-file-earmark-pdf"></i>', titleAttr:'Exportar a PDF', className:'btn btn-danger' },
                    { extend: 'print', text: '<i class="bi bi-printer"></i>', titleAttr:'Imprimir', className:'btn btn-info' }
                ]
            });
        });
    </script>

    <script>
        // Función para ocultar automáticamente las alertas después de 5 segundos
        setTimeout(function(){
            $('#alert-success, #alert-error').alert('close');
        }, 4000); 
    </script>
@endsection