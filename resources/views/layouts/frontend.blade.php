<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'KAINOVA - Teknik Pembuatan Kain SMKN 2 Karanganyar')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        kainova: {
                            navy: '#0B132B',
                            dark: '#1C1A17',
                            amber: '#F59E0B',
                            orange: '#EA580C',
                            cream: '#fff9ed',
                            brown: '#5a3a21',
                            grey: '#f7f3ec'
                        }
                    }
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
    
    @stack('styles')
</head>

<body class="bg-slate-50 text-gray-800">

    <!-- Navbar Public -->
    <nav class="bg-white text-black sticky top-0 z-50 shadow-sm border-b-2 border-white/10">
        <div class="px-8 py-4 flex items-center">

            <!-- Logo -->
            <div class="flex items-center gap-3 flex-shrink-0">
                <div class="w-10 h-10 bg-gradient-to-br from-kainova-amber to-kainova-orange rounded-xl flex items-center justify-center font-black text-black text-lg">
                    K
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-black text-lg text-black block leading-none">
                        KAINOVA
                    </span>

                    <span class="text-[10px] text-black font-medium">
                        SMKN 2 Karanganyar
                    </span>
                </div>
            </div>

            <!-- Navigation Menu -->
            <div class="flex-1 flex justify-center">
                <div class="flex items-center gap-6 text-xs font-semibold">
                    <a href="{{ route('home') }}" class="hover:text-amber-400 transition">Home</a>
                    <a href="#" class="hover:text-amber-400 transition">Profil</a>
                    <a href="{{ route('spmb') }}" class="hover:text-amber-400 transition">SPMB</a>
                    <a href="{{ route('produk') }}" class="hover:text-amber-400 transition">Produk</a>
                    <a href="#" class="hover:text-amber-400 transition">PKL</a>
                    <a href="#" class="hover:text-amber-400 transition">BKK</a>
                    <a href="{{ route('dokumentasi') }}" class="hover:text-amber-400 transition">Dokumentasi</a>
                    <a href="#" class="hover:text-amber-400 transition">Prestasi</a>
                    <a href="#" class="hover:text-amber-400 transition">Alumni</a>
                    <a href="#" class="hover:text-amber-400 transition">Kontak</a>
                </div>
            </div>

            <!-- Admin Portal -->
            <div class="flex-shrink-0">
                <a href="{{ route('login') }}" class="px-4 py-2 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold rounded-xl shadow-md hover:opacity-90 transition flex items-center gap-2 text-xs">
                    <i data-lucide="lock" class="w-3.5 h-3.5"></i>
                    Admin Portal
                </a>
            </div>

        </div>
    </nav>

    <!-- CONTENT AREA -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Dark Section -->
    <footer class="bg-zinc-900 text-slate-300 pt-16 pb-8 border-t border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-10 mb-12 text-xs">
            
            <!-- Col 1: Brand Info -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-amber-400 to-orange-500 rounded-lg flex items-center justify-center font-black text-white text-base">
                        K
                    </div>
                    <div>
                        <span class="font-black text-sm text-white block leading-tight">KAINOVA</span>
                        <span class="text-[8px] text-slate-400 uppercase tracking-wider font-semibold">SMKN 2 KARANGANYAR</span>
                    </div>
                </div>
                <p class="text-slate-400 leading-relaxed text-[11px]">
                    Sistem Informasi Teknik Pembuatan Kain SMKN 2 Karanganyar. Pusat keunggulan pendidikan vokasi tekstil tradisional batik, kebaya, tailoring jas, hingga adibusana modern.
                </p>
            </div>

            <!-- Col 2: Program Keahlian -->
            <div>
                <h4 class="font-bold text-white text-sm mb-4">Program Keahlian</h4>
                <ul class="space-y-2.5 text-slate-400">
                    <li><a href="#" class="hover:text-amber-400 transition">Batik Tradisional</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">Kebaya & Busana Adat</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">Tailoring Jas & Blazer</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">Seragam & Konveksi</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">Gaun & Dressmaking</a></li>
                </ul>
            </div>

            <!-- Col 3: Tautan Cepat -->
            <div>
                <h4 class="font-bold text-white text-sm mb-4">Tautan Cepat</h4>
                <ul class="space-y-2.5 text-slate-400">
                    <li><a href="#" class="hover:text-amber-400 transition">Profil Jurusan</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">SPMB Jateng</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">Katalog Produk</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">Alumni & BKK</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">Prestasi Siswa</a></li>
                </ul>
            </div>

            <!-- Col 4: Hubungi Kami -->
            <div>
                <h4 class="font-bold text-white text-sm mb-4">Hubungi Kami</h4>
                <ul class="space-y-3 text-slate-400">
                    <li class="flex items-start gap-2.5">
                        <i data-lucide="map-pin" class="w-4 h-4 text-amber-400 flex-shrink-0 mt-0.5"></i>
                        <span>Jl. Yos Sudarso, Karanganyar, Jawa Tengah</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <i data-lucide="phone" class="w-4 h-4 text-amber-400 flex-shrink-0"></i>
                        <span>+62 271 495039</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <i data-lucide="mail" class="w-4 h-4 text-amber-400 flex-shrink-0"></i>
                        <span>info@smkn2kra.sch.id</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Copyright & Legal -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-zinc-800/80 pt-6 flex flex-col sm:flex-row items-center justify-between text-[11px] text-slate-500 gap-4">
            <p>© 2026 KAINOVA SMKN 2 Karanganyar. All rights reserved.</p>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:text-slate-400 transition">Kebijakan Privasi</a>
                <span>•</span>
                <a href="#" class="hover:text-slate-400 transition">Syarat & Ketentuan</a>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
    
    @stack('scripts')
</body>
</html>