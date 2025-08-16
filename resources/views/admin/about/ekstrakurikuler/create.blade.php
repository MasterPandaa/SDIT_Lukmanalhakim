@extends('layouts.admin')

@section('title', 'Tambah Ekstrakurikuler')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card border-0 shadow">
        <div class="card-header">
          <h6 class="m-0 fw-bold text-success">Tambah Ekstrakurikuler</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.about.ekstrakurikuler.partials.form')
            <div class="mt-4 d-flex gap-2">
              <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-light">Batal</a>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
