<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status Pesanan - CIVAD</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background-color: #F8FAFC; }
        .pesanan-item.active { background-color: #EFF6FF; border-left: 4px solid #2563EB; }
    </style>
    <script>
        function selectOrder(id) {
            document.querySelectorAll('.pesanan-item').forEach(el => {
                el.classList.remove('active', 'bg-blue-50/50');
            });
            document.getElementById('item-' + id).classList.add('active', 'bg-blue-50/50');

            document.querySelectorAll('.detail-panel').forEach(el => {
                el.classList.add('hidden');
            });
            document.getElementById('detail-' + id).classList.remove('hidden');
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

            <nav class="hidden md:flex items-center gap-2 text-[14px] font-medium text-gray-500">
                <a href="{{ url('/pelanggan/beranda') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-50 rounded-lg transition hover:text-[#111827]">Beranda</a>
                <a href="{{ url('/pelanggan/dashboard') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-50 rounded-lg transition hover:text-[#111827]">Katalog Buku</a>
                <a href="{{ url('/pelanggan/status') }}" class="flex items-center gap-2 px-4 py-2 text-[#2563EB] bg-[#F0F5FF] rounded-lg transition">Status Pesanan</a>
                <a href="{{ url('/pelanggan/riwayat') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-50 rounded-lg transition hover:text-[#111827]">Riwayat Transaksi</a>
            </nav>

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
            <h1 class="text-[28px] font-bold text-[#111827] tracking-tight">Status Pesanan</h1>
            <p class="text-gray-500 text-[14px]">Lacak status pesanan Anda</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-6">
            <div class="w-full lg:w-[380px] flex-shrink-0">
                <h3 class="text-[13px] font-bold text-gray-600 mb-4 px-2 uppercase tracking-wide">Daftar Pesanan</h3>
                <div class="bg-white rounded-[16px] border border-gray-100 shadow-sm overflow-hidden flex flex-col">
                    @forelse(session('orders', []) as $orderId => $order)
                    <div id="item-{{ $orderId }}" onclick="selectOrder('{{ $orderId }}')" class="pesanan-item {{ $loop->first ? 'active bg-blue-50/50' : '' }} p-5 border-b border-gray-100 cursor-pointer hover:bg-blue-50/50 transition relative">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="font-bold text-[#111827] text-[14px] mb-0.5">Pesanan #{{ $order['id'] }}</h4>
                                <p class="text-[11px] text-gray-400 font-medium">{{ $order['date'] }}</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-yellow-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                        </div>
                        <div class="flex justify-between items-end">
                            <span class="bg-[#FEF9C3] text-[#A16207] px-2 py-0.5 rounded-full text-[10px] font-bold border border-[#FEF08A]">{{ $order['status'] }}</span>
                            <span class="font-bold text-[#111827] text-[14px]">Rp {{ number_format($order['total'], 0, ',', '.') }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="p-8 text-center text-gray-400 text-[14px]">Belum ada pesanan aktif.</div>
                    @endforelse
                </div>
            </div>

            <div class="flex-grow">
                @foreach(session('orders', []) as $orderId => $order)
                <div id="detail-{{ $orderId }}" class="detail-panel bg-white rounded-[16px] shadow-sm border border-gray-100 overflow-hidden {{ $loop->first ? '' : 'hidden' }}">
                    <div class="bg-[#2563EB] p-8 text-white">
                        <h3 class="text-[20px] font-bold tracking-tight mb-1">Pesanan #{{ $order['id'] }}</h3>
                        <p class="text-blue-100 text-[13px]">Dipesan pada {{ $order['date'] }}</p>
                        <div class="flex justify-between items-end pt-4 border-t border-blue-400/30 mt-6">
                            <span class="text-[13px] text-blue-100">Total Pembayaran</span>
                            <span class="text-[24px] font-bold">Rp {{ number_format($order['total'], 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="p-8">
                        <h4 class="text-[14px] font-bold text-[#111827] mb-5">Status Terkini</h4>
                        <div class="bg-[#FEFCE8] border border-[#FEF08A] rounded-[16px] p-6 flex gap-5 items-start">
                            <div class="w-10 h-10 bg-[#FEF9C3] text-[#A16207] rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-[#854D0E] text-[15px] mb-1">Menunggu Verifikasi</h5>
                                <p class="text-[13px] text-[#A16207] leading-relaxed">Pesanan Anda sedang menunggu verifikasi pembayaran dari admin. Harap tunggu konfirmasi.</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</body>
</html>
