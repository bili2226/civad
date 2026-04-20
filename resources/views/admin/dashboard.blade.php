<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - CIVAD</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background-color: #F8FAFC; }
    </style>
</head>
<body class="text-gray-800">

    @php
        $orders = session('orders', []);
        $totalOrders = count($orders);
        $totalPendapatan = collect($orders)->sum('total');
        $totalBukuTerjual = collect($orders)->flatMap(function($order) {
            return collect($order['items'])->pluck('qty');
        })->sum();
        $menungguVerifikasi = collect($orders)->where('status', 'Menunggu Verifikasi Admin')->count();
    @endphp

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-[260px] bg-white border-r border-gray-100 flex flex-col shadow-[2px_0_10px_rgba(0,0,0,0.02)] z-10">
        <!-- Logo -->
        <div class="h-20 flex items-center px-6 border-b border-gray-50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#2563EB] text-white rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <div>
                    <h1 class="font-bold text-[18px] text-[#111827] leading-none">CIVAD Admin</h1>
                    <p class="text-[11px] text-gray-500 mt-0.5">Sistem Manajemen</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 text-[14px]">
            <a href="#" class="flex items-center gap-3 px-4 py-3 bg-[#F0F5FF] text-[#2563EB] font-semibold rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" /></svg>
                Dashboard
            </a>
            <a href="{{ url('/admin/manajemen-buku') }}" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                Manajemen Buku
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>
                Data Pelanggan
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                Manajemen Pesanan
            </a>
            <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl font-semibold transition mt-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" /></svg>
                Keluar
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="ml-[260px] min-h-screen">
        <!-- Topbar -->
        <header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-8">
            <div class="flex items-center gap-2 text-[14px]">
                <span class="font-semibold text-gray-800">Dashboard</span>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-[13px] font-bold text-gray-800 leading-tight">Admin CIVAD</p>
                    <p class="text-[11px] text-gray-500">Administrator</p>
                </div>
                <div class="w-9 h-9 bg-blue-50 text-[#2563EB] rounded-full flex items-center justify-center font-bold">A</div>
            </div>
        </header>

        <!-- Content -->
        <div class="p-8">
            <div class="mb-8">
                <h2 class="text-[24px] font-bold text-[#111827]">Ringkasan Statistik</h2>
                <p class="text-[14px] text-gray-500 mt-1">Data real-time dari aktivitas pelanggan</p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-[20px] border border-gray-100 shadow-sm">
                    <h3 class="text-[24px] font-bold text-gray-900 leading-none mb-1">6</h3>
                    <p class="text-[14px] font-semibold text-gray-700">Total Jenis Buku</p>
                    <p class="text-[12px] text-gray-400 mt-1">Katalog Aktif</p>
                </div>

                <div class="bg-white p-6 rounded-[20px] border border-gray-100 shadow-sm">
                    <h3 class="text-[24px] font-bold text-gray-900 leading-none mb-1">{{ $totalBukuTerjual }}</h3>
                    <p class="text-[14px] font-semibold text-gray-700">Total Buku Terjual</p>
                    <p class="text-[12px] text-gray-400 mt-1">Semua Pesanan</p>
                </div>

                <div class="bg-white p-6 rounded-[20px] border border-gray-100 shadow-sm">
                    <h3 class="text-[24px] font-bold text-gray-900 leading-none mb-1">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                    <p class="text-[14px] font-semibold text-gray-700">Total Pendapatan</p>
                    <p class="text-[12px] text-gray-400 mt-1">Akumulasi Transaksi</p>
                </div>

                <div class="bg-white p-6 rounded-[20px] border border-gray-100 shadow-sm">
                    <h3 class="text-[24px] font-bold text-[#CA8A04] leading-none mb-1">{{ $menungguVerifikasi }}</h3>
                    <p class="text-[14px] font-semibold text-gray-700">Perlu Verifikasi</p>
                    <p class="text-[12px] text-gray-400 mt-1">Pembayaran Terbaru</p>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-[20px] border border-gray-100 shadow-sm pt-6 overflow-hidden">
                <div class="flex items-center justify-between px-6 mb-4">
                    <h3 class="text-[16px] font-bold text-gray-900">Pesanan Pelanggan Terbaru</h3>
                </div>
                <div class="overflow-x-auto w-full">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-[11px] uppercase tracking-wider text-gray-400 border-y border-gray-100 bg-gray-50/50">
                                <th class="px-6 py-3 font-semibold">ID Pesanan</th>
                                <th class="px-6 py-3 font-semibold">Pelanggan</th>
                                <th class="px-6 py-3 font-semibold">Produk</th>
                                <th class="px-6 py-3 font-semibold">Tanggal</th>
                                <th class="px-6 py-3 font-semibold">Total</th>
                                <th class="px-6 py-3 font-semibold text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-[13px] text-gray-700 divide-y divide-gray-100">
                            @forelse($orders as $orderId => $order)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-6 py-4 font-semibold text-gray-900">#{{ $order['id'] }}</td>
                                <td class="px-6 py-4">Andi (Demo)</td>
                                <td class="px-6 py-4">
                                    <span class="text-[11px]">{{ count($order['items']) }} Jenis Buku</span>
                                </td>
                                <td class="px-6 py-4">{{ $order['date'] }}</td>
                                <td class="px-6 py-4 font-bold text-[#2563EB]">Rp {{ number_format($order['total'], 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-block px-3 py-1 rounded-full text-[10px] font-bold bg-yellow-50 text-yellow-600 border border-yellow-100">{{ $order['status'] }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-400">Belum ada transaksi masuk dari pelanggan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
