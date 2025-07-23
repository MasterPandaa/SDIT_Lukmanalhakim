<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Menampilkan halaman daftar berita
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('blog.index');
    }

    /**
     * Menampilkan halaman detail berita
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function detail($slug)
    {
        // Di implementasi sebenarnya, data berita akan diambil dari database
        // berdasarkan slug yang diberikan
        
        return view('blog.detail');
    }
}
