@extends('layouts.admin')

@section('title', 'Pengaturan Website')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-cogs fa-lg text-success mr-2"></i>
                    Pengaturan Website
                </h1>
                @if(Route::has('admin.website.settings.index'))
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-primary shadow-sm">
                        <i class="fas fa-eye mr-2"></i>
                        Lihat Website
                    </a>
                @else
                    <div class="alert alert-warning mb-0">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Route tidak ditemukan
                    </div>
                @endif
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-lg mr-3"></i>
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
                        <i class="fas fa-exclamation-circle fa-lg mr-3"></i>
                        <div>
                            <strong>Error!</strong> {{ session('error') }}
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if(!isset($settings) || !$settings)
                <div class="alert alert-warning alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle fa-lg mr-3"></i>
                        <div>
                            <strong>Peringatan!</strong> Data pengaturan website tidak dapat dimuat. Silakan coba lagi atau hubungi administrator.
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
                    <ul class="nav nav-tabs card-header-tabs" id="settingsTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="header-tab" data-toggle="tab" href="#header" role="tab">
                                <i class="fas fa-heading mr-2"></i>Header
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="footer-tab" data-toggle="tab" href="#footer" role="tab">
                                <i class="fas fa-shoe-prints mr-2"></i>Footer
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="settingsTabContent">
                        <!-- Header Settings -->
                        <div class="tab-pane fade show active" id="header" role="tabpanel">
                            @if(isset($settings) && $settings)
                                @if(View::exists('admin.website.settings.partials.header-form'))
                                    @include('admin.website.settings.partials.header-form')
                                @else
                                    <div class="alert alert-danger">
                                        <i class="fas fa-exclamation-triangle mr-2"></i>
                                        <strong>Error!</strong> View header form tidak ditemukan.
                                    </div>
                                @endif
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                                    <h5>Data tidak tersedia</h5>
                                    <p class="text-muted">Pengaturan website tidak dapat dimuat. Silakan refresh halaman atau hubungi administrator.</p>
                                    <button class="btn btn-primary" onclick="location.reload()">
                                        <i class="fas fa-refresh mr-2"></i>Refresh Halaman
                                    </button>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Footer Settings -->
                        <div class="tab-pane fade" id="footer" role="tabpanel">
                            @if(isset($settings) && $settings)
                                @if(View::exists('admin.website.settings.partials.footer-form'))
                                    @include('admin.website.settings.partials.footer-form')
                                @else
                                    <div class="alert alert-danger">
                                        <i class="fas fa-exclamation-triangle mr-2"></i>
                                        <strong>Error!</strong> View footer form tidak ditemukan.
                                    </div>
                                @endif
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                                    <h5>Data tidak tersedia</h5>
                                    <p class="text-muted">Pengaturan website tidak dapat dimuat. Silakan refresh halaman atau hubungi administrator.</p>
                                    <button class="btn btn-primary" onclick="location.reload()">
                                        <i class="fas fa-refresh mr-2"></i>Refresh Halaman
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

.logo-preview {
    max-height: 100px;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
    padding: 0.25rem;
    background-color: #fff;
}

.logo-preview-container {
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
        $('[data-toggle="tooltip"]').tooltip();
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
    
    // Logo preview
    $('#header_logo').on('change', function() {
        try {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#logoPreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        } catch (e) {
            console.error('Logo preview error:', e);
        }
    });
    
    // Form validation
    $('form').on('submit', function() {
        try {
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();
            
            submitBtn.prop('disabled', true);
            submitBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...');
            
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
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        try {
            // Refresh any components if needed
            $('[data-toggle="tooltip"]').tooltip('dispose').tooltip();
        } catch (e) {
            console.warn('Tab switching error:', e);
        }
    });
    
    // Auto-save draft (optional feature)
    let autoSaveTimer;
    $('input, textarea').on('input', function() {
        try {
            clearTimeout(autoSaveTimer);
            autoSaveTimer = setTimeout(function() {
                // Auto-save functionality can be added here
                console.log('Auto-save draft...');
            }, 3000);
        } catch (e) {
            console.error('Auto-save error:', e);
        }
    });
});
</script>
@endpush 