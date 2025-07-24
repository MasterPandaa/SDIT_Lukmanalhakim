<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Di sini nantinya akan mengambil data blog dari database
        return view('blog.index');
    }

    public function show($slug)
    {
        // Di sini nantinya akan mengambil detail blog berdasarkan slug dari database
        return view('blog.detail');
    }
}
