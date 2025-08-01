<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function visiMisi()
    {
        return view('admin.profil.visi-misi.index');
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