<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SambutanKepsek;
use App\Models\Kurikulum;

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

        // Credentials from .env (with sensible fallback to hard-coded)
        $envUsername = env('ADMIN_USERNAME', 'adminsdit');
        $envPasswordHash = env('ADMIN_PASSWORD_HASH');
        $fallbackPassword = 'admin123';

        $passwordOk = false;
        if (!empty($envPasswordHash)) {
            $passwordOk = \Illuminate\Support\Facades\Hash::check($credentials['password'], $envPasswordHash);
        } else {
            $passwordOk = ($credentials['password'] === $fallbackPassword);
        }

        if ($credentials['username'] === $envUsername && $passwordOk) {
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

    /**
     * Show change password form
     */
    public function changePasswordForm()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('admin.password.edit');
    }

    /**
     * Handle password update
     */
    public function changePasswordUpdate(\Illuminate\Http\Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $envUsername = env('ADMIN_USERNAME', 'adminsdit');
        $envPasswordHash = env('ADMIN_PASSWORD_HASH');
        $fallbackPassword = 'admin123';

        // Verify current password
        $currentOk = false;
        if (!empty($envPasswordHash)) {
            $currentOk = \Illuminate\Support\Facades\Hash::check($request->current_password, $envPasswordHash);
        } else {
            $currentOk = ($request->current_password === $fallbackPassword);
        }

        if (!$currentOk) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
        }

        // Update .env with new hash
        $newHash = \Illuminate\Support\Facades\Hash::make($request->new_password);
        $this->updateEnvFile('ADMIN_PASSWORD_HASH', $newHash);

        return redirect()->route('admin.password.edit')->with('success', 'Password berhasil diperbarui.');
    }

    /**
     * Update a single key in the .env file
     */
    private function updateEnvFile($key, $value)
    {
        $path = base_path('.env');
        if (!file_exists($path)) return;
        $content = file_get_contents($path);
        $value = str_replace('"', '"', $value);
        if (strpos($content, $key.'=') !== false) {
            $content = preg_replace('/^'.preg_quote($key, '/').'=.*/m', $key.'="'.addcslashes($value, '"').'"', $content);
        } else {
            $content .= "\n".$key.'="'.addcslashes($value, '"').'"';
        }
        file_put_contents($path, $content);
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
            'tahun_berdiri' => 'required|integer|min:1|max:100',
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
        $sambutan->video_url = $this->cleanVideoUrl($request->video_url);
        $sambutan->tahun_berdiri = $request->tahun_berdiri;

        if ($request->hasFile('foto_kepsek')) {
            if ($sambutan->foto_kepsek && file_exists(public_path('assets/images/sambutan-kepsek/' . $sambutan->foto_kepsek))) {
                unlink(public_path('assets/images/sambutan-kepsek/' . $sambutan->foto_kepsek));
            }
            $foto = $request->file('foto_kepsek');
            $fotoName = time() . '_foto_kepsek.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('assets/images/sambutan-kepsek'), $fotoName);
            $sambutan->foto_kepsek = $fotoName;
        }

        if ($request->hasFile('foto_kepsek2')) {
            if ($sambutan->foto_kepsek2 && file_exists(public_path('assets/images/sambutan-kepsek/' . $sambutan->foto_kepsek2))) {
                unlink(public_path('assets/images/sambutan-kepsek/' . $sambutan->foto_kepsek2));
            }
            $foto2 = $request->file('foto_kepsek2');
            $fotoName2 = time() . '_foto_kepsek2.' . $foto2->getClientOriginalExtension();
            $foto2->move(public_path('assets/images/sambutan-kepsek'), $fotoName2);
            $sambutan->foto_kepsek2 = $fotoName2;
        }

        $sambutan->save();

        return redirect()->back()->with('success', 'Sambutan Kepala Sekolah berhasil diperbarui');
    }

    /**
     * Clean and validate YouTube URL
     */
    private function cleanVideoUrl($url)
    {
        if (empty($url)) {
            return null;
        }

        // If already in embed format, return as is
        if (strpos($url, '/embed/') !== false) {
            return $url;
        }

        // Extract video ID from various YouTube URL formats
        $videoId = null;
        
        // Format: https://www.youtube.com/watch?v=VIDEO_ID
        if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }
        // Format: https://youtu.be/VIDEO_ID
        elseif (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }
        // Format: https://www.youtube.com/embed/VIDEO_ID
        elseif (preg_match('/youtube\.com\/embed\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }
        // Format: https://www.youtube-nocookie.com/embed/VIDEO_ID
        elseif (preg_match('/youtube-nocookie\.com\/embed\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }

        if ($videoId) {
            // Return embed URL with privacy-enhanced mode
            return "https://www.youtube-nocookie.com/embed/{$videoId}?rel=0&modestbranding=1";
        }

        // If no video ID found, return original URL
        return $url;
    }
}