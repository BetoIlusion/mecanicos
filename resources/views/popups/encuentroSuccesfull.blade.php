@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">¡Éxito!</h3>
                </div>
                <div class="card-body">
                    <p>
                        Encuentro Confirmado.
                    </p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('ocupado') }}" class="btn btn-success">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Agrega la clase de animación (puedes personalizarla según tus necesidades)
    $(document).ready(function () {
        $(".card-success").addClass('animate__animated animate__fadeInUp');
    });
</script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop