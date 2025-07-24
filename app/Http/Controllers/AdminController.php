<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
} 