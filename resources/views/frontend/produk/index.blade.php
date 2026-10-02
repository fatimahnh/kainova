@extends('layouts.frontend')

@section('title', 'KAINOVA - Produk')

@section('content')
<main class="flex-grow max-w-7xl w-full mx-auto">

<!-- HEADER SECTION -->
<section class="bg-kainova-grey text-white relative overflow-hidden flex items-center">
    <div class="m-14">
        <span class="text-[10px] font-extrabold uppercase tracking-widest text-amber-500 mb-3 block">GALERI ETALASE</span>
        <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mb-5 tracking-tight">Karya Kreatif Siswa</h2>
        <p class="text-slate-500 text-xs sm:text-sm max-w-3xl leading-relaxed font-normal">
            Semua produk merupakan hasil karya praktik mandiri siswa KAINOVA SMKN 2 Karanganyar dengan bimbingan instruktur ahli industri. Keuntungan penjualan digunakan untuk pengembangan bahan ajar siswa.
        </p>
    </div>
</section>


<!-- SECTION KATALOG PRODUK -->
<section id="katalog-produk" class="w-full p-[2rem] bg-white">

    <!-- FILTER & SORT BAR (CARD CONTAINER) -->
    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-sm mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <!-- Categories -->
        <div class="flex items-center gap-1.5 overflow-x-auto pb-2 sm:pb-0 text-xs font-bold scrollbar-none">
            <span class="text-slate-800 font-extrabold mr-3 shrink-0">Kategori:</span>
            
            <!-- Tombol Semua -->
            <a href="{{ route('produk') }}" 
               class="{{ !$kategoriSelected ? 'bg-amber-500 text-white font-bold' : 'bg-transparent text-slate-600 hover:text-amber-500 font-medium' }} px-3.5 py-1.5 rounded-lg transition-all shrink-0">
                Semua
            </a>

            <!-- Loop Kategori Dinamis -->
            @foreach ($kategoriList as $kategori)
                <a href="{{ route('produk', array_merge(request()->query(), ['kategori' => $kategori->id, 'page' => 1])) }}" 
                   class="{{ $kategoriSelected == $kategori->id ? 'bg-amber-500 text-white font-bold' : 'bg-transparent text-slate-600 hover:text-amber-500 font-medium' }} px-3.5 py-1.5 rounded-lg transition-all shrink-0">
                    {{ $kategori->nama }}
                </a>
            @endforeach
        </div>

        <!-- Sorting Form -->
        <form action="{{ route('produk') }}" method="GET" class="flex items-center gap-2 text-xs font-semibold text-slate-700 shrink-0">
            @if(request('kategori'))
                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
            @endif

            <span class="text-slate-600 font-medium">Urutkan</span>
            <div class="relative">
                <select name="sort" onchange="this.form.submit()" class="appearance-none bg-white border border-slate-200 rounded-lg pl-3 pr-8 py-1.5 text-slate-800 font-extrabold focus:outline-none focus:ring-1 focus:ring-amber-500 cursor-pointer shadow-sm">
                    <option value="terbaru" @selected(request('sort') == 'terbaru' || !request('sort'))>Terbaru</option>
                    <option value="terpopuler" @selected(request('sort') == 'terpopuler')>Terpopuler</option>
                    <option value="harga-rendah" @selected(request('sort') == 'harga-rendah')>Harga Terendah</option>
                    <option value="harga-tinggi" @selected(request('sort') == 'harga-tinggi')>Harga Tertinggi</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-500">
                    <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i>
                </div>
            </div>
        </form>
    </div>

    <!-- PRODUCT GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-12">
        @forelse ($produk as $item)
            <div class="bg-white rounded-3xl p-4 border border-slate-200/70 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                <div>
                    <!-- Gambar Produk -->
                    <div class="w-full h-64 bg-slate-100 rounded-2xl overflow-hidden mb-4 relative">
                        <img src="{{ $item->foto_utama ? asset('storage/' . $item->foto_utama) : 'https://via.placeholder.com/400' }}" 
                             alt="{{ $item->nama }}" 
                             class="w-full h-full object-cover object-center">
                    </div>

                    <!-- Kategori & Status Stok -->
                    <span class="inline-block font-extrabold uppercase text-amber-500 text-[11px] mb-2">{{ $item->kategori->nama ?? 'PRODUK' }}</span>

                    <!-- Nama & Harga -->
                    <h3 class="font-bold text-slate-900 text-base mb-1 line-clamp-1">{{ $item->nama }}</h3>
                    <p class="font-extrabold text-kainova-brown text-sm mb-4">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </p>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center gap-2 pt-2">
                    <a href="{{ route ('produk.detail', $item->slug)}}" 
                       class="flex-grow bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs py-2.5 rounded-xl transition-colors text-center">
                        Lihat Detail
                    </a>
                    
                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($item->nama) }}" 
                       target="_blank"
                       class="bg-emerald-500 hover:bg-emerald-600 text-white p-2.5 rounded-xl transition-colors flex items-center justify-center shrink-0" 
                       title="Tanya via WhatsApp">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-slate-500">
                <p class="font-medium">Belum ada produk yang ditemukan untuk kategori atau urutan ini.</p>
            </div>
        @endforelse
    </div>

    <!-- PAGINATION -->
    @if ($produk->hasPages())
        <div class="flex items-center justify-center gap-2 text-xs font-bold text-slate-500">
            @if ($produk->onFirstPage())
                <span class="px-3.5 py-2 rounded-xl bg-slate-100 border border-slate-200 text-slate-400 cursor-not-allowed select-none">
                    Kembali
                </span>
            @else
                <a href="{{ $produk->previousPageUrl() }}" class="px-3.5 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 transition-colors">
                    Kembali
                </a>
            @endif

            @foreach ($produk->getUrlRange(1, $produk->lastPage()) as $page => $url)
                @if ($page == $produk->currentPage())
                    <span class="w-9 h-9 rounded-xl bg-amber-500 text-white flex items-center justify-center font-bold shadow-sm">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}" class="w-9 h-9 rounded-xl bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 flex items-center justify-center transition-colors">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            @if ($produk->hasMorePages())
                <a href="{{ $produk->nextPageUrl() }}" class="px-3.5 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 transition-colors">
                    Lanjut
                </a>
            @else
                <span class="px-3.5 py-2 rounded-xl bg-slate-100 border border-slate-200 text-slate-400 cursor-not-allowed select-none">
                    Lanjut
                </span>
            @endif
        </div>
    @endif
