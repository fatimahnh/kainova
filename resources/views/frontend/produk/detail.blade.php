@extends('layouts.frontend')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <!-- Breadcrumb Navigasi -->
    <nav class="flex items-center gap-2 text-xs text-slate-400 font-medium mb-8">
        <a href="{{ route('produk') }}" class="hover:text-amber-500 transition-colors">Katalog</a>
        <span>/</span>
        <a href="{{ route('produk', ['kategori' => $produk->kategori_id]) }}" class="hover:text-amber-500 transition-colors">
            {{ $produk->kategori->nama ?? 'Kebaya' }}
        </a>
        <span>/</span>
        <span class="text-amber-500 font-semibold">{{ $produk->nama }}</span>
    </nav>

    <!-- Kontainer Utama Detail Produk -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
        
        <!-- KOLOM KIRI: Galeri Gambar Produk -->
        <div class="lg:col-span-5 space-y-4">
            <!-- Gambar Utama -->
            <div class="w-full h-[420px] bg-slate-900 rounded-3xl overflow-hidden shadow-sm relative">
                <img id="main-image" 
                     src="{{ $produk->foto_utama ? asset('storage/' . $produk->foto_utama) : 'https://via.placeholder.com/600x600' }}" 
                     alt="{{ $produk->nama }}" 
                     class="w-full h-full object-cover object-center">
            </div>

            <!-- Thumbnail Gambar Tambahan -->
            <div class="grid grid-cols-4 gap-3">
                <button onclick="changeImage(this.src)" class="h-20 bg-slate-100 rounded-2xl overflow-hidden border-2 border-amber-500 focus:outline-none transition-all">
                    <img src="{{ $produk->foto_utama ? asset('storage/' . $produk->foto_utama) : 'https://via.placeholder.com/150' }}" alt="Thumb 1" class="w-full h-full object-cover">
                </button>
                @if(isset($produk->galeri) && count($produk->galeri) > 0)
                    @foreach($produk->galeri as $galeri)
                        <button onclick="changeImage(this.src)" class="h-20 bg-slate-100 rounded-2xl overflow-hidden border-2 border-transparent hover:border-amber-500 focus:outline-none transition-all">
                            <img src="{{ asset('storage/' . $galeri->foto) }}" alt="Thumb" class="w-full h-full object-cover">
                        </button>
                    @endforeach
                @else
                    {{-- Dummy Thumbnail jika belum ada galeri tambahan --}}
                    <div class="h-20 bg-slate-100 rounded-2xl overflow-hidden border border-slate-200">
                        <img src="https://via.placeholder.com/150" class="w-full h-full object-cover">
                    </div>
                    <div class="h-20 bg-slate-100 rounded-2xl overflow-hidden border border-slate-200">
                        <img src="https://via.placeholder.com/150" class="w-full h-full object-cover">
                    </div>
                    <div class="h-20 bg-slate-100 rounded-2xl overflow-hidden border border-slate-200">
                        <img src="https://via.placeholder.com/150" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
        </div>

        <!-- KOLOM KANAN: Informasi & Detail Produk -->
        <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm space-y-6">
            
            <!-- Kategori-->
            <span class="font-extrabold uppercase text-amber-500 tracking-wider text-xs">
                {{ $produk->kategori->nama ?? 'KEBAYA TRADISIONAL' }}
            </span>

            <!-- Nama & Harga Produk -->
            <div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 mb-2">
                    {{ $produk->nama }}
                </h1>
                <p class="text-xl font-black text-slate-900">
                    Rp {{ number_format($produk->harga ?? 450000, 0, ',', '.') }}
                </p>
            </div>

            <!-- Pilihan Ukuran -->
            <div>
                <label class="block text-xs font-bold text-slate-800 mb-2.5">Pilih Ukuran:</label>
                <div class="flex items-center gap-2.5 text-xs font-bold">
                    @foreach(['S', 'M', 'L', 'XL'] as $size)
                        <button type="button" 
                                class="w-10 h-10 rounded-xl border border-slate-200 hover:border-amber-500 hover:text-amber-500 focus:bg-amber-500 focus:text-white focus:border-amber-500 transition-all flex items-center justify-center text-slate-700">
                            {{ $size }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Tombol Aksi (WhatsApp & Share) -->
            <div class="flex items-center gap-3 pt-2">
                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($produk->nama) }}" 
                   target="_blank" 
                   class="flex-grow bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm py-3.5 px-6 rounded-2xl transition-colors flex items-center justify-center gap-2 shadow-sm">
                    <i data-lucide="message-circle" class="w-5 h-5"></i>
                    Pesan via WhatsApp
                </a>
                
                <button type="button" 
                        onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan produk berhasil disalin!');"
                        class="p-3.5 rounded-2xl border border-slate-200 hover:bg-slate-50 text-amber-500 transition-colors flex items-center justify-center shrink-0" 
                        title="Bagikan Produk">
                    <i data-lucide="share-2" class="w-5 h-5"></i>
                </button>
            </div>

            <!-- Card Informasi: Deskripsi Kerajinan -->
            <div class="bg-amber-50/50 rounded-2xl p-4 sm:p-5 border border-amber-100 space-y-1.5">
                <h4 class="font-bold text-slate-900 text-xs sm:text-sm">Deskripsi Kerajinan</h4>
                <p class="text-slate-600 text-xs leading-relaxed">
                    {{ $produk->deskripsi}}
                </p>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    // Fungsi untuk mengganti foto utama saat thumbnail diklik
    function changeImage(src) {
        document.getElementById('main-image').src = src;
    }
</script>
@endpush
@endsection