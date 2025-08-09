<?php

namespace App\Http\Controllers;

use App\Models\IndikatorKelulusanKategori;
use App\Models\IndikatorKelulusanSetting;
use Illuminate\Http\Request;

class IndikatorKelulusanController extends Controller
{
    /**
     * Display the graduation indicators page
     */
    public function index()
    {
        // We will provide robust fallbacks so the page never renders empty
        $indikatorKelulusan = null;
        $kategoris = collect();
        $totalIndikators = 0;

        // Try to load from database if models exist
        try {
            if (class_exists(\App\Models\IndikatorKelulusanSetting::class)) {
                // Prefer a getActive() helper if available, otherwise take the first record
                if (method_exists(\App\Models\IndikatorKelulusanSetting::class, 'getActive')) {
                    $indikatorKelulusan = \App\Models\IndikatorKelulusanSetting::getActive();
                } else {
                    $indikatorKelulusan = \App\Models\IndikatorKelulusanSetting::query()->first();
                }
            }

            if (class_exists(\App\Models\IndikatorKelulusanKategori::class)) {
                // Try to pull active categories with their active indicators and correct ordering
                try {
                    $kategoris = \App\Models\IndikatorKelulusanKategori::query()
                        ->when(method_exists(\App\Models\IndikatorKelulusanKategori::class, 'scopeActive'), function ($q) {
                            return $q->active();
                        })
                        ->with(['activeIndikators'])
                        ->when(method_exists(\App\Models\IndikatorKelulusanKategori::class, 'scopeOrdered'), function ($q) {
                            return $q->ordered();
                        })
                        ->get();
                } catch (\Throwable $e) {
                    // If relations/scopes are not available, fallback to all
                    $kategoris = \App\Models\IndikatorKelulusanKategori::all();
                }
            }

            if ($kategoris instanceof \Illuminate\Support\Collection && $kategoris->isNotEmpty()) {
                $totalIndikators = $kategoris->sum(function ($kategori) {
                    // Support both relation collection and array fallback
                    if (isset($kategori->activeIndikators)) {
                        return is_array($kategori->activeIndikators)
                            ? count($kategori->activeIndikators)
                            : (method_exists($kategori->activeIndikators, 'count') ? $kategori->activeIndikators->count() : 0);
                    }
                    return 0;
                });
            }
        } catch (\Throwable $e) {
            // Ignore and use fallback below
        }

        // Build placeholder content when DB is empty or models are missing
        if (!$indikatorKelulusan) {
            $indikatorKelulusan = (object) [
                'judul_utama' => '100 Indikator Kelulusan',
                'judul_header' => "Target sekolah untuk menghafal 10 juz Al-Qur'an menjadi motivasi bagi orang tua.",
                'deskripsi_header' => 'Program indikator kelulusan yang komprehensif untuk mengukur pencapaian siswa.',
                'nama_pembicara' => 'Rohmat Sunaryo',
                'video_url' => 'https://www.youtube.com/embed/rVzgmeZ3uYg?si=8WVqbZjyTAMas1q-',
                'kategori_tags' => ['Unggul', 'Islami', 'Berprestasi'],
                'gambar_header_url' => asset('assets/images/pageheader/02.jpg'),
                'foto_pembicara_url' => asset('assets/images/pageheader/03.jpg'),
                'is_active' => true,
            ];
        }

        if (!$kategoris || ($kategoris instanceof \Illuminate\Support\Collection && $kategoris->isEmpty())) {
            $fallbackKategoris = [
                (object) [
                    'id' => 1,
                    'nama' => "Al-Qur'an",
                    'activeIndikators' => [
                        (object) ['judul' => 'Hafalan Juz 30', 'durasi' => ''],
                        (object) ['judul' => 'Tajwid Dasar', 'durasi' => ''],
                        (object) ['judul' => 'Tilawah Harian', 'durasi' => ''],
                    ],
                ],
                (object) [
                    'id' => 2,
                    'nama' => 'Ibadah & Akhlak',
                    'activeIndikators' => [
                        (object) ['judul' => 'Shalat 5 Waktu Tepat Waktu', 'durasi' => ''],
                        (object) ['judul' => 'Adab Terhadap Guru & Teman', 'durasi' => ''],
                    ],
                ],
                (object) [
                    'id' => 3,
                    'nama' => 'Akademik',
                    'activeIndikators' => [
                        (object) ['judul' => 'Matematika Dasar', 'durasi' => ''],
                        (object) ['judul' => 'Bahasa Indonesia', 'durasi' => ''],
                        (object) ['judul' => 'Sains Terpadu', 'durasi' => ''],
                    ],
                ],
            ];
            $kategoris = collect($fallbackKategoris);
            $totalIndikators = $kategoris->sum(function ($k) { return count($k->activeIndikators); });
        }

        return view('profil.indikator-kelulusan', compact('indikatorKelulusan', 'kategoris', 'totalIndikators'));
    }
}