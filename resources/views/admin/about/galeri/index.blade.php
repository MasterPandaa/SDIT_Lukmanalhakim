@extends('layouts.admin')

@section('title', 'About - Galeri')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Kelola Galeri</h6>
                    <a href="#" class="btn btn-sm btn-light">
                        <i class="fas fa-plus me-1"></i> Tambah Foto
                    </a>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Halaman pengelolaan galeri foto sekolah.
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="card border-0 shadow-sm">
                                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Galeri">
                                <div class="card-body">
                                    <h6 class="card-title">Kegiatan Belajar</h6>
                                    <p class="text-muted small">2024-01-15</p>
                                    <div class="btn-group btn-group-sm w-100">
                                        <button class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <div class="card border-0 shadow-sm">
                                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Galeri">
                                <div class="card-body">
                                    <h6 class="card-title">Upacara Bendera</h6>
                                    <p class="text-muted small">2024-01-10</p>
                                    <div class="btn-group btn-group-sm w-100">
                                        <button class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
