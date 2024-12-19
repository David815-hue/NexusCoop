<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MovimientoCuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'SEL_Todos_los_MovimientoCuenta');
        //return $response->json();
        //return $response->ok();
        return view('ModuloCuentas.Movimiento_Cuentas')->with('Resulmovimientos', json_decode($response,true));
        //ModuloPersonas es la carpeta donde esta el view y .empleado es como se llama el blade
        //El nombre del with sera cualquier nombre que le den, este lo usaran en el blade
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    
}
