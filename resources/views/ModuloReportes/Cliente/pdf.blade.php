
<!doctype html>
<html lang="en">
<head>
    <title>Reporte clientes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />

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

        .table th, .table td {
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
            <p>Reportes de todos los clientes en nuestro sistema web/m&oacute;vil cooperativa Nexus<b>Coop</b>.</p>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th>Codigo Cliente</th>
                    <th>DNI</th> -->
                    <th>Nombre</th>
                    <th>Sexo</th>
                    <th>Fecha Nacimiento</th>
                    <th>Estado Civil</th>
                    <!-- <th>Fecha de Registro</th> -->
                    <th>Tipo Cliente</th>
                    <th>Numero de Cuenta</th>
                    <!-- <th>Comentarios</th> -->
                    <!-- <th>Persona Referencia</th> -->
                    <!-- <th>DNI Persona Referencia</th> -->
                    <!-- <th>Tipo Telefono</th> -->
                    <!-- <th>Numero Telefono</th> -->
                    <th>Correo</th>
                    <!-- <th>Departamento Vivienda</th> -->
                    <!-- <th>Ciudad</th> -->
                    <th>Direccion</th>
                </tr>
            </thead>
            <tbody>
                @if($reportcliente)    
                    @foreach($reportcliente as $cliente)
                        <tr>
                            <!-- <td>{{$cliente["COD_CLIENTE"]}}</td>
                            <td>{{$cliente["DNI"]}}</td> -->
                            <td>{{$cliente["NOM_PERSONA"]}}</td>
                            <td>{{$cliente["SEX_PERSONA"]}}</td>
                            <td>{{$cliente["FEC_NACIMIENTO"]}}</td>
                            <td>{{$cliente["IND_CIVIL"]}}</td>
                            <!-- <td>{{$cliente["FEC_REGISTRO"]}}</td> -->
                            <td>{{$cliente["TIP_CLIENTE"]}}</td>
                            <td>{{$cliente["NUM_CUENTA"]}}</td>
                            <!-- <td>{{$cliente["COMENTARIOS"]}}</td>
                            <td>{{$cliente["PERSONA_REFERENCIA"]}}</td>
                            <td>{{$cliente["DNI_REFERENCIA"]}}</td> -->
                            <!-- <td>{{$cliente["TIP_TELEFONO"]}}</td> -->
                            <!-- <td>{{$cliente["NUM_TELEFONO"]}}</td> -->
                            <td>{{$cliente["CORREO"]}}</td>
                            <!-- <td>{{$cliente["DEPARTAMENTO"]}}</td> -->
                            <!-- <td>{{$cliente["CIUDAD"]}}</td> -->
                            <td>{{$cliente["DIR_COMPLETA"]}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"
    ></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"
    ></script>
</body>
</html>
