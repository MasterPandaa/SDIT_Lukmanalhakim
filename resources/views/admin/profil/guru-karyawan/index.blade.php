@extends('layouts.admin')

@section('title', 'Profil - Guru & Karyawan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Kelola Guru & Karyawan</h6>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#filterModal">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                        <a href="#" class="btn btn-sm btn-light">
                            <i class="fas fa-plus me-1"></i> Tambah Guru/Karyawan
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Halaman pengelolaan data guru dan karyawan sekolah.
                    </div>
                    
                    <!-- Stats Cards -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <div class="card border-0 bg-gradient-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <i class="fas fa-chalkboard-teacher fa-lg"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">25</h4>
                                            <small>Total Guru</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 bg-gradient-success text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <i class="fas fa-user-tie fa-lg"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">12</h4>
                                            <small>Total Karyawan</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 bg-gradient-info text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <i class="fas fa-user-check fa-lg"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">35</h4>
                                            <small>Aktif</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 bg-gradient-warning text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <i class="fas fa-user-clock fa-lg"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">2</h4>
                                            <small>Cuti</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tabs -->
                    <ul class="nav nav-tabs" id="staffTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="guru-tab" data-bs-toggle="tab" data-bs-target="#guru" type="button" role="tab">
                                <i class="fas fa-chalkboard-teacher me-1"></i> Guru
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="karyawan-tab" data-bs-toggle="tab" data-bs-target="#karyawan" type="button" role="tab">
                                <i class="fas fa-user-tie me-1"></i> Karyawan
                            </button>
                        </li>
                    </ul>
                    
                    <div class="tab-content mt-3" id="staffTabsContent">
                        <!-- Guru Tab -->
                        <div class="tab-pane fade show active" id="guru" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="https://via.placeholder.com/40x40" class="rounded-circle" alt="Foto">
                                            </td>
                                            <td>
                                                <div>
                                                    <strong>Ahmad Supriadi</strong>
                                                    <br><small class="text-muted">ahmad@email.com</small>
                                                </div>
                                            </td>
                                            <td>198501012010012001</td>
                                            <td>Matematika</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <button class="btn btn-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-info" title="Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-danger" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <img src="https://via.placeholder.com/40x40" class="rounded-circle" alt="Foto">
                                            </td>
                                            <td>
                                                <div>
                                                    <strong>Siti Nurhaliza</strong>
                                                    <br><small class="text-muted">siti@email.com</small>
                                                </div>
                                            </td>
                                            <td>198602022010012002</td>
                                            <td>Bahasa Indonesia</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <button class="btn btn-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-info" title="Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-danger" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Karyawan Tab -->
                        <div class="tab-pane fade" id="karyawan" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Jabatan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="https://via.placeholder.com/40x40" class="rounded-circle" alt="Foto">
                                            </td>
                                            <td>
                                                <div>
                                                    <strong>Budi Santoso</strong>
                                                    <br><small class="text-muted">budi@email.com</small>
                                                </div>
                                            </td>
                                            <td>198703032010012003</td>
                                            <td>Staff TU</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <button class="btn btn-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-info" title="Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-danger" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <img src="https://via.placeholder.com/40x40" class="rounded-circle" alt="Foto">
                                            </td>
                                            <td>
                                                <div>
                                                    <strong>Rina Marlina</strong>
                                                    <br><small class="text-muted">rina@email.com</small>
                                                </div>
                                            </td>
                                            <td>198804042010012004</td>
                                            <td>Staff Perpustakaan</td>
                                            <td><span class="badge bg-warning">Cuti</span></td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <button class="btn btn-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-info" title="Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-danger" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter Guru & Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select">
                            <option value="">Semua</option>
                            <option value="guru">Guru</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option value="">Semua</option>
                            <option value="aktif">Aktif</option>
                            <option value="cuti">Cuti</option>
                            <option value="nonaktif">Non-Aktif</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran/Jabatan</label>
                        <input type="text" class="form-control" placeholder="Cari mata pelajaran atau jabatan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Terapkan Filter</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Tab functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('[data-bs-toggle="tab"]');
        tabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('data-bs-target');
                const tabContent = document.querySelector(target);
                
                // Hide all tab contents
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                
                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('active'));
                
                // Show target tab content
                tabContent.classList.add('show', 'active');
                this.classList.add('active');
            });
        });
    });
</script>
@endsection 
