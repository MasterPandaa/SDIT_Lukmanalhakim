<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\WebsiteSetting;
use App\Models\SambutanKepsek;
use App\Models\Artikel;
use App\Models\Alumni;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil data guru yang aktif untuk ditampilkan di slider
        $gurus = Guru::where('is_active', true)
                    ->orderBy('jabatan', 'asc')
                    ->limit(8)
                    ->get();
        
        // Ambil pengaturan website untuk homepage (hero, program unggulan, statistik)
        $home = WebsiteSetting::getSettings();
        
        // Ambil data Sambutan Kepsek aktif untuk ditampilkan ulang (testimonials & video)
        $sambutanKepsek = SambutanKepsek::where('is_active', true)->first();

        // Ambil 3 artikel terbaru yang aktif
        $articles = Artikel::where('is_active', true)
                         ->where('published_at', '<=', now())
                         ->orderBy('published_at', 'desc')
                         ->take(3)
                         ->get();

        // Ambil maksimal 9 alumni aktif terbaru (jika <9 maka semua akan tampil)
        $alumni = Alumni::where('is_active', true)
                       ->orderBy('tahun_lulus', 'desc')
                       ->take(9)
                       ->get();
        
        return view('index', compact('gurus', 'home', 'sambutanKepsek', 'articles', 'alumni'));
    }
}
