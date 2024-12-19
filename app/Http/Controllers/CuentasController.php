<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class CuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'SEL_Todas_las_Cuentas');

        $clientes = DB::table('PERSONCLINT')
                ->join('PERSONAS', 'PERSONCLINT.COD_PERSONA', '=', 'PERSONAS.COD_PERSONA')
                ->leftJoin('CUEN_NEXUSCOOP', 'PERSONCLINT.COD_CLIENTE', '=', 'CUEN_NEXUSCOOP.COD_CLIENTE')
                ->whereNull('CUEN_NEXUSCOOP.COD_CLIENTE')
                ->select('PERSONCLINT.COD_CLIENTE', 'PERSONAS.NOM_PERSONA')
                ->get();

        return view('ModuloCuentas.Cuentas')->with('ResulTodaslascuentas', json_decode($response,true))
        ->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ModuloCuentas.create');
    }

   
    public function store(Request $request)
    {

        $usuario = Auth::user();

        $response = Http::post('http://localhost:3000/InsCuenta', [
            'COD_CLIENTE' => $request->COD_CLIENTE,
            'SALDO' => $request->SALDO,
            'TIP_CUENTA' => $request->TIP_CUENTA,
            'I_TRANSFERENCIA' => $request->I_TRANSFERENCIA,
            'USR_REGISTRO' => $usuario->name,
        ]);

        if ($response->successful()) {
            return redirect()->route('Cuentas.index')->with('success', 'Cuenta ingresada correctamente!!');
        } else {
            return redirect()->back()->with('error', 'Error al intentar ingresar la cuenta');
        }
        
    }



    public function Retirar(Request $request)
    {
        
        //Esto lo usaremos para calcular automaticamente el COD_CUENTAS y hacer que el usuario no lo digite
        $cliente = DB::table('PERSONCLINT')
                ->where('NUM_CUENTA', $request->CUEN_DEBITADA)
                ->first();

        if ($cliente) {
        // Si se encontró el cliente, ahora podemos obtener el COD_CUENTA
        $cuenta = DB::table('CUEN_NEXUSCOOP')
                  ->where('COD_CLIENTE', $cliente->COD_CLIENTE)
                  ->first();

        if ($cuenta) {
            // Utiliza el COD_CUENTAS encontrado
            $cod_cuenta = $cuenta->COD_CUENTAS;

            // Realiza el retiro utilizando el API
            $response = Http::post('http://localhost:3000/InsRetiro', [
                'COD_CUENTAS' => $cod_cuenta,
                'NUM_TRANSACCION' => $request->NUM_TRANSACCION,
                'CUEN_DEBITADA' => $request->CUEN_DEBITADA,
                'MON' => $request->MON,
            ]);

            if ($response->successful()) {
                return redirect()->route('Cuentas.index')->with('success', 'Retiro ingresado correctamente !!');
            } else {
                // Verificar si la cuenta a debitar no se encontró
                if ($response->status() === 404) {
                    return redirect()->back()->with('error', 'No se encontró la cuenta a debitar, Digite una cuenta existente.');
                }
                return redirect()->back()->with('error', 'Error al intentar el retiro');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la cuenta asociada al cliente.');
        }
    } else {
        return redirect()->back()->with('error', 'No se encontró el cliente asociado al número de cuenta.');
    }
        
    }

    public function Depositar(Request $request)
    {
        // Lo usaremos para buscar automaticamente el COD_CUENTAS para que el usuario no lo digite
        $cliente = DB::table('PERSONCLINT')
        ->where('NUM_CUENTA', $request->CUEN_ACREDITADA)
        ->first();

        if ($cliente) {
        // Si se encontró el cliente, ahora se obtendra el COD_CUENTAS
        $cuenta = DB::table('CUEN_NEXUSCOOP')
            ->where('COD_CLIENTE', $cliente->COD_CLIENTE)
            ->first();

        if ($cuenta) {
        // Utilizar el COD_CUENTAS encontrado
        $cod_cuenta = $cuenta->COD_CUENTAS;

        // Realiza el depósito utilizando el API
        $response = Http::post('http://localhost:3000/InsDeposito', [
            'COD_CUENTAS' => $cod_cuenta,
            'NUM_TRANSACCION' => $request->NUM_TRANSACCION,
            'CUEN_ACREDITADA' => $request->CUEN_ACREDITADA,
            'MON' => $request->MON,
        ]);

        if ($response->successful()) {
            return redirect()->route('Cuentas.index')->with('success', 'Depósito ingresado correctamente !!');
        } else {
            // Verificar si la cuenta a acreditar no se encontró
            if ($response->status() === 404) {
                return redirect()->back()->with('error', 'No se encontró la cuenta a acreditar, Digite una cuenta existente.');
            }
            return redirect()->back()->with('error', 'Error al intentar el depósito');
        }
        } else {
        return redirect()->back()->with('error', 'No se encontró la cuenta asociada al cliente.');
        }
        } else {
        return redirect()->back()->with('error', 'No se encontró el cliente asociado al número de cuenta.');
        }
                
    }

    public function Movimiento(Request $request)
    {
        // Buscar el cliente asociado a la cuenta a debitar
        $cliente_debitar = DB::table('PERSONCLINT')
        ->where('NUM_CUENTA', $request->CUEN_DEBITADA)
        ->first();

        // Buscar el cliente asociado a la cuenta a acreditar
        $cliente_acreditar = DB::table('PERSONCLINT')
            ->where('NUM_CUENTA', $request->CUEN_ACREDITADA)
            ->first();

        if ($cliente_debitar && $cliente_acreditar) {
        // Obtener el COD_CUENTAS del cliente que debita
            $cod_cuentas_debitar = DB::table('CUEN_NEXUSCOOP')
                    ->where('COD_CLIENTE', $cliente_debitar->COD_CLIENTE)
                    ->value('COD_CUENTAS');

        // Realizar el movimiento de cuenta utilizando el API
        $response = Http::post('http://localhost:3000/InsMovimientoCuenta', [
        'COD_CUENTAS' => $cod_cuentas_debitar, // Usamos la cuenta del cliente que debita
        'NUM_TRANSACCION' => $request->NUM_TRANSACCION,
        'DES' => $request->DES,
        'CUEN_DEBITADA' => $request->CUEN_DEBITADA,
        'CUEN_ACREDITADA' => $request->CUEN_ACREDITADA,
        'MON' => $request->MON,
        'TIP_TRANSACCION' => 'Movimiento entre cuentas',
        ]);

        if ($response->successful()) {
        return redirect()->route('Cuentas.index')->with('success', 'Movimiento entre cuentas realizado correctamente !!');
        } else {
        return redirect()->back()->with('error', 'Error al intentar realizar el movimiento entre cuentas');
        }
        } else {
            return redirect()->back()->with('error', 'Una de las cuentas proporcionadas no existe o no está asociada a ningún cliente.');
        }
        
    }

    public function edit($COD_CUENTAS)
    {
        $response = Http::get('http://localhost:3000/SEl_Cuentas/'.$COD_CUENTAS);
        $Cuentas = json_decode($response->body(), true);

        $Cuentas[0]['FEC_REGISTRO'] = Carbon::parse($Cuentas[0]['FEC_REGISTRO'])->format('Y-m-d');
        $Cuentas[0]['FEC_II'] = Carbon::parse($Cuentas[0]['FEC_II'])->format('Y-m-d');
        return view('ModuloCuentas.edit', compact('Cuentas'));
    }

    /**
     * Esto es para actualizar
     */
    public function update(Request $request, string $id)
    {
        // Conseguiremos el usuario para ponerlo en la columna USR_REGISTRO
        $usuario = Auth::user();

        $response = Http::put("http://localhost:3000/UPD_Cuenta", [
            'COD_CUENTAS' => $request->COD_CUENTAS,
            'SALDO' => $request->SALDO,
            'TIP_CUENTA' => $request->TIP_CUENTA,
            'FEC_REGISTRO' => $request->FEC_REGISTRO,
            'I_TRANSFERENCIA' => $request->I_TRANSFERENCIA,
            'USR_REGISTRO' => $usuario->name,
            'FEC_II' => $request->FEC_II,
        ]);
        

        if ($response->successful()) {
            return redirect()->route('Cuentas.index')->with('success', 'la cuenta se actualizado correctamente.');
        } else {
            return redirect()->back()->with('error', 'Error al intentar actualizar una cuenta.');
        }
       
    }
    

    
 
}