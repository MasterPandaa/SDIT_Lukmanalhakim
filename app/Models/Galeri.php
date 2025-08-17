<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('judul', 'asc')->orderBy('created_at', 'desc');
    }
}
