<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Artikel::published();

        // Filter by kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->string('kategori'));
        }

        // Filter by tag (fallback: search in judul, ringkasan, konten)
        if ($request->filled('tag')) {
            $tag = $request->string('tag');
            $query->where(function ($q) use ($tag) {
                $q->where('judul', 'like', "%{$tag}%")
                  ->orWhere('ringkasan', 'like', "%{$tag}%")
                  ->orWhere('konten', 'like', "%{$tag}%");
            });
        }

        // Filter by year and month
        if ($request->filled('year')) {
            $query->whereYear('published_at', (int) $request->input('year'));
        }
        if ($request->filled('month')) {
            $query->whereMonth('published_at', (int) $request->input('month'));
        }

        // Optional search (if provided via query)
        if ($request->filled('search')) {
            $search = $request->string('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('ringkasan', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%");
            });
        }

        $artikels = $query->orderBy('published_at', 'desc')->paginate(9)->appends($request->query());

        // Data for filter bar
        $categories = Artikel::published()
            ->whereNotNull('kategori')
            ->selectRaw('kategori, COUNT(*) as count')
            ->groupBy('kategori')
            ->orderBy('kategori')
            ->get();

        $archives = Artikel::published()
            ->selectRaw('YEAR(published_at) as year, MONTH(published_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->limit(24)
            ->get();

        return view('blog.index', [
            'artikels' => $artikels,
            'categories' => $categories,
            'archives' => $archives,
        ]);
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
