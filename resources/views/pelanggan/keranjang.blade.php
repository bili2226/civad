<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang Belanja - CIVAD</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; }
        .glass-nav { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); }
        .cart-card { transition: all 0.3s ease; }
        .cart-card:hover { border-color: #e2e8f0; transform: translateX(4px); }
        input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
    </style>
    <script>
        function updateCart() {
            let totalProduk = 0;
            let items = document.querySelectorAll('.cart-item');
            
            items.forEach(item => {
                let id = item.dataset.id;
                let price = parseInt(item.dataset.price);
                let qty = parseInt(document.getElementById('qty-' + id).value) || 0;
                let subtotal = price * qty;
                
                document.getElementById('subtotal-' + id).innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
                totalProduk += subtotal;
            });
            
            document.getElementById('side_total_produk').innerText = 'Rp ' + totalProduk.toLocaleString('id-ID');
        }

        function changeQty(id, delta) {
            let input = document.getElementById('qty-' + id);
            let val = parseInt(input.value) + delta;
            if (val >= 1 && val <= 50) {
                input.value = val;
                updateCart();
            }
        }

        window.onload = updateCart;
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

                <div class="hidden lg:flex items-center gap-2">
                    <a href="{{ url('/pelanggan/beranda') }}" class="flex items-center gap-2 px-5 py-2.5 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-bold text-[14px] transition-all">Beranda</a>
                    <a href="{{ url('/pelanggan/dashboard') }}" class="flex items-center gap-2 px-5 py-2.5 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-bold text-[14px] transition-all">Katalog Buku</a>
                    <a href="{{ url('/pelanggan/status') }}" class="flex items-center gap-2 px-5 py-2.5 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-bold text-[14px] transition-all">Status Pesanan</a>
                    <a href="{{ url('/pelanggan/riwayat') }}" class="flex items-center gap-2 px-5 py-2.5 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-bold text-[14px] transition-all">Riwayat</a>
                </div>

                <div class="flex items-center gap-4">
                    <div class="hidden sm:flex items-center gap-3 bg-slate-50 px-4 py-2 rounded-2xl border border-slate-100">
                        <div class="w-8 h-8 bg-indigo-600 text-white rounded-lg flex items-center justify-center font-bold text-[12px] uppercase shadow-sm">
                            {{ substr(session('username') ?? 'C', 0, 1) }}
                        </div>
                        <p class="text-[13px] font-black text-indigo-950 leading-none">{{ session('username') ?? 'Customer' }}</p>
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

    <main class="max-w-[1280px] mx-auto px-6 py-12">
        <a href="{{ url('/pelanggan/dashboard') }}" class="inline-flex items-center gap-3 text-slate-400 hover:text-indigo-600 text-[13px] font-black mb-10 transition-all group">
            <div class="w-8 h-8 rounded-full bg-white border border-slate-100 flex items-center justify-center shadow-sm group-hover:-translate-x-1 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            </div>
            Kembali Belanja
        </a>

        <div class="mb-12">
            <h1 class="text-[36px] font-black text-indigo-950 tracking-tighter leading-none mb-3">Keranjang Belanja</h1>
            <p class="text-slate-400 font-bold text-[14px] uppercase tracking-widest">Tersimpan <span class="text-indigo-600">{{ count(session('cart', [])) }}</span> Item Pilihan</p>
        </div>

        <div class="flex flex-col xl:flex-row gap-12">
            
            <!-- Items Column -->
            <div class="flex-grow flex flex-col gap-6">
                @forelse(session('cart', []) as $id => $item)
                <div class="cart-item cart-card bg-white p-6 rounded-[32px] border border-slate-100 shadow-sm flex flex-col sm:flex-row gap-8 relative overflow-hidden" data-id="{{ $id }}" data-price="{{ $item['price'] }}">
                    <!-- Delete Button -->
                    <button class="absolute top-6 right-6 w-10 h-10 flex items-center justify-center text-rose-300 hover:text-rose-500 hover:bg-rose-50 rounded-xl transition-all cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>

                    <div class="w-full sm:w-32 h-44 sm:h-32 rounded-[24px] overflow-hidden bg-slate-50 flex-shrink-0 shadow-inner border border-slate-50">
                        <img src="{{ $item['image'] }}" class="w-full h-full object-cover">
                    </div>

                    <div class="flex-grow flex flex-col justify-between py-1">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-black uppercase tracking-widest rounded-full border border-indigo-100">
                                    {{ $item['category'] }}
                                </span>
                                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">{{ $item['class'] }}</span>
                            </div>
                            <h3 class="font-black text-indigo-950 text-[18px] tracking-tight leading-tight mb-4">{{ $item['title'] }}</h3>
                        </div>
                        
                        <div class="flex items-end justify-between">
                            <div class="space-y-1">
                                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Harga Satuan</p>
                                <p class="text-indigo-600 font-black text-[18px]">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                            </div>

                            <div class="flex items-center bg-slate-50 rounded-2xl p-1 border border-slate-100">
                                <button type="button" onclick="changeQty('{{ $id }}', -1)" class="w-10 h-10 flex items-center justify-center bg-white border border-slate-100 rounded-xl text-slate-400 hover:text-indigo-600 transition-all shadow-sm active:scale-90">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" /></svg>
                                </button>
                                <input type="number" id="qty-{{ $id }}" value="{{ $item['qty'] }}" min="1" readonly class="w-12 h-10 text-center border-0 p-0 text-[15px] font-black text-indigo-950 bg-transparent">
                                <button type="button" onclick="changeQty('{{ $id }}', 1)" class="w-10 h-10 flex items-center justify-center bg-white border border-slate-100 rounded-xl text-slate-400 hover:text-indigo-600 transition-all shadow-sm active:scale-90">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="sm:w-48 flex flex-col justify-end items-end pb-1 pr-2">
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Subtotal Item</p>
                        <p id="subtotal-{{ $id }}" class="font-black text-indigo-950 text-[22px] tracking-tighter">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</p>
                    </div>
                </div>
                @empty
                <div class="bg-white p-20 rounded-[48px] border border-slate-100 text-center shadow-sm">
                    <div class="w-20 h-20 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                    </div>
                    <p class="text-[18px] font-black text-indigo-950 mb-2 tracking-tight">Keranjang Kosong</p>
                    <p class="text-slate-400 font-medium mb-8">Mulailah petualangan literasi Anda dengan memilih buku pilihan kami.</p>
                    <a href="{{ url('/pelanggan/dashboard') }}" class="inline-flex items-center justify-center px-10 py-4 bg-indigo-600 text-white rounded-[24px] font-black shadow-xl shadow-indigo-100 hover:bg-indigo-700 transition-all">Lihat Katalog</a>
                </div>
                @endforelse
            </div>

            <!-- Summary Column -->
            <div class="w-full xl:w-[420px] flex-shrink-0">
                <div class="bg-indigo-950 p-10 rounded-[48px] text-white shadow-2xl sticky top-28 overflow-hidden">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-600 rounded-full blur-[100px] opacity-30"></div>
                    
                    <div class="relative z-10">
                        <h2 class="font-black text-[24px] mb-8 tracking-tight">Ringkasan Belanja</h2>
                        
                        <div class="space-y-5 mb-10">
                            @foreach(session('cart', []) as $item)
                            <div class="flex justify-between items-start text-[14px]">
                                <span class="text-indigo-200/70 font-medium max-w-[220px] line-clamp-1">{{ $item['title'] }}</span>
                                <span class="font-black text-white whitespace-nowrap ml-4">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>
                            </div>
                            @endforeach
                        </div>

                        <div class="h-px bg-white/10 mb-8"></div>

                        <div class="flex flex-col gap-2 mb-10">
                            <span class="text-[12px] font-bold text-indigo-400 uppercase tracking-widest">Total Pembelian</span>
                            <div class="flex items-baseline gap-2">
                                <span id="side_total_produk" class="text-[36px] font-black tracking-tighter">Rp 0</span>
                            </div>
                        </div>

                        <div class="bg-white/5 border border-white/10 p-5 rounded-[24px] mb-10 flex items-start gap-4">
                            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg text-white shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125a1.125 1.125 0 001.125-1.125V3.375c0-.621-.504-1.125-1.125-1.125h-9.75a1.125 1.125 0 00-1.125 1.125v1.433M7.5 14.25L16.344 14.25M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0Zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0Z" /></svg>
                            </div>
                            <p class="text-[12px] text-indigo-200/60 leading-relaxed font-medium">Biaya pengiriman akan dikalkulasi otomatis berdasarkan jarak (per KM) pada langkah pembayaran berikutnya.</p>
                        </div>

                        <a href="{{ url('/pelanggan/pesanan') }}" class="w-full block text-center bg-white text-indigo-950 py-5 rounded-[24px] text-[16px] font-black hover:bg-indigo-50 transition-all shadow-xl active:scale-95 group">
                            Checkout Sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 inline-block ml-2 group-hover:translate-x-1 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>
</html>
