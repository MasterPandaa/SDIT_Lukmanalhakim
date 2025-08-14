<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlumniController extends Controller
{
    /**
     * Display a listing of alumni.
     */
    public function index()
    {
        $alumni = Alumni::orderBy('tahun_lulus', 'desc')->get();
        return view('admin.about.alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new alumni.
     */
    public function create()
    {
        return view('admin.about.alumni.form', [
            'alumni' => null,
            'action' => route('admin.alumni.store'),
            'method' => 'POST',
            'title' => 'Tambah Alumni Baru'
        ]);
    }

    /**
     * Store a newly created alumni in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer',
            'pendidikan_lanjutan' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'prestasi' => 'nullable|string',
            'testimoni' => 'nullable|string',
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
                $filename = 'alumni-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/alumni'), $filename);
                $data['foto'] = $filename;
            }

            Alumni::create($data);

            return redirect()->route('admin.alumni.index')
                ->with('success', 'Alumni berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified alumni.
     */
    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('admin.about.alumni.form', [
            'alumni' => $alumni,
            'action' => route('admin.alumni.update', $alumni->id),
            'method' => 'PUT',
            'title' => 'Edit Alumni'
        ]);
    }

    /**
     * Update the specified alumni in storage.
     */
    public function update(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer',
            'pendidikan_lanjutan' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'prestasi' => 'nullable|string',
            'testimoni' => 'nullable|string',
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
                if ($alumni->foto && file_exists(public_path('assets/images/alumni/' . $alumni->foto))) {
                    unlink(public_path('assets/images/alumni/' . $alumni->foto));
                }

                $file = $request->file('foto');
                $filename = 'alumni-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/alumni'), $filename);
                $data['foto'] = $filename;
            }

            $alumni->update($data);

            return redirect()->route('admin.alumni.index')
                ->with('success', 'Alumni berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified alumni from storage.
     */
    public function destroy($id)
    {
        try {
            $alumni = Alumni::findOrFail($id);

            // Delete foto if exists
            if ($alumni->foto && file_exists(public_path('assets/images/alumni/' . $alumni->foto))) {
                unlink(public_path('assets/images/alumni/' . $alumni->foto));
            }

            $alumni->delete();

            return redirect()->route('admin.alumni.index')
                ->with('success', 'Alumni berhasil dihapus!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle active status of the specified alumni.
     */
    public function toggleStatus($id)
    {
        try {
            $alumni = Alumni::findOrFail($id);
            $alumni->update(['is_active' => !$alumni->is_active]);

            $status = $alumni->is_active ? 'diaktifkan' : 'dinonaktifkan';
            return redirect()->route('admin.alumni.index')
                ->with('success', "Alumni berhasil {$status}!");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}