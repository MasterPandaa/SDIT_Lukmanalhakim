<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profil routes
Route::get('/visi-misi', [App\Http\Controllers\VisiMisiController::class, 'index'])->name('visi-misi');

Route::get('/sambutan-kepsek', [App\Http\Controllers\ProfilController::class, 'sambutanKepsek'])->name('sambutan-kepsek');

Route::get('/kurikulum', [App\Http\Controllers\KurikulumController::class, 'index'])->name('kurikulum');

Route::get('/indikator-kelulusan', [App\Http\Controllers\IndikatorKelulusanController::class, 'index'])->name('indikator-kelulusan');

// Guru routes
Route::get('/guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru');
Route::get('/guru-karyawan', [App\Http\Controllers\GuruController::class, 'index'])->name('guru-karyawan');
Route::get('/guru/{id}', [App\Http\Controllers\GuruController::class, 'show'])->name('guru.detail');

// Program/Course routes - REMOVED: Used hardcoded data without proper model

// Blog routes - REMOVED: Use artikel routes instead

// Contact routes
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak/kirim', [ContactController::class, 'send'])->name('contact.send');

// About Pages
Route::get('/about/prestasi', [App\Http\Controllers\AboutController::class, 'prestasi'])->name('about.prestasi');
Route::get('/about/ekstrakurikuler', [App\Http\Controllers\AboutController::class, 'ekstrakurikuler'])->name('about.ekstrakurikuler');
Route::get('/about/fasilitas', [App\Http\Controllers\AboutController::class, 'fasilitas'])->name('about.fasilitas');
Route::get('/about/galeri', [App\Http\Controllers\AboutController::class, 'galeri'])->name('about.galeri');
Route::get('/about/alumni', [App\Http\Controllers\AboutController::class, 'alumni'])->name('about.alumni');
Route::get('/about/artikel', [App\Http\Controllers\AboutController::class, 'artikel'])->name('about.artikel');
Route::get('/artikel/{slug}', [App\Http\Controllers\AboutController::class, 'showArtikel'])->name('about.artikel.show');

