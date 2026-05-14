@extends('layouts.customer_premium')

@section('title', 'Rewards & Loyalty')

@section('content')

    <!-- Header Section -->
    <div class="mb-16 bg-emerald-950 rounded-[48px] border border-emerald-800/30 p-12 shadow-2xl relative overflow-hidden">
        <div class="absolute -right-20 -top-20 w-96 h-96 rounded-full bg-amber-500/20 blur-[120px]"></div>
        <div class="absolute -left-20 -bottom-20 w-72 h-72 rounded-full bg-emerald-400/10 blur-[100px]"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-12">
            <div class="max-w-2xl text-center md:text-left">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-amber-500/20 rounded-full border border-amber-400/20 mb-6">
                    <span class="w-2 h-2 bg-amber-400 rounded-full animate-pulse"></span>
                    <p class="text-[11px] uppercase tracking-[0.4em] font-black text-amber-400">Civad Loyalty Member</p>
                </div>
                <h1 class="text-5xl md:text-6xl font-black text-white leading-[1.1] tracking-tighter mb-6 font-serif">Kumpulkan poin, <br>nikmati <span class="italic text-amber-400">keuntungan eksklusif</span>.</h1>
                <p class="text-emerald-100/70 text-lg leading-relaxed font-medium">Setiap transaksi Anda di CIVAD berharga. Tukarkan poin yang Anda kumpulkan dengan berbagai potongan harga untuk pembelian buku selanjutnya.</p>
            </div>

            <!-- Points Card -->
            <div class="w-full max-w-[340px] bg-white/5 backdrop-blur-xl rounded-[40px] border border-white/10 p-10 text-center shadow-2xl relative group">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/10 to-transparent rounded-[40px] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative z-10">
                    <div class="w-20 h-20 bg-amber-500 text-white rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-xl shadow-amber-500/20 group-hover:rotate-12 transition-transform duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                    </div>
                    <p class="text-[12px] font-black text-amber-400 uppercase tracking-[0.3em] mb-2">Total Poin Anda</p>
                    <h2 class="text-6xl font-black text-white tracking-tighter mb-4">{{ Auth::user()->points ?? 0 }}</h2>
                    <div class="h-1 w-12 bg-white/20 mx-auto rounded-full"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Offers Section -->
    <div class="mb-12">
        <h2 class="text-[32px] font-extrabold text-emerald-950 tracking-tight mb-2">Penawaran Untuk Anda</h2>
        <p class="text-emerald-700 font-medium">Pilih promo yang sesuai dengan jumlah poin yang Anda miliki.</p>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
        @foreach($rewards as $reward)
            @php
                $canRedeem = (Auth::user()->points ?? 0) >= $reward->points_required;
            @endphp
            <div class="bg-white border-2 {{ $canRedeem ? 'border-emerald-950' : 'border-emerald-100 opacity-60' }} rounded-[32px] md:rounded-[40px] p-4 md:p-8 shadow-2xl flex flex-col relative overflow-hidden group transition-all duration-500 {{ $canRedeem ? 'hover:-translate-y-2 hover:shadow-emerald-950/20' : '' }}">
                
                @if($canRedeem)
                    <div class="absolute top-0 right-0 p-3 md:p-6">
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center animate-bounce">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 md:w-5 md:h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                        </div>
                    </div>
                @endif

                <div class="mb-4 md:mb-8">
                    <div class="w-10 h-10 md:w-16 md:h-16 {{ $canRedeem ? 'bg-amber-500' : 'bg-emerald-100' }} rounded-xl md:rounded-2xl flex items-center justify-center text-white mb-4 md:mb-6 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 md:w-8 md:h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h17.25" /></svg>
                    </div>
                    <p class="text-[8px] md:text-[12px] font-black {{ $canRedeem ? 'text-amber-600' : 'text-emerald-800' }} uppercase tracking-[0.2em] mb-1 md:mb-2">{{ $reward->points_required }} Poin</p>
                    <h3 class="text-sm md:text-3xl font-black text-emerald-950 tracking-tighter leading-tight line-clamp-2">{{ $reward->description ?? 'Diskon Spesial' }}</h3>
                </div>

                <div class="mt-auto pt-4 md:pt-8 border-t border-emerald-50 flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="text-center md:text-left">
                        <p class="text-[8px] md:text-[11px] font-bold text-emerald-900 uppercase tracking-widest mb-0.5">Potongan</p>
                        <p class="text-sm md:text-2xl font-black text-emerald-950 tracking-tight">Rp {{ number_format($reward->discount_amount, 0, ',', '.') }}</p>
                    </div>
                    
                    @if($canRedeem)
                        <button onclick="redeemPoints('{{ $reward->id }}', '{{ $reward->points_required }}', '{{ $reward->discount_amount }}')" class="w-full md:w-auto px-4 md:px-8 py-2 md:py-4 bg-emerald-950 text-white rounded-xl md:rounded-[20px] text-[10px] md:text-[13px] font-black hover:bg-emerald-800 transition-all active:scale-95 shadow-xl shadow-emerald-950/20">
                            Tukar
                        </button>
                    @else
                        <div class="w-full md:w-auto px-4 py-2 bg-emerald-50 text-emerald-800 rounded-lg text-[9px] font-black uppercase tracking-widest border border-emerald-100 text-center">
                            Kurang
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- Info Section -->
    <div class="mt-24 grid grid-cols-1 md:grid-cols-3 gap-12">
        <div class="flex flex-col items-center text-center">
            <div class="w-16 h-16 bg-emerald-50 rounded-[24px] flex items-center justify-center text-emerald-950 mb-6 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
            </div>
            <h4 class="text-lg font-black text-emerald-950 mb-2 tracking-tight">Kumpulkan Poin</h4>
            <p class="text-[14px] text-emerald-700 font-medium px-4">Dapatkan 1 poin untuk setiap kelipatan transaksi Rp 10.000 di CIVAD.</p>
        </div>
        <div class="flex flex-col items-center text-center">
            <div class="w-16 h-16 bg-emerald-50 rounded-[24px] flex items-center justify-center text-emerald-950 mb-6 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" /></svg>
            </div>
            <h4 class="text-lg font-black text-emerald-950 mb-2 tracking-tight">Tukar Hadiah</h4>
            <p class="text-[14px] text-emerald-700 font-medium px-4">Pilih penawaran yang Anda inginkan dan tukarkan poin yang terkumpul.</p>
        </div>
        <div class="flex flex-col items-center text-center">
            <div class="w-16 h-16 bg-emerald-50 rounded-[24px] flex items-center justify-center text-emerald-950 mb-6 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21a3.745 3.745 0 0 1-3.127-1.593 3.745 3.745 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.745 3.745 0 0 1 3.296-1.043A3.745 3.745 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.745 3.745 0 0 1 3.296 1.043 3.745 3.745 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" /></svg>
            </div>
            <h4 class="text-lg font-black text-emerald-950 mb-2 tracking-tight">Nikmati Diskon</h4>
            <p class="text-[14px] text-emerald-700 font-medium px-4">Diskon otomatis terpakai saat Anda melakukan pemesanan berikutnya.</p>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function redeemPoints(id, points, discount) {
            if (confirm(`Tukar ${points} poin dengan diskon Rp ${parseInt(discount).toLocaleString('id-ID')}?`)) {
                fetch('{{ url("/pelanggan/tukar-poin") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ reward_id: id, points: points, discount: discount })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                });
            }
        }
    </script>
@endsection
