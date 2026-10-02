<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\KategoriProduk;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $kategoriSelected = $request->query('kategori');
        $sort = $request->query('sort', 'terbaru'); // Default ke 'terbaru'

        $produk = Produk::with('kategori')
            ->when($kategoriSelected, function ($query) use ($kategoriSelected) {
                return $query->where('kategori_id', $kategoriSelected);
            })
            // Pengondisian Sorting
            ->when($sort, function ($query) use ($sort) {
                switch ($sort) {
                    case 'harga-rendah':
                        return $query->orderBy('harga', 'asc');
                    case 'harga-tinggi':
                        return $query->orderBy('harga', 'desc');
                    case 'terpopuler':
                        return $query->where('is_unggulan', true)->latest();
                    default:
                        return $query->latest();
                }
            })
            ->paginate(12)
            ->withQueryString();

        $kategoriList = KategoriProduk::all();

        return view('frontend.produk.index', compact('produk', 'kategoriList', 'kategoriSelected'));
    }

    public function detail($slug)
    {
        $produk = Produk::with('kategori')->where('slug', $slug)->firstOrFail();
        return view('frontend.produk.detail', compact('produk'));
    }
}
