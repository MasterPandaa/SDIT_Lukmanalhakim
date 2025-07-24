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

Route::get('/sambutan-kepsek', function () {
    return view('profil.sambutan-kepsek');
})->name('sambutan-kepsek');

Route::get('/kurikulum', function () {
    return view('profil.kurikulum');
})->name('kurikulum');

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

// Admin Panel Routes
Route::prefix('adminpanel')->group(function () {
    // Admin login routes (public)
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');

    // Admin protected routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});
