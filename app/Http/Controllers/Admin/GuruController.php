<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::latest()->paginate(10);
        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'nip'            => 'nullable|string|max:50|unique:guru,nip',
            'jabatan'        => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'foto'           => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($data);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'nip'            => 'nullable|string|max:50|unique:guru,nip,' . $guru->id,
            'jabatan'        => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'foto'           => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($data);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil dihapus!');
    }
}