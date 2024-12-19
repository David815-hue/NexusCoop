@extends('adminlte::page')

@section('title', 'Lista de Planes de Pagos')

@section('content_header')
    <br>
    <h1 style="text-align: center;">Planes de Pagos</h1>
@stop

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table id="planprestamos" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID Plan</th>
                        <th>ID Prestamo</th>
                        <th>Nombre Cliente</th>
                        <th>Numero Cuota</th>
                        <th>Monto Cuota</th>
                        <th>Fecha Pago</th>
                        <th>Estado Cuota</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ResulTodosPlanes as $planprestamo)
                        <tr>
                            <td>{{$planprestamo["ID_PLAN"]}}</td>
                            <td>{{$planprestamo["ID_PRESTAMO"]}}</td>
                            <td>{{$planprestamo["NOM_PERSONA"]}}</td>
                            <td>{{$planprestamo["NUMERO_CUOTA"]}}</td>
                            <td>{{$planprestamo["MONTO_CUOTA"]}}</td>
                            <td>{{$planprestamo["FECHA_PAGO"]}}</td>
                            <td>{{$planprestamo["ESTADO_CUOTA"]}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
        $(document).ready( function () {
            $('#planprestamos').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
                }
            });
        });
    </script>
@endsection
