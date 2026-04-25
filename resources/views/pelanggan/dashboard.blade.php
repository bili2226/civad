<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Buku - CIVAD</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; }
        .glass-nav { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); }
        .book-card { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .book-card:hover { transform: translateY(-8px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08); }
        .image-zoom { transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); }
        .book-card:hover .image-zoom { transform: scale(1.1); }
    </style>
</head>
<body class="text-[#1E293B]">

    <!-- Navbar -->
    <nav class="glass-nav border-b border-slate-100 sticky top-0 z-50">
        <div class="max-w-[1280px] mx-auto px-6">
            <div class="flex justify-between h-[88px]">
                <!-- Left: Logo -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-indigo-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-indigo-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-indigo-950 font-black text-[18px] leading-tight tracking-tight">CIVAD</span>
                        <span class="text-indigo-400 font-bold text-[10px] uppercase tracking-widest leading-tight">Arya Duta</span>
                    </div>
                </div>

                <!-- Middle: Links -->
                <div class="hidden lg:flex items-center gap-2">
                    <a href="{{ url('/pelanggan/beranda') }}" class="flex items-center gap-2 px-5 py-2.5 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-bold text-[14px] transition-all">
                        Beranda
                    </a>
                    <a href="{{ url('/pelanggan/dashboard') }}" class="flex items-center gap-2 px-5 py-2.5 bg-indigo-50 text-indigo-600 rounded-2xl font-bold text-[14px] transition-all">
                        Katalog Buku
                    </a>
                    <a href="{{ url('/pelanggan/status') }}" class="flex items-center gap-2 px-5 py-2.5 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-bold text-[14px] transition-all">
                        Status Pesanan
                    </a>
                    <a href="{{ url('/pelanggan/riwayat') }}" class="flex items-center gap-2 px-5 py-2.5 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-bold text-[14px] transition-all">
                        Riwayat
                    </a>
                </div>

                <!-- Right: Actions -->
                <div class="flex items-center gap-4">
                    <a href="{{ url('/pelanggan/keranjang') }}" class="w-12 h-12 flex items-center justify-center text-slate-400 hover:text-indigo-600 bg-slate-50 hover:bg-indigo-50 rounded-2xl transition-all relative">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        @if(session('cart_count', 0) > 0)
                        <span class="absolute -top-1 -right-1 bg-indigo-600 text-white text-[10px] font-black w-5 h-5 rounded-full flex items-center justify-center border-2 border-white">
                            {{ session('cart_count') }}
                        </span>
                        @endif
                    </a>
                    <div class="h-8 w-px bg-slate-100 hidden sm:block"></div>
                    <div class="hidden sm:flex items-center gap-3 bg-slate-50 px-4 py-2 rounded-2xl border border-slate-100">
                        <div class="text-right">
                            <p class="text-[13px] font-black text-indigo-950 leading-none">{{ session('username') ?? 'Customer' }}</p>
                            <p class="text-[10px] font-bold text-indigo-400 uppercase tracking-widest mt-1">Member</p>
                        </div>
                        <div class="w-9 h-9 bg-indigo-600 text-white rounded-xl flex items-center justify-center font-bold shadow-lg shadow-indigo-100 uppercase">
                            {{ substr(session('username') ?? 'C', 0, 1) }}
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-10 h-10 flex items-center justify-center text-rose-500 hover:bg-rose-50 rounded-xl transition-all active:scale-95 group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 group-hover:translate-x-0.5 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" /></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Section -->
    <main class="max-w-[1280px] mx-auto px-6 py-12">
        <!-- Search & Filters -->
        <div class="flex flex-col md:flex-row gap-6 mb-12">
            <div class="flex-grow relative group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-indigo-600 transition-colors"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                <input type="text" placeholder="Cari judul buku atau penulis..." class="w-full bg-white border border-slate-200 rounded-[24px] py-4 pl-14 pr-6 text-[15px] font-medium focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 transition-all shadow-sm">
            </div>
            <div class="md:w-[300px] relative">
                <select class="w-full bg-white border border-slate-200 rounded-[24px] py-4 px-6 text-[15px] font-bold text-slate-600 focus:outline-none focus:ring-4 focus:ring-indigo-50 transition-all shadow-sm appearance-none cursor-pointer">
                    <option>Semua Tingkat</option>
                    <option>SD / MI</option>
                    <option>SMP / MTs</option>
                    <option>SMA / SMK / MA</option>
                </select>
                <div class="absolute inset-y-0 right-6 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                </div>
            </div>
        </div>

        @if(session('success'))
        <div class="mb-10 p-5 bg-emerald-50 border border-emerald-100 text-emerald-600 text-[14px] rounded-[24px] font-black flex items-center gap-4 animate-in fade-in slide-in-from-top duration-300">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
            </div>
            {{ session('success') }}
        </div>
        @endif

        <div class="flex items-center justify-between mb-8 px-2">
            <h2 class="text-[24px] font-black text-indigo-950 tracking-tight">Koleksi Buku Terbaru</h2>
            <p class="text-[14px] font-bold text-slate-400 uppercase tracking-widest">Tersedia <span class="text-indigo-600">{{ count($dummyBooks) }}</span> Buku</p>
        </div>

        <!-- Catalog Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($dummyBooks as $book)
            <div class="book-card bg-white rounded-[32px] p-5 border border-slate-100 shadow-sm flex flex-col group">
                <!-- Image Wrapper -->
                <div class="relative aspect-[3/4] rounded-[24px] overflow-hidden bg-slate-50 mb-6 shadow-inner">
                    <img src="{{ $book['image'] }}" class="image-zoom w-full h-full object-cover">
                    <!-- Category Badge Floating -->
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md text-indigo-600 text-[10px] font-black uppercase tracking-widest rounded-full shadow-sm">
                            {{ $book['category'] }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-grow">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">{{ $book['class'] }}</span>
                        <div class="w-1 h-1 bg-slate-200 rounded-full"></div>
                        <span class="text-[11px] font-black text-emerald-500 uppercase tracking-widest">Stok: {{ $book['stock'] }}</span>
                    </div>
                    <a href="{{ url('/pelanggan/buku/' . $loop->iteration) }}" class="block group/title">
                        <h3 class="text-[17px] font-black text-indigo-950 leading-[1.3] mb-4 group-hover/title:text-indigo-600 transition-colors line-clamp-2 min-h-[44px]">
                            {{ $book['title'] }}
                        </h3>
                    </a>
                </div>

                <!-- Footer / Price & Action -->
                <div class="mt-4 pt-6 border-t border-slate-50 flex flex-col gap-4">
                    <div class="flex items-center justify-between">
                        <span class="text-[20px] font-black text-indigo-600 tracking-tight">{{ $book['price'] }}</span>
                    </div>
                    <form action="{{ url('/pelanggan/keranjang/tambah') }}" method="POST">
                        @csrf
                        <input type="hidden" name="buku_id" value="{{ $loop->iteration }}">
                        <input type="hidden" name="qty" value="1">
                        <button type="submit" class="w-full flex items-center justify-center gap-3 bg-indigo-600 text-white py-3.5 rounded-2xl text-[14px] font-black shadow-lg shadow-indigo-100 hover:bg-indigo-700 hover:shadow-indigo-200 transition-all active:scale-95 group/btn">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 group-hover/btn:rotate-12 transition-transform">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Keranjang
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </main>

</body>
</html>
