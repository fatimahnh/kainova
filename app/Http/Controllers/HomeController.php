<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Alumni;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil produk terbaru untuk ditampilkan di landing page
        $produkTerbaru = Produk::latest()->take(6)->get();
        $testimoniTerbaru = Alumni::latest()->take(2)->get();
        return view('frontend.home', compact('produkTerbaru', 'testimoniTerbaru'));
    }
}