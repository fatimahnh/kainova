@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="font-bold text-xl text-kainova-navy">Kelola Banner Homepage</h2>
        <p class="text-xs text-gray-500">Daftar banner hero yang tampil di halaman depan website</p>
    </div>
    <a href="{{ route('admin.banner.create') }}" class="px-4 py-2.5 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition flex items-center gap-2">
        <i data-lucide="plus" class="w-4 h-4"></i>
        <span>Tambah Banner</span>
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl flex items-center gap-2">
    <i data-lucide="check-circle" class="w-4 h-4"></i>
    <span>{{ session('success') }}</span>
</div>
@endif

<div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm overflow-hidden">
    <table class="w-full text-left text-xs">
        <thead class="bg-kainova-navy text-white font-semibold">
            <tr>
                <th class="p-4">No</th>
                <th class="p-4">Gambar</th>
                <th class="p-4">Judul & Subjudul</th>
                <th class="p-4">Link URL</th>
                <th class="p-4">Status</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 text-gray-700">
            @forelse($banners as $index => $item)
            <tr class="hover:bg-amber-50/30 transition">
                <td class="p-4 text-gray-400 font-semibold">{{ $banners->firstItem() + $index }}</td>
                <td class="p-4">
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="w-20 h-12 object-cover rounded-lg border border-gray-200">
                </td>
                <td class="p-4">
                    <div class="font-bold text-kainova-navy">{{ $item->judul }}</div>
                    <div class="text-[11px] text-gray-400">{{ $item->subjudul ?? '-' }}</div>
                </td>
                <td class="p-4 text-blue-600 truncate max-w-[150px]">
                    <a href="{{ $item->link_url }}" target="_blank" class="hover:underline">{{ $item->link_url ?? '-' }}</a>
                </td>
                <td class="p-4">
                    <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold {{ $item->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-600' }}">
                        {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td class="p-4 text-center">
                    <div class="flex items-center justify-center gap-2">
                        <a href="{{ route('admin.banner.edit', $item->id) }}" class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition">
                            <i data-lucide="edit" class="w-4 h-4"></i>
                        </a>
                        <form action="{{ route('admin.banner.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus banner ini?')" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="p-8 text-center text-gray-400">Belum ada data banner.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4 border-t border-gray-100">{{ $banners->links() }}</div>
</div>
@endsection