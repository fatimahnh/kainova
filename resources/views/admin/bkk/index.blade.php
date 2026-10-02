@extends('layouts.admin')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h2 class="font-bold text-xl text-kainova-navy">Kelola Bursa Kerja Khusus (BKK)</h2>
        <p class="text-xs text-gray-500">Atur daftar lowongan kerja, posisi, persyaratan, dan batas pendaftaran</p>
    </div>
    <a href="{{ route('admin.bkk.create') }}" class="py-2.5 px-4 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition inline-flex items-center gap-2 w-fit">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Lowongan BKK
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
                    <th class="p-4">Perusahaan & Posisi</th>
                    <th class="p-4">Lokasi</th>
                    <th class="p-4">Gaji</th>
                    <th class="p-4">Batas Pendaftaran</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700">
                @forelse($bursaKerja as $index => $item)
                <tr class="hover:bg-amber-50/30 transition">
                    <td class="p-4 font-semibold text-gray-400">
                        {{ $bursaKerja->firstItem() + $index }}
                    </td>
                    <td class="p-4">
                        <div class="font-bold text-kainova-navy">{{ $item->nama_perusahaan }}</div>
                        <div class="text-[11px] font-semibold text-kainova-orange flex items-center gap-1 mt-0.5">
                            <i data-lucide="briefcase" class="w-3 h-3"></i>
                            {{ $item->posisi }}
                        </div>
                    </td>
                    <td class="p-4 text-gray-600">
                        <div class="flex items-center gap-1.5">
                            <i data-lucide="map-pin" class="w-3.5 h-3.5 text-gray-400"></i>
                            <span>{{ $item->lokasi }}</span>
                        </div>
                    </td>
                    <td class="p-4 font-bold text-gray-900">
                        @if($item->rentang_gaji)
                            <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 font-semibold rounded-lg border border-emerald-200/60 text-[11px]">
                                {{ $item->rentang_gaji }}
                            </span>
                        @else
                            <span class="text-gray-400 text-[11px] italic">-</span>
                        @endif
                    </td>
                    <td class="p-4 text-gray-600">
                        <div class="flex items-center gap-1.5">
                            <i data-lucide="calendar" class="w-3.5 h-3.5 text-gray-400"></i>
                            <span>{{ \Carbon\Carbon::parse($item->batas_pendaftaran)->translatedFormat('d M Y') }}</span>
                        </div>
                    </td>
                    <td class="p-4">
                        @if($item->status === 'Aktif')
                            <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 font-bold rounded-lg text-[10px]">
                                Aktif
                            </span>
                        @else
                            <span class="px-2.5 py-1 bg-rose-100 text-rose-700 font-bold rounded-lg text-[10px]">
                                Tutup
                            </span>
                        @endif
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex items-center justify-center gap-1.5">
                            <a href="{{ route('admin.bkk.edit', $item->id) }}" class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition" title="Edit">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                            </a>
                            <form action="{{ route('admin.bkk.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus lowongan ini?')" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition" title="Hapus">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-12 text-center text-gray-400">
                        <i data-lucide="building-2" class="w-10 h-10 mx-auto mb-2 opacity-40"></i>
                        <p class="font-semibold text-sm">Belum ada data lowongan BKK tersimpan.</p>
                        <p class="text-xs text-gray-400 mt-0.5">Klik "Tambah Lowongan BKK" di atas untuk menambahkan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($bursaKerja->hasPages())
    <div class="p-4 border-t border-gray-100">
        {{ $bursaKerja->links() }}
    </div>
    @endif
</div>
@endsection