<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::where('is_active', true)->orderBy('jabatan', 'asc')->get();
        return view('guru.index', compact('gurus'));
    }

    public function show($id)
    {
        $guru = Guru::where('is_active', true)->findOrFail($id);
        return view('guru.detail', compact('guru'));
    }
}
