# Migrasi Upload Gambar dari Storage ke Public/Assets/Images

## Perubahan yang Dilakukan

### 1. Struktur Direktori
Membuat direktori baru di `public/assets/images/` untuk menyimpan gambar:
- `public/assets/images/artikel/` - untuk gambar artikel
- `public/assets/images/alumni/` - untuk foto alumni
- `public/assets/images/sambutan-kepsek/` - untuk foto kepala sekolah
- `public/assets/images/kurikulum/header/` - untuk gambar header kurikulum
- `public/assets/images/kurikulum/items/` - untuk gambar item kurikulum
- `public/assets/images/indikator-kelulusan/` - untuk gambar indikator kelulusan
- `public/assets/images/default/` - untuk gambar default

### 2. Controller yang Diubah
- `app/Http/Controllers/Admin/ArtikelController.php`
- `app/Http/Controllers/AdminController.php`
- `app/Http/Controllers/Admin/AlumniController.php`
- `app/Http/Controllers/Admin/KurikulumController.php`
- `app/Http/Controllers/Admin/IndikatorKelulusanController.php`

### 3. Model yang Diubah
- `app/Models/Artikel.php` - Menambahkan accessor `gambar_url`
- `app/Models/Alumni.php` - Menambahkan accessor `foto_url`
- `app/Models/SambutanKepsek.php` - Menambahkan accessor `foto_kepsek_url` dan `foto_kepsek2_url`
- `app/Models/IndikatorKelulusanSetting.php` - Mengubah accessor untuk menggunakan gambar default
- `app/Models/KurikulumItem.php` - Mengubah accessor untuk menggunakan gambar default
- `app/Models/Kurikulum.php` - Mengubah accessor untuk menggunakan gambar default

### 4. View yang Diubah
- `resources/views/blog/index.blade.php`
- `resources/views/blog/detail.blade.php`
- `resources/views/admin/artikel/index.blade.php`
- `resources/views/admin/artikel/edit.blade.php`
- `resources/views/admin/alumni/index.blade.php`
- `resources/views/admin/alumni/form.blade.php`
- `resources/views/about/alumni.blade.php`
- `resources/views/profil/sambutan-kepsek.blade.php`
- `resources/views/admin/sambutan-kepsek.blade.php`
- `resources/views/admin/kurikulum.blade.php`

## Perubahan Utama

### Dari Storage ke Public/Assets/Images
**Sebelum:**
```php
// Upload
$image->storeAs('public/artikel', $imageName);

// Access
Storage::url($image->gambar)
asset('storage/artikel/' . $artikel->gambar)
```

**Sesudah:**
```php
// Upload
$image->move(public_path('assets/images/artikel'), $imageName);

// Access dengan gambar default
$artikel->gambar_url  // Menggunakan accessor yang otomatis menampilkan gambar default jika kosong
```

### Sistem Gambar Default
Setiap model memiliki accessor yang otomatis menampilkan gambar default jika:
1. Field gambar kosong/null
2. File gambar tidak ditemukan di direktori

**Accessor yang Ditambahkan:**
- `Artikel::gambar_url` → `assets/images/default/artikel-default.jpg`
- `Alumni::foto_url` → `assets/images/default/alumni-default.jpg`
- `SambutanKepsek::foto_kepsek_url` → `assets/images/default/kepsek-default.jpg`
- `SambutanKepsek::foto_kepsek2_url` → `assets/images/default/kepsek-default2.jpg`
- `Kurikulum::gambar_header_url` → `assets/images/default/kurikulum-header-default.jpg`
- `KurikulumItem::gambar_url` → `assets/images/default/kurikulum-item-default.jpg`
- `IndikatorKelulusanSetting::gambar_header_url` → `assets/images/default/indikator-kelulusan-header.jpg`
- `IndikatorKelulusanSetting::foto_pembicara_url` → `assets/images/default/pembicara-default.jpg`

### Keuntungan
1. **Akses Langsung**: Gambar dapat diakses langsung tanpa perlu storage link
2. **Lebih Sederhana**: Tidak perlu menjalankan `php artisan storage:link`
3. **Lebih Mudah**: URL gambar lebih mudah dipahami dan diakses
4. **Kompatibilitas**: Bekerja di semua environment tanpa konfigurasi tambahan
5. **Konsistensi**: Menggunakan struktur yang sama dengan gambar template (`public/assets/images/`)
6. **Gambar Default**: Otomatis menampilkan gambar default jika tidak ada gambar yang diupload

### Cara Akses Gambar
- Artikel: `http://domain.com/assets/images/artikel/nama-file.jpg`
- Alumni: `http://domain.com/assets/images/alumni/nama-file.jpg`
- Sambutan Kepsek: `http://domain.com/assets/images/sambutan-kepsek/nama-file.jpg`
- Kurikulum Header: `http://domain.com/assets/images/kurikulum/header/nama-file.jpg`
- Kurikulum Items: `http://domain.com/assets/images/kurikulum/items/nama-file.jpg`
- Indikator Kelulusan: `http://domain.com/assets/images/indikator-kelulusan/nama-file.jpg`

### Gambar Default
- Artikel: `http://domain.com/assets/images/default/artikel-default.jpg`
- Alumni: `http://domain.com/assets/images/default/alumni-default.jpg`
- Kepsek: `http://domain.com/assets/images/default/kepsek-default.jpg`
- Kurikulum: `http://domain.com/assets/images/default/kurikulum-header-default.jpg`
- Indikator: `http://domain.com/assets/images/default/indikator-kelulusan-header.jpg`

## Catatan Penting
1. Pastikan direktori `public/assets/images/` memiliki permission write
2. File gambar yang sudah ada di storage perlu dipindahkan manual ke direktori yang sesuai
3. Backup data sebelum melakukan migrasi
4. Test upload dan akses gambar setelah migrasi
5. **Tambahkan gambar default** di `public/assets/images/default/` sesuai dengan daftar di `README.md`

## File .gitignore
File `public/assets/images/.gitignore` dibuat untuk mengabaikan file gambar yang diupload tetapi tetap menyimpan struktur direktori. 