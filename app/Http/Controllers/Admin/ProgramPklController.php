<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramPkl;
use Illuminate\Http\Request;

class ProgramPklController extends Controller
{
    public function index()
    {
        $programPkl = ProgramPkl::latest()->paginate(10);
        return view('admin.pkl.index', compact('programPkl'));
    }

    public function create()
    {
        return view('admin.pkl.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'lokasi'          => 'required|string|max:255',
            'kuota'           => 'required|integer',
            'deskripsi'       => 'nullable|string',
            'status'          => 'required|in:Buka,Tutup',
        ]);

        ProgramPkl::create($request->all());

        return redirect()->route('admin.pkl.index')->with('success', 'Program PKL berhasil ditambahkan!');
    }

    public function edit(ProgramPkl $pkl)
    {
        return view('admin.pkl.edit', compact('pkl'));
    }

    public function update(Request $request, ProgramPkl $pkl)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'lokasi'          => 'required|string|max:255',
            'kuota'           => 'required|integer',
            'deskripsi'       => 'nullable|string',
            'status'          => 'required|in:Buka,Tutup',
        ]);

        $pkl->update($request->all());

        return redirect()->route('admin.pkl.index')->with('success', 'Program PKL berhasil diperbarui!');
    }

    public function destroy(ProgramPkl $pkl)
    {
        $pkl->delete();
        return redirect()->route('admin.pkl.index')->with('success', 'Program PKL berhasil dihapus!');
    }
}