@extends('layouts.customer_premium')

@section('title', 'Detail Buku')

@section('scripts')
    <script>
        function updateSubtotal() {
            let qty = parseInt(document.getElementById('qty').value) || 1;
            let price = {{ $book['base_price'] }};
            let subtotal = qty * price;
            // format to Rp
            document.getElementById('subtotal').innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
        }
        function increaseQty() {
            let qty = parseInt(document.getElementById('qty').value) || 1;
            if(qty < {{ $book['stock'] }}) {
                document.getElementById('qty').value = qty + 1;
                updateSubtotal();
            }
        }
        function decreaseQty() {
            let qty = parseInt(document.getElementById('qty').value) || 1;
            if (qty > 1) {
                document.getElementById('qty').value = qty - 1;
                updateSubtotal();
            }
        }
    </script>

@endsection

@section('content')


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
                <div class="flex items-center gap-2 bg-[#F0F5FF] text-[#2563EB] px-3 py-1.5 rounded-full text-[13px] font-semibold border border-blue-100 uppercase tracking-tight">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                    {{ session('username') ?? 'andi' }}
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 px-4 py-2 text-red-500 hover:bg-red-50 rounded-xl font-bold text-[13px] transition active:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" /></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-[900px] mx-auto px-6 py-8">
        <a href="{{ url('/pelanggan/dashboard') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-800 text-[13px] font-medium mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            Kembali ke Katalog
        </a>

        <!-- Detail Card -->
        <div class="bg-white rounded-[24px] shadow-sm border border-gray-100 p-6 flex flex-col md:flex-row gap-8">
            <!-- Image Side -->
            <div class="w-full md:w-5/12">
                <div class="aspect-square rounded-[16px] overflow-hidden bg-gray-100">
                    <img src="{{ $book['image'] }}" alt="Book cover" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Content Side -->
            <div class="w-full md:w-7/12 flex flex-col pt-2">
                <div class="flex gap-2 mb-4">
                    <span class="px-2.5 py-1 bg-[#F0F5FF] text-[#2563EB] rounded-md text-[11px] font-bold">{{ $book['category'] }}</span>
                    <span class="px-2.5 py-1 bg-gray-50 border border-gray-200 text-gray-600 rounded-md text-[11px] font-bold">{{ $book['class'] }}</span>
                </div>

                <h1 class="text-[22px] font-bold text-[#111827] mb-2 leading-tight">{{ $book['title'] }}</h1>
                <div class="text-[#2563EB] text-[24px] font-bold mb-3">{{ $book['price'] }}</div>

                <div class="flex items-center gap-1.5 text-green-600 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="text-[12px] font-bold">Stok tersedia: {{ $book['stock'] }} buku</span>
                </div>

                <div class="h-px bg-gray-100 mb-5"></div>

                <div class="mb-5">
                    <h3 class="text-[13px] font-bold text-[#111827] mb-2">Deskripsi</h3>
                    <p class="text-[13px] text-gray-500 leading-relaxed">
                        {{ $book['desc'] }}
                    </p>
                </div>

                <div class="h-px bg-gray-100 mb-5"></div>

                <form action="{{ url('/pelanggan/keranjang/tambah') }}" method="POST" class="mt-auto">
                    @csrf
                    <input type="hidden" name="buku_id" value="{{ $book['id'] }}">
                    
                    <div class="mb-5">
                        <h3 class="text-[12px] font-bold text-gray-700 mb-3">Jumlah Pembelian</h3>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="decreaseQty()" class="w-9 h-9 flex items-center justify-center border border-gray-200 rounded-[8px] text-gray-500 hover:bg-gray-50 hover:text-black transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                </svg>
                            </button>
                            <input type="number" id="qty" name="qty" value="1" min="1" max="{{ $book['stock'] }}" class="w-12 h-9 text-center border-0 p-0 text-[14px] font-bold text-[#111827] focus:ring-0 appearance-none bg-transparent">
                            <button type="button" onclick="increaseQty()" class="w-9 h-9 flex items-center justify-center border border-gray-200 rounded-[8px] text-gray-500 hover:bg-gray-50 hover:text-black transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-5">
                        <span class="text-[14px] text-gray-500">Subtotal</span>
                        <span id="subtotal" class="text-[18px] font-bold text-[#111827]">{{ $book['price'] }}</span>
                    </div>

                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-[#2563EB] text-white py-3.5 rounded-xl text-[14px] font-bold hover:bg-blue-700 transition shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-[18px] h-[18px]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        Tambah ke Keranjang
                    </button>
                </form>
            </div>
        </div>
    </main>

    <style>
        /* Hide arrows for number inputs */
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }
    </style>
@endsection
