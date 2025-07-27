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

Route::get('/indikator-kelulusan', function () {
    return view('profil.indikator-kelulusan');
})->name('indikator-kelulusan');

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
        Route::put('/kurikulum', [App\Http\Controllers\Admin\KurikulumController::class, 'update'])->name('admin.kurikulum.update');
        Route::post('/kurikulum/item', [App\Http\Controllers\Admin\KurikulumController::class, 'storeItem'])->name('admin.kurikulum.store-item');
        Route::put('/kurikulum/item/{id}', [App\Http\Controllers\Admin\KurikulumController::class, 'updateItem'])->name('admin.kurikulum.update-item');
        Route::delete('/kurikulum/item/{id}', [App\Http\Controllers\Admin\KurikulumController::class, 'destroyItem'])->name('admin.kurikulum.destroy-item');
    });
});
