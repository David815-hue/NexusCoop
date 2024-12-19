<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ReporteClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'SEC_TODOSREPORTESCLIENTE');
        return view('ModuloReportes.Cliente.reporteCliente')->with('ResulTodosReportesCliente', json_decode($response,true));
        //ModuloPersonas es la carpeta donde esta el view y .empleado es como se llama el blade
        //El nombre del with sera cualquier nombre que le den, este lo usaran en el blade

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $response = Http::post('http://localhost:3000/InsEmpleado', [
        //     'DNI' => $request->input('DNI'),
        //     'NOM_PERSONA' => $request->input('NOM_PERSONA'),
        //     'SEX_PERSONA' => $request->input('SEX_PERSONA'),
        //     'FEC_NACIMIENTO' => $request->input('FEC_NACIMIENTO'),
        //     'IND_CIVIL' => $request->input('IND_CIVIL'),
        //     'CORREO' => $request->input('CORREO'),
        //     'DEPARTAMENTO' => $request->input('DEPARTAMENTO'),
        //     'CIUDAD' => $request->input('CIUDAD'),
        //     'COD_POSTAL' => $request->input('COD_POSTAL'),
        //     'DIR_COMPLETA' => $request->input('DIR_COMPLETA'),
        //     'TIP_TELEFONO' => $request->input('TIP_TELEFONO'),
        //     'NUM_TELEFONO' => $request->input('NUM_TELEFONO'),
        //     'CARGO' => $request->input('CARGO'),
        //     'SALARIO' => $request->input('SALARIO'),
        //     'DPTO' => $request->input('DPTO')
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function GetReporteCliente($COD_REPORTECLIENTE)
    {
        // $response = Http::get('http://localhost:8080/SEC_REPORTEPAGO/'.$COD_REPORTECLIENTE);
        // return view('ModuloReportes.reportePago')->with('ResulReportesPago', json_decode($response,true));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
