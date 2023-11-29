<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Solicitud;
class ClienteController extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        $cliente = Cliente::where('id_user',$user->id)->first();
        $solicitudes = Solicitud::where('id_cliente', $cliente->id)->get();
        $count_solicitudes = $solicitudes->count();
        return view('dashboard-cliente',compact('cliente','count_solicitudes'));

        
    }
}
