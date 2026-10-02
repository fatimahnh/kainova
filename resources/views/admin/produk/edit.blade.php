@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-bold text-xl text-kainova-navy">Edit Data Produk</h2>
        <p class="text-xs text-gray-500">Perbarui informasi produk tekstil</p>
    </div>
    <a href="{{ route('admin.produk.index') }}" class="px-3.5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs rounded-xl transition flex items-center gap-1.5">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        Kembali
    </a>
</div>

<div class="bg-white p-6 md:p-8 rounded-2xl border border-gray-200/80 shadow-sm max-w-4xl">
    <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Kategori Produk</label>
                <select name="kategori_id" required class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange bg-white">
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id }}" {{ $produk->kategori_id == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Nama Produk</label>
                <input type="text" name="nama" required value="{{ old('nama', $produk->nama) }}" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Deskripsi Produk</label>
            <textarea name="deskripsi" rows="4" required class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Harga (Rp)</label>
                <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Ukuran</label>
                <input type="text" name="ukuran" required value="{{ old('ukuran', $produk->ukuran) }}" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Warna</label>
                <input type="text" name="warna" value="{{ old('warna', $produk->warna) }}" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Foto Utama Produk</label>
            @if($produk->foto_utama)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $produk->foto_utama) }}" alt="Foto Produk" class="w-20 h-20 object-cover rounded-xl border border-gray-200">
                </div>
            @endif
            <input type="file" name="foto_utama" accept="image/*" class="w-full text-xs p-2.5 border border-gray-300 rounded-xl outline-none bg-gray-50 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-kainova-navy file:text-white hover:file:opacity-90">
            <span class="text-[10px] text-gray-400 mt-1 block">Kosongkan jika tidak ingin mengganti foto saat ini.</span>
        </div>

        <div class="flex items-center gap-2 pt-1">
            <input type="checkbox" name="is_unggulan" value="1" id="is_unggulan" {{ $produk->is_unggulan ? 'checked' : '' }} class="w-4 h-4 text-kainova-orange rounded border-gray-300 focus:ring-kainova-orange">
            <label for="is_unggulan" class="text-xs font-bold text-gray-700 cursor-pointer">
                Tampilkan sebagai Produk Unggulan ⭐
            </label>
        </div>

        <div class="pt-4 flex justify-end gap-3 border-t border-gray-100">
            <a href="{{ route('admin.produk.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold text-xs rounded-xl transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition">
                Update Produk
            </button>
        </div>
    </form>
</div>
@endsection