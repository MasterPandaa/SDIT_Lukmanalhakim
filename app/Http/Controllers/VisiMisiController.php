<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visiMisi = VisiMisi::active()->first();
        
        // Jika tidak ada data aktif, gunakan data default
        if (!$visiMisi) {
            $visiMisi = (object) [
                'judul_header' => 'Faith is the Light of Life',
                'deskripsi_header' => 'Yuk, jadikan pendidikan agama sebagai panduan hidup untuk masa depan yang lebih bermakna!',
                'visi' => 'Terwujudnya Generasi Unggul yang Qur\'ani, Berakhlaq Mulia, Berprestasi, Peduli, Berbudaya Lingkungan, dan Berwawasan Global.​',
                'misi_items' => VisiMisi::getDefaultMisiItems(),
                'gambar_header_url' => asset('assets/images/feature/10.png')
            ];
        }
        
        return view('profil.visi-misi', compact('visiMisi'));
    }
} 