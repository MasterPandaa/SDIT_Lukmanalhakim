@extends('layouts.admin')

@section('title', 'Edit Fasilitas')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Edit Fasilitas</h6>
                    <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.fasilitas.update', $fasilitas) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.about.fasilitas.partials.form', ['fasilitas' => $fasilitas])
                        <div class="d-flex gap-2 mt-2">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save me-1"></i> Update</button>
                            <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-light">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
