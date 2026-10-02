@extends('layouts.frontend')

@section('title', 'KAINOVA - Beranda')

@section('content')
    <!-- Hero Section -->
    <section class="min-h-[calc(100vh-72px)] bg-kainova-dark text-white py-20 px-8 text-center relative overflow-hidden flex items-center">

        <div class="max-w-3xl mx-auto relative z-10">

            <span class="px-4 py-1.5 bg-amber-500/20 border border-amber-500/30 text-amber-400 text-xs font-bold rounded-full inline-block mb-4">
                TEKNIK PEMBUATAN KAIN - SMKN 2 KARANGANYAR
            </span>

            <h1 class="text-5xl font-black mb-4 leading-tight">
                Berkarya dengan Kain, Menciptakan Masa Depan
            </h1>

            <p class="text-gray-300 text-base mb-8">
                Menyiapkan talenta kreatif dan profesional dalam kriya tekstil tradisional serta industri manufaktur garmen modern. Dari desain serat hingga karya busana adibusana bernilai seni tinggi.
            </p>

            <div class="flex justify-center gap-4">

                <a
                    href="{{ route('produk')}}"
                    class="px-6 py-3 bg-kainova-amber text-white font-bold text-xs rounded-lg shadow-lg hover:bg-orange-600 transition flex items-center"
                >
                    Lihat Produk Kami
                </a>

                <a
                    href="#"
                    class="px-6 py-3 text-white border-2 border-white/50 font-bold text-xs rounded-lg hover:bg-white/20 transition"
                >
                    Tentang Kami
                </a>

            </div>

        </div>

    </section>

    <!-- AKSES CEPAT INFORMASI SECTION -->
    <section class="py-20 bg-kainova-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-neutral-900 tracking-tight">Akses Cepat Informasi</h2>
                <div class="w-16 h-1 bg-brand-orange mx-auto mt-3 rounded-full"></div>
            </div>

            <!-- 6 Grid Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-2xl border border-neutral-200/80 shadow-sm hover:shadow-md transition duration-300 group items-start cursor-pointer">
                    <div class="w-12 h-12 rounded-xl bg-kainova-cream flex items-center justify-center text-kainova-orange shrink-0 group-hover:bg-brand-orange group-hover:text-white transition duration-300 mb-4 mb-4">
                        <i data-lucide="user-plus" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-neutral-900 text-lg group-hover:text-brand-orange transition">SPMB 2026</h3>
                        <p class="text-sm text-gray-500 mt-1">Pendaftaran Siswa Baru</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-2xl border border-neutral-200/80 shadow-sm hover:shadow-md transition duration-300 group items-start cursor-pointer">
                    <div class="w-12 h-12 rounded-xl bg-kainova-cream flex items-center justify-center text-kainova-orange shrink-0 group-hover:bg-brand-orange group-hover:text-white transition duration-300 mb-4">
                        <i data-lucide="shopping-bag" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-neutral-900 text-lg group-hover:text-brand-orange transition">Katalog Produk</h3>
                        <p class="text-sm text-gray-500 mt-1">Karya Unggulan Siswa</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-2xl border border-neutral-200/80 shadow-sm hover:shadow-md transition duration-300 group items-start cursor-pointer">
                    <div class="w-12 h-12 rounded-xl bg-kainova-cream flex items-center justify-center text-kainova-orange shrink-0 group-hover:bg-brand-orange group-hover:text-white transition duration-300 mb-4">
                        <i data-lucide="briefcase" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-neutral-900 text-lg group-hover:text-brand-orange transition">Program PKL</h3>
                        <p class="text-sm text-gray-500 mt-1">Hubungan Industri & Magang</p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white p-6 rounded-2xl border border-neutral-200/80 shadow-sm hover:shadow-md transition duration-300 group items-start cursor-pointer">
                    <div class="w-12 h-12 rounded-xl bg-kainova-cream flex items-center justify-center text-kainova-orange shrink-0 group-hover:bg-brand-orange group-hover:text-white transition duration-300 mb-4">
                        <i data-lucide="building-2" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-neutral-900 text-lg group-hover:text-brand-orange transition">Bursa Kerja Khusus</h3>
                        <p class="text-sm text-gray-500 mt-1">Peluang Karir Alumni</p>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="bg-white p-6 rounded-2xl border border-neutral-200/80 shadow-sm hover:shadow-md transition duration-300 group items-start cursor-pointer">
                    <div class="w-12 h-12 rounded-xl bg-kainova-cream flex items-center justify-center text-kainova-orange shrink-0 group-hover:bg-brand-orange group-hover:text-white transition duration-300 mb-4">
                        <i data-lucide="award" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-neutral-900 text-lg group-hover:text-brand-orange transition">Prestasi Siswa</h3>
                        <p class="text-sm text-gray-500 mt-1">Kemenangan Kriya Nasional</p>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="bg-white p-6 rounded-2xl border border-neutral-200/80 shadow-sm hover:shadow-md transition duration-300 group items-start cursor-pointer">
                    <div class="w-12 h-12 rounded-xl bg-kainova-cream flex items-center justify-center text-kainova-orange shrink-0 group-hover:bg-brand-orange group-hover:text-white transition duration-300">
                        <i data-lucide="mail" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-neutral-900 text-lg group-hover:text-brand-orange transition">Kontak & Layanan</h3>
                        <p class="text-sm text-gray-500 mt-1">Hubungi Hub Masyarakat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KARYA PRODUK TEKSTIL UNGGULAN SECTION -->
    <section id="produk" class="py-20 bg-brand-creamCard/60 border-t border-b border-neutral-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header with Title & Selengkapnya Link -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-bold tracking-widest text-brand-orange uppercase block mb-1">GALERI KREATIVITAS SISWA</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-neutral-900 tracking-tight">Karya Produk Tekstil Unggulan</h2>
                </div>
                <a href="{{route ('produk')}}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-neutral-700 hover:text-brand-orange bg-white border border-neutral-300 px-4 py-2 rounded-lg transition shadow-sm w-fit">
                    Selengkapnya <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                </a>
            </div>

            <!-- Product Grid (4 Items) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($produkTerbaru as $item)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group border border-neutral-200/70">
                        <div>
                            <div class="h-64 bg-neutral-200 relative overflow-hidden">
                                <!-- Foto Produk (disesuaikan dengan foto_utama) -->
                                <img src="{{ $item->foto_utama ? asset('storage/' . $item->foto_utama) : 'https://via.placeholder.com/400' }}" 
                                    alt="{{ $item->nama }}" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            </div>
                            <div class="p-5">
                                <!-- Kategori Produk via Relasi -->
                                <span class="text-[11px] font-bold tracking-wider text-amber-700 uppercase">
                                    {{ $item->kategori->nama ?? 'TEKSTIL' }}
                                </span>
                                
                                <!-- Nama Produk -->
                                <h3 class="font-bold text-neutral-900 text-base mt-1 line-clamp-1">
                                    {{ $item->nama }}
                                </h3>
                                
                                <!-- Harga Produk -->
                                <p class="text-neutral-900 font-extrabold text-sm mt-2">
                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                        <div class="p-5 pt-0">
                            <!-- Tombol Detail (Menggunakan slug atau id) -->
                            <a href="" class="block w-full bg-amber-50 hover:bg-brand-orange hover:text-white text-amber-800 font-semibold py-2.5 rounded-xl text-xs transition duration-200 text-center">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 text-neutral-500">
                        Belum ada produk yang ditampilkan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- STATISTICS COUNTER SECTION -->
    <section class="bg-kainova-brown py-16 text-white border-y border-amber-900/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <!-- Stat 1 -->
                <div class="space-y-1">
                    <p class="text-4xl sm:text-5xl font-extrabold text-amber-400">500+</p>
                    <p class="text-amber-100/80 text-xs sm:text-sm font-medium">Alumni Sukses</p>
                </div>

                <!-- Stat 2 -->
                <div class="space-y-1">
                    <p class="text-4xl sm:text-5xl font-extrabold text-amber-400">50+</p>
                    <p class="text-amber-100/80 text-xs sm:text-sm font-medium">Mitra Industri Tekstil</p>
                </div>

                <!-- Stat 3 -->
                <div class="space-y-1">
                    <p class="text-4xl sm:text-5xl font-extrabold text-amber-400">100+</p>
                    <p class="text-amber-100/80 text-xs sm:text-sm font-medium">Produk Mandiri Terdaftar</p>
                </div>

                <!-- Stat 4 -->
                <div class="space-y-1">
                    <p class="text-4xl sm:text-5xl font-extrabold text-amber-400">25+</p>
                    <p class="text-amber-100/80 text-xs sm:text-sm font-medium">Penghargaan Kriya Nasional</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIAL SECTION -->
    <section id="alumni" class="py-20 bg-brand-creamBg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-neutral-900 tracking-tight">Apa Kata Alumni & Industri?</h2>
                <div class="w-16 h-1 bg-brand-orange mx-auto mt-3 rounded-full"></div>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse ($testimoniTerbaru as $item)
                <div class="bg-white p-8 rounded-2xl border border-neutral-200/80 shadow-sm flex flex-col justify-between relative">
                    <div class="mb-6">
                        <div class="text-amber-500 mb-4">
                            <i data-lucide="quote" class="w-8 h-8 opacity-40"></i>
                        </div>
                        <p class="text-neutral-700 text-sm leading-relaxed italic">
                            {{ $item->testimoni}}
                    </div>
                    <div class="border-t border-neutral-100 pt-4">
                        <h4 class="font-bold text-neutral-900 text-sm">{{ $item->nama}}</h4>
                        <p class="text-xs text-gray-500">Alumni Angkatan {{ $item->tahun_lulus}} • {{ $item->pekerjaan_saat_ini}}</p>
                    </div>
                </div>
                @empty
                    <div class="col-span-full text-center py-8 text-neutral-500">
                        Belum ada testimoni dari alumni.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection