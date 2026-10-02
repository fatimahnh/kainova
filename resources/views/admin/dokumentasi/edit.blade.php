@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm">
    <h2 class="font-bold text-lg text-kainova-navy mb-4">Edit Dokumentasi</h2>
    
    <form action="{{ route('admin.dokumentasi.update', $dokumentasi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
        @csrf
        @method('PUT')
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Judul / Nama Foto</label>
            <input type="text" name="judul" value="{{ old('judul', $dokumentasi->judul) }}" required class="w-full px-3 py-2 border rounded-xl border-gray-300">
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Kategori</label>
            <select name="kategori" required class="w-full px-3 py-2 border rounded-xl border-gray-300">
                @foreach(['Kegiatan', 'Fasilitas', 'Acara', 'Lainnya'] as $kat)
                    <option value="{{ $kat }}" {{ $dokumentasi->kategori == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Foto Dokumentasi</label>
            <div class="mb-2">
                <img src="{{ asset('storage/' . $dokumentasi->foto) }}" class="w-32 h-20 object-cover rounded-lg border">
            </div>
            <input type="file" name="foto" accept="image/*" class="w-full px-3 py-2 border rounded-xl border-gray-300">
            <p class="text-[10px] text-gray-400 mt-1">Kosongkan jika tidak ingin mengganti foto.</p>
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Keterangan (Opsional)</label>
            <textarea name="keterangan" rows="3" class="w-full px-3 py-2 border rounded-xl border-gray-300">{{ old('keterangan', $dokumentasi->keterangan) }}</textarea>
        </div>
        <div class="flex justify-end gap-2 pt-4">
            <a href="{{ route('admin.dokumentasi.index') }}" class="px-4 py-2 border rounded-xl text-gray-600 hover:bg-gray-50">Batal</a>
            <button type="submit" class="px-4 py-2 bg-kainova-navy text-white rounded-xl font-bold hover:bg-opacity-90">Perbarui Foto</button>
        </div>
    </form>
</div>
@endsection