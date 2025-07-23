<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TeamController;

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

// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Profil
Route::get('/visi-misi', [ProfilController::class, 'visiMisi'])->name('visi-misi');
Route::get('/sambutan-kepsek', [ProfilController::class, 'sambutanKepsek'])->name('sambutan-kepsek');
Route::get('/kurikulum', [ProfilController::class, 'kurikulum'])->name('kurikulum');
Route::get('/indikator-kelulusan', [ProfilController::class, 'indikatorKelulusan'])->name('indikator-kelulusan');

// Halaman Guru
Route::get('/guru', [GuruController::class, 'index'])->name('guru');
Route::get('/guru/{id}', [GuruController::class, 'detail'])->name('guru.detail');

// Halaman Program/Course
Route::get('/program', [CourseController::class, 'index'])->name('course');
Route::get('/program/{id}', [CourseController::class, 'detail'])->name('course.detail');

// Halaman Blog/Berita
Route::get('/berita', [BlogController::class, 'index'])->name('blog');
Route::get('/berita/{slug}', [BlogController::class, 'detail'])->name('blog-single');

// Halaman Kontak
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak/kirim', [ContactController::class, 'send'])->name('contact.send');

// Halaman Tim
Route::get('/tim/{id}', [TeamController::class, 'detail'])->name('team-single');

// Halaman Error
Route::fallback(function () {
    return view('errors.404');
});
