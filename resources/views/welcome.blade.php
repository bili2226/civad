<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CIVAD - Sistem Informasi Buku Pendidikan</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); }
            .bg-mesh {
                background-color: #ffffff;
                background-image: radial-gradient(at 0% 0%, hsla(225, 100%, 94%, 1) 0, transparent 50%), 
                                  radial-gradient(at 50% 0%, hsla(225, 100%, 90%, 1) 0, transparent 50%), 
                                  radial-gradient(at 100% 0%, hsla(225, 100%, 94%, 1) 0, transparent 50%);
            }
            .floating { animation: floating 3s ease-in-out infinite; }
            @keyframes floating {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-15px); }
                100% { transform: translateY(0px); }
            }
        </style>
    </head>
    <body class="bg-mesh min-h-screen text-[#1E293B]">
        
        <!-- Top Navigation -->
        <nav class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between relative z-10">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-indigo-600 text-white rounded-[14px] flex items-center justify-center shadow-lg shadow-indigo-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-extrabold text-[20px] tracking-tight leading-none text-indigo-950">CIVAD</span>
                    <span class="text-[11px] font-bold text-indigo-400 uppercase tracking-widest mt-0.5">Arya Duta</span>
                </div>
            </div>
            
            <a href="{{ url('/admin/login') }}" class="px-5 py-2.5 bg-white/50 border border-indigo-100 rounded-full text-[13px] font-bold text-indigo-600 hover:bg-white hover:shadow-md transition-all duration-300 backdrop-blur-sm">
                ADMIN PORTAL
            </a>
        </nav>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-6 pt-12 pb-24 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-20">
                <!-- Left: Text -->
                <div class="lg:w-1/2">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-indigo-50 border border-indigo-100 rounded-full text-indigo-600 text-[12px] font-bold mb-6">
                        <span class="flex h-2 w-2 rounded-full bg-indigo-600 animate-pulse"></span>
                        CV ARYA DUTA OFFICIAL PLATFORM
                    </div>
                    <h1 class="text-[56px] lg:text-[72px] font-extrabold text-indigo-950 leading-[1.1] tracking-tight mb-8">
                        Masa Depan <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-500">Pendidikan</span> <br>
                        di Genggaman.
                    </h1>
                    <p class="text-[18px] text-slate-500 max-w-[500px] leading-relaxed mb-10">
                        Akses katalog buku pendidikan terlengkap dari penerbit CV Arya Duta. Cepat, transparan, dan terpercaya untuk seluruh mitra pendidikan kami.
                    </p>

                    <div class="flex items-center gap-4">
                        <a href="{{ url('/login') }}" class="group relative px-8 py-4 bg-indigo-600 text-white rounded-[18px] font-bold text-[16px] shadow-xl shadow-indigo-200 hover:bg-indigo-700 transition-all duration-300 active:scale-95 flex items-center gap-3">
                            Mulai Sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 group-hover:translate-x-1 transition-transform">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                        <div class="h-14 w-px bg-slate-200 mx-2"></div>
                        <div class="flex flex-col">
                            <span class="text-[14px] font-bold text-slate-900">25+ Tahun</span>
                            <span class="text-[12px] text-slate-500 font-medium tracking-tight">Berdedikasi untuk Pendidikan</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Visual -->
                <div class="lg:w-1/2 relative hidden lg:block">
                    <!-- Background Shapes -->
                    <div class="absolute -top-20 -right-20 w-[500px] h-[500px] bg-indigo-200/50 rounded-full blur-[80px]"></div>
                    <div class="absolute -bottom-20 -left-20 w-[300px] h-[300px] bg-blue-200/50 rounded-full blur-[60px]"></div>
                    
                    <!-- Floating Cards -->
                    <div class="relative grid grid-cols-2 gap-6 p-4">
                        <div class="glass p-6 rounded-[32px] shadow-2xl floating flex flex-col gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                            </div>
                            <h3 class="font-bold text-[18px]">Ribuan Katalog</h3>
                            <p class="text-[13px] text-slate-500 leading-relaxed">Buku pendidikan berkualitas untuk tingkat SD, SMP, hingga SMA.</p>
                        </div>

                        <div class="glass p-6 rounded-[32px] shadow-2xl floating flex flex-col gap-4 mt-12" style="animation-delay: -1.5s">
                            <div class="w-12 h-12 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125H3.75m16.5-12.75V15" /></svg>
                            </div>
                            <h3 class="font-bold text-[18px]">Akses Cepat</h3>
                            <p class="text-[13px] text-slate-500 leading-relaxed">Sistem manajemen pesanan modern untuk efisiensi transaksi Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer Stats -->
        <footer class="max-w-7xl mx-auto px-6 py-12 border-t border-indigo-100 relative z-10 flex flex-wrap gap-12">
            <div>
                <span class="block text-[24px] font-extrabold text-indigo-950 leading-none">1998</span>
                <span class="text-[12px] font-bold text-indigo-400 uppercase tracking-widest mt-1">Tahun Berdiri</span>
            </div>
            <div>
                <span class="block text-[24px] font-extrabold text-indigo-950 leading-none">10k+</span>
                <span class="text-[12px] font-bold text-indigo-400 uppercase tracking-widest mt-1">Mitra Aktif</span>
            </div>
            <div>
                <span class="block text-[24px] font-extrabold text-indigo-950 leading-none">500+</span>
                <span class="text-[12px] font-bold text-indigo-400 uppercase tracking-widest mt-1">Judul Buku</span>
            </div>
        </footer>
    </body>
</html>
