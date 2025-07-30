<?php

namespace App\Http\Controllers;

use App\Models\IndikatorKelulusanKategori;
use App\Models\IndikatorKelulusanSetting;
use Illuminate\Http\Request;

class IndikatorKelulusanController extends Controller
{
    /**
     * Display the graduation indicators page
     */
    public function index()
    {
        // Get page settings
        $setting = IndikatorKelulusanSetting::getActive();
        
        // Get active categories with their active indicators
        $kategoris = IndikatorKelulusanKategori::active()
            ->with('activeIndikators')
            ->ordered()
            ->get();
        
        // Calculate total indicators
        $totalIndikators = $kategoris->sum(function ($kategori) {
            return $kategori->activeIndikators->count();
        });
        
        return view('profil.indikator-kelulusan', compact('setting', 'kategoris', 'totalIndikators'));
    }
}