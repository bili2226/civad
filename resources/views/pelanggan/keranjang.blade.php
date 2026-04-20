<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang Belanja - CIVAD</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background-color: #F8FAFC; }
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
            document.getElementById('summary_total_produk').innerText = 'Rp ' + totalProduk.toLocaleString('id-ID');
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
<body class="text-gray-800 pb-20">

    <!-- Header / Navbar -->
    <header class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-[1280px] mx-auto px-6 h-[72px] flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#2563EB] text-white rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <div>
                    <h1 class="font-bold text-[18px] text-[#111827] leading-none tracking-tight">CIVAD</h1>
                    <p class="text-[11px] text-gray-500 mt-0.5">CV Arya Duta</p>
                </div>
            </div>

            <!-- Nav Links -->
            <nav class="hidden md:flex items-center gap-2 text-[14px] font-medium text-gray-500">
                <a href="{{ url('/pelanggan/beranda') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-50 rounded-lg transition hover:text-[#111827]">Beranda</a>
                <a href="{{ url('/pelanggan/dashboard') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-50 rounded-lg transition hover:text-[#111827]">Katalog Buku</a>
                <a href="{{ url('/pelanggan/status') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-50 rounded-lg transition hover:text-[#111827]">Status Pesanan</a>
                <a href="{{ url('/pelanggan/riwayat') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-50 rounded-lg transition hover:text-[#111827]">Riwayat Transaksi</a>
            </nav>

            <!-- Right Actions -->
            <div class="flex items-center gap-4">
                <a href="{{ url('/pelanggan/keranjang') }}" class="text-gray-500 hover:text-gray-800 transition relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-[22px] h-[22px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                    @if(session('cart_count', 0) > 0)
                    <span class="absolute -top-1.5 -right-1.5 bg-red-500 text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center border border-white">
                        {{ session('cart_count') }}
                    </span>
                    @endif
                </a>
                <div class="h-6 w-px bg-gray-200"></div>
                <div class="flex items-center gap-2 bg-[#F0F5FF] text-[#2563EB] px-3 py-1.5 rounded-full text-[13px] font-semibold tracking-tight border border-blue-100">
                    {{ session('username') ?? 'andi' }}
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-[1200px] mx-auto px-6 py-8">
        <a href="{{ url('/pelanggan/dashboard') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-gray-600 text-[13px] font-medium mb-6 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            Lanjut Belanja
        </a>

        <div class="mb-8">
            <h1 class="text-[28px] font-bold text-[#111827] tracking-tight">Keranjang Belanja</h1>
            <p class="text-gray-500 text-[14px]">{{ count(session('cart', [])) }} Jenis buku dalam keranjang</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Keranjang Kiri -->
            <div class="flex-grow flex flex-col gap-4">
                
                @forelse(session('cart', []) as $id => $item)
                <div class="cart-item bg-white p-6 rounded-[24px] shadow-sm border border-gray-100 flex gap-6 w-full relative" data-id="{{ $id }}" data-price="{{ $item['price'] }}">
                    <button class="absolute top-6 right-6 text-red-500 hover:text-red-700 transition cursor-default">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>

                    <div class="w-24 h-24 rounded-2xl overflow-hidden bg-gray-100 flex-shrink-0 shadow-sm border border-gray-50">
                        <img src="{{ $item['image'] }}" alt="Buku" class="w-full h-full object-cover">
                    </div>

                    <div class="flex-grow">
                        <h3 class="font-bold text-[#111827] text-[15px] mb-0.5 tracking-tight">{{ $item['title'] }}</h3>
                        <p class="text-[11px] text-gray-400 font-medium mb-3">{{ $item['category'] }} - {{ $item['class'] }}</p>
                        <div class="text-[#2563EB] font-bold text-[16px] mb-4">Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                        
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="changeQty('{{ $id }}', -1)" class="w-8 h-8 flex items-center justify-center border border-gray-100 rounded-lg text-gray-400 hover:bg-gray-50 hover:text-black transition shadow-sm bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" /></svg>
                            </button>
                            <input type="number" id="qty-{{ $id }}" value="{{ $item['qty'] }}" min="1" class="w-10 h-8 text-center border-0 p-0 text-[14px] font-bold text-[#111827] bg-transparent">
                            <button type="button" onclick="changeQty('{{ $id }}', 1)" class="w-8 h-8 flex items-center justify-center border border-gray-100 rounded-lg text-gray-400 hover:bg-gray-50 hover:text-black transition shadow-sm bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                            </button>
                        </div>
                    </div>

                    <div class="absolute bottom-6 right-6 text-right">
                        <p class="text-[10px] text-gray-300 font-bold mb-0.5 uppercase tracking-widest">Subtotal</p>
                        <p id="subtotal-{{ $id }}" class="font-bold text-[#111827] text-[16px]">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</p>
                    </div>
                </div>
                @empty
                <div class="bg-white p-12 rounded-[24px] border border-gray-100 text-center">
                    <p class="text-gray-400">Keranjang Anda masih kosong.</p>
                </div>
                @endforelse

            </div>

            <!-- Ringkasan Kanan -->
            <div class="w-full lg:w-[400px] flex-shrink-0">
                <div class="bg-white p-8 rounded-[24px] shadow-sm border border-gray-100 sticky top-24">
                    <h2 class="font-bold text-[#111827] text-[18px] mb-6 tracking-tight">Ringkasan Pesanan</h2>
                    
                    @foreach(session('cart', []) as $item)
                    <div class="flex justify-between items-start text-[13px] text-gray-600 mb-4">
                        <span class="max-w-[200px]">{{ $item['title'] }} <span class="text-gray-400">(x{{ $item['qty'] }})</span></span>
                        <span class="font-medium">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>
                    </div>
                    @endforeach

                    <div class="h-px bg-gray-50 my-6"></div>

                    <div class="flex justify-between items-center mb-6">
                        <span class="font-bold text-[#111827] text-[15px]">Total Produk</span>
                        <span id="side_total_produk" class="font-bold text-[#2563EB] text-[20px]">Rp 0</span>
                        <span id="summary_total_produk" class="hidden">0</span>
                    </div>

                    <p class="text-[12px] text-gray-400 italic mb-8 leading-relaxed">*Biaya pengiriman akan dihitung di halaman berikutnya</p>

                    <a href="{{ url('/pelanggan/pesanan') }}" class="w-full block text-center bg-[#2563EB] text-white py-4 rounded-[16px] text-[15px] font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-500/10 active:scale-[0.98]">
                        Pesan
                    </a>
                </div>
            </div>

        </div>
    </main>
    <style> input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; } </style>
</body>
</html>
