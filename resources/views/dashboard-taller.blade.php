@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="fixed top-0 left-0 right-0 flex justify-center items-start p-4">
        <a href="{{ route('solicitud.indexTaller') }}" class="btn btn-warning btn-lg shadow-lg hover:shadow-xl text-white">
            Ver Solicitudes disponibles
        </a>
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
