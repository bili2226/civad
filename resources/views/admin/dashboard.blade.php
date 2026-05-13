@extends('layouts.admin_premium')

@section('title', 'Dashboard')

@section('header')
    <h2 class="text-[28px] font-black text-white tracking-tighter leading-none">Ringkasan Dashboard</h2>
    <p class="text-[14px] font-bold text-emerald-400 uppercase tracking-widest mt-2">Pantau aktivitas sistem hari ini</p>
@endsection

@section('content')
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <div class="stat-card bg-white p-8 rounded-[40px] border border-emerald-100 shadow-sm flex flex-col gap-6">
            <div class="w-20 h-20 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
            </div>
            <div>
                <h3 class="text-[32px] font-black text-emerald-950 leading-none mb-1">{{ $totalJenisBuku }}</h3>
                <p class="text-[13px] font-black text-emerald-700 uppercase tracking-widest opacity-60">Jenis Buku</p>
            </div>
        </div>

        <div class="stat-card bg-white p-8 rounded-[40px] border border-emerald-100 shadow-sm flex flex-col gap-6">
            <div class="w-20 h-20 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
            </div>
            <div>
                <h3 class="text-[32px] font-black text-emerald-950 leading-none mb-1">{{ $totalBukuTerjual }}</h3>
                <p class="text-[13px] font-black text-emerald-700 uppercase tracking-widest opacity-60">Buku Terjual</p>
            </div>
        </div>

        <div class="stat-card bg-white p-8 rounded-[40px] border border-emerald-100 shadow-sm flex flex-col gap-6">
            <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125H3.75m16.5-12.75V15" /></svg>
            </div>
            <div>
                <h3 class="text-[32px] font-black text-emerald-950 leading-none mb-1">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                <p class="text-[13px] font-black text-emerald-700 uppercase tracking-widest opacity-60">Pendapatan</p>
            </div>
        </div>

        <div class="stat-card bg-white p-8 rounded-[40px] border border-emerald-100 shadow-sm flex flex-col gap-6">
            <div class="w-20 h-20 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
            </div>
            <div>
                <h3 class="text-[32px] font-black text-amber-600 leading-none mb-1">{{ $menungguVerifikasi }}</h3>
                <p class="text-[13px] font-black text-emerald-700 uppercase tracking-widest opacity-60">Pesanan Pending</p>
            </div>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="bg-white rounded-[48px] border border-emerald-100 shadow-sm overflow-hidden">
        <div class="p-10 border-b border-emerald-50 flex items-center justify-between bg-emerald-50/20">
            <div>
                <h3 class="text-[20px] font-black text-emerald-950 tracking-tight">Pesanan Pelanggan Terbaru</h3>
                <p class="text-[12px] font-bold text-emerald-600 uppercase tracking-widest mt-1">Status transaksi real-time</p>
            </div>
            <a href="{{ url('/admin/manajemen-pesanan') }}" class="px-6 py-3 bg-white border border-emerald-100 rounded-2xl text-[13px] font-black text-emerald-900 hover:bg-emerald-950 hover:text-white transition-all shadow-sm">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-[11px] font-black uppercase tracking-[0.2em] text-emerald-900 bg-emerald-50/50">
                        <th class="px-10 py-6">ID Pesanan</th>
                        <th class="px-10 py-6">Informasi Pelanggan</th>
                        <th class="px-10 py-6">Detail Produk</th>
                        <th class="px-10 py-6">Total Bayar</th>
                        <th class="px-10 py-6 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="text-[14px] text-emerald-950 divide-y divide-emerald-50/50">
                    @php
                        $recentOrders = \App\Models\Order::with('user')->orderBy('created_at', 'desc')->take(5)->get();
                    @endphp
                    @forelse($recentOrders as $order)
                    <tr class="hover:bg-emerald-50/30 transition-colors group">
                        <td class="px-10 py-7 font-black text-emerald-950 tracking-tighter">#{{ $order->order_number }}</td>
                        <td class="px-10 py-7">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-emerald-950 text-white rounded-xl flex items-center justify-center font-black text-[14px] shadow-lg">
                                    {{ substr($order->user->name ?? 'U', 0, 1) }}
                                </div>
                                <span class="font-black text-emerald-950">{{ $order->user->name ?? 'Unknown User' }}</span>
                            </div>
                        </td>
                        <td class="px-10 py-7">
                            <span class="px-4 py-1.5 bg-emerald-50 text-emerald-900 text-[12px] font-black rounded-full border border-emerald-100">
                                {{ $order->items->count() }} Jenis Buku
                            </span>
                        </td>
                        <td class="px-10 py-7 font-black text-emerald-600 text-lg">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                        <td class="px-10 py-7 text-center">
                            @php
                                $statusClasses = [
                                    'Menunggu Verifikasi' => 'bg-amber-50 text-amber-600 border-amber-100',
                                    'Pending' => 'bg-amber-50 text-amber-600 border-amber-100',
                                    'Terverifikasi' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                    'Verifikasi' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                    'Dikirim' => 'bg-blue-50 text-blue-600 border-blue-100',
                                    'Sedang Dikirim' => 'bg-blue-50 text-blue-600 border-blue-100',
                                    'Selesai' => 'bg-emerald-950 text-white border-emerald-950',
                                    'Dibatalkan' => 'bg-rose-50 text-rose-600 border-rose-100',
                                ];
                                $currentClass = $statusClasses[$order->status] ?? 'bg-slate-50 text-slate-600 border-slate-100';
                            @endphp
                            <span class="inline-block px-5 py-2 rounded-full text-[11px] font-black uppercase tracking-widest border {{ $currentClass }} shadow-sm">
                                {{ $order->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-10 py-24 text-center">
                            <div class="w-20 h-20 bg-emerald-50 rounded-3xl flex items-center justify-center mx-auto mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10 text-emerald-200"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                            </div>
                            <p class="text-emerald-950 font-black text-xl mb-1">Belum Ada Transaksi</p>
                            <p class="text-emerald-600 font-bold">Data aktivitas pesanan akan muncul di sini.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
