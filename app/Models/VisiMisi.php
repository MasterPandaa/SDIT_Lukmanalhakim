<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisiMisi extends Model
{
    use HasFactory;

    protected $table = 'visi_misi';

    protected $fillable = [
        'judul_header',
        'deskripsi_header',
        'visi',
        'misi_items',
        'gambar_header',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'misi_items' => 'array'
    ];

    // Scope for active content
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get gambar header URL
     */
    public function getGambarHeaderUrlAttribute()
    {
        if (!$this->gambar_header) {
            return asset('assets/images/feature/10.png');
        }

        // Jika file ada di public/assets/images/visi-misi, return URL
        if (file_exists(public_path('assets/images/visi-misi/' . $this->gambar_header))) {
            return asset('assets/images/visi-misi/' . $this->gambar_header);
        }

        return asset('assets/images/feature/10.png');
    }

    /**
     * Get default misi items
     */
    public static function getDefaultMisiItems()
    {
        return [
            [
                'judul' => 'Al Quran​',
                'deskripsi' => 'Menyelenggarakan pendidikan Al Qur\'an yang handal dan integratif.​',
                'icon' => 'icofont-credit-card'
            ],
            [
                'judul' => 'Pendidikan Karakter',
                'deskripsi' => 'Menyelenggarakan pendidikan yang menumbuhkan kesadaran untuk menjadi pribadi yang beriman, bertaqwa, berakhlaq mulia, manidiri, dan bertanggung jawab.​',
                'icon' => 'icofont-light-bulb'
            ],
            [
                'judul' => 'Active Deep Learner',
                'deskripsi' => 'Menyelenggarakan pembelajaran yang menyenangkan, dengan pendekatan ADLX (Active, Deep, Learner, Experience), INTROFLEX (Individualiasi, Interaksi, Observasi, Refleksi) TERPADU (Telaah, Eksplorasi, Rumuskan, Presentasikan, Aplikasikan, Dunia, Ukhrowi)',
                'icon' => 'icofont-graduate'
            ],
            [
                'judul' => 'Prestasi',
                'deskripsi' => 'Menyelenggarakan pembinaan peserta didik secara intensif dan efektif untuk merah prestasi.',
                'icon' => 'icofont-paper-plane'
            ],
            [
                'judul' => 'Budaya',
                'deskripsi' => 'Menyelenggarakan program pelestarian budaya lokal, nasional, dan internasional',
                'icon' => 'icofont-site-map'
            ],
            [
                'judul' => 'Peduli Lingkungan',
                'deskripsi' => 'Menyelenggarakan program yang membangkitkan kepedulian lingkungan secara terpadu',
                'icon' => 'icofont-users-alt-3'
            ]
        ];
    }
} 