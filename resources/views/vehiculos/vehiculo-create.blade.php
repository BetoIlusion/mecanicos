@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <a href="{{ route('vehiculo.index') }}">
        <x-adminlte-button label="Volver atras" />
    </a>
    <br>
    <br>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">General Elements</h3>
        </div>

        <div class="card-body">
            {{-- formulario --}}
            <form action="{{ route('vehiculo.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" value="{{ old('marca') }}">
                    
                            @error('marca')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="marca">Modelo de vehiculo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" value="{{ old('modelo') }}">
                        </div>
                        @error('modelo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="anio">Año de creación</label>
                            <input type="number" class="form-control" id="anio" name="anio" step="1"
                                placeholder="Ingrese el año..." value="{{ old('anio') }}">
                        </div>
                        @error('anio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>


                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tipo_combustible">Tipo Combustible</label>
                            <select class="form-control" id="tipo_combustible" name="tipo_combustible">
                                <option value="gas" {{ old('tipo_combustible') == 'gas' ? 'selected' : '' }}>Gas</option>
                                <option value="gasolina" {{ old('tipo_combustible') == 'gasolina' ? 'selected' : '' }}>Gasolina</option>
                            </select>
                        </div>
                        @error('tipo_combustible')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="anio">Capacidad del motor en Litros</label>
                            <input type="number" class="form-control" id="capacidad_motor" name="capacidad_motor"
                                step="1" value="{{ old('capacidad_motor') }}">
                        </div>
                        @error('capacidad_motor')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="anio">Kilometraje</label>
                            <input type="number" class="form-control" id="kilometraje" name="kilometraje" step="2" value="{{ old('kilometraje') }}">
                        </div>
                        @error('kilometraje')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>

            </form>
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
