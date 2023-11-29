@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container">


        <div class="row">

            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Detalles del cliente</h3>
                    </div>

                    <div class="card-body">
                        <strong><i></i>IMAGEN DE REFERENCIA</strong>
                        <br>
                        <img src="{{ $detalleCliente['ruta_imagen'] }}" alt="User profile picture"
                            style="max-width: 200%; max-height: 250px;">
                        <hr>
                        <strong><i class="far fa-file-audio mr-1"></i> Audio</strong>
                        <p class="text-muted">Reproducir audio</p>
                        <audio controls>
                            <source src="{{ $detalleCliente['ruta_audio'] }}" type="audio/mp3">
                            Tu navegador no soporta el elemento de audio.
                        </audio>
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i> Situacion del Cliente</strong>
                        <p class="text-muted">{{ $detalleCliente['descripcion'] }}</p>
                        <hr>
                        {{-- <strong><i></i>PRECIO ESTIMADO</strong>
                        <p class="text-muted">
                            Enviar sugerencia de precio al cliente
                        </p>
                        <input type="number" id="precio" name="precio" step="0.01" placeholder="Ingrese el precio"
                            style="width: 150px;" required>
                        <hr> --}}
                        {{-- <strong><i class="far fa-file-alt mr-1"></i> Comentario</strong> --}}
                        {{-- <strong><i class="fas fa-map-marker-alt mr-1"></i> Comentario</strong>
                        <p class="text-muted">Envia mas detalle al cliente</p>
                        <textarea id="comentario" name="comentario" rows="2" placeholder="Ingrese su comentario" style="width: 250px;"
                            required></textarea>
                        <hr> --}}
                        {{-- <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                        <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                        </p>
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> --}}
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                {{-- -----------------------------MAPA------------------------  --}}
                <!DOCTYPE html>

                <head>
                    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
                        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

                    <style>
                        #mi_mapa {
                            height: 30vh;
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
                        let map = L.map('mi_mapa').setView([-17.7838, -63.1808], 15)
                        let marker;
                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
                        L.marker([-17.7838, -63.1808]).addTo(map)
                            .bindPopup('centro de la ciudad')
                            .openPopup();
                    </script>
                    <input type="hidden" name="latitud" id="latitud" value="">
                    <input type="hidden" name="longitud" id="longitud" value="">

                </body>

                </html>
                {{-- ----------------------------FIN DEL MAPA------------------------ --}}

                <form method="POST" action="{{ route('solicitud.storeTaller', ['id' => $detalleCliente['id'], 'id_taller' => $detalleCliente['id_taller']]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            {{-- <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ $detalleCliente['ruta_imagen'] }}"
                                alt="User profile picture">
                        </div> --}}
                            <h3 class="profile-username text-center">Cliente: {{ $detalleCliente['nombre'] }}</h3>
                            {{-- <p class="text-muted text-center">Software Engineer</p> --}}
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>PRECIO ESTIMADO(Bolivianos)</b>
                                    <p class="text-muted">
                                        Enviar sugerencia de precio al cliente
                                    </p>
                                    <input type="number" id="precio" name="precio" step="0.01"
                                        placeholder="Ingrese el precio" style="width: 150px;" required>
                                    <hr>
                                </li>
                                <li class="list-group-item">
                                    <b>TIEMPO ESTIMADO (minutos)</b>
                                    <p class="text-muted">
                                        Ingresar tiempo de estimación al cliente
                                    </p>
                                    <input type="number" id="tiempo_estimado" name="tiempo_estimado" placeholder="Ingrese el tiempo en minutos"
                                        style="width: 150px;" required>
                                    <hr>
                                </li>
                                <li>
                                    <b>ENVIAR MAS DETALLES AL CLIENTE</b>
                                    <textarea id="comentario" name="comentario" steps="0.01" rows="2" placeholder="Ingrese su comentario" style="width: 250px;"
                                        required></textarea>
                                    <hr>
                                </li>
                                {{-- <li class="list-group-item">
                                <b>Following</b> <a class="float-right">543</a>
                            </li> --}}
                            </ul>
                            <button type="submit" class="btn btn-primary btn-block"><b>Continuar</b></button>
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
