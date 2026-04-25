<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Pesanan - CIVAD Admin</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; }
        .modal-overlay { background-color: rgba(15, 23, 42, 0.4); backdrop-filter: blur(8px); }
        .status-pill { transition: all 0.3s ease; }
    </style>
    <script>
        function openDetailModal(order) {
            document.getElementById('modal-order-number').innerText = order.order_number;
            document.getElementById('modal-customer-name').innerText = order.user.name;
            document.getElementById('modal-order-date').innerText = new Date(order.created_at).toLocaleString('id-ID', { day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' }) + ' WIB';
            document.getElementById('modal-total-payment').innerText = 'Rp ' + new Number(order.total_amount).toLocaleString('id-ID');
            document.getElementById('modal-order-id-input').value = order.id;
            document.getElementById('modal-rejection-reason').value = order.rejection_reason || '';

            const proofImg = document.getElementById('modal-payment-proof');
            const noProof = document.getElementById('modal-no-proof');
            if (order.payment_proof) {
                proofImg.src = order.payment_proof;
                proofImg.classList.remove('hidden');
                noProof.classList.add('hidden');
            } else {
                proofImg.src = '';
                proofImg.classList.add('hidden');
                noProof.classList.remove('hidden');
            }

            document.getElementById('rejection-box').classList.add('hidden');
            document.getElementById('reject-btn').classList.remove('hidden');
            document.getElementById('confirm-reject-btn').classList.add('hidden');

            const itemsContainer = document.getElementById('modal-items-container');
            itemsContainer.innerHTML = '';
            
            order.items.forEach(item => {
                const itemHtml = `
                    <div class="flex items-center gap-4 bg-slate-50/50 p-4 rounded-2xl border border-slate-100">
                        <div class="w-16 h-16 bg-white rounded-xl overflow-hidden border border-slate-100 flex-shrink-0 shadow-sm">
                            <img src="${item.book.image}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-grow">
                            <h5 class="text-[14px] font-extrabold text-indigo-950 leading-tight">${item.book.title}</h5>
                            <p class="text-[12px] font-bold text-slate-400 mt-1">${item.quantity} x Rp ${new Number(item.price).toLocaleString('id-ID')}</p>
                        </div>
                        <div class="text-[14px] font-black text-indigo-600 tracking-tight">Rp ${new Number(item.price * item.quantity).toLocaleString('id-ID')}</div>
                    </div>
                `;
                itemsContainer.insertAdjacentHTML('beforeend', itemHtml);
            });

            document.getElementById('detailModal').classList.remove('hidden');
            document.getElementById('detailModal').classList.add('flex');
        }

        function showRejectionBox() {
            document.getElementById('rejection-box').classList.remove('hidden');
            document.getElementById('reject-btn').classList.add('hidden');
            document.getElementById('confirm-reject-btn').classList.remove('hidden');
        }

        function closeDetailModal() {
            document.getElementById('detailModal').classList.add('hidden');
            document.getElementById('detailModal').classList.remove('flex');
        }
    </script>
</head>
<body class="text-[#1E293B]">

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-[280px] bg-white border-r border-slate-100 flex flex-col z-50 shadow-sm">
        <div class="h-24 flex items-center px-8">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-indigo-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-indigo-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <div>
                    <h1 class="font-extrabold text-[18px] text-indigo-950 leading-none tracking-tight">CIVAD</h1>
                    <p class="text-[11px] font-bold text-indigo-400 uppercase tracking-widest mt-1">Admin Panel</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 px-4 py-4 space-y-1">
            <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-semibold transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" /></svg>
                Dashboard
            </a>
            <a href="{{ url('/admin/manajemen-buku') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-semibold transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                Manajemen Buku
            </a>
            <a href="{{ url('/admin/data-pelanggan') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-semibold transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>
                Data Pelanggan
            </a>
            <a href="{{ url('/admin/manajemen-pesanan') }}" class="flex items-center gap-3 px-4 py-3 bg-indigo-50 text-indigo-600 font-bold rounded-2xl transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                Manajemen Pesanan
            </a>
            <a href="{{ url('/admin/tambah-admin') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-semibold transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>
                Tambah Admin
            </a>
        </nav>

        <div class="p-4 border-t border-slate-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-rose-500 hover:bg-rose-50 rounded-2xl font-bold transition-all group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 group-hover:translate-x-1 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" /></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-[280px] min-h-screen">
        <header class="h-24 bg-white/80 backdrop-blur-md sticky top-0 z-40 border-b border-slate-100 flex items-center justify-between px-10">
            <div>
                <div class="flex items-center gap-2 text-[12px] font-bold text-slate-400 uppercase tracking-widest mb-1">
                    <a href="{{ url('/admin/dashboard') }}" class="hover:text-indigo-600 transition-colors">Admin</a>
                    <span>/</span>
                    <span class="text-indigo-600">Manajemen Pesanan</span>
                </div>
                <h2 class="text-[20px] font-extrabold text-indigo-950 tracking-tight">Daftar Pesanan Pelanggan</h2>
            </div>
        </header>

        <div class="p-10">
            @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 text-emerald-600 text-[14px] rounded-2xl font-bold flex items-center gap-3 animate-in fade-in slide-in-from-top duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                {{ session('success') }}
            </div>
            @endif

            <!-- Search & Filter -->
            <div class="bg-white p-4 rounded-[28px] border border-slate-100 shadow-sm mb-10 flex flex-col md:flex-row gap-4">
                <div class="relative flex-grow group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-indigo-600 transition-colors"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                    <input type="text" placeholder="Cari ID pesanan atau nama pelanggan..." class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl py-3.5 pl-14 pr-6 text-[14px] focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 transition-all font-medium">
                </div>
                <div class="md:w-[240px]">
                    <select class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl py-3.5 px-6 text-[14px] font-bold text-slate-600 focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 transition-all appearance-none">
                        <option>Semua Status</option>
                        <option>Menunggu Verifikasi</option>
                        <option>Terverifikasi</option>
                        <option>Dikirim</option>
                        <option>Selesai</option>
                        <option>Ditolak</option>
                    </select>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-[11px] font-bold uppercase tracking-widest text-slate-400 bg-slate-50/50">
                                <th class="px-8 py-5">ID Pesanan</th>
                                <th class="px-8 py-5">Pelanggan</th>
                                <th class="px-8 py-5">Tanggal Masuk</th>
                                <th class="px-8 py-5 text-center">Item</th>
                                <th class="px-8 py-5">Total Pembayaran</th>
                                <th class="px-8 py-5 text-center">Status</th>
                                <th class="px-8 py-5 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-[14px] text-slate-600 divide-y divide-slate-50">
                            @forelse($orders as $order)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-8 py-6 font-black text-indigo-950 italic">#{{ $order->order_number }}</td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center font-bold text-[11px]">
                                            {{ substr($order->user->name, 0, 1) }}
                                        </div>
                                        <span class="font-bold text-indigo-950">{{ $order->user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 font-medium text-slate-400 text-[13px]">{{ $order->created_at->format('d F Y') }}</td>
                                <td class="px-8 py-6 text-center">
                                    <span class="px-3 py-1 bg-slate-100 rounded-full text-[11px] font-bold text-slate-500">{{ $order->items->count() }} Item</span>
                                </td>
                                <td class="px-8 py-6 font-black text-indigo-600">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                <td class="px-8 py-6 text-center">
                                    @php
                                        $colors = [
                                            'Menunggu Verifikasi' => 'bg-amber-50 text-amber-600 border-amber-100',
                                            'Terverifikasi' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                            'Dikirim' => 'bg-blue-50 text-blue-600 border-blue-100',
                                            'Selesai' => 'bg-indigo-50 text-indigo-600 border-indigo-100',
                                            'Ditolak' => 'bg-rose-50 text-rose-600 border-rose-100',
                                        ];
                                        $colorClass = $colors[$order->status] ?? 'bg-slate-50 text-slate-600 border-slate-100';
                                    @endphp
                                    <span class="inline-block px-4 py-1.5 rounded-full text-[11px] font-extrabold border {{ $colorClass }} shadow-sm">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <button onclick='openDetailModal(@json($order))' class="text-indigo-600 font-extrabold text-[13px] hover:underline flex items-center gap-2 mx-auto transition-all active:scale-95 group">
                                        Detail
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-8 py-20 text-center text-slate-400 font-bold">Belum ada data pesanan yang tersedia.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Detail Premium -->
    <div id="detailModal" class="fixed inset-0 z-[100] modal-overlay hidden items-center justify-center p-6">
        <div class="bg-white w-full max-w-[750px] rounded-[40px] shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300 flex flex-col max-h-[90vh]">
            <!-- Header -->
            <div class="px-10 py-8 border-b border-slate-50 bg-slate-50/30 flex items-center justify-between">
                <div>
                    <h3 class="text-[22px] font-black text-indigo-950 tracking-tight">Detail Transaksi <span id="modal-order-number" class="text-indigo-600 italic"></span></h3>
                    <p class="text-[12px] font-bold text-slate-400 uppercase tracking-widest mt-1">Verifikasi & Manajemen Pesanan</p>
                </div>
                <button onclick="closeDetailModal()" class="w-10 h-10 flex items-center justify-center rounded-full bg-white shadow-sm border border-slate-100 text-slate-400 hover:text-rose-500 transition-colors">✕</button>
            </div>

            <div class="flex-grow overflow-y-auto p-10 space-y-10">
                <!-- Info Section -->
                <div class="grid grid-cols-2 gap-8">
                    <div class="space-y-1">
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Informasi Pelanggan</span>
                        <p id="modal-customer-name" class="text-[16px] font-black text-indigo-950">-</p>
                    </div>
                    <div class="space-y-1 text-right">
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Waktu Transaksi</span>
                        <p id="modal-order-date" class="text-[14px] font-bold text-slate-600">-</p>
                    </div>
                </div>

                <!-- Items Section -->
                <div class="space-y-4">
                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Rincian Buku</span>
                    <div id="modal-items-container" class="space-y-3">
                        <!-- JS Injection -->
                    </div>
                </div>

                <!-- Payment Proof & Total -->
                <div class="grid grid-cols-2 gap-10">
                    <div class="space-y-4">
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Bukti Pembayaran</span>
                        <div class="bg-slate-50 rounded-[32px] border border-slate-100 p-3 min-h-[180px] flex items-center justify-center overflow-hidden">
                            <img id="modal-payment-proof" src="" class="max-w-full rounded-[20px] shadow-sm hidden cursor-zoom-in" onclick="window.open(this.src)">
                            <div id="modal-no-proof" class="text-slate-400 text-center flex flex-col items-center gap-3">
                                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm text-slate-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                                </div>
                                <span class="text-[12px] font-bold">Belum Ada Bukti</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center items-end bg-indigo-50/50 p-8 rounded-[32px] border border-indigo-100/50">
                        <span class="text-[12px] font-bold text-indigo-400 uppercase tracking-widest mb-1">Total Bayar</span>
                        <p id="modal-total-payment" class="text-[32px] font-black text-indigo-600 tracking-tighter">Rp 0</p>
                    </div>
                </div>

                <!-- Action Section -->
                <div class="pt-10 border-t border-slate-100 space-y-6">
                    <form action="{{ url('/admin/pesanan/update-status') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="modal-order-id-input">
                        
                        <div id="rejection-box" class="mb-6 hidden animate-in slide-in-from-top-4 duration-300">
                            <label class="block text-[13px] font-bold text-slate-700 mb-3 ml-1 uppercase tracking-widest">Alasan Penolakan</label>
                            <textarea name="rejection_reason" id="modal-rejection-reason" class="w-full bg-rose-50/30 border border-rose-100 rounded-[24px] p-5 text-[14px] font-medium text-rose-700 focus:outline-none focus:ring-4 focus:ring-rose-50 focus:border-rose-300 transition-all resize-none" rows="3" placeholder="Jelaskan alasan penolakan pesanan ini..."></textarea>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <button type="submit" name="status" value="Terverifikasi" class="px-6 py-3.5 bg-emerald-600 text-white text-[13px] font-extrabold rounded-2xl hover:bg-emerald-700 transition-all shadow-xl shadow-emerald-100 active:scale-95">Terverifikasi</button>
                            <button type="submit" name="status" value="Menunggu Verifikasi" class="px-6 py-3.5 bg-amber-500 text-white text-[13px] font-extrabold rounded-2xl hover:bg-amber-600 transition-all shadow-xl shadow-amber-100 active:scale-95">Set Menunggu</button>
                            <button type="submit" name="status" value="Dikirim" class="px-6 py-3.5 bg-blue-600 text-white text-[13px] font-extrabold rounded-2xl hover:bg-blue-700 transition-all shadow-xl shadow-blue-100 active:scale-95">Dikirim</button>
                            <button type="submit" name="status" value="Selesai" class="px-6 py-3.5 bg-indigo-600 text-white text-[13px] font-extrabold rounded-2xl hover:bg-indigo-700 transition-all shadow-xl shadow-indigo-100 active:scale-95">Selesai</button>
                            <button type="button" onclick="showRejectionBox()" id="reject-btn" class="px-6 py-3.5 bg-rose-100 text-rose-600 text-[13px] font-extrabold rounded-2xl hover:bg-rose-200 transition-all active:scale-95 ml-auto">Ditolak</button>
                            <button type="submit" name="status" value="Ditolak" id="confirm-reject-btn" class="px-6 py-3.5 bg-rose-600 text-white text-[13px] font-extrabold rounded-2xl hover:bg-rose-700 transition-all shadow-xl shadow-rose-100 animate-pulse hidden">Konfirmasi Tolak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
