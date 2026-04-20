<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konfirmasi Pembayaran - CIVAD</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background-color: #F8FAFC; }
    </style>
    <script>
        function handleFile(input) {
            const btn = document.getElementById('btnSubmit');
            const file = input.files[0];
            if (file) {
                btn.classList.remove('bg-gray-300', 'text-gray-500', 'cursor-not-allowed');
                btn.classList.add('bg-[#2563EB]', 'text-white', 'hover:bg-blue-700', 'shadow-lg', 'shadow-blue-500/20');
                btn.removeAttribute('disabled');
                btn.href = "{{ url('/pelanggan/konfirmasi-pembayaran') }}";
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
        <h1 class="text-[28px] font-bold text-[#111827] mb-8">Konfirmasi Pembayaran</h1>

        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sisi Kiri: Instuksi -->
            <div class="flex-grow">
                <div class="bg-white p-8 rounded-[24px] shadow-sm border border-gray-100 mb-6">
                    <h3 class="font-bold text-[#111827] text-[16px] mb-6">Metode Pembayaran Transfer Bank</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                        <div class="p-5 rounded-2xl border-2 border-[#2563EB] bg-blue-50/30 relative">
                             <div class="absolute top-4 right-4 text-[#2563EB]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" /></svg>
                             </div>
                             <p class="text-[12px] text-gray-500 font-bold mb-3 uppercase tracking-wider">BCA Transfer</p>
                             <p class="text-[18px] font-black text-[#111827]">8691888122</p>
                             <p class="text-[13px] text-gray-600 mt-1">A/N CV ARYA DUTA</p>
                        </div>
                    </div>

                    <div class="space-y-4 mb-8">
                        <h4 class="font-bold text-[#111827] text-[14px]">Langkah Pembayaran:</h4>
                        <ol class="list-decimal list-inside text-[13px] text-gray-500 space-y-2">
                            <li>Transfer sesuai nominal total pembayaran ke rekening yang dipilih</li>
                            <li>Gunakan kode pesanan sebagai berita transfer (Opsional)</li>
                            <li>Ambil foto atau screenshot bukti transfer Anda</li>
                            <li>Unggah bukti transfer pada form di bawah ini</li>
                        </ol>
                    </div>

                    <div class="p-6 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                        <label class="block text-center cursor-pointer">
                            <input type="file" class="hidden" onchange="handleFile(this)">
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-[#2563EB]"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 7.5 7.5M12 3v13.5" /></svg>
                                </div>
                                <span class="text-[14px] font-bold text-[#111827]">Klik untuk Unggah Bukti</span>
                                <span class="text-[11px] text-gray-400 mt-1">JPG, PNG atau PDF (Maks 2MB)</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Sisi Kanan: Summary -->
            <div class="w-full md:w-[400px]">
                <div class="bg-white p-8 rounded-[24px] shadow-sm border border-gray-100 sticky top-24">
                    <h2 class="font-bold text-[#111827] text-[18px] mb-6">Ringkasan Pesanan</h2>
                    
                    <div class="space-y-4 mb-6">
                        @foreach(session('cart', []) as $item)
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg bg-gray-50 border border-gray-100 overflow-hidden flex-shrink-0">
                                <img src="{{ $item['image'] }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-grow">
                                <h4 class="text-[12px] font-bold text-[#111827] line-clamp-1">{{ $item['title'] }}</h4>
                                <p class="text-[11px] text-gray-400">{{ $item['qty'] }} x Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                            </div>
                            <span class="text-[13px] font-bold text-[#111827]">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="h-px bg-gray-50 mb-6"></div>

                    <div class="space-y-3 mb-8">
                         <div class="flex justify-between items-center text-[13px] text-gray-500">
                            <span>Total Produk</span>
                            <span class="font-bold text-[#111827]">Rp {{ number_format(collect(session('cart', []))->sum(fn($i) => $i['price'] * $i['qty']), 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center text-[13px] text-gray-500">
                            <span>Biaya Pengiriman</span>
                            <span class="font-bold text-[#111827]">Rp 8.400</span>
                        </div>
                        <div class="pt-4 border-t border-gray-50 flex justify-between items-center">
                            <span class="font-bold text-[#111827] text-[15px]">Total Bayar</span>
                            <span class="font-bold text-[#2563EB] text-[20px]">Rp {{ number_format(collect(session('cart', []))->sum(fn($i) => $i['price'] * $i['qty']) + 8400, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <a href="#" id="btnSubmit" class="w-full block text-center bg-gray-300 text-gray-500 py-4 rounded-[16px] text-[15px] font-bold transition cursor-not-allowed" disabled>
                        Konfirmasi Pembayaran
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
