<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public function index()
    {
        $kategori = KategoriProduk::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        KategoriProduk::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $kategori = KategoriProduk::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}