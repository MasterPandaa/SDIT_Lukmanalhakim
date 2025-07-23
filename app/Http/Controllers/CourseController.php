<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Menampilkan halaman daftar program
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('course.index');
    }

    /**
     * Menampilkan halaman detail program
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function detail($id)
    {
        // Di implementasi sebenarnya, data program akan diambil dari database
        // berdasarkan ID yang diberikan
        
        return view('course.detail');
    }
}
