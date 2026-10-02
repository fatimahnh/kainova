@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-bold text-xl text-kainova-navy">Edit Data Guru</h2>
        <p class="text-xs text-gray-500">Perbarui informasi profil dan data mengajar {{ $guru->nama }}</p>
    </div>
    <a href="{{ route('admin.guru.index') }}" class="px-3.5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs rounded-xl transition flex items-center gap-1.5">
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

    <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Nama Lengkap & Gelar <span class="text-red-500">*</span></label>
                <input type="text" name="nama" required value="{{ old('nama', $guru->nama) }}" placeholder="Contoh: Drs. Budi Santoso, M.Pd." class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">NIP (Nomor Induk Pegawai)</label>
                <input type="text" name="nip" value="{{ old('nip', $guru->nip) }}" placeholder="Contoh: 19850330 201001 1 008 (Opsional)" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Jabatan <span class="text-red-500">*</span></label>
                <input type="text" name="jabatan" required value="{{ old('jabatan', $guru->jabatan) }}" placeholder="Contoh: Guru Pengajar / Wali Kelas X" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Mata Pelajaran <span class="text-red-500">*</span></label>
                <input type="text" name="mata_pelajaran" required value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}" placeholder="Contoh: Pemrograman Web / Matematika" class="w-full text-xs p-3 border border-gray-300 rounded-xl outline-none focus:border-kainova-orange">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Foto Profil Guru</label>
            
            @if($guru->foto)
                <div class="mb-3 flex items-center gap-3 p-3 bg-gray-50 border border-gray-200 rounded-xl w-fit">
                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}" class="w-12 h-12 object-cover rounded-lg border border-gray-200 shadow-sm">
                    <div>
                        <p class="text-[11px] font-bold text-gray-700">Foto Saat Ini</p>
                        <p class="text-[10px] text-gray-400">Pilih file baru di bawah jika ingin mengganti</p>
                    </div>
                </div>
            @endif

            <input type="file" name="foto" accept="image/*" class="w-full text-xs p-2.5 border border-gray-300 rounded-xl outline-none bg-gray-50 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-kainova-navy file:text-white hover:file:opacity-90">
            <p class="text-[10px] text-gray-400 mt-1">Format: JPG, PNG, WEBP (Maksimal 2MB)</p>
        </div>

        <div class="pt-4 flex justify-end gap-3 border-t border-gray-100">
            <a href="{{ route('admin.guru.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold text-xs rounded-xl transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold text-xs rounded-xl shadow-md hover:opacity-95 transition">
                Perbarui Data Guru
            </button>
        </div>
    </form>
</div>
@endsection