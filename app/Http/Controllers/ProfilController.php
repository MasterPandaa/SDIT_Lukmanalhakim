<?php

namespace App\Http\Controllers;

use App\Models\SambutanKepsek;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function sambutanKepsek()
    {
        $sambutan = SambutanKepsek::first();
        return view('profil.sambutan-kepsek', compact('sambutan'));
    }

    public function visiMisi()
    {
        return view('profil.visi-misi');
    }

    public function kurikulum()
    {
        return view('profil.kurikulum');
    }

    public function indikatorKelulusan()
    {
        return view('profil.indikator-kelulusan');
    }
}
