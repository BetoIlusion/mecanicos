@extends('adminlte::page')

@section('title', 'MENU PRICIPAL')

@section('content_header')
    <h1>Enviar problema</h1>
@stop

@section('content')
    <div class="content-wrapper" style="min-height: 2171.31px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Validation</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Validation</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>



        <div class="container">
            <div class="row justify-content-start mt-5">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>

                        <form>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="mensaje">Explica tu situacion:</label>
                                    <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                capture="camera">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                {{-- INSERCION DE AUDIO --}}
                                <div class="form-group">
                                    <label for="audio">Selecciona un archivo de audio:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="audio" id="audio"
                                            accept="audio/*">
                                        <label class="custom-file-label" for="audio">Elegir archivo</label>
                                    </div>
                                </div>
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


@stop

@section('css')
    <!-- Enlace al CSS personalizado de la aplicación -->
    <link rel="stylesheet" href="/css/admin_custom.css">

    <!-- Enlace al CSS de AdminLTE (ajusta la ruta según la ubicación real de tu archivo) -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">

    <!-- Enlace al CSS de DataTables (ajusta la ruta según la ubicación real de tu archivo) -->
    <link rel="stylesheet" href="{{ asset('css/datatables.net-bs4.css') }}">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <!-- Enlace al JS de DataTables (ajusta la ruta según la ubicación real de tu archivo) -->
    <script src="{{ asset('js/datatables.net-bs4.js') }}"></script>
@stop
