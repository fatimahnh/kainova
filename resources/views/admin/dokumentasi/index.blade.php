@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="font-bold text-xl text-kainova-navy">Galeri Dokumentasi</h2>
        <p class="text-xs text-gray-500">Kelola foto-foto kegiatan dan fasilitas sekolah</p>
    </div>
    <a href="{{ route('admin.dokumentasi.create') }}" class="px-4 py-2.5 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition flex items-center gap-2">
        <i data-lucide="plus" class="w-4 h-4"></i>
        <span>Unggah Dokumentasi</span>
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl flex items-center gap-2">
    <i data-lucide="check-circle" class="w-4 h-4"></i>
    <span>{{ session('success') }}</span>
</div>
@endif

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @forelse($dokumentasis as $item)
    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm overflow-hidden group">
        <div class="relative h-36 overflow-hidden">
            <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
            <span class="absolute top-2 left-2 px-2 py-0.5 bg-black/60 text-white rounded-md text-[10px] font-semibold backdrop-blur-sm">
                {{ $item->kategori }}
            </span>
        </div>
        <div class="p-3 text-xs">
            <h3 class="font-bold text-kainova-navy truncate">{{ $item->judul }}</h3>
            <p class="text-gray-400 text-[10px] truncate mt-0.5">{{ $item->keterangan ?? '-' }}</p>
            <div class="flex items-center justify-end gap-2 mt-3 pt-2 border-t border-gray-100">
                <a href="{{ route('admin.dokumentasi.edit', $item->id) }}" class="p-1.5 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition">
                    <i data-lucide="edit" class="w-3.5 h-3.5"></i>
                </a>
                <form action="{{ route('admin.dokumentasi.destroy', $item->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus foto dokumentasi ini?')" class="p-1.5 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition">
                        <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full bg-white p-8 rounded-2xl text-center text-gray-400 text-xs border border-gray-200">
        Belum ada galeri foto dokumentasi.
    </div>
    @endforelse
</div>

<div class="mt-6">{{ $dokumentasis->links() }}</div>
@endsection