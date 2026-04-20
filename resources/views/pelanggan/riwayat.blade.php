<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Transaksi - CIVAD</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background-color: #F8FAFC; }
    </style>
    <script>
        function toggleDetail(id) {
            const detail = document.getElementById('detail-' + id);
            const text = document.getElementById('btn-text-' + id);
            const icon = document.getElementById('btn-icon-' + id);
            
            if (detail.classList.contains('hidden')) {
                detail.classList.remove('hidden');
                text.innerText = 'Tutup Detail';
                icon.style.transform = 'rotate(180deg)';
            } else {
                detail.classList.add('hidden');
                text.innerText = 'Lihat Detail';
                icon.style.transform = 'rotate(0deg)';
            }
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
                <a href="{{ url('/pelanggan/riwayat') }}" class="flex items-center gap-2 px-4 py-2 text-[#2563EB] bg-[#F0F5FF] rounded-lg transition">Riwayat Transaksi</a>
            </nav>

            <!-- Right Actions -->
            <div class="flex items-center gap-4">
                <a href="{{ url('/pelanggan/keranjang') }}" class="text-gray-500 hover:text-gray-800 transition relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-[22px] h-[22px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                    @if(session('cart_count', 0) > 0)
                    <span class="absolute -top-1.5 -right-1.5 bg-red-500 text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center border border-white">{{ session('cart_count') }}</span>
                    @endif
                </a>
                <div class="h-6 w-px bg-gray-200"></div>
                <div class="flex items-center gap-2 bg-[#F0F5FF] text-[#2563EB] px-3 py-1.5 rounded-full text-[13px] font-semibold border border-blue-100">
                    {{ session('username') ?? 'andi' }}
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-[1200px] mx-auto px-6 py-8">
        <div class="mb-8">
            <h1 class="text-[28px] font-bold text-[#111827] tracking-tight">Riwayat Transaksi</h1>
            <p class="text-gray-500 text-[14px]">Daftar pesanan yang pernah Anda lakukan</p>
        </div>

        <div class="flex flex-col gap-6">
            @forelse(session('orders', []) as $orderId => $order)
            <div class="bg-white rounded-[16px] shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-4">
                        <div>
                            <h3 class="font-bold text-[#111827] text-[15px] mb-1">Pesanan #{{ $order['id'] }}</h3>
                            <p class="text-[12px] text-gray-400 font-medium">{{ $order['date'] }}</p>
                        </div>
                        <div class="text-left sm:text-right">
                            <p class="text-[11px] text-gray-400 mb-0.5">Total Pembayaran</p>
                            <p class="font-bold text-[#2563EB] text-[17px]">Rp {{ number_format($order['total'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                        <span class="text-[13px] text-gray-500 font-medium">{{ count($order['items']) }} jenis buku</span>
                        <button onclick="toggleDetail('{{ $orderId }}')" class="text-[13px] font-bold text-[#2563EB] hover:text-blue-800 flex items-center gap-1.5 transition group">
                            <span id="btn-text-{{ $orderId }}">Lihat Detail</span>
                            <svg id="btn-icon-{{ $orderId }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 transition-transform group-hover:translate-y-0.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="detail-{{ $orderId }}" class="px-6 pb-8 pt-2 bg-white border-t border-gray-50 hidden">
                    <h4 class="text-[13px] font-bold text-[#111827] mb-4 uppercase tracking-wider">Detail Pesanan</h4>
                    <div class="space-y-3 mb-6">
                        @foreach($order['items'] as $item)
                        <div class="bg-gray-50/50 rounded-xl p-4 border border-gray-100/50 flex items-center gap-4">
                            <div class="w-12 h-12 bg-white rounded-lg border border-gray-100 overflow-hidden flex-shrink-0">
                                <img src="{{ $item['image'] }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-grow">
                                <h5 class="text-[13px] font-bold text-[#111827]">{{ $item['title'] }}</h5>
                                <p class="text-[11px] text-gray-500 mt-0.5">{{ $item['qty'] }} x Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                            </div>
                            <div class="text-[13px] font-bold text-[#2563EB]">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</div>
                        </div>
                        @endforeach
                    </div>
                    <h4 class="text-[13px] font-bold text-[#111827] mb-4 uppercase tracking-wider">Bukti Pembayaran</h4>
                    <div class="bg-gray-50/50 rounded-xl p-5 border border-gray-100/50">
                        <div class="max-w-[280px] bg-white rounded-lg border border-gray-200 p-2 shadow-sm text-center">
                            <p class="text-[11px] text-gray-400 py-4">Bukti Pembayaran Diunggah</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-white p-12 rounded-[24px] border border-gray-100 text-center">
                <p class="text-gray-400">Belum ada riwayat transaksi.</p>
            </div>
            @endforelse
        </div>
    </main>
</body>
</html>
