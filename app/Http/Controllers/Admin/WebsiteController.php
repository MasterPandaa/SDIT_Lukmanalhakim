<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        return view('admin.website.home.index');
    }

    public function header()
    {
        return view('admin.website.header.index');
    }

    public function footer()
    {
        return view('admin.website.footer.index');
    }
} 