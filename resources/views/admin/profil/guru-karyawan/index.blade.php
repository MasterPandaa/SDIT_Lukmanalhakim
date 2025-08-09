@extends('layouts.admin')

@section('title', 'Profil - Guru & Karyawan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-chalkboard-teacher fa-lg text-success me-2"></i>
                    Kelola Guru & Karyawan
                </h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('guru-karyawan') }}" target="_blank" class="btn btn-primary shadow-sm">
                        <i class="fas fa-eye me-2"></i>
                        Lihat Halaman Publik
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-lg me-3"></i>
                        <div>
                            <strong>Berhasil!</strong> {{ session('success') }}
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle fa-lg me-3"></i>
                        <div>
                            <strong>Error!</strong> {{ session('error') }}
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <div class="card border-0 shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-success">Data Guru & Karyawan</h6>
                </div>
                <div class="card-body">
                    <!-- Data Table Only -->
                    @include('admin.profil.guru-karyawan.partials.guru-table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

