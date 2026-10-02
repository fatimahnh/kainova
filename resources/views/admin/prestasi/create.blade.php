@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm">
    <h2 class="font-bold text-lg text-kainova-navy mb-4">Tambah Prestasi</h2>
    
    <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
        @csrf
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Nama Kejuaraan / Judul Prestasi</label>
            <input type="text" name="judul" value="{{ old('judul') }}" required class="w-full px-3 py-2 border rounded-xl border-gray-300">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Tingkat</label>
                <select name="tingkat" required class="w-full px-3 py-2 border rounded-xl border-gray-300">
                    <option value="Kota/Kabupaten">Kota/Kabupaten</option>
                    <option value="Provinsi">Provinsi</option>
                    <option value="Nasional">Nasional</option>
                    <option value="Internasional">Internasional</option>
                </select>
            </div>
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Tanggal Diraih</label>
                <input type="date" name="tanggal_diraih" value="{{ old('tanggal_diraih') }}" required class="w-full px-3 py-2 border rounded-xl border-gray-300">
            </div>
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Peraih (Nama Siswa / Tim)</label>
            <input type="text" name="peraih" value="{{ old('peraih') }}" required class="w-full px-3 py-2 border rounded-xl border-gray-300">
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Foto Dokumentasi Prestasi</label>
            <input type="file" name="foto" required accept="image/*" class="w-full px-3 py-2 border rounded-xl border-gray-300">
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Deskripsi Singkat</label>
            <textarea name="deskripsi" rows="3" class="w-full px-3 py-2 border rounded-xl border-gray-300">{{ old('deskripsi') }}</textarea>
        </div>
        <div class="flex justify-end gap-2 pt-4">
            <a href="{{ route('admin.prestasi.index') }}" class="px-4 py-2 border rounded-xl text-gray-600 hover:bg-gray-50">Batal</a>
            <button type="submit" class="px-4 py-2 bg-kainova-navy text-white rounded-xl font-bold hover:bg-opacity-90">Simpan Data</button>
        </div>
    </form>
</div>
@endsection