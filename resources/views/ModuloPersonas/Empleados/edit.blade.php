@extends('adminlte::page')

@section('title', 'Editar Empleado')

@section('content_header')
    <h1>Editar Empleado</h1>
@stop

@section('content')
    <div class="container">
        <main class="mt-3">
            <form action="{{ route('empleados.update', ['empleado' => $empleados[0]['COD_EMPLEADO']]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <!-- Campos de la primera columna -->
                        <div class="mb-3">
                            <label for="COD_EMPLEADO" class="form-label">Código Empleado</label>
                            <input type="text" class="form-control" id="COD_EMPLEADO" name="COD_EMPLEADO"
                                   value="{{ $empleados[0]['COD_EMPLEADO'] }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="NOM_PERSONA" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="NOM_PERSONA" name="NOM_PERSONA"
                                   value="{{ $empleados[0]['NOM_PERSONA'] }}">
                        </div>

                        <div class="mb-3">
                            <label for="DNI" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="DNI" name="DNI" maxlength="13"
                                   value="{{ $empleados[0]['DNI'] }}">
                        </div>

                        <div class="mb-3">
                        <label for="SEX_PERSONA" class="form-label">Sexo</label>
                        <select class="form-control" id="SEX_PERSONA" name="SEX_PERSONA" style="width: 100%;">
                            <option value="">Seleccione</option>
                            <option value="M" {{ $empleados[0]['SEX_PERSONA'] == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ $empleados[0]['SEX_PERSONA'] == 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        </div>

                        <div class="mb-3">
                            <label for="IND_CIVIL" class="form-label">Estado Civil</label>
                            <select class="form-control" id="IND_CIVIL" name="IND_CIVIL" style="width: 100%;">
                                <option value="">Seleccione</option>
                                <option value="C" {{ $empleados[0]['IND_CIVIL'] == 'C' ? 'selected' : '' }}>Casado</option>
                                <option value="S" {{ $empleados[0]['IND_CIVIL'] == 'S' ? 'selected' : '' }}>Soltero</option>
                                <option value="V" {{ $empleados[0]['IND_CIVIL'] == 'V' ? 'selected' : '' }}>Viudo</option>
                                <option value="D" {{ $empleados[0]['IND_CIVIL'] == 'D' ? 'selected' : '' }}>Divorciado</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="CORREO" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="CORREO" name="CORREO"
                                   value="{{ $empleados[0]['CORREO'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="DEPARTAMENTO" class="form-label">Departamento</label>
                            <select class="form-control" id="DEPARTAMENTO" name="DEPARTAMENTO" style="width: 100%;">
                                <option value="">Seleccione</option>
                                <option value="Atlántida" {{ $empleados[0]['DEPARTAMENTO'] == 'Atlántida' ? 'selected' : '' }}>Atlántida</option>
                                <option value="Choluteca" {{ $empleados[0]['DEPARTAMENTO'] == 'Choluteca' ? 'selected' : '' }}>Choluteca</option>
                                <option value="Colón" {{ $empleados[0]['DEPARTAMENTO'] == 'Colón' ? 'selected' : '' }}>Colón</option>
                                <option value="Comayagua" {{ $empleados[0]['DEPARTAMENTO'] == 'Comayagua' ? 'selected' : '' }}>Comayagua</option>
                                <option value="Copán" {{ $empleados[0]['DEPARTAMENTO'] == 'Copán' ? 'selected' : '' }}>Copán</option>
                                <option value="Cortés" {{ $empleados[0]['DEPARTAMENTO'] == 'Cortés' ? 'selected' : '' }}>Cortés</option>
                                <option value="El Paraíso" {{ $empleados[0]['DEPARTAMENTO'] == 'El Paraíso' ? 'selected' : '' }}>El Paraíso</option>
                                <option value="Francisco Morazán" {{ $empleados[0]['DEPARTAMENTO'] == 'Francisco Morazán' ? 'selected' : '' }}>Francisco Morazán</option>
                                <option value="Gracias a Dios" {{ $empleados[0]['DEPARTAMENTO'] == 'Gracias a Dios' ? 'selected' : '' }}>Gracias a Dios</option>
                                <option value="Intibucá" {{ $empleados[0]['DEPARTAMENTO'] == 'Intibucá' ? 'selected' : '' }}>Intibucá</option>
                                <option value="Islas de la Bahía" {{ $empleados[0]['DEPARTAMENTO'] == 'Islas de la Bahía' ? 'selected' : '' }}>Islas de la Bahía</option>
                                <option value="La Paz" {{ $empleados[0]['DEPARTAMENTO'] == 'La Paz' ? 'selected' : '' }}>La Paz</option>
                                <option value="Lempira" {{ $empleados[0]['DEPARTAMENTO'] == 'Lempira' ? 'selected' : '' }}>Lempira</option>
                                <option value="Ocotepeque" {{ $empleados[0]['DEPARTAMENTO'] == 'Ocotepeque' ? 'selected' : '' }}>Ocotepeque</option>
                                <option value="Olancho" {{ $empleados[0]['DEPARTAMENTO'] == 'Olancho' ? 'selected' : '' }}>Olancho</option>
                                <option value="Santa Bárbara" {{ $empleados[0]['DEPARTAMENTO'] == 'Santa Bárbara' ? 'selected' : '' }}>Santa Bárbara</option>
                                <option value="Valle" {{ $empleados[0]['DEPARTAMENTO'] == 'Valle' ? 'selected' : '' }}>Valle</option>
                                <option value="Yoro" {{ $empleados[0]['DEPARTAMENTO'] == 'Yoro' ? 'selected' : '' }}>Yoro</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="CIUDAD" class="form-label">Ciudad</label>
                            <input type="text" class="form-control" id="CIUDAD" name="CIUDAD"
                                   value="{{ $empleados[0]['CIUDAD'] }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Campos de la segunda columna -->
                        <div class="mb-3">
                            <label for="COD_POSTAL" class="form-label">Código Postal</label>
                            <input type="text" class="form-control" id="COD_POSTAL" name="COD_POSTAL" maxlength="5"
                                   value="{{ $empleados[0]['COD_POSTAL'] }}">
                        </div>

                        <div class="mb-3">
                            <label for="DIR_COMPLETA" class="form-label">Dirección Completa</label>
                            <input type="text" class="form-control" id="DIR_COMPLETA" name="DIR_COMPLETA"
                                   value="{{ $empleados[0]['DIR_COMPLETA'] }}">
                        </div>

                        <div class="mb-3">
                            <label for="TIP_TELEFONO" class="form-label">Tipo de Teléfono</label>
                            <select class="form-control" id="TIP_TELEFONO" name="TIP_TELEFONO">
                                <option value="">Seleccione</option>
                                <option value="Fijo" {{ $empleados[0]['TIP_TELEFONO'] == 'Fijo' ? 'selected' : '' }}>Casa</option>
                                <option value="Móvil" {{ $empleados[0]['TIP_TELEFONO'] == 'Móvil' ? 'selected' : '' }}>Móvil</option>
                                <option value="Trabajo" {{ $empleados[0]['TIP_TELEFONO'] == 'Trabajo' ? 'selected' : '' }}>Trabajo</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="NUM_TELEFONO" class="form-label">Número de Teléfono</label>
                            <input type="text" class="form-control" id="NUM_TELEFONO" name="NUM_TELEFONO" maxlength="8"
                                   value="{{ $empleados[0]['NUM_TELEFONO'] }}">
                        </div>

                        <div class="mb-3">
                            <label for="CARGO" class="form-label">Cargo</label>
                            <input type="text" class="form-control" id="CARGO" name="CARGO"
                                   value="{{ $empleados[0]['CARGO'] }}">
                        </div>

                        <div class="mb-3">
                            <label for="SALARIO" class="form-label">Salario</label>
                            <input type="text" class="form-control" id="SALARIO" name="SALARIO"
                                   value="{{ $empleados[0]['SALARIO'] }}">
                        </div>

                        <div class="mb-3">
                            <label for="DPTO" class="form-label">Departamento Trabajo</label>
                            <input type="text" class="form-control" id="DPTO" name="DPTO"
                                   value="{{ $empleados[0]['DPTO'] }}">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>

            
        </main>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop