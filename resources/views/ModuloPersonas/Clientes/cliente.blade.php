@extends('adminlte::page')

@section('title', 'Lista de Clientes')

@section('content_header')
    <br>
    <h1 style="text-align: center;">Clientes</h1>
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

<!COPIAR TODO EL HTML SOLO CAMBIAR EL CONTENIDO DE LA ETIQUETA THEAD Y EL FOREACH!>

@section('content')
    <div class="container">
        <div class="table-responsive">
            <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearCliente">Crear Cliente</a>
            <table id="clientes" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Codigo Cliente</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Fecha Nacimiento</th>
                        <th>Estado Civil</th>
                        <th>Fecha de Registro</th>
                        <th>Tipo Cliente</th>
                        <th>Numero de Cuenta</th>
                        <th>Comentarios</th>
                        <th>Persona Referencia</th>
                        <th>DNI Persona Referencia</th>
                        <th>Tipo Telefono</th>
                        <th>Numero Telefono</th>
                        <th>Correo</th>
                        <th>Departamento Vivienda</th>
                        <th>Ciudad</th>
                        <th>Direccion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                <!AQUI ES DONDE USARAN EL NOMBRE QUE LE DIERON AL WIDTH EN SU CONTROLADOR!>
                <!Donde dice as $cliente es el nombre que le daran a su variable, vean que la usaran en todos los td de abajo!>
                    @foreach($ResulTodosClientes as $cliente)
                        <tr>
                        <!Pondran el nombre que le dieron al as, y a la par cada columna que retorna su metodo get, tal cual se llama en la BD!>
                            <td>{{$cliente["COD_CLIENTE"]}}</td>
                            <td>{{$cliente["DNI"]}}</td>
                            <td>{{$cliente["NOM_PERSONA"]}}</td>
                            <td>{{$cliente["SEX_PERSONA"]}}</td>
                            <td>{{$cliente["FEC_NACIMIENTO"]}}</td>
                            <td>{{$cliente["IND_CIVIL"]}}</td>
                            <td>{{$cliente["FEC_REGISTRO"]}}</td>
                            <td>{{$cliente["TIP_CLIENTE"]}}</td>
                            <td>{{$cliente["NUM_CUENTA"]}}</td>
                            <td>{{$cliente["COMENTARIOS"]}}</td>
                            <td>{{$cliente["PERSONA_REFERENCIA"]}}</td>
                            <td>{{$cliente["DNI_REFERENCIA"]}}</td>
                            <td>{{$cliente["TIP_TELEFONO"]}}</td>
                            <td>{{$cliente["NUM_TELEFONO"]}}</td>
                            <td>{{$cliente["CORREO"]}}</td>
                            <td>{{$cliente["DEPARTAMENTO"]}}</td>
                            <td>{{$cliente["CIUDAD"]}}</td>
                            <td>{{$cliente["DIR_COMPLETA"]}}</td>
                            <td>
                                <a href="{{ route('clientes.edit', $cliente['COD_CLIENTE']) }}" class="btn btn-info btn-sm">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  
    <!Aqui poner un (signoarroba)stop, porque lo siguiente es del modal>

    <!ESTO NO COPIARLO>
    
    <! ESTO ES PARA HACER EL MODAL OMITIRLO!>

    <div class="modal fade" id="modalCrearCliente" tabindex="-1" aria-labelledby="modalCrearClienteLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="modalCrearClienteLabel">Crear Nuevo Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
    <form action="{{ route('clientes.store') }}" method="POST">
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
                    <input type="text" class="form-control" id="NUM_TELEFONO" name="NUM_TELEFONO" placeholder="Numero sin guiones" maxlength="8" required>
                </div>

                <div class="mb-3">
                    <label for="TIP_CLIENTE" class="form-label">Tipo de Cliente</label>
                    <select class="form-control" id="TIP_CLIENTE" name="TIP_CLIENTE" style="width: 100%;" required>
                        <option>Seleccione</option>
                        <option value="Basico">Básico</option>
                        <option value="VIP">VIP</option>
                        <option value="Premium">Premium</option>
                    </select>
                </div>
                 <div class="mb-3">
                    <label for="CORREO" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="CORREO" name="CORREO" required>
                </div>
            </div>
            <div class="col-md-6">

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
                <div class="mb-3">
                    <label for="CIUDAD" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" id="CIUDAD" name="CIUDAD" required>
                </div>

                <div class="mb-3">
                    <label for="COD_POSTAL" class="form-label">Código Postal</label>
                    <input type="text" class="form-control" id="COD_POSTAL" name="COD_POSTAL" maxlength="5" required>
                </div> 

                <div class="mb-3">
                    <label for="DIR_COMPLETA" class="form-label">Dirección Completa</label>
                    <input type="text" class="form-control" id="DIR_COMPLETA" name="DIR_COMPLETA" required>
                </div>
                <div class="mb-3">
                    <label for="NUM_CUENTA" class="form-label">Número de Cuenta</label>
                    <input type="text" class="form-control" id="NUM_CUENTA" name="NUM_CUENTA" required>
                </div>

                <div class="mb-3">
                    <label for="COMENTARIOS" class="form-label">Comentarios</label>
                    <input type="text" class="form-control" id="COMENTARIOS" name="COMENTARIOS" required>
                </div>

                <div class="mb-3">
                    <label for="PERSONA_REFERENCIA" class="form-label">Persona de Referencia</label>
                    <input type="text" class="form-control" id="PERSONA_REFERENCIA" name="PERSONA_REFERENCIA" placeholder="Nombre Persona Referencia" required>
                </div>

                <div class="mb-3">
                    <label for="DNI_REFERENCIA" class="form-label">DNI de Referencia</label>
                    <input type="text" class="form-control" id="DNI_REFERENCIA" name="DNI_REFERENCIA" placeholder="DNI sin guiones" maxlength="13" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary btn-block">Crear Cliente</button>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-secondary btn-block" data-bs-dismiss="modal">Cancelar</button>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script> <!-- pdfmake (Required for DataTables Buttons) -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script> <!-- vfs_fonts (Required for DataTables Buttons PDF Export) -->
    <script src="//cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js" type="text/javascript"></script> <!-- DataTables Buttons HTML5 -->
    <script src="//cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js" type="text/javascript"></script> <!-- DataTables Buttons Print -->
    <script>
        $(document).ready( function () {
            $('#clientes').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
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