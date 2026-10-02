<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAINOVA - Admin Portal Tekstil SMKN 2 Karanganyar</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Color Palette Tema Tekstil KAINOVA -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        kainova: {
                            navy: '#0B132B',       /* Navy Gelap Utama */
                            dark: '#1C1A17',       /* Charcoal / Hitam Batik (Sidebar) */
                            amber: '#F59E0B',      /* Kuning Gold Tekstil */
                            orange: '#EA580C',     /* Orange Cerah Aksen */
                            bg: '#F8FAFC'          /* Abu-abu Terang Background */
                        }
                    }
                }
            }
        }
    </script>
    <!-- Font Inter & Lucide Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-kainova-bg flex min-h-screen text-gray-800 antialiased">

    <!-- Include Sidebar -->
    @include('layouts.sidebar')

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <!-- Header Topbar -->
        <header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <span class="text-xs font-semibold px-3 py-1 bg-amber-100 text-amber-800 rounded-full border border-amber-200">
                    Sistem Informasi Keahlian Tekstil
                </span>
                <h1 class="text-sm font-bold text-kainova-navy">SMK Negeri 2 Karanganyar</h1>
            </div>
            
            <!-- User Profile Topbar -->
            <div class="flex items-center gap-3 border-l border-gray-200 pl-6">
                <div class="text-right">
                    <p class="text-xs font-bold text-gray-800">Administrator</p>
                    <p class="text-[10px] text-gray-500">admin@smkn2kra.sch.id</p>
                </div>
                <div class="w-9 h-9 bg-gradient-to-tr from-kainova-orange to-kainova-amber rounded-xl flex items-center justify-center text-white font-bold text-xs shadow-md">
                    A
                </div>
            </div>
        </header>

        <!-- Dynamic Body Content -->
        <main class="flex-1 overflow-y-auto p-8">
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-xl flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-3">
                        <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600"></i>
                        <p class="text-xs font-bold text-emerald-800">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>