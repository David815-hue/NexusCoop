<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
/*Personalizado fecha: 11/04/2024*/
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel; // Importar la clase Excel
use App\Exports\ReporteClienteExport;

use function PHPUnit\Framework\callback;

/*Fin*/

class ReporteGeneradoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi . 'SEC_TODOSREPORTESGENERADOS');
        return view('ModuloReportes.Generar.GenerarReporte')->with('ResulTodosRepGenerado', json_decode($response, true));
        // ModuloPersonas es la carpeta donde esta el view y .empleado es como se llama el blade
        // El nombre del with sera cualquier nombre que le den, este lo usaran en el blade
    }

    // Mostrar la vista del filtro del reporte creado
    private function viewGenerarReporte($tipo_reporte){
        $serverapi = 'http://localhost:3000/';

        if ($tipo_reporte === 'Reporte de cliente') {
            $response = Http::get($serverapi . 'SEC_TODOSREPORTESCLIENTE');
            return view('ModuloReportes.Cliente.reporteCliente')->with('ResulTodosReportesCliente', json_decode($response, true));
        } elseif ($tipo_reporte === 'Reporte de empleado') {
            $response = Http::get($serverapi . 'SEC_TODOSREPORTESEMPLEADO');
            return view('ModuloReportes.Empleado.reporteEmpleado')->with('ResulTodosReporteEmpleados', json_decode($response, true));
        } elseif ($tipo_reporte === 'Reporte de movimiento de cuenta') {
            $response = Http::get($serverapi . 'SEC_TODOSREPORTEMOVCUENTA');
            return view('ModuloReportes.MovCuenta.reporteMovimientoCuenta')->with('ResulTodosRepMovCuenta', json_decode($response, true));
        } elseif ($tipo_reporte === 'Reporte de pago') {
            $response = Http::get($serverapi . 'SEC_TODOSREPORTEPAGO');
            return view('ModuloReportes.Pago.reportePago')->with('ResulTodosReportesPago', json_decode($response, true));
        } elseif ($tipo_reporte === 'Reporte de prestamo') {
            $response = Http::get($serverapi . 'SEC_TODOSREPORTEPRESTAMO');
            return view('ModuloReportes.Prestamo.reportePrestamo')->with('ResulTodosReportesPrestamo', json_decode($response, true));
        }
    }
    //11/04/2024
    /*Personalizado para generar/crear pdf*/
    public function pdfCliente($title)
    {
        // Llamo al método index() del controlador ReporteClienteController para obtener los datos
        $reporteClienteController = new ReporteClienteController();
        $reportcliente = $reporteClienteController->index()->getData()['ResulTodosReportesCliente'];
        // Aquí puedes proceder con la lógica para generar el PDF utilizando los datos obtenidos
        $pdf = PDF::loadView('ModuloReportes.Cliente.pdf', compact('reportcliente'));
        return $pdf->/*stream*/download($title . '.pdf' /*'Nombre_PDF'*/);
    } //fin pdfCLiente
    public function pdfEmpleado($title)
    {
        // Llamo al método index() del controlador ReporteClienteController para obtener los datos
        $reporteEmpleadoController = new ReporteEmpleadoController();
        $reportempleado = $reporteEmpleadoController->index()->getData()['ResulTodosReporteEmpleados'];
        // Aquí puedes proceder con la lógica para generar el PDF utilizando los datos obtenidos
        $pdf = PDF::loadView('ModuloReportes.Empleado.pdf', compact('reportempleado'));
        return $pdf->/*stream*/download($title . '.pdf' /*'Nombre_PDF'*/);
    }
    public function pdfMovCuenta($title)
    {
        // Llamo al método index() del controlador ReporteClienteController para obtener los datos
        $reporteMovCuentaController = new ReporteMCuentaController();
        $reportmovcuenta = $reporteMovCuentaController->index()->getData()['ResulTodosRepMovCuenta'];
        // Aquí puedes proceder con la lógica para generar el PDF utilizando los datos obtenidos
        $pdf = PDF::loadView('ModuloReportes.MovCuenta.pdf', compact('reportmovcuenta'));
        return $pdf->/*stream*/download($title . '.pdf' /*'Nombre_PDF'*/);
    }
    public function pdfPago($title)
    {
        // Llamo al método index() del controlador ReporteClienteController para obtener los datos
        $reportePagoController = new ReportePagoController();
        $reportpago = $reportePagoController->index()->getData()['ResulTodosReportesPago'];
        // // Aquí puedes proceder con la lógica para generar el PDF utilizando los datos obtenidos
        $pdf = PDF::loadView('ModuloReportes.Pago.pdf', compact('reportpago'));
        return $pdf->/*stream*/download($title . '.pdf' /*'Nombre_PDF'*/);
    }
    public function pdfPrestamo($title)
    {
        // Llamo al método index() del controlador ReporteClienteController para obtener los datos
        $reportePrestamoController = new ReportePrestamosController();
        $reportprestamo = $reportePrestamoController->index()->getData()['ResulTodosReportesPrestamo'];
        // Aquí puedes proceder con la lógica para generar el PDF utilizando los datos obtenidos
        $pdf = PDF::loadView('ModuloReportes.Prestamo.pdf', compact('reportprestamo'));
        return $pdf->/*stream*/download($title . '.pdf' /*'Nombre_PDF'*/);
    }

    /*Personalizado para generar/crear excel*/
    public function excelCliente($title)
    {
        // Obtener los datos para el archivo Excel
        $reporteClienteController = new ReporteClienteController();
        $datos = $reporteClienteController->index()->getData()['ResulTodosReportesCliente'];
        // Generar y descargar el archivo Excel
        $excel = Excel::download(new ReporteClienteExport($datos), $title . '.xlsx');
        return $excel;
    }
    public function excelEmpleado($title)
    {
        // Obtener los datos para el archivo Excel
        $reporteEmpleadoController = new ReporteEmpleadoController();
        $datos = $reporteEmpleadoController->index()->getData()['ResulTodosReporteEmpleados'];
        // Generar y descargar el archivo Excel
        $excel = Excel::download(new ReporteClienteExport($datos), $title . '.xlsx');
        return $excel;
    }
    public function excelMovCuenta($title)
    {
        // Obtener los datos para el archivo Excel
        $reporteMCuentaController = new ReporteMCuentaController();
        $datos = $reporteMCuentaController->index()->getData()['ResulTodosRepMovCuenta'];
        // Generar y descargar el archivo Excel
        $excel = Excel::download(new ReporteClienteExport($datos), $title . '.xlsx');
        return $excel;
    }
    public function excelPago($title)
    {
        // Obtener los datos para el archivo Excel
        $reportePagoController = new ReportePagoController();
        $datos = $reportePagoController->index()->getData()['ResulTodosReportesPago'];
        // Generar y descargar el archivo Excel
        $excel = Excel::download(new ReporteClienteExport($datos), $title . '.xlsx');
        return $excel;
    }
    public function excelPrestamo($title)
    {
        // Obtener los datos para el archivo Excel
        $reportePrestamoController = new ReportePrestamosController();
        $datos = $reportePrestamoController->index()->getData()['ResulTodosReportesPrestamo'];
        // Generar y descargar el archivo Excel
        $excel = Excel::download(new ReporteClienteExport($datos), $title . '.xlsx');
        return $excel;
    }
    //fin personalizado 



    /**
     * Esto es para añadir nuevo reporte
     */
    public function create()
    {
        // return view('ModuloReportes.Generar.create');
    }

    /**
     * Esto tambien es para añadir
     */

    public function store(Request $request)
    {
        # Variable para enviar el titulo al nombre del pdf
        $title = $request->TITULO_REPORTE;
        $tipo_archivo = $request->ARC_REPORTE;
        $tipo_reporte = $request->TIPO_REPORTE;
        $Exportar = $request->Exportar;
        $Buscar = $request->Buscar;
        if ($Exportar) {
            return $this->handleFileType($tipo_reporte, $tipo_archivo, $title);
        } elseif($Buscar) { 
            return $this->viewGenerarReporte($tipo_reporte);// retorna a ver la tabla del reporte filtrado
        } 
        
        $response = Http::post('http://localhost:3000/InsReporte', [
            'TITULO_REPORTE' => $request->TITULO_REPORTE,
            'COD_CLIENTE' => '1',
            'PERIODO_TIEMPO' => '2024-04-18',
            'TIPO_REPORTE' => $request->TIPO_REPORTE,
            'ARC_REPORTE' => $request->ARC_REPORTE,
            'FECHA_INICIO' => $request->FECHA_INICIO,
            'FECHA_FINAL' => $request->FECHA_FINAL,
            'CORREO_ENVIO' => $request->CORREO_ENVIO,
        ]);

        if ($response->successful()) {
            //Nos redirecciona al inicio de la página Generar
            return redirect()->route('Generar.index')->with('success', '¡Reporte ingresado correctamente!');
        } else {
            return redirect()->back()->with('error', 'Error al intentar ingresar el reporte');
        }
    }
    private function handleFileType($tipo_reporte, $tipo_archivo, $title)
    {
        // Verificar si el tipo de archivo es PDF y realizar la acción correspondiente
        if ($tipo_reporte === 'Reporte de cliente' && $tipo_archivo === 'PDF') {
            session(['refresh' => true]); // Establece la variable de sesión 'refresh' en true
            return $this->pdfCliente($title);
        } elseif ($tipo_reporte === 'Reporte de empleado' && $tipo_archivo === 'PDF') {
            session(['refresh' => true]); // Establece la variable de sesión 'refresh' en true
            return $this->pdfEmpleado($title);
        } elseif ($tipo_reporte === 'Reporte de movimiento de cuenta' && $tipo_archivo === 'PDF') {
            session(['refresh' => true]); // Establece la variable de sesión 'refresh' en true
            return $this->pdfMovCuenta($title);
        } elseif ($tipo_reporte === 'Reporte de pago' && $tipo_archivo === 'PDF') {
            session(['refresh' => true]); // Establece la variable de sesión 'refresh' en true
            return $this->pdfPago($title);
        } elseif ($tipo_reporte === 'Reporte de prestamo' && $tipo_archivo === 'PDF') {
            session(['refresh' => true]); // Establece la variable de sesión 'refresh' en true
            return $this->pdfPrestamo($title);
            // Verificar si el tipo de archivo es Excel y realizar la acción correspondiente
        } elseif ($tipo_reporte === 'Reporte de cliente' && $tipo_archivo === 'Excel') {
            return $this->excelCliente($title);
        } elseif ($tipo_reporte === 'Reporte de empleado' && $tipo_archivo === 'Excel') {
            return $this->excelEmpleado($title);
        } elseif ($tipo_reporte === 'Reporte de movimiento de cuenta' && $tipo_archivo === 'Excel') {
            return $this->excelMovCuenta($title);
        } elseif ($tipo_reporte === 'Reporte de pago' && $tipo_archivo === 'Excel') {
            return $this->excelPago($title);
        } elseif ($tipo_reporte === 'Reporte de prestamo' && $tipo_archivo === 'Excel') {
            return $this->excelPrestamo($title);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /*Modificacion personalizada: fecha 13/04/2024*/
    public function ContarReportes()
    {
        // Contar el número total de registros en la tabla PERSOENMPL
        // $totalEmpleados = DB::table('PERSONCLINT')->count();
        $totalReporte = DB::table('REPORTE')->count();

        // Puedes pasar $totalEmpleados a la vista para mostrarlo
        // return view('home', ['totalClientes' => $totalClientes]);
        return view('home', ['totalReporte' => $totalReporte]);
    }
    /*Fin modificacion */
}