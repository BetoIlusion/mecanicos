<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MapaController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\SolicitudTallerController;
use App\Http\Controllers\TallerController;
use App\Http\Controllers\VehiculoController;
use App\Models\Solicitud;
use App\Models\SolicitudTaller;
use GuzzleHttp\Client;
use App\Models\Cliente;
use App\Models\Taller;
use App\Models\Ubicacion;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $plans = Plan::get();
    $user = Auth::user();
    $userRol = $user->id_rol;

    if ($userRol == 1) {

         return redirect()->route('cliente.dashboard');

        
    } else
    if ($userRol == 2) {
        return view('dashboard', compact('plans'));
    } else if($userRol == 3){
        return view('dashboard-taller', compact('plans'));
    } else {
        $ubicaciones = Ubicacion::all();
        return view('dashboard-tecnico',compact('ubicaciones'));
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::view('/register-cliente', 'auth.register-cliente')->name('register-cliente');

require __DIR__ . '/auth.php';


Route::middleware("auth")->group(function () {
    Route::get('plans', [PlanController::class, 'index'])->name('planes.index');
    Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
    Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
});

// ------------------------------- RUTAS PARA LOS CLIENTES ----------------------------
Route::group(['middleware' => 'can:Cliente'], function () {
    Route::get('dashboard/cliente', [ClienteController::class, 'dashboard'])->name('cliente.dashboard');
    //VEHICULOS//////////////
    Route::get('vehiculos/index', [VehiculoController::class, 'index'])->name('vehiculo.index');
    Route::get('vehiculos/create', [VehiculoController::class, 'create'])->name('vehiculo.create');
    Route::post('vehiculos/index', [VehiculoController::class, 'store'])->name('vehiculo.store');
    Route::get('vehiculos/{vehiculo}/edit', [VehiculoController::class, 'edit'])->name('vehiculo.edit');
    Route::get('vehiculos/{vehiculo}', [VehiculoController::class, 'update'])->name('vehiculo.update');
    Route::get('vehiculos/{vehiculo}/eliminar', [VehiculoController::class, 'destroy'])->name('vehiculo.destroy');
    //SOLICITUD////////////////
    //Route::get('solicitud/create',[SolicitudController::class, 'create'])->name('solicitud.create');
    Route::post('solicitud/index', [SolicitudController::class, 'store'])->name('solicitud.store');
    Route::get('solicitud/propuestas', [SolicitudController::class, 'propuestasCliente'])->name('solicitud.propuestas');
    Route::get('solicitud/{id}/aceptado',[SolicitudController::class, 'storeAceptado'])->name('solicitud.storeAceptado');
    Route::get('solicitud/{id}/confirmado',[SolicitudController::class, 'storeConfirmado'])->name('solicitud.storeConfirmado');
    //CONFIGRACION DEL MAPA
    Route::get('mapa', [MapaController::class, 'config'])->name('mapa.config');

    //SALA DE PROPUESTAS
});
Route::group(['middleware' => 'can:Taller'], function () {
    //SOLICITUDES
    Route::get('solicitud/index', [SolicitudController::class, 'indexTaller'])->name('solicitud.indexTaller');
    Route::get('solicitud/index/{id}', [SolicitudController::class, 'detalleCliente'])->name('solicitud.detalleCliente');
    Route::post('solicitud/{id}/{id_taller}',[SolicitudController::class, 'storeTaller'])->name('solicitud.storeTaller');

    //TECNICOS
    Route::get('taller/tecnicos/index',[TallerController::class, 'tecnicoIndex'])->name('taller.tecnicoIndex');
    Route::get('taller/tecnicos/create',[TallerController::class, 'tecnicoCreate'])->name('taller.tecnicoCreate');
    Route::post('taller/tecnicos/index',[TallerController::class, 'tecnicoStore'])->name('taller.tecnicoStore');
});

Route::group(['middleware' => 'can:Tecnico'], function () {
    Route::get('llegada',[TallerController::class, 'tecnicoLlegada'])->name('encuentro');
    Route::get('ocupado',[TallerController::class, 'ocupado'])->name('ocupado');
});
