<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $fillable = [
        'nama',
        'foto',
        'tahun_lulus',
        'pendidikan_lanjutan',
        'pekerjaan',
        'prestasi',
        'testimoni',
        'is_active'
    ];
}
