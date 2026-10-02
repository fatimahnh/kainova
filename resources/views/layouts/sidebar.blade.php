<aside class="w-64 bg-kainova-dark min-h-screen p-5 text-white flex flex-col justify-between shadow-xl flex-shrink-0">
    <div>
        <!-- Logo KAINOVA -->
        <div class="flex items-center gap-3 mb-8 px-2">
            <div class="w-10 h-10 bg-gradient-to-br from-kainova-amber to-kainova-orange rounded-xl flex items-center justify-center font-black text-black text-xl shadow-lg shadow-amber-500/20">
                K
            </div>
            <div>
                <span class="font-black tracking-wider text-lg text-amber-400 block leading-none">KAINOVA</span>
                <span class="text-[9px] text-gray-400 font-medium tracking-tight">Tekstil SMKN 2 Karanganyar</span>
            </div>
        </div>

        <!-- Menu Navigation -->
        <nav class="space-y-1 text-xs">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold shadow-md shadow-orange-500/20' : 'text-gray-400 hover:bg-zinc-800 hover:text-white' }}">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Dashboard
            </a>

            <!-- Katalog Produk -->
            <a href="{{ route('admin.produk.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-medium {{ request()->routeIs('admin.produk.*') ? 'bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold shadow-md shadow-orange-500/20' : 'text-gray-400 hover:bg-zinc-800 hover:text-white' }}">
                <i data-lucide="shopping-bag" class="w-4 h-4"></i> Katalog Produk
            </a>

            <!-- Kategori Produk -->
            <a href="{{ route('admin.kategori.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-medium {{ request()->routeIs('admin.kategori.*') ? 'bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold shadow-md shadow-orange-500/20' : 'text-gray-400 hover:bg-zinc-800 hover:text-white' }}">
                <i data-lucide="tags" class="w-4 h-4"></i> Kategori Produk
            </a>

            <!-- Program PKL -->
            <a href="{{ route('admin.pkl.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-medium {{ request()->routeIs('admin.pkl.*') ? 'bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold shadow-md shadow-orange-500/20' : 'text-gray-400 hover:bg-zinc-800 hover:text-white' }}">
                <i data-lucide="briefcase" class="w-4 h-4"></i> Program PKL
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-zinc-800 hover:text-white transition-all font-medium">
                <i data-lucide="user-plus" class="w-4 h-4"></i> Pendaftaran SPMB
            </a>
            <a href="{{ route('admin.bkk.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-medium {{ request()->routeIs('admin.bkk.*') ? 'bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold shadow-md shadow-orange-500/20' : 'text-gray-400 hover:bg-zinc-800 hover:text-white' }}">
                <i data-lucide="building-2" class="w-4 h-4"></i> Bursa Kerja (BKK)
            </a>
            <a href="{{ route('admin.dokumentasi.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-zinc-800 hover:text-white transition-all font-medium">
                <i data-lucide="camera" class="w-4 h-4"></i> Dokumentasi
            </a>
            <a href="{{ route('admin.prestasi.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-zinc-800 hover:text-white transition-all font-medium">
                <i data-lucide="award" class="w-4 h-4"></i> Prestasi Siswa
            </a>
            <a href="{{ route('admin.guru.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-medium {{ request()->routeIs('admin.guru.*') ? 'bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold shadow-md shadow-orange-500/20' : 'text-gray-400 hover:bg-zinc-800 hover:text-white' }}">
                <i data-lucide="users" class="w-4 h-4"></i> Daftar Guru
            </a>
            <a href="{{ route('admin.alumni.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-medium {{ request()->routeIs('admin.alumni.*') ? 'bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold shadow-md shadow-orange-500/20' : 'text-gray-400 hover:bg-zinc-800 hover:text-white' }}">
                <i data-lucide="graduation-cap" class="w-4 h-4"></i> Sistem Alumni
            </a>

            <a href="{{ route('admin.kontak.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-medium {{ request()->routeIs('admin.alumni.*') ? 'bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-bold shadow-md shadow-orange-500/20' : 'text-gray-400 hover:bg-zinc-800 hover:text-white' }}">
                <i data-lucide="graduation-cap" class="w-4 h-4"></i> Kontak
            </a>

           
            
            <a href="{{ route('admin.ai-setting.index') }}" 
                class="flex items-center gap-3 px-4 py-3 text-xs font-bold rounded-xl transition {{ request()->routeIs('admin.ai-setting.*') ? 'bg-gradient-to-r from-kainova-amber to-kainova-orange text-black shadow-md' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                <i data-lucide="bot" class="w-4 h-4"></i>
                <span>AI Setting</span>
            </a>
        </nav>
    </div>

    <!-- Tombol Logout -->
    <div class="px-2 pt-4 border-t border-zinc-800">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-xs text-red-400 hover:bg-red-500/10 rounded-xl transition font-semibold">
                <i data-lucide="log-out" class="w-4 h-4"></i> Keluar Portal
            </button>
        </form>
    </div>
</aside>