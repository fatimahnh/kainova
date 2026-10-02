@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-bold text-xl text-kainova-navy">Detail Produk</h2>
        <p class="text-xs text-gray-500">Informasi lengkap spesifikasi produk</p>
    </div>
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.produk.index') }}" class="px-3.5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs rounded-xl transition flex items-center gap-1.5">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Kembali
        </a>
        <a href="{{ route('admin.produk.edit', $produk->id) }}" class="px-3.5 py-2 bg-amber-100 hover:bg-amber-200 text-amber-800 font-bold text-xs rounded-xl transition flex items-center gap-1.5">
            <i data-lucide="pencil" class="w-4 h-4"></i>
            Edit Produk
        </a>
    </div>
</div>

<div class="bg-white p-6 md:p-8 rounded-2xl border border-gray-200/80 shadow-sm max-w-4xl">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Foto Utama --}}
        <div>
            @if($produk->foto_utama)
                <img src="{{ asset('storage/' . $produk->foto_utama) }}" alt="{{ $produk->nama }}" class="w-full h-64 object-cover rounded-2xl border border-gray-200 shadow-sm">
            @else
                <div class="w-full h-64 bg-gray-100 rounded-2xl border border-gray-200 flex flex-col items-center justify-center text-gray-400">
                    <i data-lucide="image-off" class="w-8 h-8 mb-2"></i>
                    <span class="text-xs font-bold">Tidak Ada Foto</span>
                </div>
            @endif
        </div>

        {{-- Detail Informasi --}}
        <div class="md:col-span-2 space-y-4">
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-1 bg-amber-50 text-kainova-orange font-semibold rounded-lg border border-amber-200/60 text-xs">
                    {{ $produk->kategori->nama ?? 'Tanpa Kategori' }}
                </span>
                @if($produk->is_unggulan)
                    <span class="px-2.5 py-1 bg-amber-100 text-amber-800 font-bold rounded-lg text-xs">⭐ Unggulan</span>
                @endif
            </div>

            <h3 class="font-bold text-2xl text-kainova-navy">{{ $produk->nama }}</h3>
            
            <div class="text-xl font-bold text-kainova-orange">
                Rp {{ number_format($produk->harga ?? 0, 0, ',', '.') }}
            </div>

            <div class="grid grid-cols-2 gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100">
                <div>
                    <span class="text-[10px] text-gray-400 font-bold block uppercase">Ukuran</span>
                    <span class="font-bold text-xs text-gray-800">{{ $produk->ukuran }}</span>
                </div>
                <div>
                    <span class="text-[10px] text-gray-400 font-bold block uppercase">Warna</span>
                    <span class="font-bold text-xs text-gray-800">{{ $produk->warna ?? '-' }}</span>
                </div>
            </div>

            <div>
                <span class="text-[10px] text-gray-400 font-bold block uppercase mb-1">Deskripsi</span>
                <p class="text-xs text-gray-600 leading-relaxed whitespace-pre-line">{{ $produk->deskripsi }}</p>
            </div>
        </div>
    </div>
</div>
@endsection