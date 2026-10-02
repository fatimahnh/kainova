<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BursaKerja;
use Illuminate\Http\Request;

class BursaKerjaController extends Controller
{
    public function index()
    {
        $bursaKerja = BursaKerja::latest()->paginate(10);
        return view('admin.bkk.index', compact('bursaKerja'));
    }

    public function create()
    {
        return view('admin.bkk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan'   => 'required|string|max:255',
            'posisi'            => 'required|string|max:255',
            'lokasi'            => 'required|string|max:255',
            'rentang_gaji'      => 'nullable|string|max:255',
            'persyaratan'       => 'required|string',
            'batas_pendaftaran' => 'required|date',
            'status'            => 'required|in:Aktif,Tutup',
        ]);

        BursaKerja::create($request->all());

        return redirect()->route('admin.bkk.index')->with('success', 'Lowongan Bursa Kerja berhasil ditambahkan!');
    }

    public function edit(BursaKerja $bkk)
    {
        return view('admin.bkk.edit', compact('bkk'));
    }

    public function update(Request $request, BursaKerja $bkk)
    {
        $request->validate([
            'nama_perusahaan'   => 'required|string|max:255',
            'posisi'            => 'required|string|max:255',
            'lokasi'            => 'required|string|max:255',
            'rentang_gaji'      => 'nullable|string|max:255',
            'persyaratan'       => 'required|string',
            'batas_pendaftaran' => 'required|date',
            'status'            => 'required|in:Aktif,Tutup',
        ]);

        $bkk->update($request->all());

        return redirect()->route('admin.bkk.index')->with('success', 'Lowongan Bursa Kerja berhasil diperbarui!');
    }

    public function destroy(BursaKerja $bkk)
    {
        $bkk->delete();
        return redirect()->route('admin.bkk.index')->with('success', 'Lowongan Bursa Kerja berhasil dihapus!');
    }
}