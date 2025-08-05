# Implementasi Sambutan Kepala Sekolah - Admin Panel

## Deskripsi
Implementasi ini menghubungkan konten Sambutan Kepala Sekolah dengan Admin Panel, memungkinkan administrator untuk mengelola konten sambutan melalui interface yang user-friendly.

## Fitur yang Diimplementasikan

### 1. Admin Panel Interface
- **Halaman Admin**: `resources/views/admin/profil/sambutan-kepsek/index.blade.php`
- **Layout Tab**: Menggunakan sistem tab untuk organisasi konten yang rapi
- **Responsive Design**: Konsisten dengan tema dan style Visi Misi

### 2. Form Sections
- **Header Section**: Mengelola judul, subtitle, dan tahun berdiri
- **Content Section**: Mengelola isi sambutan kepala sekolah
- **Media Section**: Upload foto kepala sekolah dan set URL video
- **Settings Section**: Informasi halaman dan panduan penggunaan

### 3. Controller
- **File**: `app/Http/Controllers/Admin/SambutanKepsekController.php`
- **Method**: `index()` dan `update()`
- **Validation**: Validasi berdasarkan tipe update (header, content, media)
- **File Upload**: Handling upload foto dengan validasi dan preview

### 4. Model
- **File**: `app/Models/SambutanKepsek.php`
- **Accessor**: `foto_kepsek_url` dan `foto_kepsek2_url`
- **Fillable**: Semua field yang dapat diisi

### 5. Routes
```php
Route::get('/profil/sambutan-kepsek', [SambutanKepsekController::class, 'index'])->name('admin.profil.sambutan-kepsek');
Route::put('/profil/sambutan-kepsek', [SambutanKepsekController::class, 'update'])->name('admin.profil.sambutan-kepsek.update');
```

### 6. Database
- **Migration**: `2025_07_25_131224_create_sambutan_kepsek_table.php`
- **Seeder**: `SambutanKepsekSeeder.php` dengan data default
- **Fields**:
  - `judul` (string)
  - `subtitle` (string)
  - `sambutan` (text)
  - `video_url` (string, nullable)
  - `tahun_berdiri` (integer)
  - `foto_kepsek` (string, nullable)
  - `foto_kepsek2` (string, nullable)

## Struktur File

### Views
```
resources/views/admin/profil/sambutan-kepsek/
├── index.blade.php
└── partials/
    ├── header-form.blade.php
    ├── content-form.blade.php
    ├── media-form.blade.php
    └── settings-form.blade.php
```

### Controller Methods

#### `index()`
- Mengambil atau membuat data sambutan default
- Menampilkan view dengan data sambutan

#### `update()`
- Menentukan tipe update berdasarkan request
- Validasi sesuai tipe update
- Handle file upload untuk foto
- Update database dan redirect dengan pesan sukses

### Private Methods
- `determineUpdateType()`: Menentukan tipe update
- `validateByUpdateType()`: Validasi berdasarkan tipe
- `handleHeaderUpdate()`: Handle update header
- `handleContentUpdate()`: Handle update content
- `handleMediaUpdate()`: Handle update media
- `handleAllUpdate()`: Handle update semua field
- `getSectionName()`: Mendapatkan nama section

## Data Default

### Sambutan Default
```php
[
    'judul' => 'Mewujudkan Generasi Unggul Berakhlak Mulia',
    'subtitle' => 'Cerdas, Berakhlak, Menginspirasi',
    'sambutan' => 'Assalamu\'alaikum Warrahmatullahi Wabarakatuh...',
    'video_url' => 'https://www.youtube-nocookie.com/embed/jP649ZHA8Tg',
    'tahun_berdiri' => 11
]
```

## Validasi

### Header Section
- `judul`: required, string, max 255
- `subtitle`: required, string, max 255
- `tahun_berdiri`: required, integer, min 1, max 100

### Content Section
- `sambutan`: required, string

### Media Section
- `video_url`: nullable, url
- `foto_kepsek`: nullable, image, mimes: jpeg,png,jpg,gif, max 2MB
- `foto_kepsek2`: nullable, image, mimes: jpeg,png,jpg,gif, max 2MB

## File Upload

### Direktori
- `public/assets/images/sambutan-kepsek/`
- Gambar default: `public/assets/images/default/kepsek-default.jpg`

### Naming Convention
- `{timestamp}_foto_kepsek.{extension}`
- `{timestamp}_foto_kepsek2.{extension}`

### Preview
- Real-time preview saat memilih file
- Menampilkan gambar saat ini jika ada

## Menu Integration

### Admin Layout
```php
<a class="nav-link {{ request()->is('adminpanel/profil/sambutan-kepsek*') ? 'active' : '' }}" 
   href="{{ route('admin.profil.sambutan-kepsek') }}">
    <i class="fas fa-user-tie"></i> Sambutan Kepsek
</a>
```

## JavaScript Features

### Image Preview
```javascript
$('#foto_kepsek').on('change', function() {
    // Preview logic
});
```

### Form Validation
```javascript
$('form').on('submit', function() {
    // Disable button and show loading
});
```

### Tab Switching
```javascript
// Refresh tooltips on tab switch
```

## Catatan Penting

1. **Edit Only**: Hanya dapat mengedit data, tidak dapat create/delete
2. **Data Default**: Data yang ada saat ini adalah data default
3. **Artikel Section**: Section artikel dan majalah terhubung ke menu about/artikel
4. **Image Handling**: Otomatis menghapus gambar lama saat upload yang baru
5. **HTML Support**: Field sambutan mendukung tag HTML untuk formatting

## Testing

### Routes Test
```bash
php artisan route:list | findstr sambutan
```

### Seeder Test
```bash
php artisan db:seed --class=SambutanKepsekSeeder
```

## Dependencies

- Laravel 10+
- Bootstrap 5
- Font Awesome
- jQuery (untuk preview dan form handling)

## Browser Support

- Chrome (recommended)
- Firefox
- Safari
- Edge

## Security

- CSRF protection pada semua form
- File upload validation
- XSS protection dengan escape HTML
- Input sanitization

## Performance

- Lazy loading untuk gambar
- Optimized file upload
- Efficient database queries
- Caching untuk static assets

## Maintenance

### Backup
- Backup database secara berkala
- Backup uploaded images

### Monitoring
- Monitor file upload directory
- Check database performance
- Review error logs

## Future Enhancements

1. **Rich Text Editor**: Implementasi WYSIWYG editor untuk sambutan
2. **Image Cropping**: Fitur crop gambar sebelum upload
3. **Version History**: Tracking perubahan konten
4. **Bulk Operations**: Upload multiple images
5. **API Integration**: REST API untuk mobile app

## Troubleshooting

### Common Issues

1. **Image not displaying**
   - Check file permissions
   - Verify file path
   - Check file exists

2. **Form not submitting**
   - Check CSRF token
   - Verify validation rules
   - Check file size limits

3. **Preview not working**
   - Check JavaScript console
   - Verify jQuery loaded
   - Check file input ID

### Debug Commands
```bash
php artisan config:clear
php artisan view:clear
php artisan route:clear
php artisan cache:clear
```

## Support

Untuk bantuan teknis atau pertanyaan, silakan hubungi tim development atau buat issue di repository. 