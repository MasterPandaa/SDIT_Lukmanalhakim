<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }
}
