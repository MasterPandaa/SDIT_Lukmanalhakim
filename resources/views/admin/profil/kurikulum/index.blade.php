@extends('layouts.admin')

@section('title', 'Kelola Kurikulum')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-graduation-cap fa-lg text-success me-2"></i>
                    Kelola Kurikulum
                </h1>
                <a href="{{ route('kurikulum') }}" target="_blank" class="btn btn-primary shadow-sm">
                    <i class="fas fa-eye me-2"></i>
                    Lihat Halaman Publik
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-lg me-3"></i>
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
                        <i class="fas fa-exclamation-circle fa-lg me-3"></i>
                        <div>
                            <strong>Error!</strong> {{ session('error') }}
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if(!isset($kurikulum) || !$kurikulum)
                <div class="alert alert-warning alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle fa-lg me-3"></i>
                        <div>
                            <strong>Peringatan!</strong> Data kurikulum tidak dapat dimuat. Silakan coba lagi atau hubungi administrator.
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
                    <ul class="nav nav-tabs card-header-tabs" id="kurikulumTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="header-tab" data-bs-toggle="tab" data-bs-target="#header" type="button" role="tab">
                                <i class="fas fa-heading me-2"></i>Header Section
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="items-tab" data-bs-toggle="tab" data-bs-target="#items" type="button" role="tab">
                                <i class="fas fa-list me-2"></i>Item Kurikulum
                            </button>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="kurikulumTabContent">
                        <!-- Header Section -->
                        <div class="tab-pane fade show active" id="header" role="tabpanel" aria-labelledby="header-tab">
                            @if(isset($kurikulum) && $kurikulum)
                                @include('admin.profil.kurikulum.partials.header-form')
                            @endif
                        </div>

                        <!-- Items Section -->
                        <div class="tab-pane fade" id="items" role="tabpanel" aria-labelledby="items-tab">
                            @if(isset($kurikulum) && $kurikulum)
                                @include('admin.profil.kurikulum.partials.items-form')
                            @endif
                        </div>

                        <!-- Settings Section -->

                    </div>
                </div>
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
