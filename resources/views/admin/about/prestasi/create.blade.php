@extends('layouts.admin')

@section('title', 'Tambah Prestasi')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card border-0 shadow">
        <div class="card-header">
          <h6 class="m-0 fw-bold text-success">Tambah Prestasi</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.about.prestasi.partials.form')
            <div class="mt-4 d-flex gap-2">
              <a href="{{ route('admin.prestasi.index') }}" class="btn btn-light">Batal</a>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
