@extends('adminlte::page')

@section('title', 'Lista de Empleados')

@section('content_header')
    <br>
    <h1 style="text-align: center;">Empleados</h1>

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
         <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearEmpleado">Crear Empleado</a>
            <table id="empleados" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Codigo Empleado</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Fecha Nacimiento</th>
                        <th>Estado Civil</th>
                        <th>Fecha de Registro</th>
                        <th>Cargo</th>
                        <th>Salario</th>
                        <th>Departamento</th>
                        <th>Correo</th>
                        <th>Departamento Vivienda</th>
                        <th>Ciudad</th>
                        <th>Direccion</th>
                        <th>Tipo Telefono</th>
                        <th>Numero Telefono</th>
                        <th>Acciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($ResulTodosEmpleados as $empleado)
                        <tr>
                            <td>{{$empleado["COD_EMPLEADO"]}}</td>
                            <td>{{$empleado["DNI"]}}</td>
                            <td>{{$empleado["NOM_PERSONA"]}}</td>
                            <td>{{$empleado["SEX_PERSONA"]}}</td>
                            <td>{{$empleado["FEC_NACIMIENTO"]}}</td>
                            <td>{{$empleado["IND_CIVIL"]}}</td>
                            <td>{{$empleado["FEC_REGISTRO"]}}</td>
                            <td>{{$empleado["CARGO"]}}</td>
                            <td>{{$empleado["SALARIO"]}}</td>
                            <td>{{$empleado["DPTO"]}}</td>
                            <td>{{$empleado["CORREO"]}}</td>
                            <td>{{$empleado["DEPARTAMENTO"]}}</td>
                            <td>{{$empleado["CIUDAD"]}}</td>
                            <td>{{$empleado["DIR_COMPLETA"]}}</td>
                            <td>{{$empleado["TIP_TELEFONO"]}}</td>
                            <td>{{$empleado["NUM_TELEFONO"]}}</td>
                            <td>
                                <a href="{{ route('empleados.edit', $empleado['COD_EMPLEADO']) }}" class="btn btn-info btn-sm">Editar</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalCrearEmpleado" tabindex="-1" aria-labelledby="modalCrearEmpleadoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="modalCrearEmpleadoLabel">Crear Nuevo Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('empleados.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                           
                            <div class="mb-3">
                                <label for="DNI" class="form-label">DNI</label>
                                <input type="text" class="form-control" id="DNI" name="DNI" maxlength="13" placeholder="DNI sin guiones" required>
                            </div>

                            <div class="mb-3">
                                <label for="NOM_PERSONA" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="NOM_PERSONA" name="NOM_PERSONA" required>
                            </div>

                            <div class="mb-3">
                                <label for="SEX_PERSONA" class="form-label">Sexo</label>
                                <select class="form-control" id="SEX_PERSONA" name="SEX_PERSONA" style="width: 100%;" required>
                                    <option>Seleccione</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="FEC_NACIMIENTO" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="FEC_NACIMIENTO" name="FEC_NACIMIENTO" required>
                            </div>

                            <div class="mb-3">
                                <label for="IND_CIVIL" class="form-label">Estado Civil</label>
                                <select class="form-control" id="IND_CIVIL" name="IND_CIVIL" style="width: 100%;" required>
                                    <option>Seleccione</option>
                                    <option value="C">Casado</option>
                                    <option value="S">Soltero</option>
                                    <option value="V">Viudo</option>
                                    <option value="D">Divorciado</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="CORREO" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="CORREO" name="CORREO" required>
                            </div>

                            <div class="mb-3">
                                <label for="DEPARTAMENTO" class="form-label">Departamento</label>
                                <input type="text" class="form-control" id="DEPARTAMENTO" name="DEPARTAMENTO" required>
                            </div>

                                        <div class="mb-3">
                            <label for="DEPARTAMENTO" class="form-label">Departamento</label>
                            <select class="form-control" id="DEPARTAMENTO" name="DEPARTAMENTO" style="width: 100%;" required>
                                <option>Seleccione</option>
                                <option value="Atlántida">Atlántida</option>
                                <option value="Choluteca">Choluteca</option>
                                <option value="Colón">Colón</option>
                                <option value="Comayagua">Comayagua</option>
                                <option value="Copán">Copán</option>
                                <option value="Cortés">Cortés</option>
                                <option value="El Paraíso">El Paraíso</option>
                                <option value="Francisco Morazán">Francisco Morazán</option>
                                <option value="Gracias a Dios">Gracias a Dios</option>
                                <option value="Intibucá">Intibucá</option>
                                <option value="Islas de la Bahía">Islas de la Bahía</option>
                                <option value="La Paz">La Paz</option>
                                <option value="Lempira">Lempira</option>
                                <option value="Ocotepeque">Ocotepeque</option>
                                <option value="Olancho">Olancho</option>
                                <option value="Santa Bárbara">Santa Bárbara</option>
                                <option value="Valle">Valle</option>
                                <option value="Yoro">Yoro</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="COD_POSTAL" class="form-label">Código Postal</label>
                                <input type="text" class="form-control" id="COD_POSTAL" name="COD_POSTAL" required>
                            </div>

                            <div class="mb-3">
                                <label for="DIR_COMPLETA" class="form-label">Dirección Completa</label>
                                <input type="text" class="form-control" id="DIR_COMPLETA" name="DIR_COMPLETA" required>
                            </div>

                            <div class="mb-3">
                                <label for="TIP_TELEFONO" class="form-label">Tipo de Teléfono</label>
                                <select class="form-control" id="TIP_TELEFONO" name="TIP_TELEFONO" required>
                                    <option>Seleccione</option>
                                    <option value="Fijo">Casa</option>
                                    <option value="Móvil">Móvil</option>
                                    <option value="Trabajo">Trabajo</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="NUM_TELEFONO" class="form-label">Número de Teléfono</label>
                                <input type="text" class="form-control" id="NUM_TELEFONO" name="NUM_TELEFONO" maxlength="8" required>
                            </div>

                            <div class="mb-3">
                                <label for="CARGO" class="form-label">Cargo</label>
                                <input type="text" class="form-control" id="CARGO" name="CARGO" required>
                            </div>

                            <div class="mb-3">
                                <label for="SALARIO" class="form-label">Salario</label>
                                <input type="text" class="form-control" id="SALARIO" name="SALARIO" placeholder="Ingrese el salario" pattern="[0-9]+(\.[0-9]{1,2})?" required>
                            </div>
                            <div class="mb-3">
                                <label for="DPTO" class="form-label">Departamento de trabajo</label>
                                <input type="text" class="form-control" id="DPTO" name="DPTO" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Crear Empleado</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary btn-block" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
      </div>
    </div>
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
        $(document).ready( function () {
            $('#empleados').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
                }
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




@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.min.css">
@endsection
