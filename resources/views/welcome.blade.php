<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LaraMap</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Leflat -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

    <!-- cluster -->
    <link rel="stylesheet" href="{{ asset('cluster/MarkerCluster.css') }}" />
	<link rel="stylesheet" href="{{ asset('cluster/MarkerCluster.Default.css')}}" />
	<script src="{{ asset('cluster/leaflet.markercluster-src.js')}}"></script>

    <!-- Styles -->
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
        }

        .main-content {
            border-radius: 8px;
            box-shadow: 3px 3px 8px #a5a5a5;
            height: 500px;
            margin-top: 30px;
            width: 100%;
        }

        #map {
            border-radius: 8px;
            height: 100%;
            width: 100%;
        }

        .container h1 {
            color: #3498db;
            font-weight: 700;
            padding-top: 10px;
        }

        .footer {
            color: #3498db;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Job Geographic Information System</h1>
        <div class="main-content">
            <div id="map"></div>
        </div>
        <div class="footer text-center">
            Copyright &copy; {{ date('Y') }} - Job GIS System
        </div>
    </div>
</body>

<script>
    var map = L.map('map').setView([-8.669546907727081, 115.20885774046394], 13);
    
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11'
    }).addTo(map);

    var markers = L.markerClusterGroup();
    let getData = async ()  => {
        let response = await fetch('http://localhost:8000/api/job');
        let json = await response.json();
        
        json.forEach(value => {
            var lokasi = L.marker([value.latitude, value.longitude]).bindPopup(`<b>${value.title}</b> <br><a href="http://localhost:8000/job-detail/${value.id}">Lihat Detail</a>`);
                
                markers.addLayer(lokasi);
                map.addLayer(markers);
                map.fitBounds(markers.getBounds());
        });
    }
    getData();
</script>

</html>