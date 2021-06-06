@extends('layouts.dashboard')

@section('additional-css')

<style>
  .hero {
    background-color: #032038 !important;
  }

  .bg-card {
    background-color: #1ecad3;
  }
</style>

@endsection

@section('content')

<div class="section-header">
  <h1>Selamat Datang, {{ Auth::user()->name }}!</h1>
</div>

<div class="row">
  @foreach ($kecamatans as $kecamatan)
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-card">
        <i class="fas fa-briefcase"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Job di <b>{{ $kecamatan->nama_kecamatan }}</b></h4>
        </div>
        <div class="card-body">
          {{ $kecamatan->jumlah_job }}
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection