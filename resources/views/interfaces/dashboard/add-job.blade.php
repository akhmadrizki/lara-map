@extends('layouts.dashboard')

@section('additional-css')
<style>
  .button-add {
    background-color: #1ecad3;
    border: none;
    cursor: pointer;
  }

  .button-add:hover {
    background-color: #18bcc5 !important;
  }
</style>
@endsection

@section('content')
<div class="section-header">
  <h1>Add Loker</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{ route('add.job') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">

            <div class="form-group">
              <label>Gambar</label>
              <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="company">Nama Perusahaan</label>
                <input type="text" class="form-control" id="company" name="company" required>
              </div>
              <div class="form-group col-md-6">
                <label for="title">Loker</label>
                <input type="text" class="form-control" id="title" name="title" required>
              </div>
            </div>

            
            <div class="form-group">
              <label for="address" class="col-xs-12">Alamat</label>
              <div class="col-xs-12">
                <input type="text" class="form-control" id="address" name="address" required>
              </div>
            </div>
            
            <div class="form-group">
              <label for="description" class="col-xs-12">Deskripsi</label>
                <div class="col-xs-12">
                  <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                </div>
            </div>
            
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="latitude">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" required
                  placeholder="-8.676753421546715">
              </div>
              <div class="form-group col-md-6">
                <label for="longitude">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" required
                  placeholder="115.2188938090825">
              </div>
            </div>
          </div>

          <div class="card-footer text-left">
            <button class="button-add btn-lg btn-success">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('modals')
<script>
  ClassicEditor
      .create( document.querySelector( '#description' ) )
      .catch( error => {
          console.error( error );
      } );
</script>
@endsection