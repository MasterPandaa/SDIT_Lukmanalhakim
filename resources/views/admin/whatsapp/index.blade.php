@extends('layouts.admin')

@section('title', 'Pengaturan WhatsApp')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fab fa-whatsapp fa-2x text-success mr-2"></i>
                    Pengaturan WhatsApp
                </h1>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-success shadow-sm">
                    <i class="fas fa-eye mr-2"></i>
                    Lihat Halaman Publik
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-2x mr-3"></i>
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
                        <i class="fas fa-exclamation-circle fa-2x mr-3"></i>
                        <div>
                            <strong>Error!</strong> {{ session('error') }}
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <!-- WhatsApp Settings Form -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-cog mr-2"></i>
                        Konfigurasi WhatsApp Popup
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.whatsapp.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number" class="font-weight-bold">Nomor WhatsApp <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white">
                                                <i class="fab fa-whatsapp"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" 
                                               value="{{ old('phone_number', config('whatsapp.phone_number', '6281234567890')) }}" 
                                               placeholder="6281234567890" required>
                                    </div>
                                    <small class="form-text text-muted">Masukkan nomor tanpa tanda + atau 0 di depan (contoh: 6281234567890)</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="admin_name" class="font-weight-bold">Nama Admin <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="admin_name" name="admin_name" 
                                           value="{{ old('admin_name', config('whatsapp.admin_name', 'Admin eLHaeS')) }}" 
                                           placeholder="Admin eLHaeS" required>
                                    <small class="form-text text-muted">Nama yang akan ditampilkan di header popup</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="popup_delay" class="font-weight-bold">Delay Popup (Detik) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="popup_delay" name="popup_delay" 
                                           value="{{ old('popup_delay', config('whatsapp.popup_delay', 3)) }}" 
                                           min="1" max="60" required>
                                    <small class="form-text text-muted">Waktu tunggu sebelum popup muncul (1-60 detik)</small>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="popup_message" class="font-weight-bold">Pesan Popup <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="popup_message" name="popup_message" rows="3" 
                                              placeholder="Assalamualikum, ada yang bisa kami bantu?" required>{{ old('popup_message', config('whatsapp.popup_message', 'Assalamualikum, ada yang bisa kami bantu?')) }}</textarea>
                                    <small class="form-text text-muted">Pesan yang ditampilkan di dalam popup</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="default_message" class="font-weight-bold">Pesan Default WhatsApp <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="default_message" name="default_message" rows="4" 
                                              placeholder="Assalamualikum, saya ingin bertanya tentang SDIT Luqman Al Hakim" required>{{ old('default_message', config('whatsapp.default_message', 'Assalamualikum, saya ingin bertanya tentang SDIT Luqman Al Hakim')) }}</textarea>
                                    <small class="form-text text-muted">Pesan yang akan dikirim otomatis saat user klik "Open chat"</small>
                                </div>
                                
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="enabled" name="enabled" 
                                               {{ (old('enabled', config('whatsapp.enabled', true)) ? 'checked' : '') }}>
                                        <label class="custom-control-label font-weight-bold" for="enabled">Aktifkan Fitur WhatsApp</label>
                                        <small class="form-text text-muted">Jika dinonaktifkan, popup dan floating button tidak akan muncul</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-top pt-3 mt-3">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save mr-1"></i> Simpan Pengaturan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Preview Section -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-eye mr-2"></i>
                        Preview Popup WhatsApp
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="font-weight-bold mb-3">Tampilan Popup:</h6>
                            <div class="whatsapp-preview">
                                <div class="whatsapp-popup-preview">
                                    <div class="whatsapp-popup-header-preview">
                                        <div class="whatsapp-popup-title-preview">
                                            <i class="fab fa-whatsapp"></i>
                                            <span>{{ config('whatsapp.admin_name', 'Admin eLHaeS') }}</span>
                                        </div>
                                        <button class="whatsapp-popup-close-preview">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="whatsapp-popup-body-preview">
                                        <div class="whatsapp-message-preview">
                                            <p>{{ config('whatsapp.popup_message', 'Assalamualikum, ada yang bisa kami bantu?') }}</p>
                                        </div>
                                        <button class="whatsapp-open-chat-preview">
                                            <i class="fas fa-paper-plane"></i>
                                            Open chat
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="font-weight-bold mb-3">Informasi Konfigurasi:</h6>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td><strong>Nomor WhatsApp:</strong></td>
                                            <td>{{ config('whatsapp.phone_number', '6281234567890') }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Admin:</strong></td>
                                            <td>{{ config('whatsapp.admin_name', 'Admin eLHaeS') }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Delay Popup:</strong></td>
                                            <td>{{ config('whatsapp.popup_delay', 3) }} detik</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status:</strong></td>
                                            <td>
                                                <span class="badge badge-{{ config('whatsapp.enabled', true) ? 'success' : 'secondary' }}">
                                                    {{ config('whatsapp.enabled', true) ? 'Aktif' : 'Nonaktif' }}
                                                </span>
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
@endsection

@push('styles')
<style>
.whatsapp-preview {
    display: flex;
    justify-content: center;
    padding: 20px;
}

.whatsapp-popup-preview {
    width: 280px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
    border: 1px solid #e3e6f0;
}

.whatsapp-popup-header-preview {
    background: #25D366;
    color: white;
    padding: 15px 20px;
    border-radius: 12px 12px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.whatsapp-popup-title-preview {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    font-size: 14px;
}

.whatsapp-popup-close-preview {
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    font-size: 14px;
    padding: 0;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

.whatsapp-popup-body-preview {
    padding: 20px;
}

.whatsapp-message-preview {
    background: #f0f0f0;
    padding: 12px 16px;
    border-radius: 18px;
    margin-bottom: 15px;
    position: relative;
}

.whatsapp-message-preview::before {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 20px;
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-top: 8px solid #f0f0f0;
}

.whatsapp-message-preview p {
    margin: 0;
    color: #333;
    font-size: 12px;
    line-height: 1.4;
}

.whatsapp-open-chat-preview {
    width: 100%;
    background: #25D366;
    color: white;
    border: none;
    padding: 10px 16px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.whatsapp-open-chat-preview i {
    font-size: 12px;
}
</style>
@endpush 