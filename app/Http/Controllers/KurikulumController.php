<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    /**
     * Menampilkan halaman kurikulum
     */
    public function index()
    {
        try {
            $kurikulum = Kurikulum::with('items')->first();
            return view('profil.kurikulum', compact('kurikulum'));
        } catch (\Exception $e) {
            // Jika terjadi error (misalnya tabel belum ada)
            return view('profil.kurikulum', ['kurikulum' => null]);
        }
    }
}