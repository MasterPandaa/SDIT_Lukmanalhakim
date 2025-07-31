<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    /**
     * Display a listing of guru.
     */
    public function index()
    {
        $gurus = Guru::orderBy('jabatan', 'asc')->get();
        return view('admin.guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new guru.
     */
    public function create()
    {
        return view('admin.guru.form', [
            'guru' => null,
            'action' => route('admin.guru.store'),
            'method' => 'POST',
            'title' => 'Tambah Guru Baru'
        ]);
    }

    /**
     * Store a newly created guru in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gelar' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'pernyataan_pribadi' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'pengalaman_mengajar' => 'required|integer|min:0',
            'jumlah_siswa' => 'required|integer|min:0',
            'rating' => 'required|integer|min:1|max:5',
            'kemampuan_bahasa' => 'nullable|string',
            'penghargaan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = $request->except(['_token', '_method', 'foto']);
            $data['is_active'] = $request->has('is_active');

            // Handle foto upload
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = 'guru-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('guru', $filename, 'public');
                $data['foto'] = $path;
            }

            Guru::create($data);

            return redirect()->route('admin.guru.index')
                ->with('success', 'Guru berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified guru.
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.form', [
            'guru' => $guru,
            'action' => route('admin.guru.update', $guru->id),
            'method' => 'PUT',
            'title' => 'Edit Guru'
        ]);
    }

    /**
     * Update the specified guru in storage.
     */
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gelar' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'pernyataan_pribadi' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'pengalaman_mengajar' => 'required|integer|min:0',
            'jumlah_siswa' => 'required|integer|min:0',
            'rating' => 'required|integer|min:1|max:5',
            'kemampuan_bahasa' => 'nullable|string',
            'penghargaan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = $request->except(['_token', '_method', 'foto']);
            $data['is_active'] = $request->has('is_active');

            // Handle foto upload
            if ($request->hasFile('foto')) {
                // Delete old foto if exists
                if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                    Storage::disk('public')->delete($guru->foto);
                }

                $file = $request->file('foto');
                $filename = 'guru-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('guru', $filename, 'public');
                $data['foto'] = $path;
            }

            $guru->update($data);

            return redirect()->route('admin.guru.index')
                ->with('success', 'Guru berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified guru from storage.
     */
    public function destroy($id)
    {
        try {
            $guru = Guru::findOrFail($id);

            // Delete foto if exists
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $guru->delete();

            return redirect()->route('admin.guru.index')
                ->with('success', 'Guru berhasil dihapus!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle active status of the specified guru.
     */
    public function toggleStatus($id)
    {
        try {
            $guru = Guru::findOrFail($id);
            $guru->update(['is_active' => !$guru->is_active]);

            $status = $guru->is_active ? 'diaktifkan' : 'dinonaktifkan';
            return redirect()->route('admin.guru.index')
                ->with('success', "Guru berhasil {$status}!");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
} 