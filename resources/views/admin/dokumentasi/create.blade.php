@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm">
    <h2 class="font-bold text-lg text-kainova-navy mb-4">Unggah Dokumentasi Baru</h2>
    
    <form action="{{ route('admin.dokumentasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
        @csrf
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Judul / Nama Foto</label>
            <input type="text" name="judul" value="{{ old('judul') }}" required class="w-full px-3 py-2 border rounded-xl border-gray-300">
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Kategori</label>
            <select name="kategori" required class="w-full px-3 py-2 border rounded-xl border-gray-300">
                <option value="Kegiatan">Kegiatan</option>
                <option value="Fasilitas">Fasilitas</option>
                <option value="Acara">Acara</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">File Foto</label>
            <input type="file" name="foto" required accept="image/*" class="w-full px-3 py-2 border rounded-xl border-gray-300">
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Keterangan (Opsional)</label>
            <textarea name="keterangan" rows="3" class="w-full px-3 py-2 border rounded-xl border-gray-300">{{ old('keterangan') }}</textarea>
        </div>
        <div class="flex justify-end gap-2 pt-4">
            <a href="{{ route('admin.dokumentasi.index') }}" class="px-4 py-2 border rounded-xl text-gray-600 hover:bg-gray-50">Batal</a>
            <button type="submit" class="px-4 py-2 bg-kainova-navy text-white rounded-xl font-bold hover:bg-opacity-90">Unggah Foto</button>
        </div>
    </form>
</div>
@endsection