<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function visiMisi()
    {
        $visiMisi = VisiMisi::first();
        
        if (!$visiMisi) {
            // Create default content if none exists
            $visiMisi = VisiMisi::create([
                'judul_header' => 'Faith is the Light of Life',
                'deskripsi_header' => 'Yuk, jadikan pendidikan agama sebagai panduan hidup untuk masa depan yang lebih bermakna!',
                'visi' => 'Terwujudnya Generasi Unggul yang Qur\'ani, Berakhlaq Mulia, Berprestasi, Peduli, Berbudaya Lingkungan, dan Berwawasan Global.​',
                'misi_items' => VisiMisi::getDefaultMisiItems(),
                'is_active' => true
            ]);
        }
        
        return view('admin.profil.visi-misi.index', compact('visiMisi'));
    }

    public function updateVisiMisi(Request $request)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        $visiMisi = VisiMisi::first();
        
        if (!$visiMisi) {
            $visiMisi = new VisiMisi();
        }

        $visiMisi->visi = $request->visi;
        $visiMisi->misi = $request->misi;
        $visiMisi->save();

        return redirect()->route('admin.profil.visi-misi.index')
            ->with('success', 'Visi dan Misi berhasil diperbarui!');
    }

    public function sambutanKepsek()
    {
        return view('admin.profil.sambutan-kepsek.index');
    }

    public function kurikulum()
    {
        return view('admin.profil.kurikulum.index');
    }

    public function indikatorKelulusan()
    {
        return view('admin.profil.indikator-kelulusan.index');
    }

    public function guruKaryawan()
    {
        return view('admin.profil.guru-karyawan.index');
    }
} 