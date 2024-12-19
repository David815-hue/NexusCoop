
@extends('adminlte::page')

@section('title', 'Lista de Cuentas')

@section('content_header')
    <br>
    <h1 style="text-align: center;">Lista de Cuentas</h1>
@stop

@section('content')

@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
@endif
    <div class="container">
        <div class="table-responsive">
            <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalInsertarCuenta">Insertar Cuenta</a>
            <a  class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearDeposito">Hacer un Deposito</a>
            <a  class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearRetiro">Hacer un Retiro</a>
            <a  class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearMovimiento">Transferencia entre Cuentas</a>
            <a  href="{{ route('Movimiento_Cuenta.index') }}" class="btn btn-warning mb-3">Ver los movimientos</a>

            <table id="Cuentas" class="table table-striped table-hover">
                <thead>
                    <tr>
                        
                        <th>Codigo de Cuenta</th>
                        <th>Nombre Cliente</th>
                        <th>Numero de cuenta</th>
                        <th>Saldo</th>
                        <th>Tipo Cuenta</th>
                        <th>Fecha de Registro</th>
                        <th>TRANSFERENCIA</th>
                        <th>USR REGISTRO</th>
                        <th>FECHA_II</th>
                        <th>Editar</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($ResulTodaslascuentas as $Cuenta)
                        <tr>
                            <td>{{ $Cuenta["COD_CUENTAS"] }}</td>
                            <td>{{ $Cuenta["NOM_PERSONA"] }}</td>
                            <td>{{ $Cuenta["NUM_CUENTA"] }}</td>
                            <td>{{ $Cuenta["SALDO"] }}</td>
                            <td>{{ $Cuenta["TIP_CUENTA"] }}</td>
                            <td>{{ $Cuenta["FEC_REGISTRO"] }}</td>
                            <td>{{ $Cuenta["I_TRANSFERENCIA"] }}</td>
                            <td>{{ $Cuenta["USR_REGISTRO"] }}</td>
                            <td>{{ $Cuenta["FEC_II"] }}</td>
                            <td>
                                <a href="{{ route('Cuentas.edit', ['Cuenta'=> $Cuenta['COD_CUENTAS']]) }}" class="btn btn-info btn-sm">Editar</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
     <!-- Modal para el Insertar una transferencia entre cuentas -->

    <div class="modal fade" id="modalCrearMovimiento" tabindex="-1" aria-labelledby="modalCrearMovimientoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="modalCrearMovimientoLabel">Insertar Nueva Movimiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                 <div class="modal-body">
                 <form action="{{ route('cuentas.Movimiento') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="NUM_TRANSACCION" class="form-label">NUMERO DE TRANSACCION</label>
                                    <input type="number" class="form-control" id="NUM_TRANSACCION" name="NUM_TRANSACCION" required>
                                </div>

                                <div class="mb-3">
                                    <label for="DES" class="form-label">DESCRIPCION</label>
                                    <input type="text" class="form-control" id="DES" name="DES">
                                </div>

                                <div class="mb-3">
                                    <label for="CUEN_DEBITADA" class="form-label">CUENTA DEBITADA</label>
                                    <input type="text" class="form-control" id="CUEN_DEBITADA" name="CUEN_DEBITADA" placeholder="Digite la cuenta de donde se cobrara el dinero" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                

                                <div class="mb-3">
                                    <label for="CUEN_ACREDITADA" class="form-label">CUENTA ACREDITADA</label>
                                    <input type="text" class="form-control" id="CUEN_ACREDITADA" name="CUEN_ACREDITADA" placeholder="Digite la cuenta que se acreditara el dinero" required>
                                </div>

                                <div class="mb-3">
                                    <label for="MON" class="form-label">MONTO</label>
                                    <input type="text" class="form-control" id="MON" name="MON" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block">Crear movimiento</button>
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



    <!-- Modal para el Insertar una cuenta -->

    <div class="modal fade" id="modalInsertarCuenta" tabindex="-1" aria-labelledby="modalInsertarCuentaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="modalInsertarCuentaLabel">Insertar Nueva Cuenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                 <div class="modal-body">
                 <form action="{{ route('Cuentas.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="COD_CLIENTE" class="form-label">Cliente</label>
                                    <select class="form-control" id="COD_CLIENTE" name="COD_CLIENTE">
                                        @foreach($clientes as $cliente)
                                            <option value="{{ $cliente->COD_CLIENTE }}">{{ $cliente->COD_CLIENTE }} - {{ $cliente->NOM_PERSONA }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="SALDO" class="form-label">SALDO INICIAL</label>
                                    <input type="number" class="form-control" id="SALDO" name="SALDO" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="TIP_CUENTA" class="form-label">Tipo de Cuenta</label>
                                    <select class="form-control" id="TIP_CUENTA" name="TIP_CUENTA" required>
                                        <option value="B">Básica</option>
                                        <option value="V">VIP</option>
                                        <option value="P">Premium</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="I_TRANSFERENCIA" class="form-label">DESCRIPCION</label>
                                    <input type="text" class="form-control" id="I_TRANSFERENCIA" name="I_TRANSFERENCIA" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block">Insertar Cuenta</button>
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


    <!-- Modal para el Retiro de Dinero -->
<div class="modal fade" id="modalCrearRetiro" tabindex="-1" aria-labelledby="modalCrearRetiroLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto" id="modalCrearRetiroLabel">Retiro de Dinero</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cuentas.Retirar') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="NUM_TRANSACCION" class="form-label">Numero de Transaccion</label>
                                <input type="number" class="form-control" id="NUM_TRANSACCION" name="NUM_TRANSACCION" required>
                            </div>
                            <div class="mb-3">
                                <label for="CUEN_DEBITADA" class="form-label">Cuenta a Retirar</label>
                                <input type="number" class="form-control" id="CUEN_DEBITADA" name="CUEN_DEBITADA" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="MON" class="form-label">Monto</label>
                                <input type="number" class="form-control" id="MON" name="MON" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar Retiro</button>
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

<!-- Modal para el Depósito de Dinero -->
<div class="modal fade" id="modalCrearDeposito" tabindex="-1" aria-labelledby="modalCrearDepositoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto" id="modalCrearDepositoLabel">Deposito de Dinero</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cuentas.Depositar') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="NUM_TRANSACCION" class="form-label">Numero de Transaccion</label>
                                <input type="number" class="form-control" id="NUM_TRANSACCION" name="NUM_TRANSACCION" required>
                            </div>
                            <div class="mb-3">
                                <label for="CUEN_ACREDITADA" class="form-label">Cuenta a Depositar</label>
                                <input type="number" class="form-control" id="CUEN_ACREDITADA" name="CUEN_ACREDITADA" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="MON" class="form-label">Monto</label>
                                <input type="number" class="form-control" id="MON" name="MON" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar Depósito</button>
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
            $('#Cuentas').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
                }
            });
        });
    </script>

    <script>
        // Código para ocultar la alerta después de 5 segundos
        window.setTimeout(function() {
            $("#alert-success, #alert-error").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 5000);
    </script>
@endsection