// Admin Panel Routes
Route::prefix('adminpanel')->group(function () {
    // Admin login routes (public)
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');

    // Admin protected routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        // Password Management
        Route::get('/password', [AdminController::class, 'changePasswordForm'])->name('admin.password.edit');
        Route::put('/password', [AdminController::class, 'changePasswordUpdate'])->name('admin.password.update');
        
        // Sambutan Kepsek (moved to profil namespace)

        // Kurikulum Management Routes - Menggunakan Admin/KurikulumController
        Route::get('/kurikulum', [App\Http\Controllers\Admin\KurikulumController::class, 'index'])->name('admin.kurikulum.index');
        Route::put('/kurikulum', [App\Http\Controllers\Admin\KurikulumController::class, 'update'])->name('admin.kurikulum.update');
        Route::post('/kurikulum/toggle-status', [App\Http\Controllers\Admin\KurikulumController::class, 'toggleStatus'])->name('admin.kurikulum.toggle-status');
        Route::get('/kurikulum/item/create', [App\Http\Controllers\Admin\KurikulumController::class, 'createItem'])->name('admin.kurikulum.create-item');
        Route::post('/kurikulum/item', [App\Http\Controllers\Admin\KurikulumController::class, 'storeItem'])->name('admin.kurikulum.store-item');
        Route::get('/kurikulum/item/{id}/edit', [App\Http\Controllers\Admin\KurikulumController::class, 'editItem'])->name('admin.kurikulum.edit-item');
        Route::put('/kurikulum/item/{id}', [App\Http\Controllers\Admin\KurikulumController::class, 'updateItem'])->name('admin.kurikulum.update-item');
        Route::delete('/kurikulum/item/{id}', [App\Http\Controllers\Admin\KurikulumController::class, 'destroyItem'])->name('admin.kurikulum.destroy-item');
        Route::get('/kurikulum/item/{id}/toggle', [App\Http\Controllers\Admin\KurikulumController::class, 'toggleItemStatus'])->name('admin.kurikulum.toggle-item');
        
        // Alumni Management Routes
        Route::get('/alumni', [App\Http\Controllers\Admin\AlumniController::class, 'index'])->name('admin.alumni.index');
        Route::get('/alumni/create', [App\Http\Controllers\Admin\AlumniController::class, 'create'])->name('admin.alumni.create');
        Route::post('/alumni', [App\Http\Controllers\Admin\AlumniController::class, 'store'])->name('admin.alumni.store');
        Route::get('/alumni/{id}/edit', [App\Http\Controllers\Admin\AlumniController::class, 'edit'])->name('admin.alumni.edit');
        Route::put('/alumni/{id}', [App\Http\Controllers\Admin\AlumniController::class, 'update'])->name('admin.alumni.update');
        Route::delete('/alumni/{id}', [App\Http\Controllers\Admin\AlumniController::class, 'destroy'])->name('admin.alumni.destroy');
        Route::post('/alumni/{id}/toggle', [App\Http\Controllers\Admin\AlumniController::class, 'toggleStatus'])->name('admin.alumni.toggle');
        
        // DEPRECATED: Guru Management Routes moved to Profil section
        // All guru CRUD operations are now handled by GuruKaryawanController
        
        // WhatsApp Settings Routes
        Route::get('/whatsapp', [App\Http\Controllers\Admin\WhatsAppController::class, 'index'])->name('admin.whatsapp.index');
        Route::put('/whatsapp', [App\Http\Controllers\Admin\WhatsAppController::class, 'update'])->name('admin.whatsapp.update');
        
        // Artikel Management Routes
        Route::get('/artikel', [App\Http\Controllers\Admin\ArtikelController::class, 'index'])->name('admin.artikel.index');
        Route::get('/artikel/create', [App\Http\Controllers\Admin\ArtikelController::class, 'create'])->name('admin.artikel.create');
        Route::post('/artikel', [App\Http\Controllers\Admin\ArtikelController::class, 'store'])->name('admin.artikel.store');
        Route::get('/artikel/{id}/edit', [App\Http\Controllers\Admin\ArtikelController::class, 'edit'])->name('admin.artikel.edit');
        Route::put('/artikel/{id}', [App\Http\Controllers\Admin\ArtikelController::class, 'update'])->name('admin.artikel.update');
        Route::delete('/artikel/{id}', [App\Http\Controllers\Admin\ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');
        Route::post('/artikel/{id}/toggle', [App\Http\Controllers\Admin\ArtikelController::class, 'toggleStatus'])->name('admin.artikel.toggle');

        // Prestasi Management Routes
        Route::get('/prestasi', [App\Http\Controllers\Admin\PrestasiController::class, 'index'])->name('admin.prestasi.index');
        Route::get('/prestasi/create', [App\Http\Controllers\Admin\PrestasiController::class, 'create'])->name('admin.prestasi.create');
        Route::post('/prestasi', [App\Http\Controllers\Admin\PrestasiController::class, 'store'])->name('admin.prestasi.store');
        Route::get('/prestasi/{prestasi}/edit', [App\Http\Controllers\Admin\PrestasiController::class, 'edit'])->name('admin.prestasi.edit');
        Route::put('/prestasi/{prestasi}', [App\Http\Controllers\Admin\PrestasiController::class, 'update'])->name('admin.prestasi.update');
        Route::delete('/prestasi/{prestasi}', [App\Http\Controllers\Admin\PrestasiController::class, 'destroy'])->name('admin.prestasi.destroy');
        Route::post('/prestasi/{prestasi}/toggle', [App\Http\Controllers\Admin\PrestasiController::class, 'toggleStatus'])->name('admin.prestasi.toggle');

        // Ekstrakurikuler Management Routes
        Route::get('/ekstrakurikuler', [App\Http\Controllers\Admin\EkstrakurikulerController::class, 'index'])->name('admin.ekstrakurikuler.index');
        Route::get('/ekstrakurikuler/create', [App\Http\Controllers\Admin\EkstrakurikulerController::class, 'create'])->name('admin.ekstrakurikuler.create');
        Route::post('/ekstrakurikuler', [App\Http\Controllers\Admin\EkstrakurikulerController::class, 'store'])->name('admin.ekstrakurikuler.store');
        Route::get('/ekstrakurikuler/{ekstrakurikuler}/edit', [App\Http\Controllers\Admin\EkstrakurikulerController::class, 'edit'])->name('admin.ekstrakurikuler.edit');
        Route::put('/ekstrakurikuler/{ekstrakurikuler}', [App\Http\Controllers\Admin\EkstrakurikulerController::class, 'update'])->name('admin.ekstrakurikuler.update');
        Route::delete('/ekstrakurikuler/{ekstrakurikuler}', [App\Http\Controllers\Admin\EkstrakurikulerController::class, 'destroy'])->name('admin.ekstrakurikuler.destroy');
        Route::post('/ekstrakurikuler/{ekstrakurikuler}/toggle', [App\Http\Controllers\Admin\EkstrakurikulerController::class, 'toggleStatus'])->name('admin.ekstrakurikuler.toggle');

        // Fasilitas Management Routes
        Route::get('/fasilitas', [App\Http\Controllers\Admin\FasilitasController::class, 'index'])->name('admin.fasilitas.index');
        Route::get('/fasilitas/create', [App\Http\Controllers\Admin\FasilitasController::class, 'create'])->name('admin.fasilitas.create');
        Route::post('/fasilitas', [App\Http\Controllers\Admin\FasilitasController::class, 'store'])->name('admin.fasilitas.store');
        Route::get('/fasilitas/{fasilitas}/edit', [App\Http\Controllers\Admin\FasilitasController::class, 'edit'])->name('admin.fasilitas.edit');
        Route::put('/fasilitas/{fasilitas}', [App\Http\Controllers\Admin\FasilitasController::class, 'update'])->name('admin.fasilitas.update');
        Route::delete('/fasilitas/{fasilitas}', [App\Http\Controllers\Admin\FasilitasController::class, 'destroy'])->name('admin.fasilitas.destroy');
        Route::post('/fasilitas/{fasilitas}/toggle', [App\Http\Controllers\Admin\FasilitasController::class, 'toggleStatus'])->name('admin.fasilitas.toggle');

        // Galeri Management Routes
        Route::get('/galeri', [App\Http\Controllers\Admin\GaleriController::class, 'index'])->name('admin.galeri.index');
        Route::get('/galeri/create', [App\Http\Controllers\Admin\GaleriController::class, 'create'])->name('admin.galeri.create');
        Route::post('/galeri', [App\Http\Controllers\Admin\GaleriController::class, 'store'])->name('admin.galeri.store');
        Route::get('/galeri/{galeri}/edit', [App\Http\Controllers\Admin\GaleriController::class, 'edit'])->name('admin.galeri.edit');
        Route::put('/galeri/{galeri}', [App\Http\Controllers\Admin\GaleriController::class, 'update'])->name('admin.galeri.update');
        Route::delete('/galeri/{galeri}', [App\Http\Controllers\Admin\GaleriController::class, 'destroy'])->name('admin.galeri.destroy');
        Route::post('/galeri/{galeri}/toggle', [App\Http\Controllers\Admin\GaleriController::class, 'toggleStatus'])->name('admin.galeri.toggle');
        
        // Visi Misi Management Routes (moved to profil namespace)
        
        // Indikator Kelulusan Management Routes
        Route::get('/indikator-kelulusan', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'index'])->name('admin.indikator-kelulusan.index');
        Route::put('/indikator-kelulusan', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'update'])->name('admin.indikator-kelulusan.update');
        Route::put('/indikator-kelulusan/settings', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'updateSettings'])->name('admin.indikator-kelulusan.update-settings');
        Route::get('/indikator-kelulusan/toggle', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'toggleStatus'])->name('admin.indikator-kelulusan.toggle');
        
        // Kategori Management
        Route::get('/indikator-kelulusan/kategori/create', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'createKategori'])->name('admin.indikator-kelulusan.create-kategori');
        Route::post('/indikator-kelulusan/kategori', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'storeKategori'])->name('admin.indikator-kelulusan.store-kategori');
        Route::get('/indikator-kelulusan/kategori/{id}/edit', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'editKategori'])->name('admin.indikator-kelulusan.edit-kategori');
        Route::put('/indikator-kelulusan/kategori/{id}', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'updateKategori'])->name('admin.indikator-kelulusan.update-kategori');
        Route::delete('/indikator-kelulusan/kategori/{id}', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'destroyKategori'])->name('admin.indikator-kelulusan.destroy-kategori');
        Route::get('/indikator-kelulusan/kategori/{id}/toggle', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'toggleKategoriStatus'])->name('admin.indikator-kelulusan.toggle-kategori-status');
        
        // Indikator Management
        Route::get('/indikator-kelulusan/indikator/create', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'createIndikator'])->name('admin.indikator-kelulusan.create-indikator');
        Route::post('/indikator-kelulusan/indikator', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'storeIndikator'])->name('admin.indikator-kelulusan.store-indikator');
        Route::get('/indikator-kelulusan/indikator/{id}/edit', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'editIndikator'])->name('admin.indikator-kelulusan.edit-indikator');
        Route::put('/indikator-kelulusan/indikator/{id}', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'updateIndikator'])->name('admin.indikator-kelulusan.update-indikator');
        Route::delete('/indikator-kelulusan/indikator/{id}', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'destroyIndikator'])->name('admin.indikator-kelulusan.destroy-indikator');
        Route::get('/indikator-kelulusan/indikator/{id}/toggle', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'toggleIndikatorStatus'])->name('admin.indikator-kelulusan.toggle-indikator-status');
        
        // Website Management Routes
        Route::get('/website/home', [App\Http\Controllers\Admin\WebsiteSettingController::class, 'home'])->name('admin.website.home');
        Route::put('/website/home', [App\Http\Controllers\Admin\WebsiteSettingController::class, 'updateHome'])->name('admin.website.home.update');
        
        // Website Settings Routes
        Route::get('/website/settings', [App\Http\Controllers\Admin\WebsiteSettingController::class, 'index'])->name('admin.website.settings.index');
        Route::put('/website/settings/header', [App\Http\Controllers\Admin\WebsiteSettingController::class, 'updateHeader'])->name('admin.website.settings.updateHeader');
        Route::put('/website/settings/footer', [App\Http\Controllers\Admin\WebsiteSettingController::class, 'updateFooter'])->name('admin.website.settings.updateFooter');
        
        // Profil Management Routes
        Route::get('/profil/visi-misi', [App\Http\Controllers\Admin\VisiMisiController::class, 'index'])->name('admin.profil.visi-misi.index');
        Route::put('/profil/visi-misi', [App\Http\Controllers\Admin\VisiMisiController::class, 'update'])->name('admin.profil.visi-misi.update');
        Route::get('/profil/visi-misi/toggle', [App\Http\Controllers\Admin\VisiMisiController::class, 'toggleStatus'])->name('admin.profil.visi-misi.toggle');
        
        Route::get('/profil/sambutan-kepsek', [App\Http\Controllers\Admin\SambutanKepsekController::class, 'index'])->name('admin.profil.sambutan-kepsek.index');
        Route::put('/profil/sambutan-kepsek', [App\Http\Controllers\Admin\SambutanKepsekController::class, 'update'])->name('admin.profil.sambutan-kepsek.update');
        Route::get('/profil/sambutan-kepsek/toggle', [App\Http\Controllers\Admin\SambutanKepsekController::class, 'toggleStatus'])->name('admin.profil.sambutan-kepsek.toggle');
        Route::get('/profil/kurikulum', [App\Http\Controllers\Admin\KurikulumController::class, 'index'])->name('admin.profil.kurikulum');
        Route::get('/profil/indikator-kelulusan', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'index'])->name('admin.profil.indikator-kelulusan.index');
        Route::put('/profil/indikator-kelulusan', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'update'])->name('admin.profil.indikator-kelulusan.update');
        // Guru-Karyawan Management Routes (Settings + CRUD)
        Route::get('/profil/guru-karyawan', [App\Http\Controllers\Admin\GuruKaryawanController::class, 'index'])->name('admin.profil.guru-karyawan.index');
        Route::put('/profil/guru-karyawan', [App\Http\Controllers\Admin\GuruKaryawanController::class, 'update'])->name('admin.profil.guru-karyawan.update');
        Route::get('/profil/guru-karyawan/toggle', [App\Http\Controllers\Admin\GuruKaryawanController::class, 'toggleStatus'])->name('admin.profil.guru-karyawan.toggle');
        
        // Guru CRUD Routes (consolidated under profil/guru-karyawan)
        Route::get('/profil/guru-karyawan/create', [App\Http\Controllers\Admin\GuruKaryawanController::class, 'create'])->name('admin.profil.guru-karyawan.create');
        Route::post('/profil/guru-karyawan', [App\Http\Controllers\Admin\GuruKaryawanController::class, 'store'])->name('admin.profil.guru-karyawan.store');
        Route::get('/profil/guru-karyawan/{id}/edit', [App\Http\Controllers\Admin\GuruKaryawanController::class, 'edit'])->name('admin.profil.guru-karyawan.edit');
        Route::put('/profil/guru-karyawan/{id}', [App\Http\Controllers\Admin\GuruKaryawanController::class, 'updateGuru'])->name('admin.profil.guru-karyawan.update');
        Route::delete('/profil/guru-karyawan/{id}', [App\Http\Controllers\Admin\GuruKaryawanController::class, 'destroy'])->name('admin.profil.guru-karyawan.destroy');
        Route::get('/profil/guru-karyawan/{id}/toggle', [App\Http\Controllers\Admin\GuruKaryawanController::class, 'toggleGuruStatus'])->name('admin.profil.guru-karyawan.guru.toggle');
        
        // About Management Routes (shortcuts/redirections)
        Route::get('/about/prestasi', [App\Http\Controllers\Admin\AboutController::class, 'prestasi'])->name('admin.about.prestasi.index');
        Route::get('/about/ekstrakurikuler', [App\Http\Controllers\Admin\AboutController::class, 'ekstrakurikuler'])->name('admin.about.ekstrakurikuler.index');
        Route::get('/about/fasilitas', [App\Http\Controllers\Admin\AboutController::class, 'fasilitas'])->name('admin.about.fasilitas.index');
        Route::get('/about/galeri', [App\Http\Controllers\Admin\AboutController::class, 'galeri'])->name('admin.about.galeri.index');
        Route::get('/about/alumni', [App\Http\Controllers\Admin\AboutController::class, 'alumni'])->name('admin.about.alumni.index');
        Route::get('/about/artikel', [App\Http\Controllers\Admin\AboutController::class, 'artikel'])->name('admin.about.artikel.index');
        Route::get('/about/guru', [App\Http\Controllers\Admin\AboutController::class, 'guru'])->name('admin.about.guru.index');
        
        // Contact Management Routes
        Route::get('/contact', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('admin.contact.index');
        Route::get('/contact/{id}', [App\Http\Controllers\Admin\ContactController::class, 'show'])->name('admin.contact.show');
        Route::post('/contact/{id}/reply', [App\Http\Controllers\Admin\ContactController::class, 'reply'])->name('admin.contact.reply');
        Route::post('/contact/update-settings', [App\Http\Controllers\Admin\ContactController::class, 'updateSettings'])->name('admin.contact.update-settings');
        Route::delete('/contact/{id}', [App\Http\Controllers\Admin\ContactController::class, 'delete'])->name('admin.contact.delete');
        Route::post('/contact/{id}/mark-read', [App\Http\Controllers\Admin\ContactController::class, 'markAsRead'])->name('admin.contact.mark-read');
        Route::post('/contact/{id}/mark-replied', [App\Http\Controllers\Admin\ContactController::class, 'markAsReplied'])->name('admin.contact.mark-replied');
        
        // Log Management Routes
        Route::get('/log/system', [App\Http\Controllers\Admin\LogController::class, 'system'])->name('admin.log.system');
        Route::get('/log/database', [App\Http\Controllers\Admin\LogController::class, 'database'])->name('admin.log.database');
    });
});
