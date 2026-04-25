<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Pesanan - CIVAD</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; }
        .glass-nav { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); }
        .form-card { transition: all 0.3s ease; }
        .input-premium { transition: all 0.3s ease; border: 1px solid #f1f5f9; background: #f8fafc; }
        .input-premium:focus { border-color: #6366f1; background: #fff; box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.05); }
    </style>
    <script>
        function updateSummary() {
            let jarakInput = document.getElementById('jarak');
            let jarakText = jarakInput.options[jarakInput.selectedIndex].text;
            let jarak = parseInt(jarakText) || 0;
            let biayaPerKm = 2800;
            let biayaPengiriman = jarak * biayaPerKm;
            
            let totalProduk = {{ collect(session('cart', []))->sum(fn($i) => $i['price'] * $i['qty']) }};
            
            // points logic (1 point per 10k)
            let basePoin = Math.floor(totalProduk / 10000);
            document.getElementById('poin_didapat').innerText = basePoin + " Poin";
            
            document.getElementById('ongkir_total').innerText = 'Rp ' + biayaPengiriman.toLocaleString('id-ID');
            document.getElementById('total_pembayaran').innerText = 'Rp ' + (totalProduk + biayaPengiriman).toLocaleString('id-ID');
        }
        window.onload = function() {
            updateSummary();
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
                    <a href="{{ url('/pelanggan/dashboard') }}" class="px-5 py-2 hover:text-indigo-600 transition-colors">Katalog Buku</a>
                    <a href="{{ url('/pelanggan/status') }}" class="px-5 py-2 hover:text-indigo-600 transition-colors">Status</a>
                    <a href="{{ url('/pelanggan/riwayat') }}" class="px-5 py-2 hover:text-indigo-600 transition-colors">Riwayat</a>
                </div>

                <div class="flex items-center gap-4">
                    <div class="hidden sm:flex items-center gap-3 bg-slate-50 px-4 py-2 rounded-2xl border border-slate-100">
                        <p class="text-[13px] font-black text-indigo-950 leading-none">{{ session('username') ?? 'Customer' }}</p>
                    </div>
                    <a href="{{ url('/pelanggan/keranjang') }}" class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-indigo-600 bg-slate-50 rounded-xl transition-all relative">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0Zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0Z" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-[1280px] mx-auto px-6 py-12">
        <header class="mb-12">
            <h1 class="text-[36px] font-black text-indigo-950 tracking-tighter mb-3 leading-none">Informasi Pengiriman</h1>
            <p class="text-slate-400 font-bold text-[14px] uppercase tracking-widest">Selesaikan Pesanan Anda dengan Detail Akurat</p>
        </header>

        <div class="flex flex-col xl:flex-row gap-12">
            <!-- Left Side: Forms -->
            <div class="flex-grow flex flex-col gap-8">
                
                <!-- Identitas Penerima -->
                <div class="form-card bg-white p-8 rounded-[40px] border border-slate-100 shadow-sm">
                    <div class="flex items-center gap-4 mb-10">
                        <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-[18px] font-black text-indigo-950 tracking-tight">Identitas Penerima</h3>
                            <p class="text-[12px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Pastikan data kontak sudah benar</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-[13px] font-extrabold text-slate-700 ml-1">Nama Lengkap</label>
                            <input type="text" value="{{ session('username') ?? 'andi' }}" class="input-premium w-full px-6 py-4 rounded-2xl text-[14px] font-bold text-indigo-950 focus:outline-none">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[13px] font-extrabold text-slate-700 ml-1">Nomor Handphone</label>
                            <input type="text" value="081234567890" class="input-premium w-full px-6 py-4 rounded-2xl text-[14px] font-bold text-indigo-950 focus:outline-none">
                        </div>
                    </div>
                </div>

                <!-- Lokasi Pengiriman -->
                <div class="form-card bg-white p-8 rounded-[40px] border border-slate-100 shadow-sm">
                    <div class="flex items-center gap-4 mb-10">
                        <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-[18px] font-black text-indigo-950 tracking-tight">Detail Lokasi</h3>
                            <p class="text-[12px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Alamat lengkap & estimasi jarak</p>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div class="space-y-3">
                            <label class="text-[13px] font-extrabold text-slate-700 ml-1">Alamat Lengkap Pengiriman</label>
                            <textarea class="input-premium w-full px-6 py-4 rounded-[28px] text-[14px] font-bold text-indigo-950 focus:outline-none h-32 resize-none" placeholder="Masukkan alamat lengkap tujuan pengiriman...">Jl. Kedondong No. 123, Kelurahan Menteng, Jakarta Selatan</textarea>
                        </div>
                        
                        <div class="space-y-3">
                            <label class="text-[13px] font-extrabold text-slate-700 ml-1">Estimasi Jarak dari Gudang</label>
                            <div class="relative group">
                                <select id="jarak" onchange="updateSummary()" class="input-premium w-full px-6 py-4 rounded-2xl text-[14px] font-black text-indigo-950 focus:outline-none appearance-none cursor-pointer">
                                    @for($i=1; $i<=20; $i++)
                                    <option value="{{ $i }}" {{ $i == 3 ? 'selected' : '' }}>{{ $i }} km</option>
                                    @endfor
                                </select>
                                <div class="absolute inset-y-0 right-6 flex items-center pointer-events-none text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                </div>
                            </div>
                            <p class="text-[11px] font-bold text-indigo-400 mt-2 ml-1 italic">*Biaya pengiriman otomatis dihitung Rp 2.800 per KM</p>
                        </div>
                    </div>
                </div>

                <!-- Reward Poin -->
                <div class="form-card bg-indigo-950 p-8 rounded-[40px] text-white flex items-center justify-between shadow-xl relative overflow-hidden group">
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                    <div class="flex items-center gap-6 relative z-10">
                        <div class="w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 text-indigo-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-[18px] font-black tracking-tight">Reward Loyalitas</h3>
                            <p class="text-indigo-300/60 text-[12px] font-bold uppercase tracking-widest mt-0.5">Poin yang akan Anda dapatkan</p>
                        </div>
                    </div>
                    <div id="poin_didapat" class="text-[24px] font-black text-white bg-white/10 px-6 py-3 rounded-2xl border border-white/10 shadow-inner relative z-10">
                        0 Poin
                    </div>
                </div>
            </div>

            <!-- Right Side: Order Summary -->
            <div class="w-full xl:w-[420px] flex-shrink-0">
                <div class="bg-white p-10 rounded-[48px] border border-slate-100 shadow-sm sticky top-28 overflow-hidden">
                    <h2 class="text-[22px] font-black text-indigo-950 tracking-tight mb-8">Ringkasan Pesanan</h2>
                    
                    <div class="space-y-5 mb-10">
                        @foreach(session('cart', []) as $item)
                        <div class="flex justify-between items-start gap-4">
                            <div class="flex-grow">
                                <p class="text-[14px] font-black text-indigo-950 line-clamp-1 leading-tight">{{ $item['title'] }}</p>
                                <p class="text-[11px] font-bold text-slate-400 mt-1 uppercase tracking-widest">Qty: {{ $item['qty'] }} Item</p>
                            </div>
                            <span class="text-[14px] font-bold text-slate-600 whitespace-nowrap">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="space-y-4 pt-8 border-t border-slate-50 mb-10">
                        <div class="flex justify-between items-center text-[14px]">
                            <span class="font-bold text-slate-400">Total Produk</span>
                            <span class="font-black text-indigo-950">Rp {{ number_format(collect(session('cart', []))->sum(fn($i) => $i['price'] * $i['qty']), 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center text-[14px]">
                            <span class="font-bold text-slate-400">Biaya Kirim</span>
                            <span id="ongkir_total" class="font-black text-emerald-500">Rp 0</span>
                        </div>
                    </div>

                    <div class="bg-indigo-50 p-8 rounded-[32px] mb-10 border border-indigo-100/50">
                        <p class="text-[12px] font-bold text-indigo-400 uppercase tracking-widest mb-2 text-center">Total Pembayaran</p>
                        <p id="total_pembayaran" class="text-[36px] font-black text-indigo-600 tracking-tighter text-center leading-none">Rp 0</p>
                    </div>

                    <a href="{{ url('/pelanggan/pembayaran') }}" class="w-full flex items-center justify-center gap-3 bg-indigo-600 text-white py-5 rounded-[24px] text-[16px] font-black shadow-xl shadow-indigo-100 hover:bg-indigo-700 transition-all active:scale-95 group">
                        Buat Pesanan Sekarang
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5 group-hover:translate-x-1 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
