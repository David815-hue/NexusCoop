
@extends('adminlte::page')

@section('title', 'Lista de Pagos')


@section('content_header')
    <br>
    <h1 style="text-align: center;">Pagos de Prestamos</h1>
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
            <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalinsertarpagosprestamos">Insertar Pago</a>

            <table id="pagosprestamos" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID Pago</th>
                        <th>ID Plan</th>
                        <th>Nombre Cliente</th>
                        <th>Monto Pago</th>
                        <th>Fecha Pago</th>
                        <th>Metodo Pago</th>
                        <th>Referencia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ResulTodosPagos as $pagosprestamo)
                        <tr>
                            <td>{{$pagosprestamo["ID_PAGO"]}}</td>
                            <td>{{$pagosprestamo["ID_PLAN"]}}</td>
                            <td>{{$pagosprestamo["NOM_PERSONA"]}}</td>
                            <td>{{$pagosprestamo["MONTO_PAGO"]}}</td>
                            <td>{{$pagosprestamo["FECHA_PAGO"]}}</td>
                            <td>{{$pagosprestamo["METODO_PAGO"]}}</td>
                            <td>{{$pagosprestamo["REFERENCIA"]}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalinsertarpagosprestamos" tabindex="-1" aria-labelledby="modalinsertarpagosprestamosLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="modalinsertarpagosprestamosLabel">Realizar nuevo pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('pagosprestamos.store') }}" method="POST">
                    @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="ID_PLAN_PAGO" class="form-label">ID Plan</label>
                                        <input type="text" class="form-control" id="ID_PLAN_PAGO" name="ID_PLAN_PAGO" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="MONTO_PAGO" class="form-label">Monto Pago</label>
                                        <input type="text" class="form-control" id="MONTO_PAGO" name="MONTO_PAGO" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="FECHA_PAGO" class="form-label">Fecha Pago</label>
                                        <input type="date" class="form-control" id="FECHA_PAGO" name="FECHA_PAGO" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="METODO_PAGO" class="form-label">Metodo Pago</label>
                                        <input type="text" class="form-control" id="METODO_PAGO" name="METODO_PAGO" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="REFERENCIA" class="form-label">Referencia</label>
                                        <input type="text" class="form-control" id="REFERENCIA" name="REFERENCIA" required>
                                    </div>
                            </div>

                    <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Insertar Pago</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('pagosprestamos.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                                </div>
                            </div>
                        </form>
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
            $('#pagosprestamos').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
                }
            });
        });
    </script>
@endsection
