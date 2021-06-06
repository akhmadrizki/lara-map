@extends('layouts.detail')

@section('additional-css')
<style>
  .map-cover {
    border-radius: 20px;
    width: 100%;
    height: 400px;
    background-color: red;
  }

  #map {
    border-radius: 20px;
    width: 100%;
    height: 100%;
  }

  .gambar {
    background-image: url("{{ asset('images/' . $jobs->image) }}");
    background-size: cover;
    border-radius: 20px;
    height: 240px;
    width: 100%;
  }

  .job-title {
    align-items: center;
    background-color: #00000085;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    height: 100%;
    justify-content: center;
    width: 100%;
  }

  .job-title h1 {
    color: white;
    text-transform: capitalize;
  }

  .job-title p {
    font-size: 21px;
  }

  .custom-btn {
    background-color: #0096b5 !important;
  }

  .additional {
    border: 1px solid #777;
    border-radius: 20px;
    width: 100%;
    padding: 4px 8px;
  }

  .additional-address {
    padding: 2px;
  }
</style>
@endsection

@section('content')
<div class="row">
  <div class="col-5">
    <div class="map-cover mt-4">
      <div id="map"></div>
    </div>
  </div>
  <div class="col-7">
    <div class="gambar mt-4">
      <div class="job-title">
        <h1>{{$jobs->title}}</h1>
        <br>
        <p class="lead text-white">{{ $jobs->company }}</p>
      </div>
    </div>

    <div class="additional mt-3">
      <div class="d-flex justify-content-between align-items-center">
        <div class="additional-address">
          <i class="fas fa-street-view"></i>
          <span>{{ $jobs->address }}</span>
        </div>
        <div class="additional-address">
          <i class="fas fa-map-marker-alt"></i>
          <span>{{ $jobs->kecamatan->nama_kecamatan }}</span>
        </div>
      </div>
    </div>

    <div class="deskripsi mt-3">
      {!!$jobs->description!!}
    </div>
    <button type="button" class="btn btn-primary custom-btn">Lamar</button>
  </div>
</div>
@endsection

@section('additional-script')
<script>
  let getDataJob = async () => {
        let url = window.location.href;
        let idJob = url.substring(url.lastIndexOf('/') + 1);
        let response = await fetch(`http://localhost:8000/api/job-detail/${idJob}`);
        let json = await response.json();

        let map = L.map('map').setView([json[0].latitude, json[0].longitude], 13);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
        }).addTo(map);

        L.marker([json[0].latitude, json[0].longitude]).addTo(map)
            .bindPopup(json[0].company)
            .openPopup();
        
      }
      getDataJob();
    
          
</script>

@endsection