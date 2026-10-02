@php
    $contact = \App\Models\Contact::first();
@endphp

<footer class="bg-[#121215] text-zinc-400 font-sans text-xs border-t border-zinc-800/80 pt-16 pb-8 mt-auto relative overflow-hidden">
    <!-- Variasi Glow Background & Pattern Tekstil -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-px bg-gradient-to-r from-transparent via-amber-500/50 to-transparent"></div>
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[600px] h-[150px] bg-amber-500/5 blur-[120px] pointer-events-none rounded-full"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 mb-14">
            
            <!-- Kolom 1: Logo & Deskripsi (Col 4) -->
            <div class="lg:col-span-4 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-amber-400 to-amber-600 rounded-xl flex items-center justify-center text-black font-black text-xl shadow-lg shadow-amber-500/10 shrink-0">
                        <i data-lucide="scissors" class="w-5 h-5 text-zinc-950"></i>
                    </div>
                    <div>
                        <span class="font-black text-lg text-white tracking-wide block leading-none">KAINOVA</span>
                        <span class="text-[9px] text-amber-500 font-bold uppercase tracking-widest">SMKN 2 KARANGANYAR</span>
                    </div>
                </div>
                <p class="text-zinc-400 text-xs leading-relaxed pr-4">
                    Sistem Informasi Teknik Pembuatan Kain SMKN 2 Karanganyar. Pusat keunggulan pendidikan vokasi tekstil tradisional batik, kebaya, tailoring jas, hingga adibusana modern.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-semibold bg-zinc-800/80 border border-zinc-700/50 text-amber-400">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Akreditasi A / Unggulan
                    </span>
                </div>
            </div>

           

            <!-- Kolom 3: Tautan Cepat (Col 2) -->
            <div class="lg:col-span-2 space-y-3">
                <h3 class="text-white font-bold text-sm tracking-wide border-l-2 border-amber-500 pl-2.5">Tautan Cepat</h3>
                <ul class="space-y-2.5 text-zinc-400 pt-1">
                    <li><a href="{{ route('profil') }}" class="hover:text-amber-400 hover:translate-x-1 transition-all inline-block">Profil Jurusan</a></li>
                    <li><a href="{{ route('spmb') }}" class="hover:text-amber-400 hover:translate-x-1 transition-all inline-block">SPMB Jateng</a></li>
                    <li><a href="{{ route('produk.index') }}" class="hover:text-amber-400 hover:translate-x-1 transition-all inline-block">Katalog Produk</a></li>
                    <li><a href="{{ route('alumni') }}" class="hover:text-amber-400 hover:translate-x-1 transition-all inline-block">Alumni & BKK</a></li>
                    <li><a href="{{ route('prestasi') }}" class="hover:text-amber-400 hover:translate-x-1 transition-all inline-block">Prestasi Siswa</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Hubungi Kami & Maps Real Terrain/Satelit (Col 4) -->
            <div class="lg:col-span-4 space-y-4">
                <h3 class="text-white font-bold text-sm tracking-wide border-l-2 border-amber-500 pl-2.5">Lokasi & Kontak</h3>
                
                <!-- Google Maps Embed Ageng & Tampilan Satelit/Medan Real -->
                <div class="w-full h-48 rounded-2xl overflow-hidden border border-zinc-700/80 shadow-lg relative group">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.053828628045!2d110.95254827481617!3d-7.569080392445012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1740fb0aa509%3A0xd6bf9c4f74d081f9!2sSMK%20Negeri%202%20Karanganyar!5e1!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                        class="w-full h-full border-0 transition-transform duration-500 group-hover:scale-105" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <div class="absolute bottom-2 right-2 bg-black/70 backdrop-blur-md text-[10px] text-amber-400 font-medium px-2.5 py-1 rounded-lg border border-amber-500/20 pointer-events-none">
                        Tampilan Medan / Satelit
                    </div>
                </div>

                <ul class="space-y-2.5 text-zinc-300 pt-1">
                    <!-- Alamat -->
                    <li class="flex items-start gap-2.5">
                        <i data-lucide="map-pin" class="w-4 h-4 text-amber-500 shrink-0 mt-0.5"></i>
                        <span class="text-xs text-zinc-300 leading-snug">
                            {{ $contact->alamat ?? 'Jl. Yos Sudarso, Karanganyar, Jawa Tengah' }}
                        </span>
                    </li>

                    <!-- WhatsApp / Telepon -->
                    @if(!empty($contact->whatsapp))
                    <li class="flex items-center gap-2.5">
                        <i data-lucide="phone" class="w-4 h-4 text-amber-500 shrink-0"></i>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->whatsapp) }}" target="_blank" class="hover:text-amber-400 transition">
                            +{{ $contact->whatsapp }}
                        </a>
                    </li>
                    @endif

                    <!-- Email -->
                    @if(!empty($contact->email))
                    <li class="flex items-center gap-2.5">
                        <i data-lucide="mail" class="w-4 h-4 text-amber-500 shrink-0"></i>
                        <a href="mailto:{{ $contact->email }}" class="hover:text-amber-400 transition">
                            {{ $contact->email }}
                        </a>
                    </li>
                    @endif

                    <!-- Instagram / TikTok -->
                    <li class="flex items-center gap-3 pt-2">
                        @if(!empty($contact->instagram))
                        <a href="{{ str_contains($contact->instagram, 'http') ? $contact->instagram : 'https://instagram.com/' . ltrim($contact->instagram, '@') }}" target="_blank" class="w-8 h-8 rounded-lg bg-zinc-800 border border-zinc-700/60 flex items-center justify-center text-zinc-300 hover:text-amber-400 hover:border-amber-500/50 transition">
                            <i data-lucide="instagram" class="w-4 h-4"></i>
                        </a>
                        @endif
                        @if(!empty($contact->tiktok))
                        <a href="{{ str_contains($contact->tiktok, 'http') ? $contact->tiktok : 'https://tiktok.com/' . ltrim($contact->tiktok, '@') }}" target="_blank" class="w-8 h-8 rounded-lg bg-zinc-800 border border-zinc-700/60 flex items-center justify-center text-zinc-300 hover:text-amber-400 hover:border-amber-500/50 transition">
                            <i data-lucide="video" class="w-4 h-4"></i>
                        </a>
                        @endif
                    </li>
                </ul>
            </div>

        </div>

        <!-- Garis Pemisah Bottom Bar -->
        <div class="border-t border-zinc-800/80 pt-6 flex flex-col md:flex-row items-center justify-between gap-4 text-zinc-500 text-[11px]">
            <p>© 2026 KAINOVA SMKN 2 Karanganyar. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-zinc-300 transition">Kebijakan Privasi</a>
                <a href="#" class="hover:text-zinc-300 transition">Syarat & Ketentuan</a>
            </div>
        </div>
    </div>

    <!-- Floating Chat Widget KAINOVA AI -->
    <a href="{{ route('admin.ai-setting.index') }}" class="fixed bottom-6 right-6 z-50 bg-gradient-to-r from-amber-500 to-amber-400 hover:from-amber-400 hover:to-amber-300 text-black font-black text-xs px-5 py-3 rounded-full shadow-xl shadow-amber-500/20 flex items-center gap-2 transition-all hover:scale-105 active:scale-95 border border-amber-300/40">
        <i data-lucide="sparkles" class="w-4 h-4 text-black"></i>
        <span>KAINOVA AI</span>
    </a>
</footer>