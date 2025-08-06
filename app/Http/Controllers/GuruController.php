<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\GuruKaryawanSetting;

class GuruController extends Controller
{
    public function index()
    {
        $setting = GuruKaryawanSetting::where('is_active', true)->first();
        $gurus = Guru::where('is_active', true)->orderBy('jabatan', 'asc')->get();
        return view('guru.index', compact('gurus', 'setting'));
    }

    public function show($id)
    {
        $guru = Guru::where('is_active', true)->findOrFail($id);
        return view('guru.detail', compact('guru'));
    }
}
