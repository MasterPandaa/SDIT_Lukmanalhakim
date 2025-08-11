<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SambutanKepsek extends Model
{
    protected $table = 'sambutan_kepsek';
    
    protected $fillable = [
        'judul_header',
        'deskripsi_header',
        'sambutan',
        'video_url',
        'tahun_berdiri',
        'foto_kepsek',
        'foto_kedua',
        'is_active'
    ];

    /**
     * Get foto kepsek URL
     */
    public function getFotoKepsekUrlAttribute()
    {
        if (!$this->foto_kepsek) {
            return asset('assets/images/default/kepsek-default.jpg');
        }

        // Jika file ada di public/assets/images, return URL
        if (file_exists(public_path('assets/images/sambutan-kepsek/' . $this->foto_kepsek))) {
            return asset('assets/images/sambutan-kepsek/' . $this->foto_kepsek);
        }

        return asset('assets/images/default/kepsek-default.jpg');
    }



    /**
     * Get foto kedua URL
     */
    public function getFotoKeduaUrlAttribute()
    {
        if (!$this->foto_kedua) {
            return asset('assets/images/default/kepsek-default.jpg');
        }

        // Jika file ada di public/assets/images, return URL
        if (file_exists(public_path('assets/images/sambutan-kepsek/' . $this->foto_kedua))) {
            return asset('assets/images/sambutan-kepsek/' . $this->foto_kedua);
        }

        return asset('assets/images/default/kepsek-default.jpg');
    }

    /**
     * Get video URL in correct embed format
     */
    public function getVideoEmbedUrlAttribute()
    {
        if (!$this->video_url) {
            return null;
        }

        $url = $this->video_url;
        
        // If already in embed format, return as is
        if (strpos($url, '/embed/') !== false) {
            return $url;
        }

        // Extract video ID from various YouTube URL formats
        $videoId = null;
        
        // Format: https://www.youtube.com/watch?v=VIDEO_ID
        if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }
        // Format: https://youtu.be/VIDEO_ID
        elseif (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }
        // Format: https://www.youtube.com/embed/VIDEO_ID
        elseif (preg_match('/youtube\.com\/embed\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }
        // Format: https://www.youtube-nocookie.com/embed/VIDEO_ID
        elseif (preg_match('/youtube-nocookie\.com\/embed\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }

        if ($videoId) {
            // Return embed URL with privacy-enhanced mode
            return "https://www.youtube-nocookie.com/embed/{$videoId}?rel=0&modestbranding=1";
        }

        // If no video ID found, return original URL
        return $url;
    }
} 