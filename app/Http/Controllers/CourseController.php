<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        // Di sini nantinya akan mengambil data program dari database
        return view('course.index');
    }

    public function show($id)
    {
        // Di sini nantinya akan mengambil detail program berdasarkan id dari database
        return view('course.detail');
    }
}
