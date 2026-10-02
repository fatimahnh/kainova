<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    public function index()
    {
        $dokumentasis = Dokumentasi::latest()->paginate(12);
        return view('admin.dokumentasi.index', compact('dokumentasis'));
    }

    public function create()
    {
        return view('admin.dokumentasi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Kegiatan,Fasilitas,Acara,Lainnya',
            'foto' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('dokumentasi', 'public');
        }

        Dokumentasi::create($data);

        return redirect()->route('admin.dokumentasi.index')->with('success', 'Dokumentasi berhasil diunggah.');
    }

    public function edit(Dokumentasi $dokumentasi)
    {
        return view('admin.dokumentasi.edit', compact('dokumentasi'));
    }

    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Kegiatan,Fasilitas,Acara,Lainnya',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($dokumentasi->foto) {
                Storage::disk('public')->delete($dokumentasi->foto);
            }
            $data['foto'] = $request->file('foto')->store('dokumentasi', 'public');
        }

        $dokumentasi->update($data);

        return redirect()->route('admin.dokumentasi.index')->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    public function destroy(Dokumentasi $dokumentasi)
    {
        if ($dokumentasi->foto) {
            Storage::disk('public')->delete($dokumentasi->foto);
        }
        $dokumentasi->delete();

        return redirect()->route('admin.dokumentasi.index')->with('success', 'Dokumentasi berhasil dihapus.');
    }
}