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

Route::get('/', function () {
    return view('index');
})->name('home');

// Profil routes
Route::get('/visi-misi', function () {
    return view('profil.visi-misi');
})->name('visi-misi');

Route::get('/sambutan-kepsek', [App\Http\Controllers\ProfilController::class, 'sambutanKepsek'])->name('sambutan-kepsek');

Route::get('/kurikulum', [App\Http\Controllers\KurikulumController::class, 'index'])->name('kurikulum');

Route::get('/indikator-kelulusan', [App\Http\Controllers\IndikatorKelulusanController::class, 'index'])->name('indikator-kelulusan');

// Guru routes
Route::get('/guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru');
Route::get('/guru/{id}', [App\Http\Controllers\GuruController::class, 'show'])->name('guru.detail');

// Program/Course routes
Route::get('/program', [App\Http\Controllers\CourseController::class, 'index'])->name('course');
Route::get('/program/{id}', [App\Http\Controllers\CourseController::class, 'show'])->name('course.detail');

// Blog routes
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog-single');

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

// Admin Panel Routes
Route::prefix('adminpanel')->group(function () {
    // Admin login routes (public)
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');

    // Admin protected routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        
        // Sambutan Kepsek
        Route::get('/sambutan-kepsek', [AdminController::class, 'sambutanKepsek'])->name('admin.sambutan-kepsek');
        Route::put('/sambutan-kepsek', [AdminController::class, 'updateSambutanKepsek'])->name('admin.sambutan-kepsek.update');

        // Kurikulum Management Routes - Menggunakan Admin/KurikulumController
        Route::get('/kurikulum', [App\Http\Controllers\Admin\KurikulumController::class, 'index'])->name('admin.kurikulum.index');
        Route::get('/kurikulum', [App\Http\Controllers\Admin\KurikulumController::class, 'index'])->name('admin.kurikulum');
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
        Route::get('/alumni/{id}/toggle', [App\Http\Controllers\Admin\AlumniController::class, 'toggleStatus'])->name('admin.alumni.toggle');
        
        // Artikel Management Routes
        Route::get('/artikel', [App\Http\Controllers\Admin\ArtikelController::class, 'index'])->name('admin.artikel.index');
        Route::get('/artikel/create', [App\Http\Controllers\Admin\ArtikelController::class, 'create'])->name('admin.artikel.create');
        Route::post('/artikel', [App\Http\Controllers\Admin\ArtikelController::class, 'store'])->name('admin.artikel.store');
        Route::get('/artikel/{id}/edit', [App\Http\Controllers\Admin\ArtikelController::class, 'edit'])->name('admin.artikel.edit');
        Route::put('/artikel/{id}', [App\Http\Controllers\Admin\ArtikelController::class, 'update'])->name('admin.artikel.update');
        Route::delete('/artikel/{id}', [App\Http\Controllers\Admin\ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');
        Route::get('/artikel/{id}/toggle', [App\Http\Controllers\Admin\ArtikelController::class, 'toggleStatus'])->name('admin.artikel.toggle');
        
        // Indikator Kelulusan Management Routes
        Route::get('/indikator-kelulusan', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'index'])->name('admin.indikator-kelulusan.index');
        Route::put('/indikator-kelulusan/settings', [App\Http\Controllers\Admin\IndikatorKelulusanController::class, 'updateSettings'])->name('admin.indikator-kelulusan.update-settings');
        
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
    });
});
