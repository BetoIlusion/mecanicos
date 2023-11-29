<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Cliente;

class VehiculoController extends Controller
{
    public function index(){
        $user = Auth::user();
        $cliente = Cliente::where('id_user', $user->id)->first();
        $vehiculos = Vehiculo::where('id_cliente', $cliente->id)->get();

        
        if ($vehiculos->isNotEmpty()){
            return view('menu.vehiculos',compact('vehiculos'));
        } else {
            return view('menu.vehiculos-empty');
        }
    }


    public function create(){

        return view('vehiculos.vehiculo-create');
    }

    public function store(Request $request){

        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'anio' => 'required|max:4',
            'tipo_combustible' => 'required|filled',
            'capacidad_motor' => 'required',
            'kilometraje' => 'required',
        ], [
            'marca.required' => 'El campo marca es obligatorio.',
            'modelo.required' => 'El campo modelo es obligatorio.',
            'anio.required' => 'El campo año es obligatorio.',
            'anio.max' => 'El campo año no debe tener más de :max caracteres.',
            'tipo_combustible.required' => 'El campo tipo de combustible es obligatorio.',
            'tipo_combustible.filled' => 'El campo tipo de combustible no debe estar vacío.',
            'capacidad_motor.required' => 'El campo capacidad del motor es obligatorio.',
            'kilometraje.required' => 'El campo kilometraje es obligatorio.',
            // 'kilometraje.numeric' => 'El campo kilometraje debe ser un número.',
        ]);

        

        $user = Auth::user();
        $cliente = Cliente::where('id_user', $user->id)->first();
        $vehiculo = Vehiculo::create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anio' => $request->anio,
            'tipo_combustible' => $request->tipo_combustible,
            'capacidad_motor' => $request->capacidad_motor,
            'kilometraje' => $request->kilometraje,
            'id_cliente' => $cliente->id,
        ]);
        $autos = $cliente->cantidad_autos + 1;
        
        $cliente->update([
            'cantidad_autos' => $autos
        ]);

        return view('popups.succesfull');

    }
    public function edit(Vehiculo $vehiculo){
        
        return view('vehiculos.vehiculo-edit',compact('vehiculo'));
    }

    public function update(Vehiculo $vehiculo, Request $request){
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'anio' => 'required|max:4',
            'tipo_combustible' => 'required|filled',
            'capacidad_motor' => 'required',
            'kilometraje' => 'required',
        ], [
            'marca.required' => 'El campo marca es obligatorio.',
            'modelo.required' => 'El campo modelo es obligatorio.',
            'anio.required' => 'El campo año es obligatorio.',
            'anio.max' => 'El campo año no debe tener más de :max caracteres.',
            'tipo_combustible.required' => 'El campo tipo de combustible es obligatorio.',
            'tipo_combustible.filled' => 'El campo tipo de combustible no debe estar vacío.',
            'capacidad_motor.required' => 'El campo capacidad del motor es obligatorio.',
            'kilometraje.required' => 'El campo kilometraje es obligatorio.',
            // 'kilometraje.numeric' => 'El campo kilometraje debe ser un número.',
        ]);

        $user = Auth::user();
        $cliente = Cliente::where('id_user', $user->id)->first();

        $vehiculo->marca = $request->marca;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->anio = $request->anio;
        $vehiculo->tipo_combustible = $request->tipo_combustible;
        $vehiculo->capacidad_motor = $request->capacidad_motor;
        $vehiculo->kilometraje = $request->kilometraje;
        $vehiculo->id_cliente = $cliente->id;

        $vehiculo->save();

        return view('popups.succesfull');
    }

    public function destroy(Vehiculo $vehiculo){
        $vehiculo->delete();

        return redirect()->route('vehiculo.index');
    }
}
