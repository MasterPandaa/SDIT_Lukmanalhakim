<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function prestasi()
    {
        return redirect()->route('admin.prestasi.index');
    }

    public function ekstrakurikuler()
    {
        return redirect()->route('admin.ekstrakurikuler.index');
    }

    public function fasilitas()
    {
        return redirect()->route('admin.fasilitas.index');
    }

    public function galeri()
    {
        return redirect()->route('admin.galeri.index');
    }

    public function alumni()
    {
        return redirect()->route('admin.alumni.index');
    }

    public function artikel()
    {
        return redirect()->route('admin.artikel.index');
    }

    public function guru()
    {
        return view('admin.about.guru.index');
    }
} 