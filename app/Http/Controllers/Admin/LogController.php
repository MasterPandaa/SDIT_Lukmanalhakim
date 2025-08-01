<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function system()
    {
        return view('admin.log.system');
    }

    public function database()
    {
        return view('admin.log.database');
    }
} 