<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Taller;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Rol;
use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Ubicacion;
class TallerController extends Controller
{
    public function tecnicoIndex(){

        $user = Auth::user();
        $taller = Taller::where('id_user', $user->id)->first();
        $tecnicos = Tecnico::where('id_taller', $taller->id)->get();
        $count_tecnicos = $tecnicos->count();
        if ($count_tecnicos == 0){
            return view('taller.tecnico-index', compact('count_tecnicos'));
        }
        return view('taller.tecnico-index', compact('tecnicos','count_tecnicos'));
    }

    public function tecnicoCreate(){
        
        
        return view('auth.register-tecnico');
    }

    public function tecnicoStore(Request $request){

        $rol = Rol::where('nombre_rol', 'Tecnico')->first();
        $name = $request->name . ' ' . $request->apellido;
        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_rol' => $rol->id,
        ])->syncRoles($request->rol);

        $id = Auth::user();
        $estado = Estado::where('estado', 'habilitado')->first();
        $taller = Taller::where('id_user', $id->id)->first();
        $tecnico = Tecnico::create([
            'nombre' => $request->name,
            'apellido' => $request->apellido,
            'ci' => $request->ci,
            'id_user' => $user->id,
            'id_taller' => $taller->id,
            'id_estado' => $estado->id
        ]);

        event(new Registered($user));

        return view('popups.tecnico-creado');
    }

    public function tecnicoLlegada(){
        return view('popups.encuentroSuccesfull');
    }

    public function ocupado(){
        return view('dashboard-ocupado');
    }
}
