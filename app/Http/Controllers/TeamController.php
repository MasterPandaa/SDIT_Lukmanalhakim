<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Menampilkan halaman detail tim
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function detail($id)
    {
        // Di implementasi sebenarnya, data tim akan diambil dari database
        // berdasarkan ID yang diberikan
        
        return view('team-single');
    }
}