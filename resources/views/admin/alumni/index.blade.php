@extends('layouts.admin')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h2 class="font-bold text-xl text-kainova-navy">Kelola Data Alumni</h2>
        <p class="text-xs text-gray-500">Daftar alumni, tahun lulus, pekerjaan, dan testimoni</p>
    </div>
    <a href="{{ route('admin.alumni.create') }}" class="py-2.5 px-4 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition inline-flex items-center gap-2 w-fit">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Alumni Baru
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
                    <th class="p-4">Nama Alumni</th>
                    <th class="p-4">Tahun Lulus</th>
                    <th class="p-4">Pekerjaan Saat Ini</th>
                    <th class="p-4">Testimoni</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700">
                @forelse($alumni as $index => $item)
                <tr class="hover:bg-amber-50/30 transition">
                    <td class="p-4 font-semibold text-gray-400">
                        {{ $alumni->firstItem() + $index }}
                    </td>
                    <td class="p-4">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-10 h-10 object-cover rounded-xl border border-gray-200 shadow-sm">
                        @else
                            <div class="w-10 h-10 bg-gray-100 rounded-xl border border-gray-200 flex items-center justify-center text-gray-400">
                                <i data-lucide="user" class="w-5 h-5"></i>
                            </div>
                        @endif
                    </td>
                    <td class="p-4 font-bold text-kainova-navy">
                        {{ $item->nama }}
                    </td>
                    <td class="p-4">
                        <span class="px-2.5 py-1 bg-amber-50 text-amber-700 font-semibold rounded-lg border border-amber-200/60 text-[11px]">
                            Lulus {{ $item->tahun_lulus }}
                        </span>
                    </td>
                    <td class="p-4 font-semibold text-gray-800">
                        <div class="flex items-center gap-1.5">
                            <i data-lucide="briefcase" class="w-3.5 h-3.5 text-gray-400"></i>
                            <span>{{ $item->pekerjaan_saat_ini }}</span>
                        </div>
                    </td>
                    <td class="p-4 text-gray-500 max-w-xs truncate">
                        {{ $item->testimoni ?? '-' }}
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex items-center justify-center gap-1.5">
                            <a href="{{ route('admin.alumni.edit', $item->id) }}" class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition" title="Edit">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                            </a>
                            <form action="{{ route('admin.alumni.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus data alumni ini?')" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition" title="Hapus">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-12 text-center text-gray-400">
                        <i data-lucide="graduation-cap" class="w-10 h-10 mx-auto mb-2 opacity-40"></i>
                        <p class="font-semibold text-sm">Belum ada data alumni tersimpan.</p>
                        <p class="text-xs text-gray-400 mt-0.5">Klik "Tambah Alumni Baru" di atas untuk menambahkan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($alumni->hasPages())
    <div class="p-4 border-t border-gray-100">
        {{ $alumni->links() }}
    </div>
    @endif
</div>
@endsection