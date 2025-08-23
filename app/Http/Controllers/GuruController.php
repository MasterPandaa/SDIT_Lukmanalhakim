<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\GuruKaryawanSetting;
use App\Models\Alumni;
use App\Models\Artikel;

class GuruController extends Controller
{
    public function index()
    {
        $setting = GuruKaryawanSetting::where('is_active', true)->first();
        $gurus = Guru::where('is_active', true)->orderBy('jabatan', 'asc')->get();
        
        // Get alumni testimonials
        $alumni = Alumni::where('is_active', true)
                       ->whereNotNull('testimoni')
                       ->where('testimoni', '!=', '')
                       ->orderBy('tahun_lulus', 'desc')
                       ->take(3)
                       ->get();
        
        // Get latest 3 articles
        $articles = Artikel::where('is_active', true)
                         ->where('published_at', '<=', now())
                         ->orderBy('published_at', 'desc')
                         ->take(3)
                         ->get();
        
        return view('guru.index', compact('gurus', 'setting', 'alumni', 'articles'));
    }

    public function show($id)
    {
        $guru = Guru::where('is_active', true)->findOrFail($id);
        return view('guru.detail', compact('guru'));
    }
}
