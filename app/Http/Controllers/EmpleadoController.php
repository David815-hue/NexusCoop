<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'SEC_TODOSEMPLEADOS');
        //return $response->json();
        //return $response->ok();
        return view('ModuloPersonas.Empleados.empleado')->with('ResulTodosEmpleados', json_decode($response,true));
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ModuloPersonas.Empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/InsEmpleado', [
            'DNI' => $request->input('DNI'),
            'NOM_PERSONA' => $request->input('NOM_PERSONA'),
            'SEX_PERSONA' => $request->input('SEX_PERSONA'),
            'FEC_NACIMIENTO' => $request->input('FEC_NACIMIENTO'),
            'IND_CIVIL' => $request->input('IND_CIVIL'),
            'CORREO' => $request->input('CORREO'),
            'DEPARTAMENTO' => $request->input('DEPARTAMENTO'),
            'CIUDAD' => $request->input('CIUDAD'),
            'COD_POSTAL' => $request->input('COD_POSTAL'),
            'DIR_COMPLETA' => $request->input('DIR_COMPLETA'),
            'TIP_TELEFONO' => $request->input('TIP_TELEFONO'),
            'NUM_TELEFONO' => $request->input('NUM_TELEFONO'),
            'CARGO' => $request->input('CARGO'),
            'SALARIO' => $request->input('SALARIO'),
            'DPTO' => $request->input('DPTO')
        ]);

        if ($response->successful()) {
            return redirect()->route('empleados.index')->with('success', 'Empleado ingresado correctamente !!');
        } else {
            return redirect()->back()->with('error', 'Error al intentar ingresar el empleado');
        }

    }

    /**
     * Display the specified resource.
     */
    public function GetEmpleado($COD_EMPLEADO)
    {
        $response = Http::get('http://localhost:8080/SEC_EMPLEADOS/'.$COD_EMPLEADO);
        return view('ModuloPersona.empleado')->with('ResulEmpleado', json_decode($response,true));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($COD_EMPLEADO)
    {
        $response = Http::get('http://localhost:3000/SEC_EMPLEADOS/'.$COD_EMPLEADO);
        $empleados = json_decode($response->body(), true);
        return view('ModuloPersonas.Empleados.edit', compact('empleados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/UPD_EMPL", [
            'COD_EMPLEADO' => $request->COD_EMPLEADO,
            'NOM_PERSONA' => $request->NOM_PERSONA,
            'DNI' => $request->DNI,
            'SEX_PERSONA' => $request->SEX_PERSONA,
            'IND_CIVIL' => $request->IND_CIVIL,
            'CORREO' => $request->CORREO,
            'DEPARTAMENTO' => $request->DEPARTAMENTO,
            'CIUDAD' => $request->CIUDAD,
            'COD_POSTAL' => $request->COD_POSTAL,
            'DIR_COMPLETA' => $request->DIR_COMPLETA,
            'TIP_TELEFONO' => $request->TIP_TELEFONO,
            'NUM_TELEFONO' => $request->NUM_TELEFONO,
            'CARGO' => $request->CARGO,
            'SALARIO' => $request->SALARIO,
            'DPTO' => $request->DPTO,
        ]);

        
        if ($response->successful()) {
            return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
        } else {
            return redirect()->back()->with('error', 'Error al intentar actualizar el empleado.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ContarEmpleado()
    {
    // Contar el número total de registros en la tabla PERSOENMPL
    $totalEmpleados = DB::table('PERSOENMPL')->count();

    // Puedes pasar $totalEmpleados a la vista para mostrarlo
    return view('home', ['totalEmpleados' => $totalEmpleados]);
    }

}
