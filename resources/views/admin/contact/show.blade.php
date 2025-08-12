@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <!-- Message Details -->
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-primary">Detail Pesan</h6>
                    <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Informasi Pengirim</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="120"><strong>Nama:</strong></td>
                                    <td>{{ $message->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
                                </tr>
                                @if($message->phone)
                                <tr>
                                    <td><strong>Telepon:</strong></td>
                                    <td><a href="tel:{{ $message->phone }}">{{ $message->phone }}</a></td>
                                </tr>
                                @endif
                                <tr>
                                    <td><strong>Tanggal:</strong></td>
                                    <td>{{ $message->created_at->format('d/m/Y H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td>
                                        @if($message->status === 'unread')
                                            <span class="badge bg-warning">Belum Dibaca</span>
                                        @elseif($message->status === 'read')
                                            <span class="badge bg-info">Sudah Dibaca</span>
                                        @else
                                            <span class="badge bg-success">Sudah Dibalas</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Pesan</h5>
                            <div class="card bg-light">
                                <div class="card-header">
                                    <strong>Subjek: {{ $message->subject }}</strong>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">{{ nl2br(e($message->message)) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Reply -->
            @if($message->status === 'replied')
            <div class="card border-0 shadow mt-4">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-success">Balasan Admin</h6>
                </div>
                <div class="card-body">
                    <div class="card bg-success text-white">
                        <div class="card-header">
                            <strong>Dibalas pada: {{ $message->replied_at->format('d/m/Y H:i:s') }}</strong>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ nl2br(e($message->admin_reply)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="col-lg-4">
            <!-- Quick Actions -->
            <div class="card border-0 shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-info">Aksi Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        @if($message->status === 'unread')
                            <form action="{{ route('admin.contact.mark-read', $message->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-info w-100">
                                    <i class="fas fa-check me-1"></i> Tandai Sudah Dibaca
                                </button>
                            </form>
                        @endif
                        
                        @if($message->status !== 'replied')
                            <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#replyModal">
                                <i class="fas fa-reply me-1"></i> Balas Pesan
                            </button>
                        @endif
                        
                        <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn btn-primary w-100">
                            <i class="fas fa-envelope me-1"></i> Kirim Email
                        </a>
                        
                        @if($message->phone)
                            <a href="https://wa.me/{{ ltrim($message->phone, '0') }}?text=Halo {{ $message->name }}, terima kasih telah menghubungi kami." target="_blank" class="btn btn-success w-100">
                                <i class="fab fa-whatsapp me-1"></i> Kirim WhatsApp
                            </a>
                        @endif
                        
                        <form action="{{ route('admin.contact.delete', $message->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash me-1"></i> Hapus Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reply Modal -->
@if($message->status !== 'replied')
<div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel">Balas Pesan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.contact.reply', $message->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kepada:</label>
                        <input type="text" class="form-control" value="{{ $message->name }} ({{ $message->email }})" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subjek Asli:</label>
                        <input type="text" class="form-control" value="{{ $message->subject }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pesan Asli:</label>
                        <textarea class="form-control" rows="3" readonly>{{ $message->message }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Balasan Anda: <span class="text-danger">*</span></label>
                        <textarea name="admin_reply" class="form-control" rows="6" placeholder="Tulis balasan Anda di sini..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-paper-plane me-1"></i> Kirim Balasan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection 