<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\ProgramPkl;
use App\Models\BursaKerja;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();
        $totalPkl = ProgramPkl::count();
        $totalBkk = BursaKerja::count();

        return view('admin.dashboard', compact('totalProduk', 'totalPkl', 'totalBkk'));
    }
}