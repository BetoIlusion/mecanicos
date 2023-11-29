@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="text-center mt-5">

        @if ($cliente->cantidad_autos == 0)
            <!-- Bloque para cuando $vehiculo existe -->
            <a href="{{ route('vehiculo.create') }}" class="btn btn-success btn-lg shadow-lg hover:shadow-xl text-white">
                Añade un vehículo para empezar
            </a>
        @else
            @if ($count_solicitudes == 0)
                <!-- Bloque para cuando $vehiculo no existe -->
                <p>Ahora ya puedes enviar tu solicitud a un taller.</p>
                <div class="text-center mt-5">
                    <button class="btn btn-success btn-lg shadow-lg hover:shadow-xl text-white" data-toggle="modal"
                        data-target="#myModal">
                        Enviar una solicitud
                    </button>
                </div>
            @else
                <a href="{{ route('solicitud.propuestas') }}"
                    class="btn btn-success btn-lg shadow-lg hover:shadow-xl text-white">
                    ir a sala de propuestas
                </a>
            @endif
        @endif


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Ventana Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('solicitud.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="mensaje">Explica tu situacion:</label>
                                <textarea class="form-control" id="mensaje" name="descripcion" rows="3"></textarea>

                            </div>
                            @error('descripcion')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="exampleInputFile">Inserta imagenes de referencia a su problema</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile"
                                            name="imagen">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            @error('imagen')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> --}}
                            @error('descripcion')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            {{-- INSERCION DE AUDIO --}}
                            <div class="form-group">
                                <label for="audio">Selecciona un archivo de audio:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="audio" id="audio"
                                        accept="audio/*">
                                    <label class="custom-file-label" for="audio">Elegir archivo</label>
                                </div>
                            </div>
                            @error('audio')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- ------------------------------ mapa --}}
                        <!DOCTYPE html>

                        <head>
                            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
                                integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

                            <style>
                                #mi_mapa {
                                    height: 30vh;
                                    /* El 50% de la altura de la ventana visible */
                                    width: 100%;
                                    /* El 100% del ancho de la ventana visible */
                                }
                            </style>
                        </head>

                        <body>
                            <div id="mi_mapa"> </div>
                            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                                integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

                            <script>
                                let map = L.map('mi_mapa').setView([-17.7838, -63.1808], 12)
                                let marker;
                                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
                                L.marker([-17.7838, -63.1808]).addTo(map)
                                    .bindPopup('centro de la ciudad')
                                    .openPopup();
                                // marker.on('dragend', function(e) {
                                // let latlng = e.target.getLatLng();

                                map.on('click', function(e) {
                                    if (marker) {
                                        map.removeLayer(marker);
                                    }
                                    // alert("Posicion: " + e.latlng)

                                    marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);

                                    marker.setLatLng(e.latlng);
                                    console.log('Click event triggered');
                                    document.getElementById('latitud').value = e.latlng.lat;
                                    // console.log('Click event latitud');
                                    // console.log('Latitud:', document.getElementById('latitud').value);
                                    document.getElementById('longitud').value = e.latlng.lng;

                                });
                            </script>
                            <input type="hidden" name="latitud" id="latitud" value="">
                            <input type="hidden" name="longitud" id="longitud" value="">

                        </body>

                        </html>
                        {{-- ------------------------------------------------------------------ --}}
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
