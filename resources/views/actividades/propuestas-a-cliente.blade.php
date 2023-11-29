@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sala de Propuestas</h1>
@stop

@section('content')

    <div class="text-center">
        <table id="datable_1" class="table nowrap w-100 mb-5">
            <thead>
                <tr>

                    <th><span>ID</span></th>
                    <th><span>Taller</span></th>
                    <th><span>Precio Estimado</span></th>
                    <th><span>tiempo Estimado</span></th>
                    <th><span>Accion</span></th>
                </tr>
            </thead>
            <tbody>
                @if ($cantidadRegistros == 0)

                @else
                    @foreach ($detalle_talleres as $detalle_taller)
                        <tr>
                            <td><span>{{ $detalle_taller['id'] }}</span></td>
                            <td><span>{{ $detalle_taller['nombre'] }}</span></td>
                            <td><span>{{ $detalle_taller['precio_estimado'] }}</span></td>
                            <td><span>{{ $detalle_taller['tiempo_estimado'] }}</span></td>
                            <td>
                                <a href="{{ route('solicitud.storeConfirmado', ['id' => $detalle_taller['id_cliente_taller']])}}" class="btn btn-primary">Confirmar</a>

                                {{-- <a href="{{ route('ruta', ['id' => $data['id']]) }}" class="btn btn-primary">Aceptar</a> --}}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