</section>

    @if ($produk->hasPages())
        <!-- PAGINATION -->
        <div class="flex items-center justify-center gap-2 text-xs font-bold text-slate-500">
            {{-- Tombol Kembali --}}
            @if ($produk->onFirstPage())
                <span class="px-3 py-2 rounded-xl bg-slate-100 border border-slate-200 text-slate-400 cursor-not-allowed">
                    Kembali
                </span>
            @else
                <a href="{{ $produk->previousPageUrl() }}" class="px-3 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 transition-colors">
                    Kembali
                </a>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($produk->getUrlRange(1, $produk->lastPage()) as $page => $url)
                @if ($page == $produk->currentPage())
                    <span class="w-9 h-9 rounded-xl bg-amber-500 text-white flex items-center justify-center font-bold">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}" class="w-9 h-9 rounded-xl bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 flex items-center justify-center transition-colors">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            {{-- Tombol Lanjut --}}
            @if ($produk->hasMorePages())
                <a href="{{ $produk->nextPageUrl() }}" class="px-3 py-2 rounded-xl bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 transition-colors">
                    Lanjut
                </a>
            @else
                <span class="px-3 py-2 rounded-xl bg-slate-100 border border-slate-200 text-slate-400 cursor-not-allowed">
                    Lanjut
                </span>
            @endif
        </div>
    @endif

</main>
@endsection