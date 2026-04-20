<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
    </head>
    <body class="bg-[#F4F7FB] text-gray-800 font-sans min-h-screen">
        <div class="flex flex-col items-center pt-16 pb-24">
            <!-- Header / Hero Section -->
            <div class="text-center flex flex-col items-center mb-14 px-4">
                <!-- Logo Icon -->
                <div class="w-[72px] h-[72px] bg-[#2563EB] text-white rounded-[20px] flex items-center justify-center mb-5 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                
                <h1 class="text-[40px] font-extrabold text-[#111827] tracking-tight mb-2">Sistem Informasi Penjualan Buku Pendidikan</h1>
                <h1 class="text-[40px] font-extrabold text-[#111827] tracking-tight mb-2">CV. ARYA DUTA TANGERANG</h1>
                
                <div class="flex items-center justify-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="flex items-center justify-center gap-2 bg-[#2563EB] text-white px-6 py-[10px] rounded-xl text-[14px] font-semibold shadow-sm hover:bg-blue-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-[18px] h-[18px]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.309c0-.236-.105-.461-.282-.609L12.53 3.61a.75.75 0 0 0-1.06 0l-8.91 5.09a.75.75 0 0 0-.282.61V21M7.5 15h3m-3-3h3m-3-3v3m3-3v3m-3-3v-3" />
                            </svg>
                            Dashboard
                        </a>
                    @else
                        <a href="{{ url('/login') }}" class="flex items-center justify-center gap-2 bg-[#2563EB] text-white px-6 py-[10px] rounded-xl text-[14px] font-semibold shadow-sm hover:bg-blue-700 transition min-w-[120px]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-[18px] h-[18px]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0l3-3m0 0l-3-3m3 3H2.25" />
                            </svg>
                            Masuk
                        </a>
                        
                        @if (Route::has('register'))
                            <a href="{{ url('/register') }}" class="flex items-center justify-center gap-2 bg-[#F4F7FB] text-[#2563EB] border-[1.5px] border-[#2563EB] px-6 py-[10px] rounded-xl text-[14px] font-semibold hover:bg-blue-50 transition min-w-[120px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-[18px] h-[18px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 19v-6m0 0V7m0 6h6m-6 0h-6m-9 6a9 9 0 1 1 18 0M3 20a6 6 0 0 1 12 0v1H3v-1Z" />
                                </svg>
                                Daftar
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Katalog Buku Section -->
            <div class="w-full max-w-[1150px] px-6">
                <div class="text-center mb-8">
                    <h2 class="text-[24px] font-bold text-[#111827] mb-2 tracking-tight">Katalog Buku Tersedia</h2>
                    <p class="text-[14px] text-gray-500">Lihat koleksi buku pendidikan berkualitas kami</p>
                </div>

                <!-- Book Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    @foreach($dummyBooks as $book)
                    <div class="bg-white rounded-[20px] shadow-sm border border-gray-100 overflow-hidden flex flex-col hover:shadow-md hover:-translate-y-1 transition duration-200">
                        <!-- Card Image -->
                        <div class="h-[280px] w-full overflow-hidden bg-gray-50 border-b border-gray-50">
                            <img src="{{ $book['image'] }}" alt="{{ $book['title'] }}" class="w-full h-full object-cover">
                        </div>
                        
                        <!-- Card Content -->
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="bg-blue-50 text-[#2563EB] text-[10px] font-bold px-2 py-0.5 rounded-md border border-blue-100 uppercase tracking-wider">{{ $book['category'] }}</span>
                                <span class="bg-gray-50 text-gray-400 text-[10px] font-bold px-2 py-0.5 rounded-md border border-gray-100 uppercase tracking-wider">{{ $book['class'] }}</span>
                            </div>
                            
                            <h3 class="font-bold text-[#111827] mb-2 text-[15px] leading-tight flex-grow">{{ $book['title'] }}</h3>
                            
                            <!-- Price and Action -->
                            <div class="flex items-end justify-between mt-6">
                                <div>
                                    <div class="text-[#2563EB] font-bold text-[18px] leading-none mb-1.5 tracking-tight">{{ $book['price'] }}</div>
                                    <div class="text-[12px] text-gray-400 leading-none">Stok: {{ $book['stock'] }}</div>
                                </div>
                                
                                <a href="{{ url('/login') }}" class="bg-[#2563EB] text-white px-5 py-2 rounded-[10px] text-[12px] font-bold hover:bg-blue-700 transition flex items-center justify-center gap-1.5 shadow-sm active:scale-[0.98]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                    Beli
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </body>
</html>
