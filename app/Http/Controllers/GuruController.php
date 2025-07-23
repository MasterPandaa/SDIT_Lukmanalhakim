<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Menampilkan halaman daftar guru
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('guru.index');
    }

    /**
     * Menampilkan halaman detail guru
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function detail($id)
    {
        // Di implementasi sebenarnya, data guru akan diambil dari database
        // berdasarkan ID yang diberikan
        
        return view('guru.detail');
    }
}
