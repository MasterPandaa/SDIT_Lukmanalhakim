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
        // Strictly use database content so it is fully manageable from Admin
        $indikatorKelulusan = IndikatorKelulusanSetting::query()->first();

        // Fetch all categories ordered and eager-load active indicators
        // We don't fall back to hardcoded content to keep admin as single source of truth
        $kategoris = IndikatorKelulusanKategori::query()
            ->active()
            ->ordered()
            ->with(['activeIndikators'])
            ->get();

        // Compute total active indicators for simple stats display (optional in view)
        $totalIndikators = $kategoris->sum(function ($kategori) {
            return $kategori->activeIndikators->count();
        });

        // Minimal header fallback so page still renders if setting not yet created
        if (!$indikatorKelulusan) {
            $indikatorKelulusan = (object) [
                'judul_utama' => '100 Indikator Kelulusan',
                'judul_header' => "Target sekolah untuk menghafal 10 juz Al-Qur'an menjadi motivasi bagi orang tua.",
                'deskripsi_header' => 'Program indikator kelulusan yang komprehensif untuk mengukur pencapaian siswa.',
                'nama_pembicara' => null,
                'video_url' => null,
                'kategori_tags' => [],
                'gambar_header_url' => asset('assets/images/pageheader/02.jpg'),
                'foto_pembicara_url' => null,
                'is_active' => true,
            ];
        }

        return view('profil.indikator-kelulusan', compact('indikatorKelulusan', 'kategoris', 'totalIndikators'));
    }
}