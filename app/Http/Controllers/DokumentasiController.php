<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil semua kategori unik yang ada di tabel dokumentasi
        $kategoriDokumentasi = Dokumentasi::whereNotNull('kategori')
            ->distinct()
            ->pluck('kategori');

        // 2. Query data dokumentasi
        $query = Dokumentasi::query();

        // 3. Filter berdasarkan kolom kategori jika ada request ?kategori=...
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $dokumentasi = $query->latest()->paginate(9)->withQueryString();

        return view('frontend.dokumentasi', compact('kategoriDokumentasi', 'dokumentasi'));
    }
}
