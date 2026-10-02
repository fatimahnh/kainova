<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Portal Administrator KAINOVA</title>
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
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-kainova-navy min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2 min-h-[520px]">
        
        <!-- Sisi Kiri: Branding KAINOVA -->
        <div class="bg-kainova-dark p-10 text-white flex flex-col justify-between relative overflow-hidden">
            <div class="absolute -right-12 -bottom-12 w-64 h-64 bg-kainova-orange/10 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-gradient-to-br from-kainova-amber to-kainova-orange rounded-xl flex items-center justify-center font-black text-black text-xl shadow-lg">
                        K
                    </div>
                    <div>
                        <span class="font-black tracking-wider text-xl text-amber-400 block leading-none">KAINOVA</span>
                        <span class="text-[10px] text-gray-400 font-medium">SMK Negeri 2 Karanganyar</span>
                    </div>
                </div>

                <span class="px-3 py-1 bg-amber-500/10 text-amber-400 border border-amber-500/20 text-[10px] font-bold rounded-full">
                    PORTAL ADMINISTRATOR UTAMA
                </span>

                <h2 class="text-2xl font-bold mt-4 mb-2 text-white leading-tight">
                    Sistem Informasi Keahlian Tekstil
                </h2>
                <p class="text-xs text-gray-400 leading-relaxed">
                    Kelola data kompetensi siswa, pameran produk kriya kreatif unggulan, timeline praktik kerja industri (PKL), dan bursa kerja secara real-time.
                </p>
            </div>

            <div class="relative z-10 pt-6 border-t border-zinc-800 text-[10px] text-gray-500">
                SMK NEGERI 2 KARANGANYAR <br>
                Maju Bersama Talenta Karya Tekstil Nusantara © 2026
            </div>
        </div>

        <!-- Sisi Kanan: Form Login -->
        <div class="p-10 flex flex-col justify-center bg-white">
            <div class="mb-6">
                <h3 class="text-xl font-bold text-kainova-navy">Masuk ke Dashboard</h3>
                <p class="text-xs text-gray-500">Masukkan kredensial akun administrator Anda yang sah</p>
            </div>

            @if($errors->any())
                <div class="mb-4 p-3 bg-red-50 border-l-4 border-red-500 rounded-r-xl text-xs text-red-700 font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Username / NIP</label>
                    <input type="text" name="username" value="{{ old('username') }}" required placeholder="Masukkan username atau NIP" 
                        class="w-full text-xs p-3.5 border border-gray-200 rounded-xl outline-none focus:border-kainova-orange focus:ring-1 focus:ring-kainova-orange transition bg-gray-50/50">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Kata Sandi</label>
                    <input type="password" name="password" required placeholder="••••••••" 
                        class="w-full text-xs p-3.5 border border-gray-200 rounded-xl outline-none focus:border-kainova-orange focus:ring-1 focus:ring-kainova-orange transition bg-gray-50/50">
                </div>

                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 text-gray-600 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-kainova-orange focus:ring-kainova-orange">
                        Ingat Saya
                    </label>
                    <a href="#" class="text-kainova-orange font-bold hover:underline">Lupa Password?</a>
                </div>

                <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-kainova-amber to-kainova-orange text-black font-extrabold text-xs rounded-xl shadow-lg shadow-orange-500/20 hover:opacity-95 transition mt-2">
                    Masuk Sekarang
                </button>
            </form>

            <p class="text-[11px] text-gray-400 text-center mt-8">
                Butuh bantuan login? Hubungi Tim IT SMKN 2
            </p>
        </div>

    </div>

</body>
</html>