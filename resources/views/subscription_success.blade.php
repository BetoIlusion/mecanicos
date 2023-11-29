{{-- @extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
   
                <div class="card-body">
   
                    <div class="alert alert-success">
                        Subscription purchase successfully!
                    </div>
   
                    <!-- Agregamos un botón y lo vinculamos a la ruta del dashboard -->
                    <a href="" class="btn btn-primary">Go to Dashboard</a>
   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection --}}


@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
   
                <div class="card-body">
   
                    <div class="alert alert-success">
                        Subscription purchase successfully!
                    </div>
   
                    <!-- Agregamos un botón y lo vinculamos a la ruta del dashboard -->
                    <a href=" {{ route('dashboard')}}" class="btn btn-primary">Go to Dashboard</a>
   
                </div>
            </div>
        </div>
    </div>
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
