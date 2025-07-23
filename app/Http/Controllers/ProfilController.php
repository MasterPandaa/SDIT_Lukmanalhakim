<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Menampilkan halaman visi misi
     *
     * @return \Illuminate\View\View
     */
    public function visiMisi()
    {
        return view('profil.visi-misi');
    }

    /**
     * Menampilkan halaman sambutan kepala sekolah
     *
     * @return \Illuminate\View\View
     */
    public function sambutanKepsek()
    {
        return view('profil.sambutan-kepsek');
    }

    /**
     * Menampilkan halaman kurikulum
     *
     * @return \Illuminate\View\View
     */
    public function kurikulum()
    {
        return view('profil.kurikulum');
    }

    /**
     * Menampilkan halaman indikator kelulusan
     *
     * @return \Illuminate\View\View
     */
    public function indikatorKelulusan()
    {
        return view('profil.indikator-kelulusan');
    }
}
