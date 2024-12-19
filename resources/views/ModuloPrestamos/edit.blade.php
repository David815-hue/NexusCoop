@extends('adminlte::page')

@section('title', 'Editar Prestamo')

@section('content_header')
    <h1>Editar Prestamo</h1>
@stop

@section('content')
    <div class="container">
        <main class="mt-3">
            <form action="{{ route('prestamos.update', ['prestamo' => $prestamos[0]['ID_PRESTAMO']]) }}" method="POST">
                @csrf
                @method('PUT')

            <div class="row">
            <div class="col-md-6">

                <div class="mb-3">
                    <label for="ID_PRESTAMO" class="form-label">ID PRESTAMO</label>
                    <input type="text" class="form-control" id="ID_PRESTAMO" name="ID_PRESTAMO"
                           value="{{ $prestamos[0]['ID_PRESTAMO'] }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="MONTO_PRESTAMO" class="form-label">MONTO PRESTAMO</label>
                    <input type="text" class="form-control" id="MONTO_PRESTAMO" name="MONTO_PRESTAMO"
                           value="{{ $prestamos[0]['MONTO_PRESTAMO'] }}">
                </div>
                <div class="mb-3">
                    <label for="FECHA_INICIO" class="form-label">FECHA INICIO</label>
                    <input type="date" class="form-control" id="FECHA_INICIO" name="FECHA_INICIO" 
                           value="{{ $prestamos[0]['FECHA_INICIO'] }}">
                </div>
                <div class="mb-3">
                    <label for="FECHA_FIN" class="form-label">FECHA FIN</label>
                    <input type="date" class="form-control" id="FECHA_FIN" name="FECHA_FIN" 
                           value="{{ $prestamos[0]['FECHA_FIN'] }}">
                </div>
                <div class="mb-3">
                    <label for="TASA_INTERES" class="form-label">TASA INTERES</label>
                    <input type="text" class="form-control" id="TASA_INTERES" name="TASA_INTERES"
                           value="{{ $prestamos[0]['TASA_INTERES'] }}">
                </div>
                <div class="mb-3">
                    <label for="ESTADO" class="form-label">ESTADO</label>
                    <input type="text" class="form-control" id="ESTADO" name="ESTADO"
                           value="{{ $prestamos[0]['ESTADO'] }}">
                </div>
                <div class="mb-3">
                    <label for="TIPO_PRESTAMO" class="form-label">Tipo Prestamo</label>
                    <select class="form-select form-control" id="TIPO_PRESTAMO" name="TIPO_PRESTAMO">
                        <option disabled>Seleccione el tipo de préstamo...</option>
                        <option value="Personal" {{ $prestamos[0]['TIPO_PRESTAMO'] == 'Personal' ? 'selected' : '' }}>Préstamo Personal</option>
                        <option value="Hipotecario" {{ $prestamos[0]['TIPO_PRESTAMO'] == 'Hipotecario' ? 'selected' : '' }}>Préstamo Hipotecario</option>
                        <option value="Automotriz" {{ $prestamos[0]['TIPO_PRESTAMO'] == 'Automotriz' ? 'selected' : '' }}>Préstamo Automotriz</option>
                        <option value="Educación" {{ $prestamos[0]['TIPO_PRESTAMO'] == 'Educación' ? 'selected' : '' }}>Préstamo de Educación</option>
                        <option value="Empresarial" {{ $prestamos[0]['TIPO_PRESTAMO'] == 'Empresarial' ? 'selected' : '' }}>Préstamo Empresarial</option>
                        <option value="Emergencia" {{ $prestamos[0]['TIPO_PRESTAMO'] == 'Emergencia' ? 'selected' : '' }}>Préstamo de Emergencia</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="FECHA_ULTIMO_PAGO" class="form-label">Fecha Ultimo Pago</label>
                    <input type="date" class="form-control" id="FECHA_ULTIMO_PAGO" name="FECHA_ULTIMO_PAGO"
                           value="{{ $prestamos[0]['FECHA_ULTIMO_PAGO'] }}">
                </div>

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
        </main>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop