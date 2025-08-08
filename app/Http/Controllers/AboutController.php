<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\Artikel;
use App\Models\Prestasi;
use App\Models\Ekstrakurikuler;

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
        $fasilitas = [
            [
                'foto' => asset('assets/images/feature/01.png'),
                'nama' => 'Ruang Kelas',
                'deskripsi' => 'Ruang kelas yang nyaman dan dilengkapi fasilitas belajar modern.'
            ],
            [
                'foto' => asset('assets/images/feature/02.png'),
                'nama' => 'Laboratorium',
                'deskripsi' => 'Laboratorium IPA, Komputer, dan Bahasa untuk menunjang pembelajaran.'
            ],
            [
                'foto' => asset('assets/images/feature/03.png'),
                'nama' => 'Perpustakaan',
                'deskripsi' => 'Perpustakaan dengan koleksi buku lengkap dan ruang baca yang nyaman.'
            ],
            [
                'foto' => asset('assets/images/feature/04.png'),
                'nama' => 'Sarana Olahraga',
                'deskripsi' => 'Lapangan olahraga, ruang senam, dan fasilitas pendukung lainnya.'
            ],
            [
                'foto' => asset('assets/images/feature/05.png'),
                'nama' => 'Ruang Ibadah',
                'deskripsi' => 'Mushola yang bersih dan nyaman untuk kegiatan keagamaan.'
            ],
            [
                'foto' => asset('assets/images/feature/06.png'),
                'nama' => 'Ruang Kesehatan',
                'deskripsi' => 'UKS untuk pertolongan pertama dan layanan kesehatan siswa.'
            ],
        ];
        return view('about.fasilitas', compact('fasilitas'));
    }
    public function galeri() {
        $galeri = [
            [
                'foto' => asset('assets/images/galeri/01.jpg'),
                'judul' => 'Test TOEFL',
            ],
            [
                'foto' => asset('assets/images/galeri/02.jpg'),
                'judul' => 'Sholat Jama’ah',
            ],
            [
                'foto' => asset('assets/images/galeri/03.jpg'),
                'judul' => 'Apel Pandu',
            ],
            [
                'foto' => asset('assets/images/galeri/04.jpg'),
                'judul' => 'Tahsin Makhorijul Huruf',
            ],
            [
                'foto' => asset('assets/images/galeri/05.jpg'),
                'judul' => 'Team Work GPH',
            ],
            [
                'foto' => asset('assets/images/galeri/06.jpg'),
                'judul' => 'Upacara Sekolah',
            ],
        ];
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