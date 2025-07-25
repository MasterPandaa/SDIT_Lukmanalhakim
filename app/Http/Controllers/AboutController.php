<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function prestasi() {
        $prestasi = [
            [
                'foto' => asset('assets/images/achive/01.png'),
                'judul' => 'Juara 1 Lomba Sains Nasional',
                'tanggal' => '11 Jun, 2025',
                'tingkat' => 'Nasional',
                'peraih' => 'Latifa Aulia Rahma',
                'penyelenggara' => 'Universitas Muhammadiyah Malang',
            ],
            [
                'foto' => asset('assets/images/achive/02.png'),
                'judul' => 'Peraih 1 Medali Emas POPDA Hapkido',
                'tanggal' => '11 Jun, 2025',
                'tingkat' => 'Provinsi',
                'peraih' => 'Suryo Prakoso',
                'penyelenggara' => 'POPDA DIY',
            ],
            [
                'foto' => asset('assets/images/achive/01.png'),
                'judul' => 'Juara 3 POPDA Renang 100m',
                'tanggal' => '11 Jun, 2025',
                'tingkat' => 'Provinsi',
                'peraih' => 'Yoga Arif',
                'penyelenggara' => 'POPDA DIY',
            ],
        ];
        return view('about.prestasi', compact('prestasi'));
    }
    public function ekstrakurikuler() {
        $ekstrakurikuler = [
            [
                'foto' => asset('assets/images/category/icon/01.jpg'),
                'nama' => 'Pleton Inti (TONTI)',
            ],
            [
                'foto' => asset('assets/images/category/icon/02.jpg'),
                'nama' => 'Teladan Junior Red Cross (TJRC)',
            ],
            [
                'foto' => asset('assets/images/category/icon/03.jpg'),
                'nama' => 'Teladan Science Club (TSC)',
            ],
            [
                'foto' => asset('assets/images/category/icon/04.jpg'),
                'nama' => 'Teladan Robotic Club (TRC)',
            ],
            [
                'foto' => asset('assets/images/category/icon/05.jpg'),
                'nama' => 'SIGMA (Jurnalistik)',
            ],
            [
                'foto' => asset('assets/images/category/icon/06.jpg'),
                'nama' => 'Nila Pangkaja (Teater)',
            ],
            [
                'foto' => asset('assets/images/category/icon/07.jpg'),
                'nama' => 'Teladan Hiking Association (THA)',
            ],
            [
                'foto' => asset('assets/images/category/icon/08.jpg'),
                'nama' => 'All Nation Teenagers',
            ],
        ];
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
        return view('about.alumni');
    }
    public function artikel() {
        return view('about.artikel');
    }
} 