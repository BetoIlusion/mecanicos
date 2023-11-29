<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\ClienteTaller;
use App\Models\Estado;
use App\Models\SolicitudTaller;
use App\Models\Ubicacion;
use Illuminate\Support\Facades\Auth;
use App\Models\Taller;
use GuzzleHttp\Client;
use App\Models\Tecnico;

class SolicitudController extends Controller
{
    public function indexTaller()
    {
        //desde TALLER ver las SOLICITUDES de los CLIENTES
        $estado = Estado::where('estado', 'solicitado')->first();

        $solicitudes = Solicitud::where('id_estado', $estado->id)->get();

        $solicitud_clientes = [];
        $estado = Estado::where('estado', 'habilitado')->first();
        $tecnicos = Tecnico::where('id_estado', $estado->id);
        $count_tecnicos = $tecnicos->count();
        if ($count_tecnicos == 0) {
            return view('actividades.solicitud-lista-en-taller', compact('count_tecnicos'));
        } else {
            foreach ($solicitudes as $solicitud) {
                $cliente = Cliente::where('id', $solicitud->id_cliente)->first();
                $ubicacion = Ubicacion::where('id_cliente', $cliente->id)->first();

                $solicitud_clientes[] = [
                    'id' => $cliente->id,
                    'nombre' => $cliente->nombre,
                    'latitud' => $ubicacion->latitud,
                    'longitud' => $ubicacion->longitud
                ];
            }
        }

        return view('actividades.solicitud-lista-en-taller', compact('solicitud_clientes','count_tecnicos'));
    }
    public function create()
    {
        return view('actividades.solicitud');
    }
    public function store(Request $request)
    {

        $request->validate([
            'descripcion' => 'required|unique:solicituds',
            'imagen' => 'required',
            'audio' => 'required'
        ], [
            'descripcion.required' => 'el campo de descripcion es obligario',
            'image.required' => 'inserta alguna imagen',
            'audio.required' => 'inserta algun audio'
        ]);

        $ruta_image = $request->file('imagen')->store('public/images');
        $ruta_audio = $request->file('audio')->store('public/audio');
        $user = Auth::user();
        $cliente = Cliente::where('id_user', $user->id)->first();
        $estado = Estado::where('estado', 'solicitado')->first();

        $ubicacion = Ubicacion::create([
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'id_cliente' => $cliente->id
        ]);
        $solicitud = Solicitud::create([
            'descripcion' => $request->descripcion,
            'ruta_image' => $ruta_image,
            'ruta_audio' => $ruta_audio,
            'id_cliente' => $cliente->id,
            'id_estado' => $estado->id,
            'id_ubicacion' => $ubicacion->id
        ]);

        return view('popups.propuestaSuccesfull');
    }

    public function propuestasCliente()
    {
        $user = Auth::user();
        $cliente = Cliente::where('id_user', $user->id)->first();
        $estado = Estado::where('estado', 'aceptado')->first();
        $cliente_talleres = ClienteTaller::where('id_cliente', $cliente->id)->where('id_estado', $estado->id)->get();
        $cantidadRegistros = $cliente_talleres->count();
        if ($cantidadRegistros == 0) {
            return view('actividades.propuestas-a-cliente', compact('cantidadRegistros'));
        } else {
            foreach ($cliente_talleres as $cliente_taller) {
                $taller = Taller::where('id', $cliente_taller->id_taller)->first();
                $detalle_talleres[] = [
                    'id' => $taller->id,
                    'id_cliente_taller' => $cliente_taller->id,
                    'nombre' => $taller->nombre,
                    'comentario' => $cliente_taller->comentario,
                    'precio_estimado' => $cliente_taller->precio_estimado,
                    'tiempo_estimado' => $cliente_taller->tiempo_estimado
                ];
            }
        };


        return view('actividades.propuestas-a-cliente', compact('detalle_talleres', 'cantidadRegistros'));
    }

    public function detalleCliente($id)
    {

        $cliente = Cliente::find($id);
        $ubicacion = Ubicacion::where('id_cliente', $cliente->id)->first();
        $solicitud = Solicitud::where('id_cliente', $cliente->id)->first();
        $user = Auth::user();
        $taller = Taller::where('id_user', $user->id)->first();
        $detalleCliente = [
            'id' => $cliente->id,
            'nombre' => $cliente->nombre,
            'descripcion' => $solicitud->descripcion,
            'latitud' => $ubicacion->latitud,
            'longitud' => $ubicacion->longitud,
            'ruta_imagen' => asset('storage/' . str_replace('public/', '', $solicitud->ruta_image)),
            'ruta_audio' => asset('storage/' . str_replace('public/', '', $solicitud->ruta_audio)),
            'id_taller' => $taller->id
        ];

        //return $detalleCliente;
        //desde TALLER ver los detalles del CLIENTE
        return view('actividades.solicitud-detalle-en-taller', compact('detalleCliente'));
    }

    public  function storeTaller(Request $request, $id, $id_taller)
    {
        $cliente = Cliente::find($id);
        $taller = Taller::find($id_taller);
        $estado = Estado::where('estado', 'espera')->first();
        $clienteTaller = ClienteTaller::create([
            'comentario' => $request->comentario,
            'precio_estimado' => $request->precio,
            'tiempo_estimado' => $request->tiempo_estimado,
            'id_taller' => $taller->id,
            'id_cliente' => $cliente->id,
            'id_estado' => $estado->id
        ]);

        return view('popups.solicitudSuccesfull');
    }

    public function storeAceptado($id)
    {
        $solicitud_taller = SolicitudTaller::find($id);
        $estado = Estado::where('estado', 'aceptado')->first();
        $solicitud_taller->update([
            'id_estado' => 2
        ]);

        return view('popups.aceptadoSuccesfull');
    }

    public function storeConfirmado($id)
    {
        $cliente_taller = ClienteTaller::find($id)->first();
        $estado = Estado::where('estado', 'confirmado')->first();
        $cliente_taller->update([
            'id_estado' => $estado->id
        ]);

        return view('popups.confirmadoSuccesfull');
    }
}
