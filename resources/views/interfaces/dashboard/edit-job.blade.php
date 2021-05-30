@extends('layouts.dashboard')

@section('additional-css')
<style>
  .button-add {
    background-color: #f3c41a;
    border: none;
    cursor: pointer;
  }

  .button-add:hover {
    background-color: #cea512 !important;
  }
</style>
@endsection

@section('content')
<div class="section-header">
  <h1>Edit Loker</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{ route('update.job', $jobs->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="company">Nama Perusahaan</label>
                <input type="text" class="form-control" value="{{ $jobs->company }}" id="company" name="company" required>
              </div>
              <div class="form-group col-md-6">
                <label for="title">Loker</label>
                <input type="text" class="form-control" value="{{ $jobs->title }}" id="title" name="title" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control">{{ $jobs->description }}</textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" value="{{ $jobs->address }}" id="address" name="address" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="latitude">Latitude</label>
                <input type="text" class="form-control" value="{{ $jobs->latitude }}" id="latitude" name="latitude" required>
              </div>
              <div class="form-group col-md-6">
                <label for="longitude">Longitude</label>
                <input type="text" class="form-control" value="{{ $jobs->longitude }}" id="longitude" name="longitude" required>
              </div>
            </div>

            <div class="form-group">
              <label>Gambar</label>
              <input type="file" class="form-control" name="image" id="image">
            </div>
          </div>

          <div class="card-footer text-left">
            <button class="button-add btn-lg btn-success">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection