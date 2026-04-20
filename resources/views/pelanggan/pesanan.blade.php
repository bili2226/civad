<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Pesanan - CIVAD</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background-color: #F8FAFC; }
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
        <h1 class="text-[28px] font-bold text-[#111827] tracking-tight mb-8">Informasi Pengiriman</h1>

        <div class="flex flex-col md:flex-row gap-8">
            <!-- Form Kiri -->
            <div class="flex-grow flex flex-col gap-6">
                <!-- Identitas -->
                <div class="bg-white p-6 rounded-[16px] shadow-sm border border-gray-100">
                    <h3 class="font-bold text-[#111827] text-[15px] mb-6">Identitas Penerima</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[12px] font-bold text-gray-500">Nama Lengkap</label>
                            <input type="text" value="andi" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-100 rounded-xl text-[14px]">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[12px] font-bold text-gray-500">No. Handphone</label>
                            <input type="text" value="04249102305235" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-100 rounded-xl text-[14px]">
                        </div>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="bg-white p-6 rounded-[16px] shadow-sm border border-gray-100">
                    <h3 class="font-bold text-[#111827] text-[15px] mb-6">Alamat Pengiriman</h3>
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label class="text-[12px] font-bold text-gray-500">Alamat Lengkap</label>
                            <textarea class="w-full px-4 py-2.5 bg-gray-50 border border-gray-100 rounded-xl text-[14px] h-24">jl kedondong</textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[12px] font-bold text-gray-500">Jarak Dari Gudang (km)</label>
                            <select id="jarak" onchange="updateSummary()" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-[14px] appearance-none focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="1">1 km</option>
                                <option value="2">2 km</option>
                                <option value="3" selected>3 km</option>
                                <option value="4">4 km</option>
                                <option value="5">5 km</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Poin -->
                <div class="bg-white p-6 rounded-[16px] shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-[#111827] text-[15px] mb-1">Total Poin Didapat</h3>
                        <p class="text-[12px] text-gray-400">Poin dapat digunakan untuk potongan belanja selanjutnya</p>
                    </div>
                    <div id="poin_didapat" class="text-[18px] font-bold text-[#059669] bg-emerald-50 px-4 py-2 rounded-xl border border-emerald-100">0 Poin</div>
                </div>
            </div>

            <!-- Ringkasan Kanan -->
            <div class="w-full md:w-[400px]">
                <div class="bg-white p-8 rounded-[24px] shadow-sm border border-gray-100 sticky top-24">
                    <h2 class="font-bold text-[#111827] text-[18px] mb-6">Ringkasan Pesanan</h2>
                    
                    <div class="space-y-4 mb-6">
                        @foreach(session('cart', []) as $item)
                        <div class="flex justify-between items-center text-[13px] text-gray-600">
                            <span class="max-w-[200px]">{{ $item['title'] }} <span class="text-gray-400 text-[11px]">(x{{ $item['qty'] }})</span></span>
                            <span class="font-medium text-[#111827]">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="h-px bg-gray-50 mb-6"></div>

                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-[14px]">Total Produk</span>
                        <span class="font-bold text-[#111827] text-[15px]">Rp {{ number_format(collect(session('cart', []))->sum(fn($i) => $i['price'] * $i['qty']), 0, ',', '.') }}</span>
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <span class="text-gray-500 text-[14px]">Biaya Pengiriman</span>
                        <span id="ongkir_total" class="font-bold text-[#111827] text-[15px]">Rp 0</span>
                    </div>

                    <div class="h-px bg-gray-50 mb-6"></div>

                    <div class="flex justify-between items-center mb-8">
                        <span class="font-bold text-[#111827] text-[15px]">Total Pembayaran</span>
                        <span id="total_pembayaran" class="font-bold text-[#2563EB] text-[22px]">Rp 0</span>
                    </div>

                    <a href="{{ url('/pelanggan/pembayaran') }}" class="w-full block text-center bg-[#2563EB] text-white py-4 rounded-[16px] text-[15px] font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-500/10 active:scale-[0.98]">
                        Buat Pesanan
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
