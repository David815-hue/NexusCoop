<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'SEL_TPagos');
        //return $response->json();
        //return $response->ok();
        return view('ModuloPrestamos.Pagos')->with('ResulTodosPagos', json_decode($response,true));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/InsPagoPrestamo', [
            'ID_PLAN_PAGO' => $request->input('ID_PLAN_PAGO'),
            'MONTO_PAGO' => $request->input('MONTO_PAGO'),
            'FECHA_PAGO' => $request->input('FECHA_PAGO'),
            'METODO_PAGO' => $request->input('METODO_PAGO'),
            'REFERENCIA' => $request->input('REFERENCIA'),
            'MORA_PAGADA' => '0.00',
            'MONTO_MORA_PAGADA' => '0.00'
        ]);

        if ($response->successful()) {
            return redirect()->route('pagosprestamos.index')->with('success', 'Pago realizado correctamente !!');
        } else {
            return redirect()->back()->with('error', 'Error al intentar ingresar el pago');
        }
        
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
