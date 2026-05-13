@extends('layouts.customer_premium')

@section('title', 'Keranjang Belanja')

@section('scripts')
    <script>
        function updateCart() {
            let totalProduk = 0;
            let items = document.querySelectorAll('.cart-item');
            
            items.forEach(item => {
                let id = item.dataset.id;
                let price = parseInt(item.dataset.price);
                let qty = parseInt(document.getElementById('qty-' + id).value) || 0;
                let subtotal = price * qty;
                
                document.getElementById('subtotal-' + id).innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
                totalProduk += subtotal;
            });
            
            document.getElementById('side_total_produk').innerText = 'Rp ' + totalProduk.toLocaleString('id-ID');
        }

        function changeQty(id, delta) {
            let input = document.getElementById('qty-' + id);
            let val = parseInt(input.value) + delta;
            if (val >= 1 && val <= 50) {
                input.value = val;
                
                // Update session via AJAX
                fetch('{{ url("/pelanggan/keranjang/update") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id: id, qty: val })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateCart();
                    }
                });
            }
        }

        window.onload = updateCart;
    </script>
@endsection

@section('content')
    <main class="max-w-[1280px] mx-auto px-6 py-8">
        <a href="{{ url('/pelanggan/dashboard') }}" class="inline-flex items-center gap-3 text-emerald-600 hover:text-emerald-950 text-[13px] font-black mb-10 transition-all group">
            <div class="w-8 h-8 rounded-full bg-emerald-50 border border-emerald-100 flex items-center justify-center shadow-sm group-hover:-translate-x-1 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            </div>
            Kembali Belanja
        </a>

        <div class="mb-12">
            <h1 class="text-[36px] font-black text-emerald-950 tracking-tighter leading-none mb-3">Keranjang Belanja</h1>
            <p class="text-emerald-700 font-bold text-[14px] uppercase tracking-widest">Tersimpan <span class="text-emerald-600">{{ count(session('cart', [])) }}</span> Item Pilihan</p>
        </div>

        <div class="flex flex-col xl:flex-row gap-12">
            
            <!-- Items Column -->
            <div class="flex-grow flex flex-col gap-6">
                @forelse(session('cart', []) as $id => $item)
                <div class="cart-item bg-white p-6 rounded-[32px] border border-emerald-100 shadow-lg flex flex-col sm:flex-row gap-8 relative overflow-hidden hover:border-emerald-200 hover:translate-x-1 transition-all" data-id="{{ $id }}" data-price="{{ $item['price'] }}">
                    <!-- Delete Button -->
                    <form action="{{ url('/pelanggan/keranjang/hapus') }}" method="POST" class="absolute top-6 right-6">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button type="submit" title="Hapus Barang" class="w-10 h-10 flex items-center justify-center text-red-300 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all cursor-pointer group/delete">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 group-hover/delete:scale-110 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                        </button>
                    </form>

                    <div class="w-full sm:w-32 h-44 sm:h-32 rounded-[24px] overflow-hidden bg-emerald-50 flex-shrink-0 shadow-inner border border-emerald-50">
                        <img src="{{ \App\Models\Book::find($id)->image }}" class="w-full h-full object-cover">
                    </div>

                    <div class="flex-grow flex flex-col justify-between py-1">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-black uppercase tracking-widest rounded-full border border-emerald-100">
                                    {{ $item['category'] }}
                                </span>
                                <span class="text-[11px] font-bold text-emerald-700 uppercase tracking-widest">{{ $item['class'] }}</span>
                            </div>
                            <h3 class="font-black text-emerald-950 text-[18px] tracking-tight leading-tight mb-4">{{ $item['title'] }}</h3>
                        </div>
                        
                        <div class="flex items-end justify-between">
                            <div class="space-y-1">
                                <p class="text-[11px] font-bold text-emerald-600 uppercase tracking-widest">Harga Satuan</p>
                                <p class="text-emerald-700 font-black text-[18px]">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                            </div>

                            <div class="flex items-center bg-emerald-50 rounded-2xl p-1 border border-emerald-100">
                                <button type="button" onclick="changeQty('{{ $id }}', -1)" class="w-10 h-10 flex items-center justify-center bg-white border border-emerald-100 rounded-xl text-emerald-600 hover:text-emerald-950 transition-all shadow-sm active:scale-90">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" /></svg>
                                </button>
                                <input type="number" id="qty-{{ $id }}" value="{{ $item['qty'] }}" min="1" readonly class="w-12 h-10 text-center border-0 p-0 text-[15px] font-black text-emerald-950 bg-transparent">
                                <button type="button" onclick="changeQty('{{ $id }}', 1)" class="w-10 h-10 flex items-center justify-center bg-white border border-emerald-100 rounded-xl text-emerald-600 hover:text-emerald-950 transition-all shadow-sm active:scale-90">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="sm:w-48 flex flex-col justify-end items-end pb-1 pr-2">
                        <p class="text-[11px] font-bold text-emerald-600 uppercase tracking-widest mb-1">Subtotal Item</p>
                        <p id="subtotal-{{ $id }}" class="font-black text-emerald-950 text-[22px] tracking-tighter">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</p>
                    </div>
                </div>
                @empty
                <div class="bg-white p-20 rounded-[48px] border border-emerald-100 text-center shadow-lg">
                    <div class="w-20 h-20 bg-emerald-50 text-emerald-400 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                    </div>
                    <p class="text-[18px] font-black text-emerald-950 mb-2 tracking-tight">Keranjang Kosong</p>
                    <p class="text-emerald-700 font-medium mb-8">Mulailah petualangan literasi Anda dengan memilih buku pilihan kami.</p>
                    <a href="{{ url('/pelanggan/dashboard') }}" class="inline-flex items-center justify-center px-10 py-4 bg-emerald-950 text-white rounded-[24px] font-black shadow-xl shadow-emerald-950/20 hover:bg-emerald-800 transition-all">Lihat Katalog</a>
                </div>
                @endforelse
            </div>

            <!-- Summary Column -->
            <div class="w-full xl:w-[420px] flex-shrink-0">
                <div class="bg-emerald-950 p-10 rounded-[48px] text-white shadow-2xl sticky top-28 overflow-hidden">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-emerald-600 rounded-full blur-[100px] opacity-30"></div>
                    
                    <div class="relative z-10">
                        <h2 class="font-black text-[24px] mb-8 tracking-tight">Ringkasan Belanja</h2>
                        
                        <div class="space-y-5 mb-10">
                            @foreach(session('cart', []) as $item)
                            <div class="flex justify-between items-start text-[14px]">
                                <span class="text-emerald-200/70 font-medium max-w-[220px] line-clamp-1">{{ $item['title'] }}</span>
                                <span class="font-black text-white whitespace-nowrap ml-4">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>
                            </div>
                            @endforeach
                        </div>

                        <div class="h-px bg-white/10 mb-8"></div>

                        <div class="flex flex-col gap-2 mb-10">
                            <span class="text-[12px] font-bold text-emerald-400 uppercase tracking-widest">Total Pembelian</span>
                            <div class="flex items-baseline gap-2">
                                <span id="side_total_produk" class="text-[36px] font-black tracking-tighter">Rp 0</span>
                            </div>
                        </div>

                        <div class="bg-white/5 border border-white/10 p-5 rounded-[24px] mb-10 flex items-start gap-4">
                            <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center shadow-lg text-white shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125a1.125 1.125 0 001.125-1.125V3.375c0-.621-.504-1.125-1.125-1.125h-9.75a1.125 1.125 0 00-1.125 1.125v1.433M7.5 14.25L16.344 14.25M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0Zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0Z" /></svg>
                            </div>
                            <p class="text-[12px] text-emerald-200/60 leading-relaxed font-medium">Biaya pengiriman akan dikalkulasi otomatis berdasarkan jarak (per KM) pada langkah pembayaran berikutnya.</p>
                        </div>

                        <a href="{{ url('/pelanggan/pesanan') }}" class="w-full block text-center bg-white text-emerald-950 py-5 rounded-[24px] text-[16px] font-black hover:bg-emerald-50 transition-all shadow-xl active:scale-95 group">
                            Checkout Sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 inline-block ml-2 group-hover:translate-x-1 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <style>
        input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
    </style>
@endsection
