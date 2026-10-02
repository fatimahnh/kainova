@extends('layouts.admin')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h2 class="font-bold text-xl text-kainova-navy">Kelola Produk Karya Tekstil</h2>
        <p class="text-xs text-gray-500">Atur katalog produk lengkap beserta harga, ukuran, dan foto karya</p>
    </div>
    <a href="{{ route('admin.produk.create') }}" class="py-2.5 px-4 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition inline-flex items-center gap-2 w-fit">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Produk Baru
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl flex items-center justify-between">
    <div class="flex items-center gap-2">
        <i data-lucide="check-circle" class="w-4 h-4"></i>
        <span>{{ session('success') }}</span>
    </div>
    <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">
        <i data-lucide="x" class="w-4 h-4"></i>
    </button>
</div>
@endif

<div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead class="bg-kainova-navy text-white font-semibold">
                <tr>
                    <th class="p-4">No</th>
                    <th class="p-4">Foto</th>
                    <th class="p-4">Nama Produk</th>
                    <th class="p-4">Kategori</th>
                    <th class="p-4">Harga</th>
                    <th class="p-4">Ukuran</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700">
                @forelse($produk as $index => $item)
                <tr class="hover:bg-amber-50/30 transition">
                    <td class="p-4 font-semibold text-gray-400">{{ $index + 1 }}</td>
                    <td class="p-4">
                        @if($item->foto_utama)
                            <img src="{{ asset('storage/' . $item->foto_utama) }}" alt="{{ $item->nama }}" class="w-12 h-12 object-cover rounded-xl border border-gray-200 shadow-sm">
                        @else
                            <div class="w-12 h-12 bg-gray-100 rounded-xl border border-gray-200 flex items-center justify-center text-[10px] text-gray-400 font-bold">
                                NO FOTO
                            </div>
                        @endif
                    </td>
                    <td class="p-4">
                        <div class="font-bold text-kainova-navy">{{ $item->nama }}</div>
                        <div class="text-[10px] text-gray-400">{{ $item->slug }}</div>
                    </td>
                    <td class="p-4">
                        <span class="px-2.5 py-1 bg-amber-50 text-kainova-orange font-semibold rounded-lg border border-amber-200/60 text-[11px]">
                            {{ $item->kategori->nama ?? '-' }}
                        </span>
                    </td>
                    <td class="p-4 font-bold text-gray-900">
                        Rp {{ number_format($item->harga ?? 0, 0, ',', '.') }}
                    </td>
                    <td class="p-4">
                        <span class="px-2 py-0.5 bg-gray-100 text-gray-600 rounded-md font-medium text-[11px]">
                            {{ $item->ukuran }}
                        </span>
                    </td>
                    <td class="p-4">
                        @if($item->is_unggulan)
                            <span class="px-2 py-1 bg-amber-100 text-amber-800 font-bold rounded-lg text-[10px]">⭐ Unggulan</span>
                        @else
                            <span class="px-2 py-1 bg-gray-100 text-gray-500 rounded-lg text-[10px]">Biasa</span>
                        @endif
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex items-center justify-center gap-1.5">
                            <a href="{{ route('admin.produk.show', $item->id) }}" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition" title="Detail">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                            </a>
                            <a href="{{ route('admin.produk.edit', $item->id) }}" class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition" title="Edit">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                            </a>
                            <form action="{{ route('admin.produk.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus produk ini?')" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition" title="Hapus">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="p-12 text-center text-gray-400">
                        <i data-lucide="package" class="w-10 h-10 mx-auto mb-2 opacity-40"></i>
                        <p class="font-semibold text-sm">Belum ada produk tekstil tersimpan.</p>
                        <p class="text-xs text-gray-400 mt-0.5">Klik "Tambah Produk Baru" di atas untuk menambahkan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection