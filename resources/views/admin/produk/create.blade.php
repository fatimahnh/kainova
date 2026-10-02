@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-bold text-xl text-kainova-navy">Tambah Produk Baru</h2>
        <p class="text-xs text-gray-500">Lengkapi formulir di bawah ini untuk menambahkan karya produk baru</p>
    </div>
    <a href="{{ route('admin.produk.index') }}" class="px-3.5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs rounded-xl transition flex items-center gap-1.5">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        Kembali
    </a>
</div>

<div class="bg-white p-6 md:p-8 rounded-2xl border border-gray-200/80 shadow-sm max-w-4xl">
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 text-xs rounded-xl">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Kategori Produk <span class="text-red-500">*</span></label>
                <select name="kategori_id" required class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange bg-white">
                    <option value="" selected disabled>-- Pilih Kategori --</option>
                    @foreach($kategori as $item)
                        <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Nama Produk <span class="text-red-500">*</span></label>
                <input type="text" name="nama" required value="{{ old('nama') }}" placeholder="Contoh: Kain Batik Tulis Solo" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Deskripsi Produk <span class="text-red-500">*</span></label>
            <textarea name="deskripsi" rows="4" required placeholder="Tulis deskripsi detail bahan, sejarah motif, atau spesifikasi..." class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Harga (Rp)</label>
                <input type="number" name="harga" value="{{ old('harga') }}" placeholder="250000" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Ukuran <span class="text-red-500">*</span></label>
                <input type="text" name="ukuran" required value="{{ old('ukuran') }}" placeholder="2m x 1.15m / All Size" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Warna</label>
                <input type="text" name="warna" value="{{ old('warna') }}" placeholder="Indigo / Coklat Sogan" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Foto Utama Produk <span class="text-red-500">*</span></label>
            <input type="file" name="foto_utama" required accept="image/*" class="w-full text-xs p-2.5 border border-gray-300 rounded-xl outline-none bg-gray-50 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-kainova-navy file:text-white hover:file:opacity-90">
        </div>

        <div class="flex items-center gap-2 pt-1">
            <input type="checkbox" name="is_unggulan" value="1" id="is_unggulan" {{ old('is_unggulan') ? 'checked' : '' }} class="w-4 h-4 text-kainova-orange rounded border-gray-300 focus:ring-kainova-orange">
            <label for="is_unggulan" class="text-xs font-bold text-gray-700 cursor-pointer">
                Tampilkan sebagai Produk Unggulan ⭐
            </label>
        </div>

        <div class="pt-4 flex justify-end gap-3 border-t border-gray-100">
            <a href="{{ route('admin.produk.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold text-xs rounded-xl transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition">
                Simpan Produk
            </button>
        </div>
    </form>
</div>
@endsection