<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // Since we're using Artikel model for blog content, 
    // this model can serve as a facade or we can remove it entirely
    // For now, we'll keep it for backward compatibility
    
    public static function getPublishedArticles()
    {
        return Artikel::published()->orderBy('published_at', 'desc')->get();
    }
    
    public static function getArticleBySlug($slug)
    {
        return Artikel::where('slug', $slug)->published()->first();
    }
}
