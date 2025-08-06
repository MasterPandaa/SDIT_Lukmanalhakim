<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function sambutanKepsek()
    {
        // Redirect to sambutan kepsek admin index
        return redirect()->route('admin.sambutan-kepsek.index');
    }

    public function kurikulum()
    {
        // Redirect to kurikulum admin index
        return redirect()->route('admin.kurikulum.index');
    }

    public function indikatorKelulusan()
    {
        // Redirect to indikator kelulusan admin index
        return redirect()->route('admin.indikator-kelulusan.index');
    }

    public function guruKaryawan()
    {
        $gurus = Guru::orderBy('jabatan', 'asc')->paginate(10);
        $totalGurus = Guru::count();
        $totalAktif = Guru::where('is_active', true)->count();
        $totalNonAktif = Guru::where('is_active', false)->count();
        
        return view('admin.profil.guru-karyawan.index', compact(
            'gurus', 
            'totalGurus', 
            'totalAktif', 
            'totalNonAktif'
        ));
    }
} 