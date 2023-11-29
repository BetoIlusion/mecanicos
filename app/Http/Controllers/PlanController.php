<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Taller;
use App\Models\Rol;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::get();
        return view("menu.planes",compact('plans'));
        // return view("plans", compact("plans"));
    }
    public function show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();

        return view("menu.suscripciones", compact("plan", "intent"));
        // return view("subscription", compact("plan", "intent"));
    }
    public function subscription(Request $request)
    {


        //CAMBIA EL ROL
        $user = Auth::user();
        $user = User::find($user->id);
        $rol = Rol::where('nombre_rol','Taller')->first();
        $plan = Plan::find($request->plan);


        $user->update([
            'id_rol' => $rol->id
        ]);
        $user->assignRole($rol->id);

        $subscription = $request->user()
        ->newSubscription($request->plan, $plan->stripe_plan)
        ->create($request->token);
        return view("subscription_success");
    }
}
