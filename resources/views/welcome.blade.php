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
            html { scroll-behavior: smooth; }
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
            
            <a href="{{ url('/login?role=admin') }}" class="px-5 py-2.5 bg-white/50 border border-indigo-100 rounded-full text-[13px] font-bold text-indigo-600 hover:bg-white hover:shadow-md transition-all duration-300 backdrop-blur-sm">
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
                        <a href="{{ url('/login?role=pelanggan') }}" class="group relative px-8 py-4 bg-indigo-600 text-white rounded-[18px] font-bold text-[16px] shadow-xl shadow-indigo-200 hover:bg-indigo-700 transition-all duration-300 active:scale-95 flex items-center gap-3">
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
                        <a href="#katalog" class="glass p-6 rounded-[32px] shadow-2xl floating flex flex-col gap-4 group cursor-pointer hover:scale-105 transition-all duration-500">
                            <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                            </div>
                            <h3 class="font-bold text-[18px]">Ribuan Katalog</h3>
                            <p class="text-[13px] text-slate-500 leading-relaxed">Buku pendidikan berkualitas untuk tingkat SD, SMP, hingga SMA. Klik untuk melihat.</p>
                        </a>

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

        <!-- Book Catalog Section -->
        <section id="katalog" class="max-w-7xl mx-auto px-6 py-24 scroll-mt-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <h2 class="text-[32px] font-extrabold text-indigo-950 tracking-tight">Katalog Buku Terbaru</h2>
                    <p class="text-slate-500 font-medium mt-2">Temukan referensi belajar terbaik untuk siswa masa kini.</p>
                </div>
                <a href="{{ url('/login?role=pelanggan') }}" class="text-indigo-600 font-bold text-[14px] flex items-center gap-2 hover:gap-3 transition-all">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($dummyBooks as $book)
                <div class="group bg-white rounded-[28px] p-4 border border-slate-100 hover:border-indigo-100 hover:shadow-2xl hover:shadow-indigo-100 transition-all duration-500 flex flex-col h-full">
                    <div class="aspect-[3/4] rounded-[20px] overflow-hidden bg-slate-50 mb-6 relative">
                        <img src="{{ $book->image }}" alt="{{ $book->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-3 left-3 flex flex-col gap-2">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-md text-indigo-600 text-[10px] font-bold rounded-full border border-white/50 uppercase tracking-wider">{{ $book->category }}</span>
                            <span class="px-3 py-1 bg-indigo-600 text-white text-[10px] font-bold rounded-full shadow-lg shadow-indigo-100">{{ $book->class }}</span>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-indigo-950 text-[16px] leading-tight mb-2 group-hover:text-indigo-600 transition-colors">{{ $book->title }}</h3>
                        <p class="text-slate-400 text-[12px] font-medium mb-4">{{ $book->author ?? 'Tim Penulis Arya Duta' }}</p>
                    </div>
                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-slate-50">
                        <span class="font-extrabold text-indigo-950 text-[18px]">{{ $book->price }}</span>
                        <a href="{{ url('/login?role=pelanggan') }}" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-xl flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

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
