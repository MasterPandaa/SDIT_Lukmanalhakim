<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SambutanKepsek;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function loginForm()
    {
        // Jika sudah login, redirect ke dashboard
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        
        // Render view login langsung tanpa layout
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Hard-coded admin credentials as requested
        if ($credentials['username'] === 'adminsdit' && $credentials['password'] === 'admin123') {
            // Store admin session
            session([
                'admin_logged_in' => true,
                'admin_name' => 'Administrator SDIT'
            ]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function dashboard()
    {
        // Check if admin is logged in via session
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return view('admin.dashboard');
    }

    public function logout()
    {
        // Remove admin session
        session()->forget(['admin_logged_in', 'admin_name']);
        return redirect()->route('admin.login');
    }

    public function sambutanKepsek()
    {
        $sambutan = SambutanKepsek::first();
        return view('admin.sambutan-kepsek', compact('sambutan'));
    }

    public function updateSambutanKepsek(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'subtitle' => 'required',
            'sambutan' => 'required',
            'video_url' => 'required|url',
            'tahun_berdiri' => 'required|integer',
            'foto_kepsek' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_kepsek2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $sambutan = SambutanKepsek::first();
        if (!$sambutan) {
            $sambutan = new SambutanKepsek();
        }

        $sambutan->judul = $request->judul;
        $sambutan->subtitle = $request->subtitle;
        $sambutan->sambutan = $request->sambutan;
        $sambutan->video_url = $request->video_url;
        $sambutan->tahun_berdiri = $request->tahun_berdiri;

        if ($request->hasFile('foto_kepsek')) {
            if ($sambutan->foto_kepsek) {
                Storage::delete('public/' . $sambutan->foto_kepsek);
            }
            $foto = $request->file('foto_kepsek');
            $path = $foto->store('sambutan-kepsek', 'public');
            $sambutan->foto_kepsek = $path;
        }

        if ($request->hasFile('foto_kepsek2')) {
            if ($sambutan->foto_kepsek2) {
                Storage::delete('public/' . $sambutan->foto_kepsek2);
            }
            $foto2 = $request->file('foto_kepsek2');
            $path2 = $foto2->store('sambutan-kepsek', 'public');
            $sambutan->foto_kepsek2 = $path2;
        }

        $sambutan->save();

        return redirect()->back()->with('success', 'Sambutan Kepala Sekolah berhasil diperbarui');
    }
} 