@extends('layouts.admin')

@section('title', 'Ganti Password')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header" style="background: var(--light-color); border-bottom: 1px solid rgba(39,174,96,.2)">
                    <h5 class="mb-0" style="color: var(--primary-color)"><i class="fas fa-lock me-2"></i>Ganti Password</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.password.update') }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Password Saat Ini</label>
                            <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Masukkan password saat ini" required>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="Minimal 6 karakter" required>
                            @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="Ulangi password baru" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.dashboard') }}" class="btn" style="border: 1px solid rgba(39,174,96,.2); color: var(--primary-color)"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
                            <button type="submit" class="btn" style="background: var(--primary-color); color: #fff">
                                <i class="fas fa-save me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted small" style="background: var(--light-color); border-top: 1px solid rgba(39,174,96,.2)">
                    Pastikan Anda mengingat password baru Anda.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
