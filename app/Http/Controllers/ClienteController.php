<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'SEC_TODOSCLIENTES'); //Cambiar por su nombre del API
        return view('ModuloPersonas.Clientes.cliente')->with('ResulTodosClientes', json_decode($response,true));
        // en el return view, sera la ruta que estara su view, si tienen una carpeta sera NombreCarpeta.cuentas o .prestamos asi como se llame su view
        // En la parte del with sera la forma como llamaran sus datos del get, esto lo usaran al hacer el for each para mostrar las tablas
    }

    /**
     * Show the form for creating a new resource.
     */

     //Esto es para añadir persona
    public function create()
    {
        return view('ModuloPersonas.Clientes.create');
    }

    /**
     * Esto tambien es para añadir
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/InsCliente', [
            'DNI' => $request->DNI,
            'NOM_PERSONA' => $request->NOM_PERSONA,
            'SEX_PERSONA' => $request->SEX_PERSONA,
            'FEC_NACIMIENTO' => $request->FEC_NACIMIENTO,
            'IND_CIVIL' => $request->IND_CIVIL,
            'CORREO' => $request->CORREO,
            'DEPARTAMENTO' => $request->DEPARTAMENTO,
            'CIUDAD' => $request->CIUDAD,
            'COD_POSTAL' => $request->COD_POSTAL,
            'DIR_COMPLETA' => $request->DIR_COMPLETA,
            'TIP_TELEFONO' => $request->TIP_TELEFONO,
            'NUM_TELEFONO' => $request->NUM_TELEFONO,
            'TIP_CLIENTE' => $request->TIP_CLIENTE,
            'NUM_CUENTA' => $request->NUM_CUENTA,
            'COMENTARIOS' => $request->COMENTARIOS,
            'PERSONA_REFERENCIA' => $request->PERSONA_REFERENCIA,
            'DNI_REFERENCIA' => $request->DNI_REFERENCIA
        ]);

        if ($response->successful()) {
            return redirect()->route('clientes.index')->with('success', 'Cliente ingresado correctamente !!');
        } else {
            return redirect()->back()->with('error', 'Error al intentar ingresar el cliente');
        }
        
    }

    

    /**
     * Esto es para editar
     */
    public function edit($COD_CLIENTE)
    {
        $response = Http::get('http://localhost:3000/SEC_CLIENTES/'.$COD_CLIENTE);
        $clientes = json_decode($response->body(), true);
        return view('ModuloPersonas.Clientes.edit', compact('clientes'));
    }

    /**
     * Esto es para actualizar
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/UPD_CLIENTE", [
            'COD_CLIENTE' => $request->COD_CLIENTE,
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
            'TIP_CLIENTE' => $request->TIP_CLIENTE,
            'NUM_CUENTA' => $request->NUM_CUENTA,
            'COMENTARIOS' => $request->COMENTARIOS,
            'PERSONA_REFERENCIA' => $request->PERSONA_REFERENCIA,
            'DNI_REFERENCIA' => $request->DNI_REFERENCIA,
        ]);
        

        if ($response->successful()) {
            return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
        } else {
            return redirect()->back()->with('error', 'Error al intentar actualizar el cliente.');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ContarCliente()
    {
    // Contar el número total de registros en la tabla PERSOENMPL
    $totalEmpleados = DB::table('PERSONCLINT')->count();

    // Puedes pasar $totalEmpleados a la vista para mostrarlo
    return view('home', ['totalClientes' => $totalClientes]);
    }
}
