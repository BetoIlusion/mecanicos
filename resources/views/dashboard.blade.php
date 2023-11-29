@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    {{-- @can('Taller')
        <a href=" {{ route('dashboard') }}" class="btn btn-warning btn-lg shadow-lg hover:shadow-xl text-white">
            BOTON brueba de vista de Taller
        </a>
    @endcan --}}
    @can('PreTaller')
        <div class="text-center mt-5">

            <a href=" {{ route('planes.index')}}" class="btn btn-warning btn-lg shadow-lg hover:shadow-xl text-white">
                Suscríbete para empezar
            </a>
            
            {{-- <div class="text-center mt-5">
                <button class="btn btn-warning btn-lg shadow-lg hover:shadow-xl text-white" data-toggle="modal"
                    data-target="#myModal">
                    Suscríbete para empezar
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Ventana Modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Contenido de la ventana modal...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <!-- Puedes agregar más botones aquí según tus necesidades -->
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        @endcan



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
