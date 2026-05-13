@extends('layouts.customer_premium')

@section('title', 'Status Pesanan')

@section('scripts')
    <script>
        function selectOrder(id) {
            document.querySelectorAll('.order-item').forEach(el => {
                el.classList.remove('active', 'bg-emerald-50/50');
            });
            document.getElementById('item-' + id).classList.add('active', 'bg-emerald-50/50');

            document.querySelectorAll('.detail-panel').forEach(el => {
                el.classList.add('hidden');
            });
            document.getElementById('detail-' + id).classList.remove('hidden');
        }
    </script>

@endsection

@section('content')


    <main class="max-w-[1280px] mx-auto px-6 py-12">
        <header class="mb-12">
            <h1 class="text-[36px] font-black text-emerald-950 tracking-tighter mb-3 leading-none">Status Pesanan</h1>
            <p class="text-emerald-600 font-bold text-[14px] uppercase tracking-widest">Pantau Perjalanan Literasi Anda</p>
        </header>

        <div class="flex flex-col xl:flex-row gap-10">
            <!-- Sidebar Order List -->
            <div class="w-full xl:w-[400px] flex-shrink-0">
                <div class="bg-white rounded-[40px] border-2 border-emerald-950 shadow-2xl overflow-hidden flex flex-col">
                    <div class="p-6 border-b border-emerald-50 bg-emerald-50/30">
                        <h3 class="text-[12px] font-black text-emerald-600 uppercase tracking-[0.2em]">Pesanan Aktif</h3>
                    </div>
                    @forelse($orders as $order)
                    <div id="item-{{ $order->id }}" onclick="selectOrder('{{ $order->id }}')" class="order-item {{ $loop->first ? 'active bg-emerald-50/50' : '' }} p-8 border-b border-emerald-50 cursor-pointer hover:bg-emerald-50/50 transition relative group">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h4 class="font-black text-emerald-950 text-[15px] mb-1">ID #{{ $order->order_number }}</h4>
                                <p class="text-[11px] text-emerald-600 font-bold uppercase tracking-widest">{{ $order->created_at->format('d M Y') }}</p>
                            </div>
                            <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform shadow-sm border border-emerald-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            @php
                                $statusColors = [
                                    'Pending' => 'bg-amber-50 text-amber-600 border-amber-100',
                                    'Verifikasi' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                    'Sedang Dikirim' => 'bg-blue-50 text-blue-600 border-blue-100',
                                    'Selesai' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                    'Dibatalkan' => 'bg-rose-50 text-rose-600 border-rose-100',
                                    // Legacy support
                                    'Menunggu Verifikasi' => 'bg-amber-50 text-amber-600 border-amber-100',
                                    'Terverifikasi' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                    'Dikirim' => 'bg-blue-50 text-blue-600 border-blue-100',
                                    'Ditolak' => 'bg-rose-50 text-rose-600 border-rose-100',
                                ];
                                $colorClass = $statusColors[$order->status] ?? 'bg-emerald-50 text-emerald-800';
                            @endphp
                            <span class="status-pill px-4 py-1.5 rounded-full border {{ $colorClass }}">{{ $order->status }}</span>
                            <span class="font-black text-emerald-950 text-[16px] tracking-tight">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="p-16 text-center">
                        <div class="w-16 h-16 bg-emerald-50 text-slate-200 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                        </div>
                        <p class="text-emerald-600 font-bold text-[14px]">Tidak ada pesanan aktif</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Detail Panel -->
            <div class="flex-grow">
                @foreach($orders as $order)
                <div id="detail-{{ $order->id }}" class="detail-panel bg-white rounded-[48px] shadow-2xl border-2 border-emerald-950 overflow-hidden animate-in fade-in slide-in-from-right-4 duration-500 {{ $loop->first ? '' : 'hidden' }}">
                    <div class="bg-emerald-950 p-10 text-white relative overflow-hidden">
                        <div class="absolute -right-20 -top-20 w-64 h-64 bg-emerald-600 rounded-full blur-[100px] opacity-30"></div>
                        
                        <div class="relative z-10">
                            <div class="flex justify-between items-start mb-10">
                                <div>
                                    <h3 class="text-[28px] font-black tracking-tighter leading-none mb-3">Pesanan #{{ $order->order_number }}</h3>
                                    <p class="text-emerald-400 font-bold text-[12px] uppercase tracking-[0.2em]">Waktu Transaksi: {{ $order->created_at->format('d F Y, H:i') }} WIB</p>
                                </div>
                                <div class="px-6 py-2 bg-white/10 backdrop-blur-md rounded-2xl border border-white/10 font-black text-[14px] uppercase tracking-widest">
                                    {{ $order->status }}
                                </div>
                            </div>
                            
                            <div class="h-px bg-white/10 mb-8"></div>
                            
                            <div class="flex justify-between items-end">
                                <span class="text-emerald-300 font-bold text-[13px] uppercase tracking-widest">Total Pembayaran Terverifikasi</span>
                                <span class="text-[32px] font-black tracking-tighter">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-10">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center border border-emerald-100 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0Zm-9-3.75h.008v.008H12V8.25Z" /></svg>
                            </div>
                            <h4 class="text-[16px] font-black text-emerald-950 tracking-tight">Status & Logistik</h4>
                        </div>
                        
                        @if($order->status == 'Ditolak')
                        <div class="bg-rose-50 border border-rose-100 rounded-[32px] p-8 flex flex-col sm:flex-row gap-6 items-start">
                            <div class="w-14 h-14 bg-white text-rose-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-sm border border-rose-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                            </div>
                            <div>
                                <h5 class="font-black text-rose-900 text-[18px] mb-2 tracking-tight">Mohon Maaf, Pesanan Ditolak</h5>
                                <div class="bg-white/50 p-4 rounded-2xl border border-rose-100 mb-4">
                                    <p class="text-[14px] font-bold text-rose-700 italic">"{{ $order->rejection_reason ?? 'Informasi pembayaran atau alamat tidak sesuai.' }}"</p>
                                </div>
                                <p class="text-[13px] text-rose-500 font-medium leading-relaxed">Dana Anda akan diproses untuk pengembalian atau silakan hubungi Customer Service kami untuk bantuan lebih lanjut.</p>
                            </div>
                        </div>
                        @else
                        <div class="bg-emerald-50 border-2 border-emerald-950/20 rounded-[32px] p-10 relative overflow-hidden">
                            <div class="absolute right-0 bottom-0 opacity-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-48 h-48"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                            </div>
                            <div class="relative z-10">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-3 h-3 bg-emerald-600 rounded-full animate-ping"></div>
                                    <h5 class="font-black text-emerald-950 text-[18px] tracking-tight">{{ $order->status }}</h5>
                                </div>
                                <p class="text-[14px] text-emerald-700 font-medium leading-relaxed max-w-xl">
                                    @if($order->status == 'Menunggu Verifikasi')
                                        Admin kami sedang melakukan pengecekan terhadap bukti transfer yang Anda unggah. Proses ini biasanya memakan waktu 15-30 menit pada jam kerja.
                                    @elseif($order->status == 'Terverifikasi')
                                        Pembayaran telah kami terima! Tim logistik sedang menyiapkan buku-buku pesanan Anda untuk segera dikirimkan.
                                    @elseif($order->status == 'Dikirim')
                                        Pesanan Anda sedang dalam perjalanan menuju alamat tujuan. Pastikan nomor handphone Anda tetap aktif.
                                    @else
                                        Terima kasih telah berbelanja di Arya Duta. Pesanan Anda telah selesai diproses.
                                    @endif
                                </p>
                            </div>
                        </div>
                        @endif

                        <!-- Mini History Line -->
                        <div class="mt-12 space-y-6 px-4">
                            <div class="flex items-center gap-6">
                                <div class="w-3 h-3 rounded-full {{ in_array($order->status, ['Terverifikasi', 'Dikirim', 'Selesai']) ? 'bg-emerald-600' : 'bg-slate-200' }}"></div>
                                <p class="text-[13px] font-black {{ in_array($order->status, ['Terverifikasi', 'Dikirim', 'Selesai']) ? 'text-emerald-950' : 'text-emerald-400' }}">Verifikasi Pembayaran</p>
                            </div>
                            <div class="flex items-center gap-6">
                                <div class="w-3 h-3 rounded-full {{ in_array($order->status, ['Dikirim', 'Selesai']) ? 'bg-emerald-600' : 'bg-slate-200' }}"></div>
                                <p class="text-[13px] font-black {{ in_array($order->status, ['Dikirim', 'Selesai']) ? 'text-emerald-950' : 'text-emerald-400' }}">Pesanan Sedang Dikirim</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
