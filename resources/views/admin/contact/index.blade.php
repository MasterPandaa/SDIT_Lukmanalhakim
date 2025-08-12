@extends('layouts.admin')

@section('title', 'Kelola Kontak')

@section('content')
<div class="container-fluid">


    <!-- Modern Stats -->
    <style>
    .stat-card{border:none;border-radius:16px;color:#2c3e50;background:#fff;box-shadow:0 6px 18px rgba(0,0,0,.08);overflow:hidden}
    .stat-accent{position:absolute;inset:auto 0 0 0;height:4px;background:linear-gradient(90deg,#27ae60,#2ecc71)}
    .stat-icon{width:48px;height:48px;display:flex;align-items:center;justify-content:center;border-radius:12px;background:rgba(39,174,96,.12);color:#27ae60}
    .toolbar .form-control{border-radius:10px}
    .toolbar .btn-filter{border-radius:10px}
    .badge-soft{background:rgba(39,174,96,.12);color:#219150;border:1px solid rgba(39,174,96,.2)}
    .badge-soft-warning{background:rgba(241,196,15,.12);color:#c49b0b;border:1px solid rgba(241,196,15,.3)}
    .badge-soft-info{background:rgba(52,152,219,.12);color:#1b6fa8;border:1px solid rgba(52,152,219,.25)}
    .badge-soft-success{background:rgba(46,204,113,.12);color:#1e8e50;border:1px solid rgba(46,204,113,.25)}
    .card-section-title{font-weight:700;color:#219150}
    </style>
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card position-relative p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted text-uppercase small">Total Pesan</div>
                        <div class="h3 mb-0 fw-bold">{{ $stats['total'] }}</div>
                    </div>
                    <div class="stat-icon"><i class="fas fa-envelope"></i></div>
                </div>
                <div class="stat-accent"></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card position-relative p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted text-uppercase small">Belum Dibaca</div>
                        <div class="h3 mb-0 fw-bold">{{ $stats['unread'] }}</div>
                    </div>
                    <div class="stat-icon" style="background:rgba(241,196,15,.15);color:#f1c40f"><i class="fas fa-eye-slash"></i></div>
                </div>
                <div class="stat-accent"></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card position-relative p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted text-uppercase small">Sudah Dibaca</div>
                        <div class="h3 mb-0 fw-bold">{{ $stats['read'] }}</div>
                    </div>
                    <div class="stat-icon" style="background:rgba(52,152,219,.15);color:#3498db"><i class="fas fa-eye"></i></div>
                </div>
                <div class="stat-accent"></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card position-relative p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted text-uppercase small">Sudah Dibalas</div>
                        <div class="h3 mb-0 fw-bold">{{ $stats['replied'] }}</div>
                    </div>
                    <div class="stat-icon" style="background:rgba(46,204,113,.15);color:#2ecc71"><i class="fas fa-reply"></i></div>
                </div>
                <div class="stat-accent"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Contact Messages -->
        <div class="col-lg-8">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-primary">Daftar Pesan Kontak</h6>
                </div>
                <div class="card-body">
                    <!-- Toolbar: Search + Filter -->
                    <div class="toolbar d-flex flex-column flex-md-row gap-2 mb-3">
                        <form action="{{ route('admin.contact.index') }}" method="GET" class="d-flex gap-2 flex-grow-1">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
                                <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari nama, email, atau subjek...">
                            </div>
                            <select name="status" class="form-select" style="max-width:190px">
                                <option value="">Semua Status</option>
                                <option value="unread" {{ request('status')=='unread'?'selected':'' }}>Belum Dibaca</option>
                                <option value="read" {{ request('status')=='read'?'selected':'' }}>Sudah Dibaca</option>
                                <option value="replied" {{ request('status')=='replied'?'selected':'' }}>Sudah Dibalas</option>
                            </select>
                            <button class="btn btn-primary btn-filter" type="submit"><i class="fas fa-filter me-1"></i></button>
                        </form>
                    </div>
                    @if($messages->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Subjek</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($messages as $message)
                                    <tr class="{{ $message->status === 'unread' ? 'table-warning' : '' }}">
                                        <td>
                                            <strong>{{ $message->name }}</strong>
                                            @if($message->phone)
                                                <br><small class="text-muted">{{ $message->phone }}</small>
                                            @endif
                                        </td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ Str::limit($message->subject, 30) }}</td>
                                        <td>
                                            @if($message->status === 'unread')
                                                <span class="badge badge-soft-warning">Belum Dibaca</span>
                                            @elseif($message->status === 'read')
                                                <span class="badge badge-soft-info">Sudah Dibaca</span>
                                            @else
                                                <span class="badge badge-soft-success">Sudah Dibalas</span>
                                            @endif
                                        </td>
                                        <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.contact.show', $message->id) }}" class="btn btn-sm btn-primary" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if($message->status === 'unread')
                                                    <form action="{{ route('admin.contact.mark-read', $message->id) }}" method="POST" class="d-inline" title="Tandai Dibaca">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-info">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('admin.contact.delete', $message->id) }}" method="POST" class="d-inline" title="Hapus Pesan" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            {{ $messages->links() }}
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada pesan kontak</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Contact Settings -->
        <div class="col-lg-4">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success"><i class="fas fa-cogs me-2"></i>Pengaturan Kontak</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contact.update-settings') }}" method="POST" class="d-grid gap-3">
                        @csrf
                        <div>
                            <div class="card-section-title mb-2"><i class="fas fa-map-marker-alt me-2"></i>Alamat dan Kontak</div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="address" class="form-control" rows="3" required>{{ $contactSettings->address ?? '' }}</textarea>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Telepon</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $contactSettings->phone ?? '' }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $contactSettings->email ?? '' }}" required>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card-section-title mb-2"><i class="fab fa-whatsapp me-2"></i>Media Sosial</div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">WhatsApp</label>
                                    <input type="text" name="whatsapp" class="form-control" value="{{ $contactSettings->whatsapp ?? '' }}" placeholder="08123456789">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Facebook</label>
                                    <input type="url" name="facebook" class="form-control" value="{{ $contactSettings->facebook ?? '' }}" placeholder="https://facebook.com/...">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Instagram</label>
                                    <input type="url" name="instagram" class="form-control" value="{{ $contactSettings->instagram ?? '' }}" placeholder="https://instagram.com/...">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">YouTube</label>
                                    <input type="url" name="youtube" class="form-control" value="{{ $contactSettings->youtube ?? '' }}" placeholder="https://youtube.com/...">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card-section-title mb-2"><i class="fas fa-location-crosshairs me-2"></i>Koordinat Peta</div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Latitude</label>
                                    <input type="number" name="latitude" class="form-control" value="{{ $contactSettings->latitude ?? $contactSettings->lat ?? '' }}" step="any" placeholder="-7.741886660261045" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Longitude</label>
                                    <input type="number" name="longitude" class="form-control" value="{{ $contactSettings->longitude ?? $contactSettings->lng ?? '' }}" step="any" placeholder="110.37448030397168" required>
                                </div>
                                <div class="col-12">
                                    <small class="text-muted">Gunakan titik desimal (.) untuk angka pecahan. Contoh: -7.741886660261045, 110.37448030397168</small>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card-section-title mb-2"><i class="fas fa-clock me-2"></i>Jam Operasional</div>
                            <textarea name="office_hours" class="form-control" rows="3" placeholder="Senin - Jumat: 07:00 - 15:00 WIB">{{ $contactSettings->office_hours ?? '' }}</textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan Pengaturan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
