<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        // Di sini nantinya akan mengambil data guru dari database
        return view('guru.index');
    }

    public function show($id)
    {
        // Di sini nantinya akan mengambil detail guru berdasarkan id dari database
        return view('guru.detail');
    }
}
