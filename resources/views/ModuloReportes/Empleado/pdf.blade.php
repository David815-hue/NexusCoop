
<!doctype html>
<html lang="en">

<head>
	<title>Reporte empleados</title>
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
			<p>Reportes de todos los empleados en nuestro sistema web/m&oacute;vil cooperativa Nexus<b>Coop</b>.</p>
		</div>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<!-- <th>Codigo empleado</th> -->
					<!-- <th>DNI</th> -->
					<th>Nombre</th>
					<th>Sexo</th>
					<th>Fecha nacimiento</th>
					<th>Estado civil</th>
					<!-- <th>Fecha de registro</th> -->
					<th>Cargo</th>
					<th>Salario</th>
					<th>Departamento</th>
					<!-- <th>Correo</th> -->
					<!-- <th>Departamento vivienda</th> -->
					<!-- <th>Ciudad</th> -->
					<th>Direccion</th>
					<!-- <th>Tipo telefono</th> -->
					<!-- <th>Numero telefono</th> -->
					<!-- <th>Acciones</th> -->
				</tr>
			</thead>
			<tbody>
				@if($reportempleado)
				@foreach($reportempleado as $empleado)
				<tr>
					<!-- <td>{{$empleado["COD_EMPLEADO"]}}</td>
                                <td>{{$empleado["DNI"]}}</td> -->
					<td>{{$empleado["NOM_PERSONA"]}}</td>
					<td>{{$empleado["SEX_PERSONA"]}}</td>
					<td>{{$empleado["FEC_NACIMIENTO"]}}</td>
					<td>{{$empleado["IND_CIVIL"]}}</td>
					<!-- <td>{{$empleado["FEC_REGISTRO"]}}</td> -->
					<td>{{$empleado["CARGO"]}}</td>
					<td>{{$empleado["SALARIO"]}}</td>
					<td>{{$empleado["DPTO"]}}</td>
					<!-- <td>{{$empleado["CORREO"]}}</td> -->
					<!-- <td>{{$empleado["DEPARTAMENTO"]}}</td> -->
					<!-- <td>{{$empleado["CIUDAD"]}}</td> -->
					<td>{{$empleado["DIR_COMPLETA"]}}</td>
					<!-- <td>{{$empleado["TIP_TELEFONO"]}}</td> -->
					<!-- <td>{{$empleado["NUM_TELEFONO"]}}</td> -->
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