@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm">
    <h2 class="font-bold text-lg text-kainova-navy mb-4">Tambah Banner Baru</h2>
    
    <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
        @csrf
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Judul Banner</label>
            <input type="text" name="judul" value="{{ old('judul') }}" required class="w-full px-3 py-2 border rounded-xl focus:ring-2 focus:ring-kainova-amber border-gray-300">
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Subjudul (Opsional)</label>
            <input type="text" name="subjudul" value="{{ old('subjudul') }}" class="w-full px-3 py-2 border rounded-xl focus:ring-2 focus:ring-kainova-amber border-gray-300">
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Link Target / URL (Opsional)</label>
            <input type="url" name="link_url" placeholder="https://..." value="{{ old('link_url') }}" class="w-full px-3 py-2 border rounded-xl focus:ring-2 focus:ring-kainova-amber border-gray-300">
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Gambar Banner</label>
            <input type="file" name="gambar" required accept="image/*" class="w-full px-3 py-2 border rounded-xl border-gray-300">
        </div>
        <div class="flex items-center gap-2 pt-2">
            <input type="checkbox" name="is_active" id="is_active" value="1" checked class="rounded border-gray-300 text-kainova-amber focus:ring-kainova-amber">
            <label for="is_active" class="font-semibold text-gray-700">Tampilkan Banner Ini</label>
        </div>
        <div class="flex justify-end gap-2 pt-4">
            <a href="{{ route('admin.banner.index') }}" class="px-4 py-2 border rounded-xl text-gray-600 hover:bg-gray-50">Batal</a>
            <button type="submit" class="px-4 py-2 bg-kainova-navy text-white rounded-xl font-bold hover:bg-opacity-90">Simpan Banner</button>
        </div>
    </form>
</div>
@endsection