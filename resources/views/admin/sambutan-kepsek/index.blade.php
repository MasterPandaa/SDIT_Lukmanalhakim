@extends('layouts.admin')

@section('title', 'Kelola Sambutan Kepala Sekolah')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-user-tie fa-lg text-success me-2"></i>
                    Kelola Sambutan Kepala Sekolah
                </h1>
                <a href="{{ route('sambutan-kepsek') }}" target="_blank" class="btn btn-primary shadow-sm">
                    <i class="fas fa-eye me-2"></i>
                    Lihat Halaman Publik
                </a>
            </div>

            @if(!isset($sambutanKepsek) || !$sambutanKepsek)
                <div class="alert alert-warning alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle fa-lg me-3"></i>
                        <div>
                            <strong>Peringatan!</strong> Data sambutan kepala sekolah tidak dapat dimuat. Silakan coba lagi atau hubungi administrator.
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <!-- Tabs -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <ul class="nav nav-tabs card-header-tabs" id="sambutanKepsekTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="header-tab" data-bs-toggle="tab" data-bs-target="#header" type="button" role="tab">
                                <i class="fas fa-heading me-2"></i>Header
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="testimonials-tab" data-bs-toggle="tab" data-bs-target="#testimonials" type="button" role="tab">
                                <i class="fas fa-comment-dots me-2"></i>Testimonials
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button" role="tab">
                                <i class="fas fa-layer-group me-2"></i>Skills
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="sambutanKepsekTabContent">
                        <!-- Header Section -->
                        <div class="tab-pane fade show active" id="header" role="tabpanel" aria-labelledby="header-tab">
                            @if(isset($sambutanKepsek) && $sambutanKepsek)
                                @include('admin.sambutan-kepsek.partials.header-form')
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                                    <h5>Data tidak tersedia</h5>
                                    <p class="text-muted">Data sambutan kepala sekolah tidak dapat dimuat. Silakan refresh halaman atau hubungi administrator.</p>
                                    <button class="btn btn-primary" onclick="location.reload()">
                                        <i class="fas fa-refresh me-2"></i>Refresh Halaman
                                    </button>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Testimonials Section -->
                        <div class="tab-pane fade" id="testimonials" role="tabpanel" aria-labelledby="testimonials-tab">
                            @if(isset($sambutanKepsek) && $sambutanKepsek)
                                @include('admin.sambutan-kepsek.partials.testimonials-form')
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                                    <h5>Data tidak tersedia</h5>
                                    <p class="text-muted">Data sambutan kepala sekolah tidak dapat dimuat. Silakan refresh halaman atau hubungi administrator.</p>
                                    <button class="btn btn-primary" onclick="location.reload()">
                                        <i class="fas fa-refresh me-2"></i>Refresh Halaman
                                    </button>
                                </div>
                            @endif
                        </div>

                        <!-- Skills Section -->
                        <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                            @if(isset($sambutanKepsek) && $sambutanKepsek)
                                @include('admin.sambutan-kepsek.partials.skills-form')
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                                    <h5>Data tidak tersedia</h5>
                                    <p class="text-muted">Data sambutan kepala sekolah tidak dapat dimuat. Silakan refresh halaman atau hubungi administrator.</p>
                                    <button class="btn btn-primary" onclick="location.reload()">
                                        <i class="fas fa-refresh me-2"></i>Refresh Halaman
                                    </button>
                                </div>
                            @endif
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
.nav-tabs .nav-link {
    color: #6c757d;
    border: none;
    border-bottom: 2px solid transparent;
}

.nav-tabs .nav-link.active {
    color: #28a745;
    background-color: transparent;
    border-bottom: 2px solid #28a745;
}

.nav-tabs .nav-link:hover {
    border-color: transparent;
    color: #28a745;
}

.form-section {
    background-color: #f8f9fa;
    border-radius: 0.35rem;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
}

.form-section h5 {
    color: #495057;
    border-bottom: 2px solid #dee2e6;
    padding-bottom: 0.5rem;
    margin-bottom: 1rem;
}

.custom-file-label::after {
    content: "Browse";
}

.image-preview {
    max-height: 200px;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
    padding: 0.25rem;
    background-color: #fff;
}

.image-preview-container {
    margin-top: 0.5rem;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Check if jQuery is available
    if (typeof $ === 'undefined') {
        console.error('jQuery is not loaded');
        return;
    }
    
    // Initialize tooltips
    try {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    } catch (e) {
        console.warn('Tooltip initialization failed:', e);
    }
    
    // Custom file input
    $('.custom-file-input').on('change', function() {
        try {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        } catch (e) {
            console.error('File input error:', e);
        }
    });
    

    
    // Image preview for foto kepsek
    $('#foto_kepsek').on('change', function() {
        try {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#fotoKepsekPreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        } catch (e) {
            console.error('Foto kepsek preview error:', e);
        }
    });
    
    // Image preview for foto kedua
    $('#foto_kedua').on('change', function() {
        try {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#fotoKeduaPreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        } catch (e) {
            console.error('Foto kedua preview error:', e);
        }
    });
    
    // Form validation
    $('form').on('submit', function() {
        try {
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();
            
            submitBtn.prop('disabled', true);
            submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...');
            
            // Re-enable after 5 seconds if still processing
            setTimeout(function() {
                submitBtn.prop('disabled', false);
                submitBtn.html(originalText);
            }, 5000);
        } catch (e) {
            console.error('Form submission error:', e);
        }
    });
    
    // Tab switching
    var tabElements = document.querySelectorAll('button[data-bs-toggle="tab"]');
    tabElements.forEach(function(tabElement) {
        tabElement.addEventListener('shown.bs.tab', function (e) {
            try {
                // Refresh any components if needed
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                    var tooltip = bootstrap.Tooltip.getInstance(tooltipTriggerEl);
                    if (tooltip) {
                        tooltip.dispose();
                        new bootstrap.Tooltip(tooltipTriggerEl);
                    }
                });
            } catch (e) {
                console.warn('Tab switching error:', e);
            }
        });
    });
});
</script>
@endpush