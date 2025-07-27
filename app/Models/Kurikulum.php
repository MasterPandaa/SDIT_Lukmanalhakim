<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $table = 'kurikulum';
    
    protected $fillable = [
        'judul',
        'subtitle',
        'deskripsi'
    ];

    public function items()
    {
        return $this->hasMany(KurikulumItem::class)->orderBy('urutan', 'asc');
    }
}
