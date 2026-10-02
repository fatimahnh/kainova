@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h2 class="font-extrabold text-2xl text-kainova-navy">Selamat Datang, Admin!</h2>
    <p class="text-xs text-gray-500">Portal Pengelolaan Utama Sistem Informasi Tekstil KAINOVA</p>
</div>

<!-- Grid Kartu Statistik -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
    <div class="bg-white p-5 rounded-2xl border border-gray-200/80 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Total Produk Kriya</p>
            <h3 class="text-2xl font-black text-kainova-navy mt-1">{{ $totalProduk }}</h3>
        </div>
        <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center">
            <i data-lucide="shopping-bag" class="w-6 h-6"></i>
        </div>
    </div>

    <div class="bg-white p-5 rounded-2xl border border-gray-200/80 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Mitra Program PKL</p>
            <h3 class="text-2xl font-black text-kainova-navy mt-1">{{ $totalPkl }}</h3>
        </div>
        <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center">
            <i data-lucide="briefcase" class="w-6 h-6"></i>
        </div>
    </div>

    <div class="bg-white p-5 rounded-2xl border border-gray-200/80 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Lowongan BKK</p>
            <h3 class="text-2xl font-black text-kainova-navy mt-1">{{ $totalBkk }}</h3>
        </div>
        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
            <i data-lucide="building-2" class="w-6 h-6"></i>
        </div>
    </div>

    <div class="bg-white p-5 rounded-2xl border border-gray-200/80 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Status Portal</p>
            <h3 class="text-base font-bold text-emerald-600 mt-1">Aktif & Sinkron</h3>
        </div>
        <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">
            <i data-lucide="check-circle-2" class="w-6 h-6"></i>
        </div>
    </div>
</div>

<!-- Aksi Cepat / Shortcut Buttons -->
<div class="bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm">
    <h4 class="font-bold text-sm text-kainova-navy mb-4">Aksi Cepat Administrator</h4>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('admin.produk.create') }}" class="p-4 bg-amber-50 hover:bg-amber-100/80 border border-amber-200/60 rounded-xl text-center transition group">
            <i data-lucide="plus-circle" class="w-6 h-6 text-amber-600 mx-auto mb-2 group-hover:scale-110 transition"></i>
            <span class="text-xs font-bold text-amber-900 block">Tambah Produk</span>
        </a>
        <a href="{{ route('admin.pkl.create') }}" class="p-4 bg-orange-50 hover:bg-orange-100/80 border border-orange-200/60 rounded-xl text-center transition group">
            <i data-lucide="building" class="w-6 h-6 text-orange-600 mx-auto mb-2 group-hover:scale-110 transition"></i>
            <span class="text-xs font-bold text-orange-900 block">Tambah Mitra PKL</span>
        </a>
        <a href="#" class="p-4 bg-blue-50 hover:bg-blue-100/80 border border-blue-200/60 rounded-xl text-center transition group">
            <i data-lucide="image" class="w-6 h-6 text-blue-600 mx-auto mb-2 group-hover:scale-110 transition"></i>
            <span class="text-xs font-bold text-blue-900 block">Update Banner</span>
        </a>
        <a href="{{ route('admin.produk.index') }}" class="p-4 bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-xl text-center transition group">
            <i data-lucide="list" class="w-6 h-6 text-gray-600 mx-auto mb-2 group-hover:scale-110 transition"></i>
            <span class="text-xs font-bold text-gray-800 block">Lihat Katalog</span>
        </a>
    </div>
</div>
@endsection