@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <!DOCTYPE html>

    <head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <style>
            #mi_mapa {
                height: 50vh;
                /* El 50% de la altura de la ventana visible */
                width: 100%;
                /* El 100% del ancho de la ventana visible */
            }
        </style>
    </head>

    <body>
        <div id="mi_mapa"> </div>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            0integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script>
            let map = L.map('mi_mapa').setView([-17.7838, -63.1808], 12)
            let marker;
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {

            }).addTo(map);

            // L.marker([-17.7838, -63.1808]).addTo(map)
            //     .bindPopup('A pretty CSS popup.<br> Easily customizable.')
            //     .openPopup();

            // map.on('click', onMapClick)

            // function onMapClick(e){
            //     alert("Posicion: " + e.latlng)
            // }

            // marker.on('dragend', function(e) {
            //     let latlng = e.target.getLatLng();
            //     document.getElementById('latitud').value = latlng.lat;
            //     document.getElementById('longitud').value = latlng.lng;
            // });

            map.on('click', function(e) {
                if (marker) {
                    map.removeLayer(marker);
                }
                marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map)
                    .bindPopup('A pretty CSS popup.<br> Easily customizable.')
                    .openPopup();

                marker.setLatLng(e.latlng);
                console.log('Click event triggered');
                document.getElementById('latitud').value = e.latlng.lat;
                console.log('Latitud:', document.getElementById('latitud').value);
                document.getElementById('longitud').value = e.latlng.lng;
                console.log('Longitud:', document.getElementById('longitud').value);

                alert("Posicion: " + e.latlng)
            });
        </script>
    </body>

    </html>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
