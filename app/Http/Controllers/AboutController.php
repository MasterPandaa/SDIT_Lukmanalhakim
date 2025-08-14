<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\Artikel;
use App\Models\Prestasi;
use App\Models\Ekstrakurikuler;
use App\Models\Fasilitas;
use App\Models\Galeri;

class AboutController extends Controller
{
    public function prestasi() {
        $prestasi = Prestasi::active()->ordered()->paginate(12);
        return view('about.prestasi', compact('prestasi'));
    }
    public function ekstrakurikuler() {
        $ekstrakurikuler = Ekstrakurikuler::active()->ordered()->paginate(12);
        return view('about.ekstrakurikuler', compact('ekstrakurikuler'));
    }
    public function fasilitas() {
        $fasilitas = Fasilitas::active()->ordered()->get();
        return view('about.fasilitas', compact('fasilitas'));
    }
    public function galeri() {
        $galeri = Galeri::active()->ordered()->paginate(24);
        return view('about.galeri', compact('galeri'));
    }
    public function alumni() {
        $alumni = Alumni::where('is_active', true)->orderBy('tahun_lulus', 'desc')->get();
        return view('about.alumni', compact('alumni'));
    }
    public function artikel() {
        $artikels = Artikel::where('is_active', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(12);
        
        return view('about.artikel', compact('artikels'));
    }
} 