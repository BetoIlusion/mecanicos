@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<a href="{{ route('taller.tecnicoCreate')}}" class="btn btn-primary">Crear Técnico</a>
    <div class="text-center">
        <table id="datable_1" class="table nowrap w-100 mb-5">
            <thead>
                <tr>

                    <th><span>ID</span></th>
                    <th><span>nombre</span></th>
                    <th><span>apellido</span></th>
                    <th><span>Accion</span></th>
                </tr>
            </thead>
            <tbody>
                @if ($count_tecnicos == 0)

                @else
                    @foreach ($tecnicos as $tecnico)
                        <tr>
                            <td><span>{{ $tecnico->id }}</span></td>
                            <td><span>{{ $tecnico->nombre }}</span></td>
                            <td><span>{{ $tecnico->apellido }}</span></td>
                            <td>
                                {{-- <a href="" class="btn btn-primary">detalles</a> --}}
                                <a href="" class="btn btn-primary">eliminar Cuenta</a>
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
