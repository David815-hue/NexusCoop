<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PlanesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'SEL_TPlanesdepagos');
        //return $response->json();
        //return $response->ok();
        return view('ModuloPrestamos.Planes')->with('ResulTodosPlanes', json_decode($response,true));
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
