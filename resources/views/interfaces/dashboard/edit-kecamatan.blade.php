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
  <h1>Edit Kecamatan</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{ route('update.kecamatan', $kecamatans->id) }}" method="POST">
          @csrf
          <div class="card-body">


            <div class="form-group">
              <label for="nama_kecamatan" class="col-xs-12">Kecamatan</label>
              <div class="col-xs-12">
                <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan"
                  value="{{ $kecamatans->nama_kecamatan }}" required>
              </div>
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