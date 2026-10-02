@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-bold text-xl text-kainova-navy">Edit Program PKL</h2>
        <p class="text-xs text-gray-500">Perbarui informasi program PKL untuk {{ $pkl->nama_perusahaan }}</p>
    </div>
    <a href="{{ route('admin.pkl.index') }}" class="px-3.5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs rounded-xl transition flex items-center gap-1.5">
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

    <form action="{{ route('admin.pkl.update', $pkl->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Nama Perusahaan <span class="text-red-500">*</span></label>
                <input type="text" name="nama_perusahaan" required value="{{ old('nama_perusahaan', $pkl->nama_perusahaan) }}" placeholder="Contoh: PT Telkom Indonesia" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Lokasi <span class="text-red-500">*</span></label>
                <input type="text" name="lokasi" required value="{{ old('lokasi', $pkl->lokasi) }}" placeholder="Contoh: Jakarta Selatan / Remote" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Kuota (Orang) <span class="text-red-500">*</span></label>
                <input type="number" name="kuota" required min="1" value="{{ old('kuota', $pkl->kuota) }}" placeholder="Contoh: 5" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Status Pendaftaran <span class="text-red-500">*</span></label>
                <select name="status" required class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange bg-white">
                    <option value="" disabled>-- Pilih Status --</option>
                    <option value="Buka" {{ old('status', $pkl->status) == 'Buka' ? 'selected' : '' }}>Buka</option>
                    <option value="Tutup" {{ old('status', $pkl->status) == 'Tutup' ? 'selected' : '' }}>Tutup</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Deskripsi Program</label>
            <textarea name="deskripsi" rows="4" placeholder="Tulis deskripsi kualifikasi, syarat, atau informasi detail program PKL..." class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">{{ old('deskripsi', $pkl->deskripsi) }}</textarea>
        </div>

        <div class="pt-4 flex justify-end gap-3 border-t border-gray-100">
            <a href="{{ route('admin.pkl.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold text-xs rounded-xl transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition">
                Perbarui Program PKL
            </button>
        </div>
    </form>
</div>
@endsection