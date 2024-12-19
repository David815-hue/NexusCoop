<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportePrestamosController;
use App\Http\Controllers\ReportePagoController;
use App\Http\Controllers\ReporteMCuentaController;
use App\Http\Controllers\ReporteClienteController;
use App\Http\Controllers\ReporteEmpleadoController;
use App\Http\Controllers\PrestamoController; 
use App\Http\Controllers\PlanesController;
use App\Http\Controllers\PagosController; 
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\MovimientoCuentasController;
use App\Http\Controllers\ReporteGeneradoController;
use App\Http\Controllers\ReporteGuardadoController;


use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//Rutas Modelo Clientes


//Fijense en añadir esto arriba: use App\Http\Controllers\ClienteController; con el nombre que le dieron a su controlador
//Solo usaran una ruta, con el nombre de que tienen en su blade, donde esta la tabla y como se llama el controlador::class
Route::resource('clientes', ClienteController::class);


//Rutas Modelo Empleado


Route::resource('empleados', EmpleadoController::class);


//Rutas Modelo Usuario
Route::resource('usuarios', UsuarioController::class);

Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

//Rutas Modelo Prestamos
Route::resource('prestamos', PrestamoController::class);   
Route::resource('planprestamos', PlanesController::class);
Route::resource('pagosprestamos', PagosController::class);


//Rutas Modulo Cuentas


/*MODULO REPORTES*/

Route::resource('Cuentas', CuentasController::class);

Route::resource('Movimiento_Cuenta', MovimientoCuentasController::class);

//Rutas Modelo Reportes Prestamos
Route::resource('ReportePrestamo', ReportePrestamosController::class);
Route::get('/reportePrestamo/{COD_REPORTEPRESTAMO}', 'ReportePrestamoController@GetReportePrestamo')->name('reportePrestamo.show');

//Rutas Modelo Reportes Pago
Route::resource('ReportePago', ReportePagoController::class);
Route::get('/reportePago/{COD_REPORTEPAGO}', 'ReportePagoController@GetReportePago')->name('reportePago.show');

//Rutras modelo Reportes Movimiento Cuenta 

Route::resource('ReporteMovimientoCuenta', ReporteMCuentaController::class);
//Route::get('/reporteMovimientoCuenta/{COD_REP_MOV_CUENTA}', 'ReporteMovCuentaController@GetReporteMovCuenta')->name('reporteMovimientoCuenta.show');




//Rutas modelo Reportes Cliente
Route::resource('ReporteCliente', ReporteClienteController::class);

//Rutas modelo Reportes Empleados
Route::resource('ReporteEmpleado', ReporteEmpleadoController::class);


Route::post('/cuentas/retirar', [CuentasController::class, 'Retirar'])->name('cuentas.Retirar');
Route::post('/cuentas/depositar', [CuentasController::class, 'Depositar'])->name('cuentas.Depositar');
Route::post('/cuentas/Movimiento', [CuentasController::class, 'Movimiento'])->name('cuentas.Movimiento');

//Generar el pdf para el reporteCliente.blade.php en el controlador ReporteGeneradoControoler
Route::get('ReporteCliente/pdf', [ReporteGeneradoController::class, 'pdfCliente'])->name('ModuloReportes.Cliente.pdf');
Route::get('ReporteCliente/excel', [ReporteGeneradoController::class, 'excelCliente'])->name('ModuloReportes.Cliente.excel');

//generar el pdf para el reporteEmpleado.blade.php en el controlador ReporteGeneradoControoler
Route::get('ReporteEmpleado/pdf', [ReporteGeneradoController::class, 'pdfEmpleado'])->name('ModuloReportes.Empleado.pdf');
Route::get('ReporteEmpleado/excel', [ReporteGeneradoController::class, 'excelEmpleado'])->name('ModuloReportes.Empleado.excel');

// generar el pdf para el reporteMoviminetoCuenta.blade.php en el controlador ReporteGeneradoControoler
Route::get('ReporteMovCuenta/pdf', [ReporteGeneradoController::class, 'pdfMovCuenta'])->name('ModuloReportes.MovCuenta.pdf');
Route::get('ReporteMovCuenta/excel', [ReporteGeneradoController::class, 'excelMovCuenta'])->name('ModuloReportes.MovCuenta.excel');

// generar el pdf para el reportePago.blade.php en el controlador ReporteGeneradoControoler
Route::get('ReportePago/pdf', [ReporteGeneradoController::class, 'pdfPago'])->name('ModuloReportes.Pago.pdf');
Route::get('ReportePago/excel', [ReporteGeneradoController::class, 'excelPago'])->name('ModuloReportes.Pago.excel');

// generar el pdf para el reportePrestamos.blade.php en el controlador ReporteGeneradoControoler
Route::get('ReportePrestamo/pdf', [ReporteGeneradoController::class, 'pdfPrestamo'])->name('ModuloReportes.Prestamo.pdf');
Route::get('ReportePrestamo/excel', [ReporteGeneradoController::class, 'excelPrestamo'])->name('ModuloReportes.Prestamo.excel');

Route::resource('Generar', ReporteGeneradoController::class);

Route::resource('Guardar', ReporteGuardadoController::class);