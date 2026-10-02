@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-bold text-xl text-kainova-navy">Edit Lowongan BKK</h2>
        <p class="text-xs text-gray-500">Perbarui informasi lowongan kerja untuk {{ $bkk->nama_perusahaan }} ({{ $bkk->posisi }})</p>
    </div>
    <a href="{{ route('admin.bkk.index') }}" class="px-3.5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs rounded-xl transition flex items-center gap-1.5">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        Kembali
    </a>
</div>

<div class="bg-white p-6 md:p-8 rounded-2xl border border-gray-200/80 shadow-sm max-w-4xl">
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 text-xs rounded-xl">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.bkk.update', $bkk->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Nama Perusahaan <span class="text-red-500">*</span></label>
                <input type="text" name="nama_perusahaan" required value="{{ old('nama_perusahaan', $bkk->nama_perusahaan) }}" placeholder="Contoh: PT Astra Honda Motor" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Posisi / Jabatan <span class="text-red-500">*</span></label>
                <input type="text" name="posisi" required value="{{ old('posisi', $bkk->posisi) }}" placeholder="Contoh: Operator Produksi / Staff IT" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Lokasi Kerja <span class="text-red-500">*</span></label>
                <input type="text" name="lokasi" required value="{{ old('lokasi', $bkk->lokasi) }}" placeholder="Contoh: Karawang / Semarang" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Rentang Gaji</label>
                <input type="text" name="rentang_gaji" value="{{ old('rentang_gaji', $bkk->rentang_gaji) }}" placeholder="Contoh: Rp 4.500.000 - Rp 6.000.000" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Batas Pendaftaran <span class="text-red-500">*</span></label>
                <input type="date" name="batas_pendaftaran" required value="{{ old('batas_pendaftaran', \Carbon\Carbon::parse($bkk->batas_pendaftaran)->format('Y-m-d')) }}" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange bg-white">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Status Lowongan <span class="text-red-500">*</span></label>
                <select name="status" required class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange bg-white">
                    <option value="" disabled>-- Pilih Status --</option>
                    <option value="Aktif" {{ old('status', $bkk->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Tutup" {{ old('status', $bkk->status) == 'Tutup' ? 'selected' : '' }}>Tutup</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Persyaratan Kualifikasi <span class="text-red-500">*</span></label>
            <textarea name="persyaratan" rows="5" required placeholder="Tulis kualifikasi usia, pendidikan, kriteria khusus, dan dokumen yang wajib dilampirkan..." class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">{{ old('persyaratan', $bkk->persyaratan) }}</textarea>
        </div>

        <div class="pt-4 flex justify-end gap-3 border-t border-gray-100">
            <a href="{{ route('admin.bkk.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold text-xs rounded-xl transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition">
                Perbarui Lowongan
            </button>
        </div>
    </form>
</div>
@endsection