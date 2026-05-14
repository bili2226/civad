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
    <div class="mb-12 text-center md:text-left">
        <h1 class="text-[32px] md:text-[48px] font-black text-emerald-950 tracking-tighter mb-3 leading-none">Status Pesanan</h1>
        <p class="text-emerald-900 font-bold text-[12px] md:text-[14px] uppercase tracking-[0.3em]">Pantau Perjalanan Literasi Anda</p>
    </div>

    <div class="flex flex-col xl:flex-row gap-8 md:gap-12">
        <!-- Sidebar Order List -->
        <div class="w-full xl:w-[400px] flex-shrink-0">
            <div class="bg-white rounded-[40px] border-2 border-emerald-950 shadow-2xl overflow-hidden flex flex-col">
                <div class="p-6 border-b border-emerald-50 bg-emerald-50/50">
                    <h3 class="text-[11px] font-black text-emerald-900 uppercase tracking-[0.2em]">Pesanan Aktif</h3>
                </div>
                <div class="max-h-[400px] xl:max-h-none overflow-y-auto custom-scrollbar">
                    @forelse($orders as $order)
                    <div id="item-{{ $order->id }}" onclick="selectOrder('{{ $order->id }}')" class="order-item {{ $loop->first ? 'active bg-emerald-50/50' : '' }} p-6 md:p-8 border-b border-emerald-50 cursor-pointer hover:bg-emerald-50/30 transition-all relative group">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h4 class="font-black text-emerald-950 text-[16px] mb-1">#{{ $order->order_number }}</h4>
                                <p class="text-[10px] text-emerald-900/60 font-bold uppercase tracking-widest">{{ $order->created_at->format('d M Y') }}</p>
                            </div>
                            <div class="w-10 h-10 bg-emerald-50 text-emerald-950 rounded-xl flex items-center justify-center group-hover:rotate-12 transition-transform shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            @php
                                $statusColors = [
                                    'Pending' => 'text-amber-600 bg-amber-50',
                                    'Verifikasi' => 'text-emerald-600 bg-emerald-50',
                                    'Sedang Dikirim' => 'text-blue-600 bg-blue-50',
                                    'Selesai' => 'text-emerald-600 bg-emerald-50',
                                    'Dibatalkan' => 'text-rose-600 bg-rose-50',
                                ];
                                $colorClass = $statusColors[$order->status] ?? 'text-emerald-800 bg-emerald-50';
                            @endphp
                            <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest {{ $colorClass }}">{{ $order->status }}</span>
                            <span class="font-black text-emerald-950 text-[16px]">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="p-16 text-center">
                        <p class="text-emerald-900/40 font-bold text-[14px]">Tidak ada pesanan aktif</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Detail Panel -->
        <div class="flex-grow">
            @foreach($orders as $order)
            <div id="detail-{{ $order->id }}" class="detail-panel bg-white rounded-[40px] md:rounded-[56px] shadow-2xl border-2 border-emerald-950 overflow-hidden animate-in fade-in slide-in-from-right-4 duration-500 {{ $loop->first ? '' : 'hidden' }}">
                <div class="bg-emerald-950 p-8 md:p-12 text-white relative overflow-hidden">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-emerald-600 rounded-full blur-[100px] opacity-20"></div>
                    
                    <div class="relative z-10">
                        <div class="flex flex-col md:flex-row justify-between items-start gap-6 mb-10">
                            <div>
                                <h3 class="text-[28px] md:text-[36px] font-black tracking-tighter leading-none mb-3">Pesanan #{{ $order->order_number }}</h3>
                                <p class="text-emerald-400 font-bold text-[11px] uppercase tracking-[0.2em]">Transaksi: {{ $order->created_at->format('d F Y, H:i') }} WIB</p>
                            </div>
                            <div class="px-6 py-2 bg-white/10 backdrop-blur-md rounded-2xl border border-white/10 font-black text-[12px] uppercase tracking-widest">
                                {{ $order->status }}
                            </div>
                        </div>
                        
                        <div class="h-px bg-white/10 mb-8"></div>
                        
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
                            <span class="text-emerald-400 font-black text-[11px] uppercase tracking-widest opacity-60">Total Terverifikasi</span>
                            <span class="text-[32px] md:text-[44px] font-black tracking-tighter leading-none">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <div class="p-8 md:p-12">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-10 h-10 bg-emerald-50 text-emerald-950 rounded-xl flex items-center justify-center border border-emerald-100 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0Zm-9-3.75h.008v.008H12V8.25Z" /></svg>
                        </div>
                        <h4 class="text-[18px] font-black text-emerald-950 tracking-tight">Status & Logistik</h4>
                    </div>
                    
                    @if($order->status == 'Ditolak')
                    <div class="bg-rose-50 border border-rose-100 rounded-[32px] p-8">
                        <h5 class="font-black text-rose-900 text-[18px] mb-4 tracking-tight">Pesanan Ditolak</h5>
                        <div class="bg-white/50 p-6 rounded-2xl border border-rose-100 italic font-bold text-rose-700 text-[14px]">
                            "{{ $order->rejection_reason ?? 'Informasi pembayaran atau alamat tidak sesuai.' }}"
                        </div>
                    </div>
                    @else
                    <div class="bg-emerald-50 border-2 border-emerald-950/5 rounded-[40px] p-8 md:p-12 relative overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-3 h-3 bg-emerald-600 rounded-full animate-ping"></div>
                                <h5 class="font-black text-emerald-950 text-[18px] tracking-tight">Proses: {{ $order->status }}</h5>
                            </div>
                            <p class="text-[14px] md:text-[15px] text-emerald-900/60 font-bold leading-relaxed max-w-xl">
                                @if($order->status == 'Menunggu Verifikasi')
                                    Admin kami sedang melakukan pengecekan terhadap bukti transfer Anda. Tunggu sebentar ya!
                                @elseif($order->status == 'Terverifikasi')
                                    Pembayaran terverifikasi! Tim kami sedang menyiapkan koleksi literasi pilihan Anda.
                                @elseif($order->status == 'Dikirim')
                                    Pesanan sudah di kurir! Pastikan HP Anda aktif untuk koordinasi pengiriman.
                                @else
                                    Terima kasih! Pesanan ini sudah selesai. Sampai jumpa di petualangan literasi berikutnya.
                                @endif
                            </p>
                        </div>
                    </div>
                    @endif

                    <!-- Milestone Line -->
                    <div class="mt-12 space-y-6">
                        <div class="flex items-center gap-6">
                            <div class="w-4 h-4 rounded-full border-4 {{ in_array($order->status, ['Terverifikasi', 'Dikirim', 'Selesai']) ? 'bg-emerald-600 border-emerald-200' : 'bg-slate-200 border-slate-100' }}"></div>
                            <p class="text-[13px] font-black {{ in_array($order->status, ['Terverifikasi', 'Dikirim', 'Selesai']) ? 'text-emerald-950' : 'text-emerald-900/30' }}">Verifikasi Pembayaran</p>
                        </div>
                        <div class="flex items-center gap-6">
                            <div class="w-4 h-4 rounded-full border-4 {{ in_array($order->status, ['Dikirim', 'Selesai']) ? 'bg-emerald-600 border-emerald-200' : 'bg-slate-200 border-slate-100' }}"></div>
                            <p class="text-[13px] font-black {{ in_array($order->status, ['Dikirim', 'Selesai']) ? 'text-emerald-950' : 'text-emerald-900/30' }}">Pesanan Sedang Dikirim</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
