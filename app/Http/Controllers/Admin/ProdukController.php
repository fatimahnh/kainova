<?php

namespace App\Http\Controllers\Admin; // <-- Diberi \Admin agar namespace-nya sesuai folder

use App\Http\Controllers\Controller; // <-- Wajib di-import karena beda folder
use App\Models\Produk;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // TAMPILKAN SEMUA PRODUK
    public function index()
    {
        $produk = Produk::with('kategori')->latest()->get();
        return view('admin.produk.index', compact('produk'));
    }

    public function show($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);

        return view('admin.produk.show', compact('produk'));
    }

    // FORM TAMBAH PRODUK
    public function create()
    {
        $kategori = KategoriProduk::all();
        return view('admin.produk.create', compact('kategori'));
    }

    // SIMPAN PRODUK BARU
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_produks,id',
            'nama'        => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'harga'       => 'nullable|numeric',
            'ukuran'      => 'required|string|max:100',
            'warna'       => 'nullable|string|max:100',
            'foto_utama'  => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Process Upload Foto ke storage/app/public/produk
        $pathFoto = null;
        if ($request->hasFile('foto_utama')) {
            $pathFoto = $request->file('foto_utama')->store('produk', 'public');
        }

        Produk::create([
            'kategori_id' => $request->kategori_id,
            'nama'        => $request->nama,
            'slug'        => Str::slug($request->nama) . '-' . time(),
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'ukuran'      => $request->ukuran,
            'warna'       => $request->warna,
            'is_unggulan' => $request->has('is_unggulan') ? 1 : 0,
            'foto_utama'  => $pathFoto,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // FORM EDIT PRODUK
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = KategoriProduk::all();
        return view('admin.produk.edit', compact('produk', 'kategori'));
    }

    // UPDATE PRODUK
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'kategori_id' => 'required|exists:kategori_produks,id',
            'nama'        => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'harga'       => 'nullable|numeric',
            'ukuran'      => 'required|string|max:100',
            'warna'       => 'nullable|string|max:100',
            'foto_utama'  => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Update Foto jika ada file baru di-upload
        if ($request->hasFile('foto_utama')) {
            if ($produk->foto_utama && Storage::disk('public')->exists($produk->foto_utama)) {
                Storage::disk('public')->delete($produk->foto_utama);
            }
            $produk->foto_utama = $request->file('foto_utama')->store('produk', 'public');
        }

        $produk->kategori_id = $request->kategori_id;
        $produk->nama        = $request->nama;
        $produk->slug        = Str::slug($request->nama) . '-' . time();
        $produk->deskripsi   = $request->deskripsi;
        $produk->harga       = $request->harga;
        $produk->ukuran      = $request->ukuran;
        $produk->warna       = $request->warna;
        $produk->is_unggulan = $request->has('is_unggulan') ? 1 : 0;
        $produk->save();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // HAPUS PRODUK
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->foto_utama && Storage::disk('public')->exists($produk->foto_utama)) {
            Storage::disk('public')->delete($produk->foto_utama);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }

}