@extends('layouts.customer_premium')

@section('title', 'Beranda')

@section('content')

    <!-- Hero Section -->
    <div class="text-center flex flex-col items-center mb-20 max-w-[900px] mx-auto">
        <div class="inline-flex items-center gap-3 bg-emerald-100 text-emerald-700 px-5 py-2.5 rounded-full text-[11px] font-black uppercase tracking-[0.2em] mb-10 border border-emerald-200">
            <span class="relative flex h-2 w-2">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-600"></span>
            </span>
            Selamat Datang di Arya Duta
        </div>

        <h1 class="text-[48px] md:text-[56px] font-black text-emerald-950 tracking-tighter mb-6 leading-[1.05]">Eksplorasi Dunia Lewat <br><span class="italic font-serif text-emerald-600">Buku Pendidikan</span> Berkualitas.</h1>
        <p class="text-[18px] text-emerald-900/60 mb-12 font-medium max-w-2xl leading-relaxed">Platform terpercaya CV Arya Duta untuk pemesanan buku pendidikan tingkat SD, SMP, dan SMA dengan layanan terbaik sejak 1998.</p>

        <div class="flex items-center gap-4">
            <a href="{{ url('/pelanggan/dashboard') }}" class="inline-flex items-center justify-center bg-emerald-950 text-white px-10 py-5 rounded-[24px] text-[16px] font-black shadow-2xl shadow-emerald-950/20 hover:bg-emerald-800 transition-all active:scale-95 group">
                Buka Katalog Sekarang
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5 ml-3 group-hover:translate-x-1 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
            </a>
            <a href="#tentang" class="px-10 py-5 rounded-[24px] bg-white border border-emerald-200 text-[16px] font-bold text-emerald-950 hover:bg-emerald-50 transition-all">Pelajari Selengkapnya</a>
        </div>
    </div>

    <!-- Content Area -->
    <div id="tentang" class="w-full max-w-[1000px] mx-auto flex flex-col gap-8">
        <!-- Tentang Card -->
        <div class="bg-white p-12 rounded-[48px] border border-emerald-100 shadow-lg relative overflow-hidden">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-emerald-100 rounded-full blur-[80px] opacity-50"></div>

            <div class="relative z-10">
                <h2 class="text-[28px] font-black text-emerald-950 tracking-tight mb-8 flex items-center gap-4">
                    <span class="w-10 h-1 bg-emerald-600 rounded-full"></span>
                    Tentang CV Arya Duta
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-5 text-[15px] text-emerald-900/70 leading-[1.8] font-medium">
                        <p>
                            CV Arya Duta adalah perusahaan yang berdiri sejak tahun <span class="text-emerald-600 font-black italic underline decoration-emerald-200 underline-offset-4">1998</span> dan bergerak di bidang percetakan dan penerbitan buku, terutama buku-buku pendidikan.
                        </p>
                        <p>
                            Kami berkomitmen untuk menyediakan buku-buku berkualitas yang mendukung sistem pendidikan di Indonesia dengan standar mutu yang terjaga.
                        </p>
                    </div>
                    <div class="bg-emerald-50 rounded-[32px] p-8 border border-emerald-100 flex flex-col justify-center">
                        <div class="flex items-center gap-6 mb-6">
                            <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm text-emerald-600 font-black text-[20px]">25+</div>
                            <p class="text-[14px] font-bold text-emerald-950">Tahun Pengalaman Melayani Kebutuhan Pendidikan</p>
                        </div>
                        <p class="text-[13px] text-emerald-700 leading-relaxed italic">"Membangun Masa Depan Bangsa Melalui Literasi Berkualitas dan Terjangkau."</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Jam Operasional -->
            <div class="bg-white p-10 rounded-[40px] border border-emerald-100 shadow-lg hover:-translate-y-1 transition-transform duration-300">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-8 border border-emerald-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <h3 class="font-black text-emerald-950 mb-8 tracking-tight uppercase tracking-widest text-[14px]">Jam Operasional</h3>

                <div class="space-y-4">
                    <div class="flex justify-between items-center p-4 bg-emerald-50 rounded-2xl border border-emerald-50">
                        <span class="text-[14px] font-bold text-emerald-700">Senin - Jumat</span>
                        <span class="text-[14px] font-black text-emerald-950">08.00 - 16.00 <span class="text-[10px] font-bold text-emerald-600 ml-1">WIB</span></span>
                    </div>
                    <div class="flex justify-between items-center p-4 bg-emerald-50 rounded-2xl border border-emerald-50">
                        <span class="text-[14px] font-bold text-emerald-700">Sabtu</span>
                        <span class="text-[14px] font-black text-emerald-950">08.00 - 15.00 <span class="text-[10px] font-bold text-emerald-600 ml-1">WIB</span></span>
                    </div>
                    <div class="flex justify-between items-center p-4 bg-red-50/50 rounded-2xl border border-red-50">
                        <span class="text-[14px] font-bold text-red-400">Minggu</span>
                        <span class="text-[14px] font-black text-red-500 uppercase tracking-widest">Tutup</span>
                    </div>
                </div>
            </div>

            <!-- Area Layanan -->
            <div class="bg-white p-10 rounded-[40px] border border-emerald-100 shadow-lg hover:-translate-y-1 transition-transform duration-300">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-8 border border-emerald-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 115 0Z" />
                    </svg>
                </div>
                <h3 class="font-black text-emerald-950 mb-8 tracking-tight uppercase tracking-widest text-[14px]">Jangkauan Layanan</h3>

                <p class="text-[14px] font-medium text-emerald-700 mb-6">Kami melayani pengiriman kurir internal untuk wilayah:</p>

                <div class="flex flex-wrap gap-3 mb-8">
                    <span class="bg-emerald-950 text-white px-5 py-2 rounded-xl text-[13px] font-black shadow-lg shadow-emerald-950/20">Jakarta</span>
                    <span class="bg-white border border-emerald-100 text-emerald-950 px-5 py-2 rounded-xl text-[13px] font-black shadow-sm">Tangerang</span>
                    <span class="bg-white border border-emerald-100 text-emerald-950 px-5 py-2 rounded-xl text-[13px] font-black shadow-sm">Bekasi</span>
                </div>

                <div class="bg-emerald-950 p-6 rounded-3xl text-white relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 w-12 h-12 bg-white/10 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
                    <p class="text-[11px] font-bold text-emerald-300 uppercase tracking-widest mb-1">Tarif Pengiriman</p>
                    <p class="text-[20px] font-black tracking-tight">Rp 2.800 <span class="text-[12px] font-bold text-emerald-400">/ Kilometer</span></p>
                </div>
            </div>
        </div>

        <!-- Alert Footer -->
        <div class="bg-amber-50 border border-amber-100 p-6 rounded-[32px] flex items-center justify-center gap-4 shadow-sm">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm text-amber-500 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.248-8.25-3.286zm0 13.036h.008v.008H12v-.008z" /></svg>
            </div>
            <p class="text-[13px] font-extrabold text-amber-600 tracking-tight italic">Pastikan lokasi pengiriman Anda berada di area jangkauan kami untuk layanan pengiriman instan.</p>
        </div>
    </div>

@endsection
