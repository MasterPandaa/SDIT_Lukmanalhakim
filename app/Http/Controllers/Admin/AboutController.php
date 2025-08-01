<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function prestasi()
    {
        return view('admin.about.prestasi.index');
    }

    public function ekstrakurikuler()
    {
        return view('admin.about.ekstrakurikuler.index');
    }

    public function fasilitas()
    {
        return view('admin.about.fasilitas.index');
    }

    public function galeri()
    {
        return view('admin.about.galeri.index');
    }

    public function alumni()
    {
        return view('admin.about.alumni.index');
    }

    public function artikel()
    {
        return view('admin.about.artikel.index');
    }

    public function guru()
    {
        return view('admin.about.guru.index');
    }
} 