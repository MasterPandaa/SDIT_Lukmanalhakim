@extends('layouts.admin')

@section('title', 'Contact')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Pengaturan Contact</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Halaman pengaturan informasi kontak sekolah.
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Informasi Kontak</h5>
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <textarea class="form-control" rows="3">Jl. Contoh No. 123, Kota, Provinsi</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Telepon</label>
                                            <input type="text" class="form-control" value="+62 123 4567 890">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" value="info@sditlukmanalhakim.sch.id">
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-1"></i> Simpan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Social Media</h5>
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Facebook</label>
                                            <input type="url" class="form-control" value="https://facebook.com/sditlukmanalhakim">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Instagram</label>
                                            <input type="url" class="form-control" value="https://instagram.com/sditlukmanalhakim">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">YouTube</label>
                                            <input type="url" class="form-control" value="https://youtube.com/@sditlukmanalhakim">
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-1"></i> Simpan
                                        </button>
                                    </form>
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
