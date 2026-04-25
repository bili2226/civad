<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda - CIVAD</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; }
        .bg-mesh {
            background-image: radial-gradient(at 0% 0%, hsla(225, 100%, 98%, 1) 0, transparent 50%), 
                              radial-gradient(at 100% 100%, hsla(225, 100%, 98%, 1) 0, transparent 50%);
        }
        .glass-nav { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); }
        .info-card { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .info-card:hover { transform: translateY(-5px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05); }
    </style>
</head>
<body class="bg-mesh text-[#1E293B] min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="glass-nav border-b border-slate-100 sticky top-0 z-50">
        <div class="max-w-[1280px] mx-auto px-6">
            <div class="flex justify-between h-[88px]">
                <!-- Left: Logo -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-indigo-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-indigo-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-indigo-950 font-black text-[18px] leading-tight tracking-tight">CIVAD</span>
                        <span class="text-indigo-400 font-bold text-[10px] uppercase tracking-widest leading-tight">Arya Duta</span>
                    </div>
                </div>

                <!-- Middle: Links -->
                <div class="hidden lg:flex items-center gap-2">
                    <a href="{{ url('/pelanggan/beranda') }}" class="flex items-center gap-2 px-5 py-2.5 bg-indigo-50 text-indigo-600 rounded-2xl font-bold text-[14px] transition-all">
                        Beranda
                    </a>
                    <a href="{{ url('/pelanggan/dashboard') }}" class="flex items-center gap-2 px-5 py-2.5 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-bold text-[14px] transition-all">
                        Katalog Buku
                    </a>
                    <a href="{{ url('/pelanggan/status') }}" class="flex items-center gap-2 px-5 py-2.5 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-bold text-[14px] transition-all">
                        Status Pesanan
                    </a>
                    <a href="{{ url('/pelanggan/riwayat') }}" class="flex items-center gap-2 px-5 py-2.5 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-bold text-[14px] transition-all">
                        Riwayat
                    </a>
                </div>

                <!-- Right: Cart & Profile -->
                <div class="flex items-center gap-4">
                    <a href="{{ url('/pelanggan/keranjang') }}" class="w-12 h-12 flex items-center justify-center text-slate-400 hover:text-indigo-600 bg-slate-50 hover:bg-indigo-50 rounded-2xl transition-all relative">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        @if(session('cart_count', 0) > 0)
                        <span class="absolute -top-1 -right-1 bg-indigo-600 text-white text-[10px] font-black w-5 h-5 rounded-full flex items-center justify-center border-2 border-white">
                            {{ session('cart_count') }}
                        </span>
                        @endif
                    </a>
                    <div class="h-8 w-px bg-slate-100 hidden sm:block"></div>
                    <div class="hidden sm:flex items-center gap-3 bg-slate-50 px-4 py-2 rounded-2xl border border-slate-100">
                        <div class="text-right">
                            <p class="text-[13px] font-black text-indigo-950 leading-none">{{ session('username') ?? 'Customer' }}</p>
                            <p class="text-[10px] font-bold text-indigo-400 uppercase tracking-widest mt-1">Verified</p>
                        </div>
                        <div class="w-9 h-9 bg-indigo-600 text-white rounded-xl flex items-center justify-center font-bold shadow-lg shadow-indigo-100 uppercase">
                            {{ substr(session('username') ?? 'C', 0, 1) }}
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-10 h-10 flex items-center justify-center text-rose-500 hover:bg-rose-50 rounded-xl transition-all active:scale-95 group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 group-hover:translate-x-0.5 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" /></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col items-center pt-16 pb-24 px-6 w-full">
        <!-- Hero Section -->
        <div class="text-center flex flex-col items-center mb-16 w-full max-w-[900px]">
            <div class="inline-flex items-center gap-2 bg-indigo-50 text-indigo-600 px-4 py-2 rounded-full text-[12px] font-black uppercase tracking-widest mb-8 border border-indigo-100 animate-bounce">
                <span class="relative flex h-2 w-2">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-600"></span>
                </span>
                Selamat Datang di CIVAD
            </div>
            
            <h1 class="text-[56px] font-black text-indigo-950 tracking-tighter mb-6 leading-[1.1]">Eksplorasi Dunia Lewat <br><span class="text-indigo-600">Buku Pendidikan</span> Berkualitas.</h1>
            <p class="text-[18px] text-slate-500 mb-10 font-medium max-w-2xl leading-relaxed">Platform terpercaya CV Arya Duta untuk pemesanan buku pendidikan tingkat SD, SMP, dan SMA dengan layanan terbaik sejak 1998.</p>
            
            <div class="flex items-center gap-4">
                <a href="{{ url('/pelanggan/dashboard') }}" class="inline-flex items-center justify-center bg-indigo-600 text-white px-8 py-4 rounded-[24px] text-[15px] font-black shadow-xl shadow-indigo-100 hover:bg-indigo-700 transition-all active:scale-95">
                    Buka Katalog Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 ml-2"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                </a>
                <a href="#tentang" class="px-8 py-4 rounded-[24px] bg-white border border-slate-200 text-[15px] font-bold text-slate-600 hover:bg-slate-50 transition-all">Pelajari Selengkapnya</a>
            </div>
        </div>

        <!-- Content Area -->
        <div id="tentang" class="w-full max-w-[1000px] flex flex-col gap-8">
            <!-- Tentang Card -->
            <div class="info-card bg-white p-12 rounded-[48px] border border-slate-100 shadow-sm relative overflow-hidden">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-50 rounded-full blur-[80px] opacity-50"></div>
                
                <div class="relative z-10">
                    <h2 class="text-[28px] font-black text-indigo-950 tracking-tight mb-8 flex items-center gap-4">
                        <span class="w-10 h-1 bg-indigo-600 rounded-full"></span>
                        Tentang CV Arya Duta
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="space-y-5 text-[15px] text-slate-600 leading-[1.8] font-medium">
                            <p>
                                CV Arya Duta adalah perusahaan yang berdiri sejak tahun <span class="text-indigo-600 font-black italic underline decoration-indigo-200 underline-offset-4">1998</span> dan bergerak di bidang percetakan dan penerbitan buku, terutama buku-buku pendidikan.
                            </p>
                            <p>
                                Kami berkomitmen untuk menyediakan buku-buku berkualitas yang mendukung sistem pendidikan di Indonesia dengan standar mutu yang terjaga.
                            </p>
                        </div>
                        <div class="bg-slate-50 rounded-[32px] p-8 border border-slate-100 flex flex-col justify-center">
                            <div class="flex items-center gap-6 mb-6">
                                <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm text-indigo-600 font-black text-[20px]">25+</div>
                                <p class="text-[14px] font-bold text-indigo-950">Tahun Pengalaman Melayani Kebutuhan Pendidikan</p>
                            </div>
                            <p class="text-[13px] text-slate-500 leading-relaxed italic">"Membangun Masa Depan Bangsa Melalui Literasi Berkualitas dan Terjangkau."</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Details Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Jam Operasional -->
                <div class="info-card bg-white p-10 rounded-[40px] border border-slate-100 shadow-sm">
                    <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <h3 class="text-[20px] font-black text-indigo-950 mb-8 tracking-tight uppercase tracking-widest text-[14px]">Jam Operasional</h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl border border-slate-50">
                            <span class="text-[14px] font-bold text-slate-500">Senin - Jumat</span>
                            <span class="text-[14px] font-black text-indigo-950">08.00 - 16.00 <span class="text-[10px] font-bold text-slate-400 ml-1">WIB</span></span>
                        </div>
                        <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl border border-slate-50">
                            <span class="text-[14px] font-bold text-slate-500">Sabtu</span>
                            <span class="text-[14px] font-black text-indigo-950">08.00 - 15.00 <span class="text-[10px] font-bold text-slate-400 ml-1">WIB</span></span>
                        </div>
                        <div class="flex justify-between items-center p-4 bg-rose-50/50 rounded-2xl border border-rose-50">
                            <span class="text-[14px] font-bold text-rose-400">Minggu</span>
                            <span class="text-[14px] font-black text-rose-500 uppercase tracking-widest">Tutup</span>
                        </div>
                    </div>
                </div>

                <!-- Area Layanan -->
                <div class="info-card bg-white p-10 rounded-[40px] border border-slate-100 shadow-sm">
                    <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 115 0Z" />
                        </svg>
                    </div>
                    <h3 class="text-[20px] font-black text-indigo-950 mb-8 tracking-tight uppercase tracking-widest text-[14px]">Jangkauan Layanan</h3>

                    <p class="text-[14px] font-medium text-slate-500 mb-6">Kami melayani pengiriman kurir internal untuk wilayah:</p>

                    <div class="flex flex-wrap gap-3 mb-8">
                        <span class="bg-indigo-600 text-white px-5 py-2 rounded-xl text-[13px] font-black shadow-lg shadow-indigo-100">Jakarta</span>
                        <span class="bg-white border border-slate-100 text-slate-600 px-5 py-2 rounded-xl text-[13px] font-black shadow-sm">Tangerang</span>
                        <span class="bg-white border border-slate-100 text-slate-600 px-5 py-2 rounded-xl text-[13px] font-black shadow-sm">Bekasi</span>
                    </div>

                    <div class="bg-indigo-950 p-6 rounded-3xl text-white relative overflow-hidden group">
                        <div class="absolute -right-4 -bottom-4 w-12 h-12 bg-white/10 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
                        <p class="text-[11px] font-bold text-indigo-300 uppercase tracking-widest mb-1">Tarif Pengiriman</p>
                        <p class="text-[20px] font-black tracking-tight">Rp 2.800 <span class="text-[12px] font-bold text-indigo-400">/ Kilometer</span></p>
                    </div>
                </div>
            </div>

            <!-- Alert Footer -->
            <div class="bg-amber-50 border border-amber-100 p-6 rounded-[32px] flex items-center justify-center gap-4 shadow-sm animate-pulse">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm text-amber-500 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.248-8.25-3.286zm0 13.036h.008v.008H12v-.008z" /></svg>
                </div>
                <p class="text-[13px] font-extrabold text-amber-600 tracking-tight italic">Pastikan lokasi pengiriman Anda berada di area jangkauan kami untuk layanan pengiriman instan.</p>
            </div>
        </div>
    </main>
</body>
</html>
