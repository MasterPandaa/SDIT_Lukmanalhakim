# Website Settings Management System

## Overview
Sistem manajemen pengaturan website untuk SDIT Luqman Al Hakim yang memungkinkan admin untuk mengelola konten header dan footer website secara dinamis melalui panel admin.

## Fitur Utama

### 1. Header Settings
- **Informasi Kontak**: Telepon dan alamat yang ditampilkan di header
- **Media Sosial**: Link Facebook, Instagram, YouTube, dan Google Maps
- **Logo Website**: Upload dan manajemen logo website
- **Link PSB**: Link pendaftaran siswa baru

### 2. Footer Settings
- **Informasi Footer**: Deskripsi, alamat, telepon, dan email
- **Media Sosial**: Link Facebook, Twitter, LinkedIn, Instagram, dan Pinterest
- **Copyright & Designer**: Teks copyright dan informasi designer
- **Link Cepat**: 6 link yang dapat dikustomisasi
- **Program Footer**: 6 program yang dapat dikustomisasi
- **Berita Footer**: 2 berita terbaru yang dapat dikustomisasi
- **Link Bottom**: 4 link di bagian bawah footer

## Struktur Database

### Tabel: `website_settings`
```sql
-- Header Settings
header_phone (string)
header_address (string)
header_facebook (string)
header_instagram (string)
header_youtube (string)
header_google_map (string)
header_logo (string)
header_psb_link (string)

-- Footer Settings
footer_description (text)
footer_address (string)
footer_phone (string)
footer_email (string)
footer_facebook (string)
footer_twitter (string)
footer_linkedin (string)
footer_instagram (string)
footer_pinterest (string)
footer_copyright_text (string)
footer_designer_text (string)
footer_designer_link (string)

-- Footer Quick Links (6 items)
footer_quick_link_1_text (string)
footer_quick_link_1_url (string)
-- ... sampai footer_quick_link_6

-- Footer Programs (6 items)
footer_program_1_text (string)
footer_program_1_url (string)
-- ... sampai footer_program_6

-- Footer News (2 items)
footer_news_1 (text)
footer_news_2 (text)

-- Footer Bottom Links (4 items)
footer_bottom_link_1_text (string)
footer_bottom_link_1_url (string)
-- ... sampai footer_bottom_link_4
```

## File dan Komponen

### 1. Model
- `app/Models/WebsiteSetting.php` - Model untuk mengelola data website settings

### 2. Controller
- `app/Http/Controllers/Admin/WebsiteSettingController.php` - Controller untuk manajemen settings

### 3. Views
- `resources/views/admin/website/settings/index.blade.php` - Halaman utama settings
- `resources/views/admin/website/settings/partials/header-form.blade.php` - Form header settings
- `resources/views/admin/website/settings/partials/footer-form.blade.php` - Form footer settings

### 4. Routes
```php
// Website Settings Routes
Route::get('/website/settings', [WebsiteSettingController::class, 'index'])->name('admin.website.settings.index');
Route::put('/website/settings/header', [WebsiteSettingController::class, 'updateHeader'])->name('admin.website.settings.updateHeader');
Route::put('/website/settings/footer', [WebsiteSettingController::class, 'updateFooter'])->name('admin.website.settings.updateFooter');
```

### 5. Migration & Seeder
- `database/migrations/2025_08_02_075134_create_website_settings_table.php`
- `database/seeders/WebsiteSettingSeeder.php`

## Cara Penggunaan

### 1. Akses Menu
1. Login ke admin panel
2. Navigasi ke **Website** → **Pengaturan Website**
3. Pilih tab **Header** atau **Footer**

### 2. Mengatur Header
1. Klik tab **Header**
2. Isi informasi kontak (telepon, alamat)
3. Masukkan link media sosial (opsional)
4. Upload logo website (opsional)
5. Set link PSB untuk tombol "DAFTAR"
6. Klik **Simpan Pengaturan Header**

### 3. Mengatur Footer
1. Klik tab **Footer**
2. Isi informasi footer (deskripsi, alamat, telepon, email)
3. Masukkan link media sosial (opsional)
4. Set copyright text dan designer info
5. Isi berita footer (maksimal 2)
6. Konfigurasi link cepat, program, dan bottom links
7. Klik **Simpan Pengaturan Footer**

