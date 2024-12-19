<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // Contar el número total de registros en la tabla PERSOENMPL
        $totalEmpleados = DB::table('PERSOENMPL')->count();

        // Contar el número total de registros en la tabla PERSONCLINT 
        $totalClientes = DB::table('PERSONCLINT')->count();

        // Contar el número total de registros en la tabla PRESTAMOS 
        $totalPrestamos = DB::table('PRESTAMOS')->count();

        $totalMontoPrestamo = DB::table('PRESTAMOS')->sum('MONTO_PRESTAMO');
        

        // Obtener datos para el gráfico de distribución de clientes por tipo
        $clientTypes = DB::table('PERSONCLINT')
            ->select('TIP_CLIENTE', DB::raw('COUNT(*) as count'))
            ->groupBy('TIP_CLIENTE')
            ->get();

        // Obtener datos para el gráfico de relación entre saldo de cuentas y tipo de cuenta
        $accounts = DB::table('CUEN_NEXUSCOOP')
            ->select('TIP_CUENTA', DB::raw('AVG(SALDO) as avg_balance'))
            ->groupBy('TIP_CUENTA')
            ->get();

        return view('home', compact('totalEmpleados', 'totalClientes', 'totalPrestamos', 'totalMontoPrestamo', 'clientTypes', 'accounts'));
    }

    public function changePassword()
    {
    return view('change-password');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "La contraseña anterior no es correcta!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Se ha cambiado exitosamente la contraseña!");
    }


}
