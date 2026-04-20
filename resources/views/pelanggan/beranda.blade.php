<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Beranda - CIVAD</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body { font-family: 'Instrument Sans', sans-serif; }
        </style>
    </head>
    <body class="bg-[#F4F7FB] text-gray-800 font-sans min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
            <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-[72px]">
                    <!-- Left: Logo -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#2563EB] text-white rounded-xl flex items-center justify-center shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <div class="flex flex-col justify-center">
                            <span class="text-[#111827] font-bold text-[18px] leading-tight">CIVAD</span>
                            <span class="text-gray-500 text-[12px] leading-tight">CV Arya Duta</span>
                        </div>
                    </div>

                    <!-- Middle: Links -->
                    <div class="hidden md:flex items-center gap-2 text-[14px] font-medium text-gray-500">
                        <a href="{{ url('/pelanggan/beranda') }}" class="flex items-center gap-2 px-4 py-2 text-[#2563EB] bg-[#F0F5FF] rounded-lg transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            Beranda
                        </a>
                        <a href="{{ url('/pelanggan/dashboard') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-50 rounded-lg transition hover:text-[#111827]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                            Katalog Buku
                        </a>
                        <a href="{{ url('/pelanggan/status') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-50 rounded-lg transition hover:text-[#111827]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                            Status Pesanan
                        </a>
                        <a href="{{ url('/pelanggan/riwayat') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-50 rounded-lg transition hover:text-[#111827]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                            </svg>
                            Riwayat Transaksi
                        </a>
                    </div>

                    <!-- Right: Cart & Profile -->
                    <div class="flex items-center gap-4">
                        <a href="{{ url('/pelanggan/keranjang') }}" class="text-gray-500 hover:text-gray-700 relative mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            @if(session('cart_count', 0) > 0)
                            <span class="absolute -top-1.5 -right-1.5 bg-red-500 text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center border border-white">
                                {{ session('cart_count') }}
                            </span>
                            @endif
                        </a>
                        <div class="h-6 w-px bg-gray-200"></div>
                        <div class="flex items-center gap-2 bg-[#F0F5FF] text-[#2563EB] px-3 py-1.5 rounded-full text-[13px] font-semibold border border-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            {{ session('username') ?? 'Raihandika' }}
                        </div>
                        <a href="{{ url('/') }}" class="text-gray-400 hover:text-gray-600 transition ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow flex flex-col items-center pt-[72px] pb-[72px] px-4 w-full">
            <!-- Hero / Logo -->
            <div class="text-center flex flex-col items-center mb-10 w-full max-w-[850px]">
                <div class="w-[88px] h-[88px] bg-[#2563EB] text-white rounded-[24px] flex items-center justify-center mb-6 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                
                <h1 class="text-[48px] font-extrabold text-[#111827] tracking-tight mb-3 leading-none">CIVAD</h1>
                <p class="text-[18px] text-gray-500 mb-8 font-medium">Sistem Informasi Penjualan Buku Pendidikan</p>
                
                <a href="{{ url('/pelanggan/dashboard') }}" class="inline-flex items-center justify-center bg-[#2563EB] text-white px-7 py-3.5 rounded-[12px] text-[15px] font-semibold shadow-sm hover:bg-blue-700 transition">
                    Lihat Katalog Buku
                </a>
            </div>

            <!-- Content Area -->
            <div class="w-full max-w-[850px] flex flex-col gap-6">
                <!-- Tentang Card -->
                <div class="bg-white p-8 rounded-[20px] shadow-sm border border-gray-100">
                    <h2 class="text-[22px] font-bold text-[#111827] mb-5">Tentang CV Arya Duta</h2>
                    <div class="text-[14px] text-gray-600 space-y-4 leading-relaxed">
                        <p>
                            CV Arya Duta adalah perusahaan yang berdiri sejak tahun <b>1998</b> dan bergerak di bidang <b>percetakan dan penerbitan buku</b>, terutama buku-buku pendidikan. Dengan pengalaman lebih dari dua dekade, kami berkomitmen untuk menyediakan buku-buku berkualitas yang mendukung pendidikan di Indonesia.
                        </p>
                        <p>
                            Kami menyediakan berbagai macam buku pendidikan mulai dari tingkat Sekolah Dasar (SD), Sekolah Menengah Pertama (SMP), hingga Sekolah Menengah Atas (SMA) dengan harga yang terjangkau dan kualitas terbaik.
                        </p>
                        <p>
                            Melalui sistem informasi penjualan online ini, kami memudahkan pelanggan untuk memesan buku-buku pendidikan dengan praktis dan efisien.
                        </p>
                    </div>
                </div>

                <!-- Two Column Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Jam Operasional -->
                    <div class="bg-white p-6 rounded-[20px] shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-[#EFF6FF] text-[#2563EB] rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <h3 class="text-[17px] font-bold text-[#111827]">Jam Operasional</h3>
                        </div>
                        
                        <div class="text-[14px] text-gray-600 flex flex-col gap-3.5">
                            <div class="flex justify-between items-center">
                                <span>Senin - Jumat</span>
                                <span class="font-medium text-[#111827]">08.00 - 16.00 WIB</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span>Sabtu</span>
                                <span class="font-medium text-[#111827]">08.00 - 15.00 WIB</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span>Minggu</span>
                                <span class="font-medium text-red-500">Tutup</span>
                            </div>
                        </div>
                    </div>

                    <!-- Area Layanan -->
                    <div class="bg-white p-6 rounded-[20px] shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-[#EFF6FF] text-[#2563EB] rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            </div>
                            <h3 class="text-[17px] font-bold text-[#111827]">Area Layanan</h3>
                        </div>

                        <div class="text-[14px] text-gray-600 mb-4">
                            Kami melayani pemesanan di wilayah:
                        </div>

                        <div class="flex flex-wrap gap-2.5 mb-5">
                            <span class="bg-[#EFF6FF] text-[#2563EB] px-3.5 py-1.5 rounded-full text-[13px] font-medium">Jakarta</span>
                            <span class="bg-[#EFF6FF] text-[#2563EB] px-3.5 py-1.5 rounded-full text-[13px] font-medium">Tangerang</span>
                            <span class="bg-[#EFF6FF] text-[#2563EB] px-3.5 py-1.5 rounded-full text-[13px] font-medium">Bekasi</span>
                        </div>

                        <div class="bg-[#EFF6FF] border border-[#BFDBFE] rounded-[10px] p-2.5 text-[13px]">
                            <span class="font-semibold text-[#1E40AF]">Biaya Pengiriman:</span> <span class="text-[#2563EB]">Rp 2.800 / km</span>
                        </div>
                    </div>
                </div>

                <!-- Footer Warning -->
                <div class="bg-[#FEFCE8] border border-[#FEF08A] rounded-[10px] p-3 text-center mt-2 shadow-sm">
                    <span class="text-[13px] text-[#CA8A04] font-medium">* Pastikan lokasi pemesanan terletak di wilayah Jakarta, Tangerang, dan Bekasi</span>
                </div>
            </div>
        </main>
    </body>
</html>
