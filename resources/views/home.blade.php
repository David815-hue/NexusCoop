@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $totalEmpleados }}</h3>
                    <p>Empleados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $totalClientes }}</h3>
                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$totalPrestamos}}</h3>
                    <p>Numero de Prestamos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$totalMontoPrestamo}}</h3>
                    <p>Monto de Prestamos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Distribución de Clientes por Tipo</h3>
                </div>
                <div class="card-body">
                    <canvas id="clientTypeChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Saldo Promedio por Tipo de Cuenta</h3>
                </div>
                <div class="card-body">
                    <canvas id="accountBalanceChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

<script>
    var clientTypes = @json($clientTypes);
    var clientTypeLabels = clientTypes.map(function(item) {
        return item.TIP_CLIENTE;
    });
    var clientTypeCounts = clientTypes.map(function(item) {
        return item.count;
    });

    new Chart(document.getElementById('clientTypeChart'), {
        type: 'bar',
        data: {
            labels: clientTypeLabels,
            datasets: [{
                label: 'Número de Clientes',
                data: clientTypeCounts,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var accountBalances = @json($accounts);
    var accountTypeLabels = accountBalances.map(function(item) {
        return item.TIP_CUENTA;
    });
    var accountBalancesAvg = accountBalances.map(function(item) {
        return item.avg_balance;
    });

    new Chart(document.getElementById('accountBalanceChart'), {
        type: 'bar',
        data: {
            labels: accountTypeLabels,
            datasets: [{
                label: 'Saldo Promedio',
                data: accountBalancesAvg,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection

    
