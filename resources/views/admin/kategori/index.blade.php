@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <h2 class="font-bold text-xl text-kainova-navy">Kelola Kategori Produk</h2>
    <p class="text-xs text-gray-500">Atur kategori karya tekstil (contoh: Batik Tulis, Kain Tenun, Busana Jadi)</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Form Tambah Kategori -->
    <div class="bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm h-fit">
        <h3 class="font-bold text-sm text-kainova-navy mb-4">Tambah Kategori Baru</h3>
        <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Nama Kategori</label>
                <input type="text" name="nama" required placeholder="Contoh: Batik Cap / Tenun Ikat" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>
            <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition">
                Simpan Kategori
            </button>
        </form>
    </div>

    <!-- Tabel Daftar Kategori -->
    <div class="md:col-span-2 bg-white rounded-2xl border border-gray-200/80 shadow-sm overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-kainova-navy text-white font-semibold">
                <tr>
                    <th class="p-4">No</th>
                    <th class="p-4">Nama Kategori</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700">
                @forelse($kategori as $index => $item)
                <tr class="hover:bg-amber-50/30 transition">
                    <td class="p-4 font-semibold text-gray-400">{{ $index + 1 }}</td>
                    <td class="p-4 font-bold text-kainova-navy">{{ $item->nama }}</td>
                    <td class="p-4 text-center">
                        <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus kategori ini?')" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition" title="Hapus">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-8 text-center text-gray-400">
                        <i data-lucide="tag" class="w-8 h-8 mx-auto mb-2 opacity-50"></i>
                        Belum ada kategori produk.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection