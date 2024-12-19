<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'SEL_TPrestamos');
        //return $response->json();
        //return $response->ok();

        //Esto lo usaremos para mostrar todos los clientes en un combobox.
        $clientes = DB::table('PERSONCLINT')
                    ->join('PERSONAS', 'PERSONCLINT.COD_PERSONA', '=', 'PERSONAS.COD_PERSONA')
                    ->select('PERSONCLINT.COD_CLIENTE', 'PERSONAS.NOM_PERSONA')
                    ->get();

        return view('ModuloPrestamos.Prestamos')->with('ResulTodosPrestamos', json_decode($response, true))
                                                 ->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('ModuloPrestamos.Prestamos');
    }

    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/InsPrestamo', [
            'COD_CLIENTE' => $request->COD_CLIENTE,
            'MONTO_PRESTAMO' => $request->MONTO_PRESTAMO,
            'FECHA_INICIO' => $request->FECHA_INICIO,
            'FECHA_FIN' => $request->FECHA_FIN,
            'TASA_INTERES' => $request->TASA_INTERES,
            'ESTADO' => $request->ESTADO,
            'TIPO_PRESTAMO' => $request->TIPO_PRESTAMO,
            'FECHA_PAGO' => $request->FECHA_PAGO,
            'ESTADO_CUOTA' => 'Pendiente'
        ]);

        if ($response->successful()) {
            return redirect()->route('prestamos.index')->with('success', 'Prestamo ingresado correctamente !!');
        } else {
            return redirect()->back()->with('error', 'Error al intentar ingresar el cliente');
        }
        
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ID_PRESTAMO)
    {
        $response = Http::get('http://localhost:3000/SEL_Prestamos/'.$ID_PRESTAMO);
        $prestamos = json_decode($response->body(), true);

        $prestamos[0]['FECHA_INICIO'] = Carbon::parse($prestamos[0]['FECHA_INICIO'])->format('Y-m-d');
        $prestamos[0]['FECHA_FIN'] = Carbon::parse($prestamos[0]['FECHA_FIN'])->format('Y-m-d');
        $prestamos[0]['FECHA_ULTIMO_PAGO'] = Carbon::parse($prestamos[0]['FECHA_ULTIMO_PAGO'])->format('Y-m-d');

        return view('ModuloPrestamos.edit', compact('prestamos'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/UPDPrestamo", [
            'ID_PRESTAMO' => $request->ID_PRESTAMO,
            'MONTO_PRESTAMO' => $request->MONTO_PRESTAMO,
            'FECHA_INICIO' => $request->FECHA_INICIO,
            'FECHA_FIN' => $request->FECHA_FIN,
            'TASA_INTERES' => $request->TASA_INTERES,
            'ESTADO' => $request->ESTADO,
            'TIPO_PRESTAMO' => $request->TIPO_PRESTAMO,
            'FECHA_ULTIMO_PAGO' => $request->FECHA_ULTIMO_PAGO,
            'ESTADO_CUOTA' => 'Pendiente',
        ]);
        

        if ($response->successful()) {
            return redirect()->route('prestamos.index');
        } else {
            // La solicitud no fue exitosa
            $statusCode = $response->status();
            $errorMessage = $response->body(); // Puedes obtener el mensaje de error del cuerpo de la respuesta
            echo "Código de estado: " . $statusCode . "<br>";
            echo "Mensaje de error: " . $errorMessage . "<br>";
            // Puedes registrar o manejar el error aquí
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}