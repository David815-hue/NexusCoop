@extends('adminlte::page')

@section('title', 'Lista de Prestamos')

@section('content_header')
    <br>
    <h1 style="text-align: center;">Prestamos</h1>
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
        <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalInsertarPrestamo">Insertar Prestamo</a>
            <table id="prestamos" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID Prestamo</th>
                        <th>COD Cliente</th>
                        <th>Nombre Cliente</th>
                        <th>Monto Prestamo</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Tasa Interes</th>
                        <th>Estado</th>
                        <th>Tipo Prestamo</th>
                        <th>Fecha Ultimo Pago</th>
                        <th>Editar</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($ResulTodosPrestamos as $prestamo)
                        <tr>
                            <td>{{$prestamo["ID_PRESTAMO"]}}</td>
                            <td>{{$prestamo["COD_CLIENTE"]}}</td>
                            <td>{{$prestamo["NOM_PERSONA"]}}</td>
                            <td>{{$prestamo["MONTO_PRESTAMO"]}}</td>
                            <td>{{$prestamo["FECHA_INICIO"]}}</td>
                            <td>{{$prestamo["FECHA_FIN"]}}</td>
                            <td>{{$prestamo["TASA_INTERES"]}}</td>
                            <td>{{$prestamo["ESTADO"]}}</td>
                            <td>{{$prestamo["TIPO_PRESTAMO"]}}</td>
                            <td>{{$prestamo["FECHA_ULTIMO_PAGO"]}}</td>
                            
                            <td>
                                <a href="{{ route('prestamos.edit', ['prestamo' => $prestamo['ID_PRESTAMO']]) }}" class="btn btn-info btn-sm">Editar</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalInsertarPrestamo" tabindex="-1" aria-labelledby="modalInsertarPrestamoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="modalInsertarPrestamoLabel">Insertar Nuevo Prestamo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('prestamos.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="COD_CLIENTE" class="form-label">Cliente</label>
                                <select class="form-control" id="COD_CLIENTE" name="COD_CLIENTE" required>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->COD_CLIENTE }}">{{ $cliente->COD_CLIENTE }} - {{ $cliente->NOM_PERSONA }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="MONTO_PRESTAMO" class="form-label">Monto Prestamo</label>
                                <input type="text" class="form-control" id="MONTO_PRESTAMO" name="MONTO_PRESTAMO" required>
                            </div>

                            <div class="mb-3">
                                <label for="FECHA_INICIO" class="form-label">Fecha Inicio</label>
                                <input type="date" class="form-control" id="FECHA_INICIO" name="FECHA_INICIO" required>
                            </div>

                            <div class="mb-3">
                                <label for="FECHA_FIN" class="form-label">Fecha Fin</label>
                                <input type="date" class="form-control" id="FECHA_FIN" name="FECHA_FIN" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="TASA_INTERES" class="form-label">Tasa Interes</label>
                                <input type="text" class="form-control" id="TASA_INTERES" name="TASA_INTERES" required>
                            </div>

                            <div class="mb-3">
                                <label for="ESTADO" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="ESTADO" name="ESTADO" required>
                            </div>

                            <div class="mb-3">
                                <label for="TIPO_PRESTAMO" class="form-label">Tipo Prestamo</label>
                                <select class="form-select form-control" id="TIPO_PRESTAMO" name="TIPO_PRESTAMO" required>
                                    <option selected>Seleccione el tipo de préstamo...</option>
                                    <option value="Personal">Préstamo Personal</option>
                                    <option value="Hipotecario">Préstamo Hipotecario</option>
                                    <option value="Automotriz">Préstamo Automotriz</option>
                                    <option value="Educación">Préstamo de Educación</option>
                                    <option value="Empresarial">Préstamo Empresarial</option>
                                    <option value="Emergencia">Préstamo de Emergencia</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="FECHA_ULTIMO_PAGO" class="form-label">Fecha Ultimo Pago</label>
                                <input type="date" class="form-control" id="FECHA_ULTIMO_PAGO" name="FECHA_ULTIMO_PAGO" readonly>
                            </div>

                            
                            <script>
                                function setFechaUltimoPago() {
                                    var fechaInicio = document.getElementById("FECHA_INICIO").value;
                                    document.getElementById("FECHA_ULTIMO_PAGO").value = fechaInicio;
                                }
                            </script>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Insertar Prestamo</button>
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
            $('#prestamos').DataTable({
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