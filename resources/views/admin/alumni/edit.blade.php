@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-bold text-xl text-kainova-navy">Edit Data Alumni</h2>
        <p class="text-xs text-gray-500">Perbarui informasi alumni {{ $alumni->nama }}</p>
    </div>
    <a href="{{ route('admin.alumni.index') }}" class="px-3.5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs rounded-xl transition flex items-center gap-1.5">
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

    <form action="{{ route('admin.alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="nama" required value="{{ old('nama', $alumni->nama) }}" placeholder="Contoh: Ahmad Rizky" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Tahun Lulus <span class="text-red-500">*</span></label>
                <input type="number" name="tahun_lulus" required value="{{ old('tahun_lulus', $alumni->tahun_lulus) }}" placeholder="Contoh: 2022" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Pekerjaan Saat Ini <span class="text-red-500">*</span></label>
            <input type="text" name="pekerjaan_saat_ini" required value="{{ old('pekerjaan_saat_ini', $alumni->pekerjaan_saat_ini) }}" placeholder="Contoh: Fullstack Developer di PT. Tech Indonesia" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Testimoni / Kesan Pesan</label>
            <textarea name="testimoni" rows="4" placeholder="Tuliskan pengalaman atau pesan alumni..." class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">{{ old('testimoni', $alumni->testimoni) }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Foto Profil Alumni</label>
            
            @if($alumni->foto)
                <div class="mb-3 flex items-center gap-3 p-3 bg-gray-50 border border-gray-200 rounded-xl w-fit">
                    <img src="{{ asset('storage/' . $alumni->foto) }}" alt="{{ $alumni->nama }}" class="w-12 h-12 object-cover rounded-lg border border-gray-200 shadow-sm">
                    <div>
                        <p class="text-[11px] font-bold text-gray-700">Foto Saat Ini</p>
                        <p class="text-[10px] text-gray-400">Pilih file baru jika ingin mengganti</p>
                    </div>
                </div>
            @endif

            <input type="file" name="foto" accept="image/*" class="w-full text-xs p-2.5 border border-gray-300 rounded-xl outline-none bg-gray-50 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-kainova-navy file:text-white hover:file:opacity-90">
            <p class="text-[10px] text-gray-400 mt-1">Format: JPG, PNG, WEBP (Maksimal 2MB)</p>
        </div>

        <div class="pt-4 flex justify-end gap-3 border-t border-gray-100">
            <a href="{{ route('admin.alumni.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold text-xs rounded-xl transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition">
                Perbarui Data Alumni
            </button>
        </div>
    </form>
</div>
@endsection