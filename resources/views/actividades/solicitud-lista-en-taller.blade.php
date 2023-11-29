@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="text-center">
        <table id="datable_1" class="table nowrap w-100 mb-5">
            <thead>
                <tr>

                    <th><span>ID</span></th>
                    <th><span>Nombre</span></th>
                    <th><span>Accion</span></th>
                </tr>
            </thead>
            <tbody>
                @if ($count_tecnicos == 0)
                    <h1>NINGUN TECNICO DISPONIBLE</h1>
                    <hr>
                    <a href="{{ route('taller.tecnicoCreate') }}" class="btn btn-primary">Añade un tecnico</a>
                    <hr>
                @else
                    @foreach ($solicitud_clientes as $solicitud_cliente)
                        <tr>
                            <td><span>{{ $solicitud_cliente['id'] }}</span></td>
                            <td><span>{{ $solicitud_cliente['nombre'] }}</span></td>
                            <td>
                                {{-- <a href="" class="btn btn-primary">Aceptar</a> --}}
                                <a href="{{ route('solicitud.detalleCliente', ['id' => $solicitud_cliente['id']]) }}"
                                    class="btn btn-primary">Detalles</a>

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
