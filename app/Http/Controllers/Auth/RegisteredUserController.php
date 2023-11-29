<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Rol;
use App\Models\Taller;
use App\Models\Cliente;
use App\Models\Tecnico;
use App\Models\Ubicacion;
use Spatie\Permission\Traits\HasRoles;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //'apellido' => ['required', 'string', 'max:255'],

            // 'nombre_empresa' => 'required',
            // 'phone_empresa' => 'required',
        ]);


            $rol = Rol::where('nombre_rol', $request->rol)->first();
            $name = $request->name . ' ' . $request->apellido;
            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'id_rol' => $rol->id,
            ])->syncRoles($request->rol);


            if ($request->rol === "PreTaller") {
                $taller = Taller::create([
                    'nit' => $request->nit_empresa,
                    'nombre' => $request->name_empresa,
                    'telefono' => $request->phone_empresa,
                    'id_user' => $user->id,
                ]);
            } else if($request->rol === "Cliente"){
                $cliente = Cliente::create([
                    'nombre' => $request->name,
                    'apellido' => $request->apellido,
                    'id_user' => $user->id,
                    'cantidad_autos' => 0,
                ]);
            } else{
                $id = Auth::user();
                $taller = Taller::where('id_user', $id->id);
                $tecnico = Tecnico::create([
                    'nombre' => $request->name,
                    'apellido' => $request->apellido,
                    'ci' => $request->ci,
                    'id_user' => $user->id,
                    'id_taller' => $taller->id,
                ]);
                event(new Registered($user));
                return 'redirect(RouteServiceProvider::HOME)';
            }
        
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
