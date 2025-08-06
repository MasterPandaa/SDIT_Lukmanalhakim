@extends('layouts.admin')

@section('title', 'Contact Management')

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pesan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Belum Dibaca</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['unread'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-eye-slash fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sudah Dibaca</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['read'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-eye fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sudah Dibalas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['replied'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-reply fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
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
                                                <span class="badge bg-warning">Belum Dibaca</span>
                                            @elseif($message->status === 'read')
                                                <span class="badge bg-info">Sudah Dibaca</span>
                                            @else
                                                <span class="badge bg-success">Sudah Dibalas</span>
                                            @endif
                                        </td>
                                        <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.contact.show', $message->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if($message->status === 'unread')
                                                    <form action="{{ route('admin.contact.mark-read', $message->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-info">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('admin.contact.delete', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Pengaturan Kontak</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contact.update-settings') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="address" class="form-control" rows="3" required>{{ $contactSettings->address ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="text" name="phone" class="form-control" value="{{ $contactSettings->phone ?? '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $contactSettings->email ?? '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">WhatsApp</label>
                            <input type="text" name="whatsapp" class="form-control" value="{{ $contactSettings->whatsapp ?? '' }}" placeholder="08123456789">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Facebook</label>
                            <input type="url" name="facebook" class="form-control" value="{{ $contactSettings->facebook ?? '' }}" placeholder="https://facebook.com/...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Instagram</label>
                            <input type="url" name="instagram" class="form-control" value="{{ $contactSettings->instagram ?? '' }}" placeholder="https://instagram.com/...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">YouTube</label>
                            <input type="url" name="youtube" class="form-control" value="{{ $contactSettings->youtube ?? '' }}" placeholder="https://youtube.com/...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Google Maps Embed URL</label>
                            <textarea name="google_maps_embed" class="form-control" rows="2" placeholder="https://www.google.com/maps/embed?...">{{ $contactSettings->google_maps_embed ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jam Operasional</label>
                            <textarea name="office_hours" class="form-control" rows="3" placeholder="Senin - Jumat: 07:00 - 15:00 WIB">{{ $contactSettings->office_hours ?? '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-save me-1"></i> Simpan Pengaturan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
