<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SambutanKepsek extends Model
{
    protected $table = 'sambutan_kepsek';
    
    protected $fillable = [
        'judul',
        'subtitle',
        'sambutan',
        'video_url',
        'tahun_berdiri',
        'foto_kepsek',
        'foto_kepsek2'
    ];
} 