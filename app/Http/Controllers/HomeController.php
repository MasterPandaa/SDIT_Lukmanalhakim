<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil data guru yang aktif untuk ditampilkan di slider
        $gurus = Guru::where('is_active', true)
                    ->orderBy('jabatan', 'asc')
                    ->limit(8)
                    ->get();
        
        return view('index', compact('gurus'));
    }
}
