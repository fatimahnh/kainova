@extends('layouts.admin')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h2 class="font-bold text-xl text-kainova-navy">Kelola Program PKL</h2>
        <p class="text-xs text-gray-500">Atur daftar tempat PKL, lokasi, kuota, dan status pendaftaran</p>
    </div>
    <a href="{{ route('admin.pkl.create') }}" class="py-2.5 px-4 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition inline-flex items-center gap-2 w-fit">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Program PKL
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
                    <th class="p-4">Nama Perusahaan</th>
                    <th class="p-4">Lokasi</th>
                    <th class="p-4">Kuota</th>
                    <th class="p-4">Deskripsi</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700">
                @forelse($programPkl as $index => $item)
                <tr class="hover:bg-amber-50/30 transition">
                    <td class="p-4 font-semibold text-gray-400">
                        {{ $programPkl->firstItem() + $index }}
                    </td>
                    <td class="p-4 font-bold text-kainova-navy">
                        {{ $item->nama_perusahaan }}
                    </td>
                    <td class="p-4 text-gray-600">
                        <div class="flex items-center gap-1.5">
                            <i data-lucide="map-pin" class="w-3.5 h-3.5 text-gray-400"></i>
                            <span>{{ $item->lokasi }}</span>
                        </div>
                    </td>
                    <td class="p-4 font-bold text-gray-900">
                        <span class="px-2.5 py-1 bg-blue-50 text-blue-600 font-semibold rounded-lg border border-blue-200/60 text-[11px]">
                            {{ $item->kuota }} Orang
                        </span>
                    </td>
                    <td class="p-4 text-gray-500 max-w-xs truncate">
                        {{ $item->deskripsi ?? '-' }}
                    </td>
                    <td class="p-4">
                        @if($item->status === 'Buka')
                            <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 font-bold rounded-lg text-[10px]">
                                Open / Buka
                            </span>
                        @else
                            <span class="px-2.5 py-1 bg-rose-100 text-rose-700 font-bold rounded-lg text-[10px]">
                                Closed / Tutup
                            </span>
                        @endif
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex items-center justify-center gap-1.5">
                            <a href="{{ route('admin.pkl.edit', $item->id) }}" class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition" title="Edit">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                            </a>
                            <form action="{{ route('admin.pkl.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus program PKL ini?')" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition" title="Hapus">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-12 text-center text-gray-400">
                        <i data-lucide="briefcase" class="w-10 h-10 mx-auto mb-2 opacity-40"></i>
                        <p class="font-semibold text-sm">Belum ada data program PKL tersimpan.</p>
                        <p class="text-xs text-gray-400 mt-0.5">Klik "Tambah Program PKL" di atas untuk menambahkan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($programPkl->hasPages())
    <div class="p-4 border-t border-gray-100">
        {{ $programPkl->links() }}
    </div>
    @endif
</div>
@endsection