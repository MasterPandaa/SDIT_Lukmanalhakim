@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Welcome Alert -->
    <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" style="background: linear-gradient(135deg, rgba(39, 174, 96, 0.1), rgba(46, 204, 113, 0.1)); border-left: 4px solid #27ae60 !important;">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-user-circle fa-2x text-success"></i>
            </div>
            <div>
                <h5 class="alert-heading mb-1">Selamat Datang, {{ session('admin_name') ?? 'Admin' }}!</h5>
                <p class="mb-0">Selamat datang di panel admin SDIT Lukmanalhakim. Anda dapat mengelola konten website dari sini.</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="bg-gradient-primary text-white p-3 rounded">
                                <i class="fas fa-newspaper fa-2x"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="text-muted text-uppercase mb-1 small">BLOG POSTS</h6>
                            <h2 class="mb-0 fw-bold">10</h2>
                            <div class="mt-2">
                                <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> 5%</span>
                                <span class="text-muted small ms-2">dari bulan lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="bg-gradient-success text-white p-3 rounded">
                                <i class="fas fa-graduation-cap fa-2x"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="text-muted text-uppercase mb-1 small">PROGRAM</h6>
                            <h2 class="mb-0 fw-bold">5</h2>
                            <div class="mt-2">
                                <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> 2%</span>
                                <span class="text-muted small ms-2">dari bulan lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="bg-gradient-info text-white p-3 rounded">
                                <i class="fas fa-chalkboard-teacher fa-2x"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="text-muted text-uppercase mb-1 small">GURU</h6>
                            <h2 class="mb-0 fw-bold">15</h2>
                            <div class="mt-2">
                                <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> 8%</span>
                                <span class="text-muted small ms-2">dari bulan lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Blog Posts Table -->
        <div class="col-lg-8">
            <div class="card border-0 shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Blog Posts Terbaru</h6>
                    <a href="#" class="btn btn-sm btn-light">
                        <i class="fas fa-plus me-1"></i> Tambah Post
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-light rounded p-2 me-3">
                                                <i class="fas fa-file-alt text-success"></i>
                                            </div>
                                            <span>Kegiatan Ramadhan SDIT Lukmanalhakim</span>
                                        </div>
                                    </td>
                                    <td class="align-middle">25 Mar 2023</td>
                                    <td class="align-middle"><span class="badge bg-success">Published</span></td>
                                    <td class="align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-light rounded p-2 me-3">
                                                <i class="fas fa-file-alt text-success"></i>
                                            </div>
                                            <span>Prestasi Siswa dalam Lomba Matematika</span>
                                        </div>
                                    </td>
                                    <td class="align-middle">18 Mar 2023</td>
                                    <td class="align-middle"><span class="badge bg-success">Published</span></td>
                                    <td class="align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-light rounded p-2 me-3">
                                                <i class="fas fa-file-alt text-success"></i>
                                            </div>
                                            <span>Persiapan Ujian Akhir Semester</span>
                                        </div>
                                    </td>
                                    <td class="align-middle">10 Mar 2023</td>
                                    <td class="align-middle"><span class="badge bg-warning">Draft</span></td>
                                    <td class="align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white text-center py-2">
                    <a href="#" class="text-decoration-none text-success">Lihat Semua Posts <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-4">
            <!-- Quick Links -->
            <div class="card border-0 shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-success">Menu Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center border-0 py-3">
                            <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                                <i class="fas fa-cog text-success"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Pengaturan Umum</h6>
                                <small class="text-muted">Konfigurasi website</small>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center border-0 py-3">
                            <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                                <i class="fas fa-image text-success"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Slider & Banner</h6>
                                <small class="text-muted">Kelola tampilan beranda</small>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center border-0 py-3">
                            <div class="bg-info bg-opacity-10 p-2 rounded me-3">
                                <i class="fas fa-envelope text-info"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Kontak & Email</h6>
                                <small class="text-muted">Kelola pesan masuk</small>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center border-0 py-3">
                            <div class="bg-warning bg-opacity-10 p-2 rounded me-3">
                                <i class="fas fa-users text-warning"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Pengguna</h6>
                                <small class="text-muted">Kelola akun admin</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Activity Log -->
            <div class="card border-0 shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-success">Aktivitas Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="timeline-item mb-4">
                        <p class="small text-muted mb-1 d-flex align-items-center">
                            <i class="fas fa-clock me-1"></i> Hari ini, 10:30
                        </p>
                        <div class="d-flex">
                            <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                                <i class="fas fa-plus text-success"></i>
                            </div>
                            <p class="mb-0">Blog post baru ditambahkan</p>
                        </div>
                    </div>
                    <div class="timeline-item mb-4">
                        <p class="small text-muted mb-1 d-flex align-items-center">
                            <i class="fas fa-clock me-1"></i> Kemarin, 15:45
                        </p>
                        <div class="d-flex">
                            <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                                <i class="fas fa-edit text-success"></i>
                            </div>
                            <p class="mb-0">Data guru diperbarui</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <p class="small text-muted mb-1 d-flex align-items-center">
                            <i class="fas fa-clock me-1"></i> 25 Mar 2023, 09:15
                        </p>
                        <div class="d-flex">
                            <div class="bg-info bg-opacity-10 p-2 rounded me-3">
                                <i class="fas fa-graduation-cap text-info"></i>
                            </div>
                            <p class="mb-0">Program baru ditambahkan</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white text-center py-2">
                    <a href="#" class="text-decoration-none text-success">Lihat Semua Aktivitas <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #27ae60, #2ecc71);
    }
    
    .bg-gradient-success {
        background: linear-gradient(135deg, #27ae60, #2ecc71);
    }
    
    .bg-gradient-info {
        background: linear-gradient(135deg, #27ae60, #2ecc71);
    }
    
    .card {
        border-radius: 10px;
        overflow: hidden;
    }
    
    .table th {
        font-weight: 600;
        border-top: none;
    }
    
    .table td {
        padding: 1rem 1rem;
    }
    
    .table tr:last-child td {
        border-bottom: none;
    }
    
    .timeline-item {
        position: relative;
    }
    
    .badge {
        padding: 0.5em 0.75em;
        font-weight: 500;
    }
</style>
@endsection

@section('scripts')
<script>
    // Dashboard scripts can be added here
    console.log('Dashboard loaded');
</script>
@endsection 