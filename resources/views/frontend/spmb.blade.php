@extends('layouts.frontend')

@section('title', 'KAINOVA - SPMB')

@section('content')
<!-- Main Content Container -->
    <main class="flex-grow bg-kainova-cream p-4">
        
        <!-- Banner Pemberitahuan Resmi -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
            <div class="bg-amber-100 border border-amber-200 rounded-2xl p-4 flex items-center gap-3 text-xs md:text-sm text-amber-900 shadow-sm">
                <div class="w-7 h-7 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 flex-shrink-0">
                    <i data-lucide="info" class="w-4 h-4"></i>
                </div>
                <p>
                    <span class="font-bold">Pemberitahuan Resmi:</span> Segala alur pendaftaran dan seleksi dilakukan secara terpusat melalui portal resmi SPMB Dinas Pendidikan Provinsi Jawa Tengah.
                </p>
            </div>
        </div>

        <!-- Hero Section SPMB -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Hero Text Left -->
                <div class="lg:col-span-7">
                    <h1 class="text-2xl sm:text-4xl md:text-4xl font-black text-slate-900 leading-tight mb-5 tracking-tight">
                        Penerimaan Siswa Baru Angkatan 2026/2027
                    </h1>
                    <p class="text-slate-500 text-sm md:text-base leading-relaxed mb-8 max-w-xl">
                        Bergabunglah bersama program keahlian kriya kain terbaik di Jawa Tengah. Kami mencetak talenta unggulan garmen dan tekstil batik siap kerja berkualitas internasional.
                    </p>
                    <a href="https://spmb.jatengprov.go.id/" target="_blank" class="inline-flex items-center gap-2.5 px-6 py-3.5 bg-kainova-amber text-white font-extrabold text-xs rounded shadow-md hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                        <span>Daftar melalui SPMB Jateng</span>
                        <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- Hero Image Right -->
                <div class="lg:col-span-5">
                    <div class="rounded-3xl overflow-hidden shadow-xl">
                        <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=1000&auto=format&fit=crop" 
                             alt="Siswa SMKN 2 Karanganyar" 
                             class="w-full h-72 sm:h-96 object-cover object-top hover:scale-105 transition-transform duration-500">
                    </div>
                </div>

            </div>
        </section>

        <!-- Information Cards: Jadwal & Persyaratan -->
        <!-- Section Utama dengan Lebar Maksimal / Lebih Lebar -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <!-- Menggunakan Grid 12 Kolom -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                
                <!-- Kolom Left: Jadwal Pendaftaran (col-span-7 / LEBIH LEBAR) -->
                <div class="lg:col-span-7 bg-white p-7 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 bg-amber-500 rounded-full"></span>
                            Jadwal Pendaftaran
                        </h3>

                        <div class="space-y-4 text-xs sm:text-sm">
                            <!-- Step 1 -->
                            <div class="flex items-center justify-between pb-3 border-b border-slate-100 gap-4">
                                <span class="font-semibold text-slate-700">Gelombang I - Jalur Afiliasi</span>
                                <span class="font-black text-amber-500">10 - 20 Mei 2026</span>
                            </div>

                            <!-- Step 2 -->
                            <div class="flex items-center justify-between pb-3 border-b border-slate-100 gap-4">
                                <span class="font-semibold text-slate-700">Gelombang II - Reguler & Prestasi</span>
                                <span class="font-black text-amber-500">01 - 15 Juni 2026</span>
                            </div>

                            <!-- Step 3 -->
                            <div class="flex items-center justify-between pb-3 border-b border-slate-100 gap-4">
                                <span class="font-semibold text-slate-700">Pengumuman Hasil Akhir</span>
                                <span class="font-black text-amber-500">22 Juni 2026</span>
                            </div>

                            <!-- Step 4 -->
                            <div class="flex items-center justify-between pb-3 border-b border-slate-100 gap-4">
                                <span class="font-semibold text-slate-700">Daftar Ulang Siswa Baru</span>
                                <span class="font-black text-amber-500">25 - 28 Juni 2026</span>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Kolom Right: Persyaratan Dokumen (col-span-5) -->
                <div class="lg:col-span-5 bg-white p-7 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 bg-amber-500 rounded-full"></span>
                            Persyaratan Dokumen
                        </h3>

                        <ul class="space-y-3.5 text-xs sm:text-sm text-slate-600">
                            <li class="flex items-start gap-3">
                                <i data-lucide="check" class="w-4 h-4 text-slate-800 mt-0.5 flex-shrink-0"></i>
                                <span>Ijazah SMP/Sederajat (Asli & Fotokopi Legalisir)</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i data-lucide="check" class="w-4 h-4 text-slate-800 mt-0.5 flex-shrink-0"></i>
                                <span>Surat Keterangan Hasil Ujian Nasional (SKHUN)</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i data-lucide="check" class="w-4 h-4 text-slate-800 mt-0.5 flex-shrink-0"></i>
                                <span>Kartu Keluarga (KK) & Akta Kelahiran</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i data-lucide="check" class="w-4 h-4 text-slate-800 mt-0.5 flex-shrink-0"></i>
                                <span>Pas Foto 3x4 Background Merah (4 Lembar)</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i data-lucide="check" class="w-4 h-4 text-slate-800 mt-0.5 flex-shrink-0"></i>
                                <span>Surat Keterangan Sehat & Bebas Buta Warna (Penting!)</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i data-lucide="check" class="w-4 h-4 text-slate-800 mt-0.5 flex-shrink-0"></i>
                                <span>Rapor SMP/Sederajat Semester 1 - 5</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-12 md:py-10">
            <div class="p-8 sm:p-12">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 text-center mb-10 tracking-tight">
                    Pertanyaan Sering Diajukan (FAQ)
                </h2>

                <div class="space-y-6">
                    <!-- FAQ Item 1 -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h4 class="font-bold text-kainova-brown text-sm sm:text-base flex items-start gap-2 mb-2">
                            <span class="text-amber-500 font-extrabold">?</span>
                            Apakah ada tes khusus buta warna?
                        </h4>
                        <p class="text-xs sm:text-sm text-slate-500 pl-5 leading-relaxed">
                            Ya. Kompetensi Keahlian Teknik Pembuatan Kain memerlukan kecocokan warna yang akurat untuk pemilahan benang dan pewarnaan batik, maka calon siswa wajib tidak buta warna.
                        </p>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h4 class="font-bold text-kainova-brown text-sm sm:text-base flex items-start gap-2 mb-2">
                            <span class="text-amber-500 font-extrabold">?</span>
                            Apakah lulusan dapat langsung bekerja?
                        </h4>
                        <p class="text-xs sm:text-sm text-slate-500 pl-5 leading-relaxed">
                            Sangat bisa. Kami bekerjasama langsung dengan 50+ garmen industri di Jawa Tengah dan luar kota untuk penyerapan kerja langsung melalui BKK sekolah.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection