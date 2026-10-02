@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-black text-gray-800">Pengaturan Media Sosial & Kontak</h1>
            <p class="text-xs text-gray-500 mt-1">Kelola informasi Email, WhatsApp, Instagram, TikTok, dan Alamat Sekolah.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-100 border border-emerald-300 text-emerald-800 rounded-2xl text-xs font-semibold flex items-center gap-3">
            <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600 shrink-0"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-sm">
        <form action="{{ route('admin.kontak.update') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Email -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 flex items-center gap-2">
                        <i data-lucide="mail" class="w-4 h-4 text-amber-500"></i> Email Resmi
                    </label>
                    <input type="email" name="email" value="{{ old('email', $contact->email) }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs focus:ring-2 focus:ring-amber-500 outline-none" placeholder="contoh: info@smkn2kra.sch.id">
                </div>

                <!-- WhatsApp -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 flex items-center gap-2">
                        <i data-lucide="phone" class="w-4 h-4 text-emerald-500"></i> Nomor WhatsApp
                    </label>
                    <input type="text" name="whatsapp" value="{{ old('whatsapp', $contact->whatsapp) }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs focus:ring-2 focus:ring-amber-500 outline-none" placeholder="contoh: 08123456789">
                </div>

                <!-- Instagram -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 flex items-center gap-2">
                        <i data-lucide="instagram" class="w-4 h-4 text-pink-500"></i> Instagram
                    </label>
                    <input type="text" name="instagram" value="{{ old('instagram', $contact->instagram) }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs focus:ring-2 focus:ring-amber-500 outline-none" placeholder="contoh: @wastra.muda.tepeka">
                </div>

                <!-- TikTok -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 flex items-center gap-2">
                        <i data-lucide="video" class="w-4 h-4 text-black"></i> TikTok
                    </label>
                    <input type="text" name="tiktok" value="{{ old('tiktok', $contact->tiktok) }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs focus:ring-2 focus:ring-amber-500 outline-none" placeholder="contoh: https://www.tiktok.com/@wastra.muda.tepeka">
                </div>
            </div>

            <!-- Alamat Sekolah -->
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <i data-lucide="map-pin" class="w-4 h-4 text-red-500"></i> Alamat Sekolah
                </label>
                <textarea name="alamat" rows="3" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs focus:ring-2 focus:ring-amber-500 outline-none" placeholder="Alamat lengkap sekolah...">{{ old('alamat', $contact->alamat) }}</textarea>
            </div>

            <div class="pt-4 border-t flex justify-end">
                <button type="submit" class="px-6 py-2.5 bg-amber-500 hover:bg-amber-600 text-black font-bold text-xs rounded-xl shadow-md transition flex items-center gap-2">
                    <i data-lucide="save" class="w-4 h-4"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection