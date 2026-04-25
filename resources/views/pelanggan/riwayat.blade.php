<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Transaksi - CIVAD</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; }
        .glass-nav { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); }
        .history-card { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .history-card:hover { transform: translateY(-4px); box-shadow: 0 12px 20px -5px rgba(0, 0, 0, 0.04); border-color: #e2e8f0; }
    </style>
    <script>
        function toggleDetail(id) {
            const detail = document.getElementById('detail-' + id);
            const btn = document.getElementById('btn-' + id);
            const icon = document.getElementById('btn-icon-' + id);
            
            if (detail.classList.contains('hidden')) {
                detail.classList.remove('hidden');
                detail.classList.add('animate-in', 'fade-in', 'slide-in-from-top-4', 'duration-300');
                icon.style.transform = 'rotate(180deg)';
                btn.classList.add('bg-indigo-600', 'text-white');
                btn.classList.remove('text-indigo-600', 'bg-indigo-50');
            } else {
                detail.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
                btn.classList.remove('bg-indigo-600', 'text-white');
                btn.classList.add('text-indigo-600', 'bg-indigo-50');
            }
        }
    </script>
</head>
<body class="text-[#1E293B] pb-24">

    <!-- Navbar -->
    <nav class="glass-nav border-b border-slate-100 sticky top-0 z-50">
        <div class="max-w-[1280px] mx-auto px-6">
            <div class="flex justify-between h-[88px]">
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

                <div class="hidden lg:flex items-center gap-2 text-[14px] font-bold text-slate-500">
                    <a href="{{ url('/pelanggan/beranda') }}" class="px-5 py-2 hover:text-indigo-600 transition-colors">Beranda</a>
                    <a href="{{ url('/pelanggan/dashboard') }}" class="px-5 py-2 hover:text-indigo-600 transition-colors">Katalog</a>
                    <a href="{{ url('/pelanggan/status') }}" class="px-5 py-2 hover:text-indigo-600 transition-colors">Status</a>
                    <a href="{{ url('/pelanggan/riwayat') }}" class="px-5 py-2 bg-indigo-50 text-indigo-600 rounded-2xl">Riwayat</a>
                </div>

                <div class="flex items-center gap-4">
                    <div class="hidden sm:flex items-center gap-3 bg-slate-50 px-4 py-2 rounded-2xl border border-slate-100">
                        <p class="text-[13px] font-black text-indigo-950 leading-none">{{ session('username') ?? 'Customer' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-[1280px] mx-auto px-6 py-12">
        <header class="mb-12">
            <h1 class="text-[36px] font-black text-indigo-950 tracking-tighter mb-3 leading-none">Riwayat Transaksi</h1>
            <p class="text-slate-400 font-bold text-[14px] uppercase tracking-widest">Arsip Literasi & Jejak Belanja Anda</p>
        </header>

        <div class="flex flex-col gap-6 max-w-5xl mx-auto">
            @forelse($orders as $order)
            <div class="history-card bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden">
                <div class="p-8 sm:p-10">
                    <div class="flex flex-col sm:flex-row justify-between items-start gap-6 mb-8">
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center border border-indigo-100 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" /></svg>
                            </div>
                            <div>
                                <h3 class="font-black text-indigo-950 text-[18px] tracking-tight mb-1">Pesanan #{{ $order->order_number }}</h3>
                                <p class="text-[12px] text-slate-400 font-black uppercase tracking-widest">{{ $order->created_at->format('d F Y • H:i') }} WIB</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:items-end">
                            <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Transaksi</p>
                            <p class="font-black text-indigo-600 text-[24px] tracking-tighter">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-4 pt-8 border-t border-slate-50">
                        <div class="flex items-center gap-3">
                            <span class="px-4 py-1.5 bg-slate-50 text-slate-500 text-[11px] font-black uppercase tracking-widest rounded-full border border-slate-100">
                                {{ $order->items->count() }} Jenis Buku
                            </span>
                            <span class="px-4 py-1.5 bg-emerald-50 text-emerald-600 text-[11px] font-black uppercase tracking-widest rounded-full border border-emerald-100">
                                Terverifikasi
                            </span>
                        </div>
                        <button id="btn-{{ $order->id }}" onclick="toggleDetail('{{ $order->id }}')" class="flex items-center gap-2 px-6 py-3 bg-indigo-50 text-indigo-600 rounded-2xl font-black text-[13px] transition-all active:scale-95 group">
                            <span>Lihat Detail Pesanan</span>
                            <svg id="btn-icon-{{ $order->id }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 transition-transform duration-300"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                        </button>
                    </div>
                </div>

                <!-- Expanded Detail -->
                <div id="detail-{{ $order->id }}" class="hidden px-8 sm:px-10 pb-10 pt-2 bg-slate-50/50 border-t border-slate-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
                        <!-- Items List -->
                        <div class="space-y-4">
                            <h4 class="text-[12px] font-black text-indigo-950 uppercase tracking-[0.2em] mb-6 flex items-center gap-2">
                                <span class="w-1.5 h-4 bg-indigo-600 rounded-full"></span>
                                Rincian Buku
                            </h4>
                            @foreach($order->items as $item)
                            <div class="bg-white p-4 rounded-3xl border border-slate-100 flex items-center gap-4 shadow-sm">
                                <div class="w-14 h-14 rounded-xl overflow-hidden bg-slate-50 flex-shrink-0 border border-slate-50 shadow-inner">
                                    <img src="{{ $item->book->image }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-grow">
                                    <h5 class="text-[14px] font-black text-indigo-950 leading-tight mb-1 line-clamp-1">{{ $item->book->title }}</h5>
                                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                </div>
                                <span class="text-[14px] font-black text-indigo-600 whitespace-nowrap">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                            </div>
                            @endforeach
                        </div>

                        <!-- Logistics Info -->
                        <div class="space-y-6">
                            <h4 class="text-[12px] font-black text-indigo-950 uppercase tracking-[0.2em] mb-6 flex items-center gap-2">
                                <span class="w-1.5 h-4 bg-indigo-600 rounded-full"></span>
                                Informasi Pengiriman
                            </h4>
                            <div class="bg-white p-6 rounded-[32px] border border-slate-100 shadow-sm space-y-5">
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                    </div>
                                    <div>
                                        <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-1">Alamat Tujuan</p>
                                        <p class="text-[13px] font-bold text-indigo-950 leading-relaxed">Jl. Contoh Alamat No. 123, Jakarta Selatan</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    </div>
                                    <div>
                                        <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-1">Bukti Transfer</p>
                                        <p class="text-[13px] font-black text-emerald-600 underline decoration-emerald-100 underline-offset-4 cursor-pointer">Lihat Dokumen Terlampir</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-white p-24 rounded-[48px] border border-slate-100 text-center shadow-sm">
                <div class="w-20 h-20 bg-slate-50 text-slate-200 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                </div>
                <p class="text-[18px] font-black text-indigo-950 mb-2 tracking-tight">Belum Ada Transaksi</p>
                <p class="text-slate-400 font-medium">Mulailah membangun sejarah literasi Anda bersama CIVAD hari ini.</p>
            </div>
            @endforelse
        </div>
    </main>
</body>
</html>
