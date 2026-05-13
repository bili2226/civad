<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arya Duta - Solusi Literasi Pendidikan Indonesia</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        emerald: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                            950: '#052e16',
                        },
                        accent: {
                            gold: '#D4AF37',
                            amber: '#fbbf24',
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        .hero-gradient {
            background: linear-gradient(135deg, #052e16 0%, #064e3b 100%);
        }
        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .glass-dark {
            background: rgba(5, 46, 22, 0.98);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(16, 185, 129, 0.3);
        }
        .floating { animation: floating 6s ease-in-out infinite; }
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .swiper-pagination-bullet { background: #16a34a !important; }
        .card-shadow { box-shadow: 0 20px 50px rgba(5, 46, 22, 0.05); }
    </style>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body class="bg-white font-sans text-emerald-950 overflow-x-hidden">
    
    <!-- Top Navigation -->
    <nav class="fixed w-full z-[100] transition-all duration-500 px-6 py-4" id="main-nav">
        <div class="max-w-7xl mx-auto flex items-center justify-between glass-dark rounded-[32px] px-8 py-4 shadow-2xl">
            <div class="flex items-center gap-4 group cursor-pointer">
                <div class="bg-white p-2 rounded-xl shadow-lg transform group-hover:rotate-6 transition-transform">
                    <img src="{{ asset('logo.jpg') }}" alt="Logo AD" class="h-8 w-auto">
                </div>
                <div class="flex flex-col">
                    <span class="text-white font-black text-xl tracking-tighter leading-none">Arya Duta</span>
                    <span class="text-emerald-400 font-black text-[9px] uppercase tracking-[0.3em] mt-1">Publishing</span>
                </div>
            </div>
            
            <div class="hidden md:flex items-center gap-8">
                <a href="#tentang" class="text-xs font-black text-white/70 hover:text-white uppercase tracking-widest transition-colors">Tentang</a>
                <a href="#katalog" class="text-xs font-black text-white/70 hover:text-white uppercase tracking-widest transition-colors">Katalog</a>
                <a href="#layanan" class="text-xs font-black text-white/70 hover:text-white uppercase tracking-widest transition-colors">Layanan</a>
            </div>

        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative min-h-screen flex items-center pt-20 overflow-hidden bg-emerald-50">
        <!-- Abstract Background -->
        <div class="absolute top-0 right-0 w-1/2 h-full bg-emerald-950 rounded-l-[100px] hidden lg:block transform translate-x-20 -rotate-2"></div>
        <div class="absolute -top-20 -left-20 w-96 h-96 bg-emerald-200/50 rounded-full blur-[100px]"></div>
        
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center relative z-10 w-full">
            <div class="animate-in fade-in slide-in-from-left duration-1000">
                <div class="inline-flex items-center gap-3 px-4 py-2 bg-emerald-100 rounded-full text-emerald-700 text-[10px] font-black uppercase tracking-[0.2em] mb-8">
                    <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Solusi Literasi Nasional
                </div>
                <h1 class="text-6xl lg:text-8xl font-black text-emerald-950 leading-[0.9] tracking-tighter mb-8">
                    Mencerdaskan <br>
                    <span class="italic font-serif text-emerald-600">Generasi</span> <br>
                    Bangsa.
                </h1>
                <p class="text-lg text-emerald-900/80 max-w-[500px] leading-relaxed mb-10 font-medium">
                    Mitra terpercaya dalam penyediaan buku pendidikan berkualitas untuk seluruh jenjang sekolah di Indonesia sejak 1998.
                </p>

                <div class="flex flex-wrap items-center gap-6">
                        <a href="{{ url('/login') }}" class="px-10 py-5 bg-emerald-950 text-white rounded-[24px] font-black text-[16px] shadow-2xl hover:bg-emerald-800 transition-all active:scale-95 flex items-center gap-4 group">
                        Mulai Sekarang
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5 group-hover:translate-x-1 transition-transform">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                    <div class="flex -space-x-3">
                        @for($i=1; $i<=4; $i++)
                        <div class="w-12 h-12 rounded-full border-4 border-white bg-emerald-200 flex items-center justify-center text-[10px] font-black text-emerald-900">AD</div>
                        @endfor
                        <div class="w-12 h-12 rounded-full border-4 border-white bg-emerald-950 text-white flex items-center justify-center text-[10px] font-black">+10k</div>
                    </div>
                </div>
            </div>

            <div class="relative hidden lg:block animate-in fade-in slide-in-from-right duration-1000">
                <div class="relative z-10 w-full aspect-square rounded-[60px] overflow-hidden shadow-2xl floating">
                    <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1740&auto=format&fit=crop" class="w-full h-full object-cover" alt="Arya Duta Education">
                    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/60 to-transparent"></div>
                    <div class="absolute bottom-10 left-10 right-10">
                        <div class="glass p-6 rounded-[32px] text-white">
                            <p class="text-xs font-black uppercase tracking-widest opacity-80 mb-2">Penerbit Terpercaya</p>
                            <h3 class="text-2xl font-black tracking-tight">Kualitas Materi Terbaik untuk Kurikulum Merdeka</h3>
                        </div>
                    </div>
                </div>
                <!-- Decorative Circles -->
                <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-accent-amber rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
            </div>
        </div>
    </header>

    <!-- Stats Bar -->
    <section class="py-20 bg-white relative z-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 border-y border-emerald-100 py-16">
                <div class="text-center group">
                    <p class="text-5xl font-black text-emerald-950 mb-2 group-hover:text-emerald-500 transition-colors">1998</p>
                    <p class="text-[10px] font-black text-emerald-900/60 uppercase tracking-[0.3em]">Tahun Berdiri</p>
                </div>
                <div class="text-center group">
                    <p class="text-5xl font-black text-emerald-950 mb-2 group-hover:text-emerald-500 transition-colors">500+</p>
                    <p class="text-[10px] font-black text-emerald-900/60 uppercase tracking-[0.3em]">Judul Terbitan</p>
                </div>
                <div class="text-center group">
                    <p class="text-5xl font-black text-emerald-950 mb-2 group-hover:text-emerald-500 transition-colors">10k+</p>
                    <p class="text-[10px] font-black text-emerald-900/60 uppercase tracking-[0.3em]">Mitra Sekolah</p>
                </div>
                <div class="text-center group">
                    <p class="text-5xl font-black text-emerald-950 mb-2 group-hover:text-emerald-500 transition-colors">100%</p>
                    <p class="text-[10px] font-black text-emerald-900/60 uppercase tracking-[0.3em]">Integritas</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner Slider -->
    @if(isset($banners) && $banners->count() > 0)
    <section class="pb-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="swiper mySwiper rounded-[60px] shadow-2xl overflow-hidden h-[400px] md:h-[540px]">
                <div class="swiper-wrapper">
                    @foreach($banners as $banner)
                    <div class="swiper-slide relative">
                        <img src="{{ $banner->image }}" class="w-full h-full object-cover" alt="Promo">
                        <div class="absolute inset-0 bg-emerald-950/30"></div>
                        @if($banner->link)
                        <a href="{{ $banner->link }}" class="absolute inset-0 z-10"></a>
                        @endif
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    @endif

    <!-- Catalog Section -->
    <section id="katalog" class="py-24 bg-emerald-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
                <div>
                    <h2 class="text-5xl font-black text-emerald-950 tracking-tighter leading-none mb-4">Katalog Unggulan</h2>
                    <p class="text-emerald-600 font-bold uppercase tracking-[0.2em] text-xs">Temukan referensi belajar terbaik untuk siswa</p>
                </div>
                <a href="{{ url('/login?role=pelanggan') }}" class="group inline-flex items-center gap-3 text-sm font-black text-emerald-950 hover:text-emerald-600 transition-colors">
                    LIHAT SEMUA KOLEKSI
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
                @foreach($dummyBooks as $book)
                <div class="bg-white border-2 border-emerald-950 rounded-[36px] p-5 shadow-2xl flex flex-col relative overflow-hidden group hover:-translate-y-3 transition-all duration-500 hover:shadow-emerald-900/20 h-full">

                    <!-- Image Wrapper -->
                    <div class="relative aspect-[3/4] rounded-[28px] overflow-hidden bg-emerald-50 mb-6 shadow-md border border-emerald-50">
                        <img src="{{ $book->image }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <!-- Category Badge Floating -->
                        <div class="absolute top-4 left-4 flex flex-col gap-2">
                            <span class="px-4 py-1.5 bg-red-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg">
                                {{ $book->category }}
                            </span>
                            <span class="px-4 py-1.5 bg-white text-emerald-950 text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg border border-emerald-100">
                                {{ $book->class }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="flex-grow px-2">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-[11px] font-bold text-emerald-600 uppercase tracking-widest">{{ $book->author ?? 'Tim Arya Duta' }}</span>
                            <div class="w-1 h-1 bg-emerald-200 rounded-full"></div>
                            <span class="text-[11px] font-black text-red-500 uppercase tracking-widest">Stok: {{ $book->stock }}</span>
                        </div>
                        <h3 class="text-[18px] font-extrabold text-emerald-950 leading-tight mb-4 group-hover:text-emerald-600 transition-colors line-clamp-2 min-h-[44px]">
                            {{ $book->title }}
                        </h3>
                    </div>

                    <!-- Footer / Price & Action -->
                    <div class="mt-4 pt-6 border-t border-emerald-100 flex flex-col gap-3">
                        <div class="flex items-center justify-between px-2 mb-2">
                            <span class="text-[24px] font-black text-emerald-950 tracking-tight">{{ $book->price }}</span>
                        </div>
                        
                        <div class="grid grid-cols-1 gap-3">
                            <a href="{{ url('/login?role=pelanggan') }}" class="w-full flex items-center justify-center gap-2 bg-emerald-950 text-white py-4 rounded-[20px] text-[14px] font-black shadow-xl shadow-emerald-950/20 hover:bg-emerald-800 transition-all active:scale-95 group/buy">
                                Pesan Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 group-hover/buy:translate-x-1 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                            </a>

                            <a href="{{ url('/login?role=pelanggan') }}" class="w-full flex items-center justify-center gap-2 bg-white text-emerald-950 border-2 border-emerald-950 py-3.5 rounded-[20px] text-[13px] font-black hover:bg-emerald-50 transition-all active:scale-95 group/cart">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 group-hover/cart:rotate-12 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                                Detail Koleksi
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-emerald-950 text-white py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20">
                <div class="col-span-1 lg:col-span-2">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="bg-white p-2 rounded-xl">
                            <img src="{{ asset('logo.jpg') }}" alt="Logo" class="h-10 w-auto">
                        </div>
                        <span class="text-3xl font-black tracking-tighter">Arya Duta</span>
                    </div>
                    <p class="text-emerald-100/60 max-w-sm leading-relaxed font-medium">
                        Membangun masa depan Indonesia melalui literasi berkualitas dan teknologi pencetakan modern.
                    </p>
                </div>
                <div>
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] mb-8 text-emerald-400">Navigasi</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-sm text-white/60 hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="#tentang" class="text-sm text-white/60 hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="#katalog" class="text-sm text-white/60 hover:text-white transition-colors">Katalog Buku</a></li>
                        <li><a href="#layanan" class="text-sm text-white/60 hover:text-white transition-colors">Layanan Cetak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] mb-8 text-emerald-400">Kontak</h4>
                    <p class="text-sm text-white/60 leading-relaxed">
                        Jl. Arya Duta No. 123<br>
                        Jakarta Timur, Indonesia<br>
                        info@aryaduta.co.id
                    </p>
                </div>
            </div>
            <div class="pt-10 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-[11px] font-black text-white/40 uppercase tracking-widest">© 2026 CV Arya Duta. All Rights Reserved.</p>
                <div class="flex gap-6">
                    <div class="w-8 h-8 rounded-full bg-white/5 hover:bg-white/10 transition-colors flex items-center justify-center cursor-pointer">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            effect: "fade",
            fadeEffect: { crossFade: true },
            autoplay: { delay: 5000 },
            pagination: { el: ".swiper-pagination", clickable: true },
        });

        // Navbar scroll effect
        window.onscroll = function() {
            var nav = document.getElementById('main-nav');
            if (window.pageYOffset > 50) {
                nav.classList.add('py-2');
            } else {
                nav.classList.remove('py-2');
            }
        };
    </script>
</body>
</html>
