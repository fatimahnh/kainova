@extends('layouts.frontend')

@section('title', 'KAINOVA - Dokumentasi')

@section('content')
<!-- HERO / HEADER SECTION -->
<section class="bg-kainova-brown text-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <span class="text-[10px] font-extrabold uppercase tracking-widest text-amber-500 mb-3 block">GALERI & DOKUMENTASI</span>
        <h2 class="text-3xl sm:text-4xl font-black text-white mb-4 tracking-tight">Dokumentasi Kegiatan KAINOVA</h2>
        <p class="text-stone-300 text-xs sm:text-sm max-w-3xl leading-relaxed font-normal">
            Mengabadikan momentum dedikasi pembelajaran siswa, kejuaraan nasional, proses kriya batik tulis tradisional, hingga peragaan busana karya mandiri vokasi.
        </p>
    </div>
</section>

<!-- MAIN CONTENT SECTION -->
<section class="bg-kainova-cream py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">

        <!-- CATEGORY FILTER BUTTONS -->
        <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-8 text-xs font-semibold scrollbar-none">
            <!-- Tombol Semua -->
            <a href="{{ route('dokumentasi') }}" 
            class="{{ !request('kategori') ? 'bg-amber-500 text-white font-bold shadow-sm' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200/60' }} px-5 py-2 rounded-lg shrink-0 transition-colors">
                Semua
            </a>

            <!-- Loop Kategori Unik dari Tabel Dokumentasi -->
            @foreach ($kategoriDokumentasi as $kategori)
                <a href="{{ route('dokumentasi', ['kategori' => $kategori]) }}" 
                class="{{ request('kategori') == $kategori ? 'bg-amber-500 text-white font-bold shadow-sm' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200/60' }} px-5 py-2 rounded-lg shrink-0 transition-colors">
                    {{ ucfirst($kategori) }}
                </a>
            @endforeach
        </div>

        <!-- DOCUMENTATION CARD GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-12">
            @forelse ($dokumentasi as $item)
                <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow">
                    <!-- Gambar Dokumentasi -->
                    <div class="w-full h-56 rounded-xl overflow-hidden mb-4 bg-slate-100">
                        <img src="{{ $item->foto ? asset('storage/' . $item->foto) : 'https://via.placeholder.com/800x600?text=No+Image' }}" 
                            alt="{{ $item->judul }}" 
                            class="w-full h-full object-cover">
                    </div>

                    <!-- Kategori & Tanggal -->
                    <div class="flex items-center justify-between text-[10px] font-extrabold mb-2">
                        <span class="text-amber-500 uppercase tracking-wider">
                            {{ $item->kategori ?? 'PEMBELAJARAN' }}
                        </span>
                        <span class="text-slate-400 font-semibold">
                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                        </span>
                    </div>

                    <!-- Judul Dokumentasi -->
                    <h3 class="font-bold text-slate-900 text-sm leading-snug py-1">
                        {{ $item->judul }}
                    </h3>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-slate-400 font-medium text-xs">
                    Belum ada dokumentasi untuk kategori ini.
                </div>
            @endforelse
        </div>

        <!-- LOAD MORE BUTTON -->
        <div class="flex justify-center my-6">
            <button class="bg-amber-100/60 hover:bg-amber-100 text-amber-600 font-extrabold text-xs px-6 py-3 rounded-xl border border-amber-200/60 flex items-center gap-2 transition-colors">
                <span>Muat Kegiatan Lainnya</span>
                <i data-lucide="rotate-cw" class="w-3.5 h-3.5"></i>
            </button>
        </div>

    </div>
</section>
@endsection