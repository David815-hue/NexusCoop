@extends('adminlte::page')

@section('title', 'Crear Cliente')

@section('content_header')
    <h1>Crear Nuevo Empleado</h1>
@stop

<body>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ingrese los detalles del nuevo empleado</div>

                    <div class="card-body">
                        <form action="{{ route('empleados.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="DNI" class="form-label">DNI</label>
                                        <input type="text" class="form-control" id="DNI" name="DNI">
                                    </div>

                                    <div class="mb-3">
                                        <label for="NOM_PERSONA" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="NOM_PERSONA" name="NOM_PERSONA">
                                    </div>

                                    <div class="mb-3">
                                        <label for="SEX_PERSONA" class="form-label">Sexo</label>
                                        <input type="text" class="form-control" id="SEX_PERSONA" name="SEX_PERSONA">
                                    </div>

                                    <div class="mb-3">
                                        <label for="FEC_NACIMIENTO" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" id="FEC_NACIMIENTO" name="FEC_NACIMIENTO">
                                    </div>

                                    <div class="mb-3">
                                        <label for="IND_CIVIL" class="form-label">Estado Civil</label>
                                        <input type="text" class="form-control" id="IND_CIVIL" name="IND_CIVIL">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="CORREO" class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="CORREO" name="CORREO">
                                    </div>

                                    <div class="mb-3">
                                        <label for="DEPARTAMENTO" class="form-label">Departamento</label>
                                        <input type="text" class="form-control" id="DEPARTAMENTO" name="DEPARTAMENTO">
                                    </div>

                                    <div class="mb-3">
                                        <label for="CIUDAD" class="form-label">Ciudad</label>
                                        <input type="text" class="form-control" id="CIUDAD" name="CIUDAD">
                                    </div>

                                    <div class="mb-3">
                                        <label for="COD_POSTAL" class="form-label">Código Postal</label>
                                        <input type="text" class="form-control" id="COD_POSTAL" name="COD_POSTAL">
                                    </div>

                                    <div class="mb-3">
                                        <label for="DIR_COMPLETA" class="form-label">Dirección Completa</label>
                                        <input type="text" class="form-control" id="DIR_COMPLETA" name="DIR_COMPLETA">
                                    </div>

                                    <div class="mb-3">
                                        <label for="TIP_TELEFONO" class="form-label">Tipo de Teléfono</label>
                                        <input type="text" class="form-control" id="TIP_TELEFONO" name="TIP_TELEFONO">
                                    </div>

                                    <div class="mb-3">
                                        <label for="NUM_TELEFONO" class="form-label">Número de Teléfono</label>
                                        <input type="text" class="form-control" id="NUM_TELEFONO" name="NUM_TELEFONO">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="CARGO" class="form-label">Cargo</label>
                                        <input type="text" class="form-control" id="CARGO" name="CARGO">
                                    </div>

                                    <div class="mb-3">
                                        <label for="SALARIO" class="form-label">Salario</label>
                                        <input type="text" class="form-control" id="SALARIO" name="SALARIO">
                                    </div>

                                    <div class="mb-3">
                                        <label for="DPTO" class="form-label">Departamento</label>
                                        <input type="text" class="form-control" id="DPTO" name="DPTO">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Crear Empleado</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
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
@stop


