
<!doctype html>
<html lang="en">

<head>
    <title>Reporte movimiento de cuentas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #212529;
        }

        .container {
            margin-top: 50px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #007bff;
        }

        .table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
            border: 2px solid #dee2e6;
            padding: 8px;
        }

        .table thead th {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        /* Estilos para la orientación horizontal */
        @page {
            size: landscape;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>NexusCoop</h1>
            <p>Reportes de todos los movimientos de cuentas en nuestro sistema web/m&oacute;vil cooperativa Nexus<b>Coop</b>.</p>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Codigo movimiento</th>
                    <!-- <th>Codigo cuenta</th>
                    <th>Codigo cliente</th> -->
                    <th>Nombre de persona</th>
                    <th>Fecha de transaccion</th>
                    <!-- <th>Descripcion</th> -->
                    <th>Cuenta debitada</th>
                    <th>Cuenta acreditada</th>
                    <th>Monto</th>
                    <th>Tipo de transaccion</th>
                    <!-- <th>Acciones</th> -->
                </tr>
            </thead>
            <tbody>
                @if($reportmovcuenta)
                @foreach($reportmovcuenta as $movCuenta)
                <tr>
                    <td>{{$movCuenta["COD_MOVIMIENTO"]}}</td>
                    <!-- <td>{{$movCuenta["COD_CUENTA"]}}</td>
                    <td>{{$movCuenta["COD_CLIENTE"]}}</td> -->
                    <td>{{$movCuenta["NOMBRE_PERSONA"]}}</td>
                    <td>{{$movCuenta["FECHA_TRANSACCION"]}}</td>
                    <!-- <td>{{$movCuenta["DESCRIPCION"]}}</td> -->
                    <td>{{$movCuenta["CUENTA_DEBITADA"]}}</td>
                    <td>{{$movCuenta["CUENTA_ACREDITADA"]}}</td>
                    <td>{{$movCuenta["MONTO"]}}</td>
                    <td>{{$movCuenta["TIPO_TRANSACCION"]}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>