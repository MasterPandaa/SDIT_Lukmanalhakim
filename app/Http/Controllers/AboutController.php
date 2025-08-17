<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\Artikel;
use App\Models\Prestasi;
use App\Models\Ekstrakurikuler;
use App\Models\Fasilitas;
use App\Models\Galeri;

class AboutController extends Controller
{
    public function prestasi(Request $request) {
        $q = trim($request->get('q', ''));
        $tahun = $request->get('tahun');

        $query = Prestasi::active()->ordered();

        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('judul', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%")
                    ->orWhere('peraih', 'like', "%{$q}%")
                    ->orWhere('penyelenggara', 'like', "%{$q}%")
                    ->orWhere('tingkat', 'like', "%{$q}%");
            });
        }

        if ($tahun) {
            $query->whereYear('tanggal', $tahun);
        }

        $prestasi = $query->paginate(12)->appends($request->query());

        // Distinct options (only years kept for dropdown)
        $years = Prestasi::active()
            ->whereNotNull('tanggal')
            ->selectRaw('YEAR(tanggal) as tahun')
            ->distinct()->orderBy('tahun', 'desc')
            ->pluck('tahun');

        if ($request->ajax()) {
            $html = view('about.partials.prestasi_list', compact('prestasi'))->render();
            return response()->json([
                'html' => $html,
                'total' => $prestasi->total(),
            ]);
        }

        return view('about.prestasi', compact('prestasi', 'years', 'q', 'tahun'));
    }

    public function ekstrakurikuler(Request $request) {
        $q = trim($request->get('q', ''));
        $query = Ekstrakurikuler::active()->ordered();

        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('nama', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%");
            });
        }

        $ekstrakurikuler = $query->paginate(12)->appends($request->query());

        if ($request->ajax()) {
            $html = view('about.partials.ekstrakurikuler_list', compact('ekstrakurikuler'))->render();
            return response()->json([
                'html' => $html,
                'total' => $ekstrakurikuler->total(),
            ]);
        }

        return view('about.ekstrakurikuler', compact('ekstrakurikuler', 'q'));
    }

    public function fasilitas(Request $request) {
        $q = trim($request->get('q', ''));
        $query = Fasilitas::active()->ordered();

        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('nama', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%")
                    ->orWhere('kategori', 'like', "%{$q}%");
            });
        }

        $fasilitas = $query->paginate(12)->appends($request->query());

        if ($request->ajax()) {
            $html = view('about.partials.fasilitas_list', compact('fasilitas'))->render();
            return response()->json([
                'html' => $html,
                'total' => $fasilitas->total(),
            ]);
        }

        return view('about.fasilitas', compact('fasilitas', 'q'));
    }
    public function galeri(Request $request) {
        $q = trim($request->get('q', ''));
        $query = Galeri::active()->ordered();

        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('judul', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%");
            });
        }

        $galeri = $query->paginate(12)->appends($request->query());

        if ($request->ajax()) {
            $html = view('about.partials.galeri_list', compact('galeri'))->render();
            return response()->json([
                'html' => $html,
                'total' => $galeri->total(),
            ]);
        }

        return view('about.galeri', compact('galeri', 'q'));
    }
    public function alumni(Request $request) {
        $q = trim($request->get('q', ''));
        $query = Alumni::where('is_active', true)
            ->orderBy('tahun_lulus', 'desc')
            ->orderBy('created_at', 'desc');

        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('nama', 'like', "%{$q}%")
                    ->orWhere('tahun_lulus', 'like', "%{$q}%")
                    ->orWhere('pendidikan_lanjutan', 'like', "%{$q}%")
                    ->orWhere('pekerjaan', 'like', "%{$q}%")
                    ->orWhere('prestasi', 'like', "%{$q}%")
                    ->orWhere('testimoni', 'like', "%{$q}%");
            });
        }

        $alumni = $query->paginate(12)->appends($request->query());

        if ($request->ajax()) {
            $html = view('about.partials.alumni_list', compact('alumni'))->render();
            return response()->json([
                'html' => $html,
                'total' => $alumni->total(),
            ]);
        }

        return view('about.alumni', compact('alumni', 'q'));
    }
    public function artikel(Request $request) {
        $q = trim($request->get('q', ''));
        $query = Artikel::published()->orderBy('published_at', 'desc');

        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('judul', 'like', "%{$q}%")
                    ->orWhere('ringkasan', 'like', "%{$q}%")
                    ->orWhere('konten', 'like', "%{$q}%")
                    ->orWhere('penulis', 'like', "%{$q}%")
                    ->orWhere('kategori', 'like', "%{$q}%");
            });
        }

        $artikels = $query->paginate(12)->appends($request->query());

        if ($request->ajax()) {
            $html = view('about.partials.artikel_list', compact('artikels'))->render();
            return response()->json([
                'html' => $html,
                'total' => $artikels->total(),
            ]);
        }

        return view('about.artikel', compact('artikels', 'q'));
    }
} 