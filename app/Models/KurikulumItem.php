<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KurikulumItem extends Model
{
    protected $table = 'kurikulum_items';
    
    protected $fillable = [
        'kurikulum_id',
        'judul',
        'deskripsi',
        'gambar',
        'urutan'
    ];

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }
}