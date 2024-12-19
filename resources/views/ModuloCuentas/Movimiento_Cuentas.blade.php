
@extends('adminlte::page')

@section('title', 'Lista de Movimientos')

@section('content_header')
    <br>
    <h1 style="text-align: center;">Lista de movimientos</h1>
@stop

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table id="Movimiento_Cuenta" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Codigo Movimiento</th>
                        <th>FECHA TRANSACCION</th>
                        <th>NUMERO TRANSACCION</th>
                        <th>NOMBRE CLIENTE</th>
                        <th>DES</th>
                        <th>CUENTA BEDITADA</th>
                        <th>CUENTA ACREDITADA</th>
                        <th>MONTO</th>
                        <th>NOM</th>
                        <th>TIPO TRANSACCION</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($Resulmovimientos as $Movimiento_cuenta)
                        <tr>
                            <td>{{$Movimiento_cuenta["COD_MOVIMIENTO"]}}</td>
                            <td>{{$Movimiento_cuenta["FEC_TRANSACCION"]}}</td>
                            <td>{{$Movimiento_cuenta["NUM_TRANSACCION"]}}</td>
                            <td>{{$Movimiento_cuenta["NOM_PERSONA"]}}</td>
                            <td>{{$Movimiento_cuenta["DES"]}}</td>
                            <td>{{$Movimiento_cuenta["CUEN_DEBITADA"]}}</td>
                            <td>{{$Movimiento_cuenta["CUEN_ACREDITADA"]}}</td>
                            <td>{{$Movimiento_cuenta["MON"]}}</td>
                            <td>{{$Movimiento_cuenta["NOM"]}}</td>
                            <td>{{$Movimiento_cuenta["TIP_TRANSACCION"]}}</td>
                            
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
            $('#Movimiento_Cuenta').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
                }
            });
        });
    </script>
@endsection
