<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>{{ $kurikulum->judul ?? 'Kurikulum' }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Profil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $kurikulum->judul ?? 'Kurikulum' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
