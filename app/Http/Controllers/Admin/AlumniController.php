<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::latest()->paginate(10);
        return view('admin.alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('admin.alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'               => 'required|string|max:255',
            'tahun_lulus'        => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'pekerjaan_saat_ini' => 'required|string|max:255',
            'testimoni'          => 'nullable|string',
            'foto'               => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('alumni', 'public');
        }

        Alumni::create($data);

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil ditambahkan!');
    }

    public function edit(Alumni $alumni)
    {
        return view('admin.alumni.edit', compact('alumni'));
    }

    public function update(Request $request, Alumni $alumni)
    {
        $request->validate([
            'nama'               => 'required|string|max:255',
            'tahun_lulus'        => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'pekerjaan_saat_ini' => 'required|string|max:255',
            'testimoni'          => 'nullable|string',
            'foto'               => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($alumni->foto && Storage::disk('public')->exists($alumni->foto)) {
                Storage::disk('public')->delete($alumni->foto);
            }
            $data['foto'] = $request->file('foto')->store('alumni', 'public');
        }

        $alumni->update($data);

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil diperbarui!');
    }

    public function destroy(Alumni $alumni)
    {
        if ($alumni->foto && Storage::disk('public')->exists($alumni->foto)) {
            Storage::disk('public')->delete($alumni->foto);
        }

        $alumni->delete();

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil dihapus!');
    }
}