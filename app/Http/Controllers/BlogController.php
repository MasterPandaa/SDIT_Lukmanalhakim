<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $artikels = Artikel::published()->orderBy('published_at', 'desc')->paginate(9);
        return view('blog.index', compact('artikels'));
    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->published()->firstOrFail();
        
        // Get related articles (same category or recent articles)
        $relatedArticles = Artikel::published()
            ->where('id', '!=', $artikel->id)
            ->where(function($query) use ($artikel) {
                $query->where('kategori', $artikel->kategori)
                      ->orWhereNull('kategori');
            })
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();
            
        return view('blog.detail', compact('artikel', 'relatedArticles'));
    }
}