## Integrasi dengan Frontend

### Header Template
```php
@php
    $websiteSettings = App\Http\Controllers\Admin\WebsiteSettingController::getWebsiteSettings();
@endphp

<!-- Menggunakan data dari database -->
@if($websiteSettings->header_phone)
    <span>{{ $websiteSettings->header_phone }}</span>
@endif
```

### Footer Template
```php
@php
    $websiteSettings = App\Http\Controllers\Admin\WebsiteSettingController::getWebsiteSettings();
@endphp

<!-- Menggunakan data dari database -->
@if($websiteSettings->footer_description)
    <p>{!! nl2br(e($websiteSettings->footer_description)) !!}</p>
@endif

@foreach($websiteSettings->getFooterQuickLinks() as $link)
    <li><a href="{{ $link['url'] }}">{{ $link['text'] }}</a></li>
@endforeach
```

## Helper Methods

### WebsiteSetting Model
- `getSettings()` - Mendapatkan atau membuat settings pertama
- `getHeaderSettings()` - Mendapatkan array header settings
- `getFooterSettings()` - Mendapatkan array footer settings
- `getFooterQuickLinks()` - Mendapatkan array link cepat footer
- `getFooterPrograms()` - Mendapatkan array program footer
- `getFooterNews()` - Mendapatkan array berita footer
- `getFooterBottomLinks()` - Mendapatkan array link bottom footer

## Validasi

### Header Validation
- `header_phone` - string, max 255
- `header_address` - string, max 255
- `header_facebook` - URL, max 255
- `header_instagram` - URL, max 255
- `header_youtube` - URL, max 255
- `header_google_map` - URL, max 255
- `header_psb_link` - URL, max 255
- `header_logo` - image, max 2MB

### Footer Validation
- `footer_description` - string
- `footer_address` - string, max 255
- `footer_phone` - string, max 255
- `footer_email` - email, max 255
- `footer_facebook` - URL, max 255
- `footer_twitter` - URL, max 255
- `footer_linkedin` - URL, max 255
- `footer_instagram` - URL, max 255
- `footer_pinterest` - URL, max 255
- `footer_copyright_text` - string, max 255
- `footer_designer_text` - string, max 255
- `footer_designer_link` - URL, max 255

## Keamanan

1. **Middleware Admin**: Semua route dilindungi dengan middleware admin
2. **Validasi Input**: Semua input divalidasi sebelum disimpan
3. **File Upload**: Logo dibatasi hanya untuk format gambar dan ukuran maksimal 2MB
4. **XSS Protection**: Output di-escape menggunakan `e()` helper

## Backup dan Restore

### Backup Settings
```bash
php artisan tinker
$settings = App\Models\WebsiteSetting::first();
echo json_encode($settings->toArray());
```

### Restore Settings
```bash
php artisan db:seed --class=WebsiteSettingSeeder
```

## Troubleshooting

### 1. Logo tidak muncul
- Pastikan symbolic link storage sudah dibuat: `php artisan storage:link`
- Periksa permission folder storage
- Pastikan file logo ada di `storage/app/public/website/logos/`

### 2. Settings tidak tersimpan
- Periksa log Laravel di `storage/logs/laravel.log`
- Pastikan database connection berfungsi
- Periksa validasi form

### 3. Menu tidak muncul
- Pastikan route sudah terdaftar di `routes/web.php`
- Periksa middleware admin
- Clear cache: `php artisan cache:clear`

## Pengembangan

### Menambah Field Baru
1. Tambah kolom di migration
2. Update model `$fillable`
3. Update controller validation
4. Update form view
5. Update frontend template

### Menambah Section Baru
1. Buat tab baru di view
2. Buat form partial
3. Tambah route dan method controller
4. Update menu admin

## Catatan Penting

1. **Hanya Edit**: Sistem ini hanya untuk mengedit konten, tidak untuk create/delete
2. **Backup Regular**: Lakukan backup settings secara berkala
3. **Testing**: Test semua perubahan di environment development
4. **Performance**: Settings di-cache untuk performa yang lebih baik

## Support

Untuk bantuan teknis atau pertanyaan, hubungi TIM IT SDIT Luqman Al Hakim. 