<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Debug: Check all articles first
        $allArticles = Artikel::all();
        $activeArticles = Artikel::where('is_active', true)->get();
        $publishedArticles = Artikel::published()->get();
        
        // For now, show all active articles regardless of published_at
        $artikels = Artikel::where('is_active', true)
                          ->orderBy('created_at', 'desc')
                          ->paginate(9);
        
        // Add debug info to view
        $debug = [
            'total_articles' => $allArticles->count(),
            'active_articles' => $activeArticles->count(),
            'published_articles' => $publishedArticles->count(),
            'showing_articles' => $artikels->count()
        ];
        
        return view('blog.index', compact('artikels', 'debug'));
    }

    public function show($slug)
    {
        // More flexible: check active first, then published
        $artikel = Artikel::where('slug', $slug)
                         ->where('is_active', true)
                         ->firstOrFail();
        
        // Get related articles (same category or recent articles)
        $relatedArticles = Artikel::where('is_active', true)
            ->where('id', '!=', $artikel->id)
            ->where(function($query) use ($artikel) {
                $query->where('kategori', $artikel->kategori)
                      ->orWhereNull('kategori');
            })
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
            
        return view('blog.detail', compact('artikel', 'relatedArticles'));
    }
}
