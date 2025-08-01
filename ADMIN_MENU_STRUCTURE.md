# Struktur Menu Admin Dashboard SDIT Lukmanalhakim

## Overview
Dokumentasi ini menjelaskan struktur menu dan organisasi file untuk admin dashboard SDIT Lukmanalhakim.

## Struktur Menu

### 1. Dashboard
- **Path**: `/adminpanel/dashboard`
- **File**: `resources/views/admin/dashboard.blade.php`
- **Fungsi**: Halaman utama dashboard admin

### 2. Website
- **Path**: `/adminpanel/website/*`
- **Sub-menu**:
  - **Home**: `/adminpanel/website/home` → `resources/views/admin/website/home/index.blade.php`
  - **Header**: `/adminpanel/website/header` → `resources/views/admin/website/header/index.blade.php`
  - **Footer**: `/adminpanel/website/footer` → `resources/views/admin/website/footer/index.blade.php`

### 3. Profil
- **Path**: `/adminpanel/profil/*`
- **Sub-menu**:
  - **Visi Misi**: `/adminpanel/profil/visi-misi` → `resources/views/admin/profil/visi-misi/`
  - **Sambutan Kepsek**: `/adminpanel/profil/sambutan-kepsek` → `resources/views/admin/profil/sambutan-kepsek/`
  - **Kurikulum**: `/adminpanel/profil/kurikulum` → `resources/views/admin/profil/kurikulum/`
  - **Indikator Kelulusan**: `/adminpanel/profil/indikator-kelulusan` → `resources/views/admin/profil/indikator-kelulusan/`

### 4. About
- **Path**: `/adminpanel/about/*`
- **Sub-menu**:
  - **Prestasi**: `/adminpanel/about/prestasi` → `resources/views/admin/about/prestasi/`
  - **Ekstrakurikuler**: `/adminpanel/about/ekstrakurikuler` → `resources/views/admin/about/ekstrakurikuler/`
  - **Fasilitas**: `/adminpanel/about/fasilitas` → `resources/views/admin/about/fasilitas/`
  - **Galeri**: `/adminpanel/about/galeri` → `resources/views/admin/about/galeri/`
  - **Alumni**: `/adminpanel/about/alumni` → `resources/views/admin/about/alumni/`
  - **Artikel**: `/adminpanel/about/artikel` → `resources/views/admin/about/artikel/`
  - **Guru**: `/adminpanel/about/guru` → `resources/views/admin/about/guru/`

### 5. Contact
- **Path**: `/adminpanel/contact`
- **File**: `resources/views/admin/contact/index.blade.php`
- **Fungsi**: Pengaturan informasi kontak sekolah

### 6. Log
- **Path**: `/adminpanel/log/*`
- **Sub-menu**:
  - **Log System**: `/adminpanel/log/system` → `resources/views/admin/log/system.blade.php`
  - **Log Database**: `/adminpanel/log/database` → `resources/views/admin/log/database.blade.php`

## Struktur Direktori

```
resources/views/admin/
├── dashboard.blade.php
├── login.blade.php
├── website/
│   ├── home/
│   │   └── index.blade.php
│   ├── header/
│   │   └── index.blade.php
│   └── footer/
│       └── index.blade.php
├── profil/
│   ├── visi-misi/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
│   ├── sambutan-kepsek/
│   │   └── index.blade.php
│   ├── kurikulum/
│   │   ├── index.blade.php
│   │   └── item-form.blade.php
│   └── indikator-kelulusan/
│       ├── index.blade.php
│       ├── create-indikator.blade.php
│       ├── edit-indikator.blade.php
│       ├── create-kategori.blade.php
│       └── edit-kategori.blade.php
├── about/
│   ├── prestasi/
│   │   └── index.blade.php
│   ├── ekstrakurikuler/
│   │   └── index.blade.php
│   ├── fasilitas/
│   │   └── index.blade.php
│   ├── galeri/
│   │   └── index.blade.php
│   ├── alumni/
│   │   ├── index.blade.php
│   │   └── form.blade.php
│   ├── artikel/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
│   └── guru/
│       ├── index.blade.php
│       └── form.blade.php
├── contact/
│   └── index.blade.php
└── log/
    ├── system.blade.php
    └── database.blade.php
```

## Fitur Menu

### Collapsible Submenu
- Setiap menu utama memiliki submenu yang dapat di-collapse
- Menggunakan Bootstrap collapse component
- Icon chevron untuk indikator expand/collapse

### Active State
- Menu aktif ditandai dengan class `active`
- Submenu aktif akan otomatis expand
- Menggunakan `request()->is()` untuk pengecekan route

### Icon
- Setiap menu menggunakan Font Awesome icon
- Icon yang konsisten dan mudah dipahami

## Implementasi

### Layout Admin
File `resources/views/layouts/admin.blade.php` telah diupdate dengan:
- Struktur menu yang baru
- Collapsible submenu
- Active state management
- Responsive design

### Routes
Perlu ditambahkan route baru untuk setiap menu:
```php
// Website routes
Route::get('/adminpanel/website/home', [WebsiteController::class, 'home'])->name('admin.website.home');
Route::get('/adminpanel/website/header', [WebsiteController::class, 'header'])->name('admin.website.header');
Route::get('/adminpanel/website/footer', [WebsiteController::class, 'footer'])->name('admin.website.footer');

// Profil routes
Route::get('/adminpanel/profil/visi-misi', [ProfilController::class, 'visiMisi'])->name('admin.profil.visi-misi.index');
Route::get('/adminpanel/profil/sambutan-kepsek', [ProfilController::class, 'sambutanKepsek'])->name('admin.profil.sambutan-kepsek');
Route::get('/adminpanel/profil/kurikulum', [ProfilController::class, 'kurikulum'])->name('admin.profil.kurikulum');
Route::get('/adminpanel/profil/indikator-kelulusan', [ProfilController::class, 'indikatorKelulusan'])->name('admin.profil.indikator-kelulusan.index');

// About routes
Route::get('/adminpanel/about/prestasi', [AboutController::class, 'prestasi'])->name('admin.about.prestasi.index');
Route::get('/adminpanel/about/ekstrakurikuler', [AboutController::class, 'ekstrakurikuler'])->name('admin.about.ekstrakurikuler.index');
Route::get('/adminpanel/about/fasilitas', [AboutController::class, 'fasilitas'])->name('admin.about.fasilitas.index');
Route::get('/adminpanel/about/galeri', [AboutController::class, 'galeri'])->name('admin.about.galeri.index');
Route::get('/adminpanel/about/alumni', [AboutController::class, 'alumni'])->name('admin.about.alumni.index');
Route::get('/adminpanel/about/artikel', [AboutController::class, 'artikel'])->name('admin.about.artikel.index');
Route::get('/adminpanel/about/guru', [AboutController::class, 'guru'])->name('admin.about.guru.index');

// Contact route
Route::get('/adminpanel/contact', [ContactController::class, 'index'])->name('admin.contact.index');

// Log routes
Route::get('/adminpanel/log/system', [LogController::class, 'system'])->name('admin.log.system');
Route::get('/adminpanel/log/database', [LogController::class, 'database'])->name('admin.log.database');
```

## Catatan
- Semua file placeholder telah dibuat dengan template dasar
- Struktur menu mengikuti hierarki yang diminta
- File lama telah dipindahkan ke struktur baru
- Perlu implementasi controller dan route untuk setiap menu 