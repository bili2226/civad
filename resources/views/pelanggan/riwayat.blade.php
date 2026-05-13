@extends('layouts.customer_premium')

@section('title', 'Riwayat Transaksi')

@section('scripts')
    <script>
        function toggleDetail(id) {
            const detail = document.getElementById('detail-' + id);
            const btn = document.getElementById('btn-' + id);
            const icon = document.getElementById('btn-icon-' + id);
            
            if (detail.classList.contains('hidden')) {
                detail.classList.remove('hidden');
                detail.classList.add('animate-in', 'fade-in', 'slide-in-from-top-4', 'duration-300');
                icon.style.transform = 'rotate(180deg)';
                btn.classList.add('bg-emerald-950', 'text-white');
                btn.classList.remove('text-emerald-950', 'bg-emerald-100');
            } else {
                detail.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
                btn.classList.remove('bg-emerald-950', 'text-white');
                btn.classList.add('text-emerald-950', 'bg-emerald-100');
            }
        }
    </script>

@endsection

@section('content')


    <main class="max-w-[1280px] mx-auto px-6 py-12">
        <header class="mb-12">
            <h1 class="text-[36px] font-black text-emerald-950 tracking-tighter mb-3 leading-none">Riwayat Transaksi</h1>
            <p class="text-emerald-900 font-bold text-[14px] uppercase tracking-widest">Arsip Literasi & Jejak Belanja Anda</p>
        </header>
        
        
        <div class="max-w-5xl mx-auto w-full">
            @forelse($orders as $order)
            <div class="history-card w-full min-w-full bg-white rounded-[48px] border-2 border-emerald-950 shadow-2xl overflow-hidden mb-16 group transition-all duration-500 hover:shadow-emerald-900/10">
                <!-- Card Top Section -->
                <div class="bg-emerald-950 p-8 sm:p-10 relative overflow-hidden">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-emerald-500/20 rounded-full blur-[100px]"></div>
                    <div class="absolute -left-20 -bottom-20 w-48 h-48 bg-emerald-500/10 rounded-full blur-[80px]"></div>
                    
                    <div class="relative z-10 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-8">
                        <div class="flex items-center gap-6">
                            <div class="w-16 h-16 bg-white/10 backdrop-blur-xl text-emerald-400 rounded-[24px] flex items-center justify-center border border-white/10 shadow-inner group-hover:scale-110 transition-transform duration-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" /></svg>
                            </div>
                            <div>
                                @php
                                    $statusColors = [
                                        'Pending' => 'bg-amber-500 shadow-amber-500/20',
                                        'Verifikasi' => 'bg-emerald-500 shadow-emerald-500/20',
                                        'Sedang Dikirim' => 'bg-blue-500 shadow-blue-500/20',
                                        'Selesai' => 'bg-emerald-500 shadow-emerald-500/20',
                                        'Dibatalkan' => 'bg-rose-500 shadow-rose-500/20',
                                        // Legacy support
                                        'Menunggu Verifikasi' => 'bg-amber-500 shadow-amber-500/20',
                                        'Terverifikasi' => 'bg-emerald-500 shadow-emerald-500/20',
                                        'Dikirim' => 'bg-blue-500 shadow-blue-500/20',
                                        'Ditolak' => 'bg-rose-500 shadow-rose-500/20',
                                    ];
                                    $statusColor = $statusColors[$order->status] ?? 'bg-slate-500 shadow-slate-500/20';
                                @endphp
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="px-3 py-1 {{ $statusColor }} text-white text-[10px] font-black rounded-full uppercase tracking-widest shadow-lg">{{ $order->status }}</span>
                                    <h3 class="font-black text-white text-[22px] tracking-tighter leading-none">#{{ $order->order_number }}</h3>
                                </div>
                                <p class="text-emerald-300/80 font-bold text-[12px] uppercase tracking-[0.2em] flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" /></svg>
                                    {{ $order->created_at->format('d F Y • H:i') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col lg:items-end w-full lg:w-auto">
                            <span class="text-emerald-400 font-black text-[11px] uppercase tracking-[0.3em] mb-2 opacity-60">Total Transaksi</span>
                            <div class="flex items-baseline gap-2">
                                <span class="text-emerald-400 font-bold text-lg">Rp</span>
                                <span class="text-white font-black text-[36px] tracking-tighter leading-none">{{ number_format($order->total_amount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Bar -->
                <div class="px-8 py-6 border-b border-emerald-50 flex flex-wrap items-center justify-between gap-6 bg-white">
                    <div class="flex items-center gap-4">
                        <div class="flex -space-x-3 group-hover:space-x-1 transition-all duration-500">
                            @foreach($order->items->take(3) as $item)
                                <div class="w-10 h-10 rounded-full border-2 border-white bg-emerald-50 overflow-hidden shadow-md">
                                    <img src="{{ $item->book->image }}" class="w-full h-full object-cover">
                                </div>
                            @endforeach
                            @if($order->items->count() > 3)
                                <div class="w-10 h-10 rounded-full border-2 border-white bg-emerald-950 text-white flex items-center justify-center text-[10px] font-black shadow-md">
                                    +{{ $order->items->count() - 3 }}
                                </div>
                            @endif
                        </div>
                        <p class="text-[13px] font-black text-emerald-950 tracking-tight">
                            {{ $order->items->count() }} Produk Literasi
                        </p>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        @if($order->status == 'Dikirim' || $order->status == 'Sedang Dikirim' || $order->status == 'Pesanan Sedang Dikirim')
                        <form action="{{ route('pelanggan.pesanan.selesai') }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin sudah menerima pesanan ini? Status akan berubah menjadi Selesai.')">
                            @csrf
                            <input type="hidden" name="id" value="{{ $order->id }}">
                            <button type="submit" class="px-8 py-4 bg-emerald-950 text-white rounded-[20px] font-black text-[14px] transition-all hover:bg-emerald-900 active:scale-95 shadow-xl shadow-emerald-100 flex items-center gap-2 group/confirm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 group-hover/confirm:scale-110 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <span>Pesanan Diterima</span>
                            </button>
                        </form>
                        @endif
                        
                        <button id="btn-{{ $order->id }}" onclick="toggleDetail('{{ $order->id }}')" class="flex items-center gap-3 px-8 py-4 bg-emerald-950 text-white rounded-[20px] font-black text-[14px] transition-all hover:bg-emerald-800 active:scale-95 shadow-xl shadow-emerald-950/20 group/btn">
                            <span>Lihat Rincian Pesanan</span>
                            <svg id="btn-icon-{{ $order->id }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 transition-transform duration-300 group-hover/btn:translate-y-0.5"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                        </button>
                    </div>
                </div>

                <!-- Expanded Detail -->
                <div id="detail-{{ $order->id }}" class="hidden px-8 sm:px-10 pb-12 pt-6 bg-emerald-50/30">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-10">
                        <!-- Items List -->
                        <div>
                            <h4 class="text-[13px] font-black text-emerald-950 uppercase tracking-[0.3em] mb-8 flex items-center gap-3">
                                <span class="w-2 h-6 bg-emerald-950 rounded-full shadow-sm"></span>
                                Rincian Koleksi Buku
                            </h4>
                            <div class="space-y-4">
                                @foreach($order->items as $item)
                                <div class="bg-white p-5 rounded-[28px] border-2 border-emerald-950/5 flex items-center gap-5 shadow-sm group/item hover:border-emerald-950/20 transition-all">
                                    <div class="w-16 h-20 rounded-[18px] overflow-hidden bg-emerald-50 flex-shrink-0 border border-emerald-50 shadow-inner group-hover/item:scale-105 transition-transform">
                                        <img src="{{ $item->book->image }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-grow">
                                        <h5 class="text-[15px] font-black text-emerald-950 leading-tight mb-2 line-clamp-1">{{ $item->book->title }}</h5>
                                        <div class="flex items-center gap-3">
                                            <span class="text-[12px] font-black text-emerald-950 uppercase tracking-widest bg-emerald-100 px-2 py-0.5 rounded-lg">{{ $item->quantity }} Pcs</span>
                                            <span class="text-[12px] font-bold text-emerald-900/40">@ Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[15px] font-black text-emerald-950 tracking-tight">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Logistics & Info -->
                        <div>
                            <h4 class="text-[13px] font-black text-emerald-950 uppercase tracking-[0.3em] mb-8 flex items-center gap-3">
                                <span class="w-2 h-6 bg-emerald-950 rounded-full shadow-sm"></span>
                                Logistik & Pengiriman
                            </h4>
                            <div class="bg-white p-8 rounded-[36px] border-2 border-emerald-950/5 shadow-sm space-y-8">
                                <div class="flex items-start gap-5">
                                    <div class="w-12 h-12 bg-emerald-100 text-emerald-950 rounded-[20px] flex items-center justify-center shrink-0 border border-emerald-200 shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                    </div>
                                    <div>
                                        <p class="text-[11px] font-black text-emerald-900 uppercase tracking-[0.3em] mb-2 opacity-60">Alamat Pengiriman</p>
                                        <p class="text-[15px] font-bold text-emerald-950 leading-relaxed max-w-sm">{{ $order->address ?? 'Alamat tidak tersedia' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-white p-24 rounded-[48px] border border-emerald-100 text-center shadow-sm">
                <div class="w-20 h-20 bg-emerald-50 text-slate-200 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                </div>
                <p class="text-[18px] font-black text-emerald-950 mb-2 tracking-tight">Belum Ada Transaksi</p>
                <p class="text-emerald-900 font-medium">Mulailah membangun sejarah literasi Anda bersama Arya Duta hari ini.</p>
            </div>
            @endforelse
        </div>
        </div>
    </main>
@endsection
