<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Arya Duta Admin</title>
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
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: #ffffff;
            overflow-x: hidden;
        }

        .page-bg::before {
            content: '';
            position: fixed;
            top: -200px;
            right: -200px;
            width: 500px;
            height: 500px;
            background: rgba(16, 185, 129, 0.12);
            filter: blur(120px);
            border-radius: 999px;
            z-index: -1;
        }

        .page-bg::after {
            content: '';
            position: fixed;
            bottom: -200px;
            left: 200px;
            width: 500px;
            height: 500px;
            background: rgba(110, 231, 183, 0.15);
            filter: blur(120px);
            border-radius: 999px;
            z-index: -1;
        }

        .glass-sidebar { 
            background: #052e16; 
            backdrop-filter: blur(24px); 
            border-right: 1px solid rgba(16, 185, 129, 0.2); 
            box-shadow: 20px 0 50px rgba(5, 46, 22, 0.1);
        }

        .glass-nav { 
            background: #052e16; 
            backdrop-filter: blur(24px); 
            border-bottom: 1px solid rgba(16, 185, 129, 0.2); 
        }

        .nav-item-active {
            background: white;
            color: #052e16;
            box-shadow: 0 15px 30px -5px rgba(5, 46, 22, 0.2);
            transform: scale(1.02);
        }

        .stat-card { 
            background: white;
            border-radius: 32px;
            border: 1px solid rgba(16, 185, 129, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); 
        }

        .stat-card:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 30px 60px -15px rgba(5, 46, 22, 0.12); 
            border-color: rgba(16, 185, 129, 0.3);
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #16a34a; border-radius: 12px; }

        @keyframes shimmer {
            100% { transform: translateX(100%); }
        }
    </style>
</head>
<body class="page-bg bg-white font-sans text-emerald-950 overflow-x-hidden">

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-[340px] glass-sidebar flex flex-col z-50">
        <!-- Logo -->
        <div class="h-32 flex items-center px-8 relative">
            <div class="flex items-center gap-4 px-6 py-4 rounded-[28px] border border-white/10 w-full hover:border-white/20 transition-all duration-500 group cursor-pointer bg-white/5 backdrop-blur-md">
                <div class="flex items-center justify-center bg-white p-2 rounded-xl shadow-xl transform group-hover:rotate-6 transition-transform duration-500">
                    <img src="{{ asset('logo.jpg') }}" alt="Logo AD" class="h-8 w-auto">
                </div>
                <div class="flex flex-col">
                    <h1 class="font-black text-xl text-white leading-none tracking-tighter">Arya Duta</h1>
                    <p class="text-[10px] font-black text-emerald-400 uppercase tracking-[0.3em] mt-1.5">Admin Central</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-6 py-6 space-y-2 overflow-y-auto custom-scrollbar">
            @php
                $navItems = [
                    ['url' => '/admin/dashboard', 'label' => 'Dashboard', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25a2.25 2.25 0 0 1-2.25-2.25V15.75Z" />'],
                    ['url' => '/admin/manajemen-banner', 'label' => 'Banner Promo', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0z" />'],
                    ['url' => '/admin/manajemen-buku', 'label' => 'Katalog Buku', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />'],
                    ['url' => '/admin/data-pelanggan', 'label' => 'Database User', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />'],
                    ['url' => '/admin/manajemen-pesanan', 'label' => 'Pesanan Masuk', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />'],
                    ['url' => '/admin/rewards', 'label' => 'Loyalty Rewards', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.563.563 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.563.563 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />'],
                    ['url' => '/admin/tambah-admin', 'label' => 'Akses Admin', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />'],
                ];
            @endphp

            @foreach($navItems as $item)
                @php $isActive = request()->is(ltrim($item['url'], '/')); @endphp
                <a href="{{ url($item['url']) }}" class="flex items-center gap-6 px-10 py-6 rounded-[32px] text-[15px] font-black uppercase tracking-[0.2em] transition-all duration-500 group {{ $isActive ? 'nav-item-active' : 'text-white/60 hover:text-white hover:bg-white/10' }}">
                    <div class="flex items-center justify-center w-6 h-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-full h-full transition-all duration-500 group-hover:scale-125 {{ $isActive ? 'text-emerald-800' : 'text-emerald-400/50 group-hover:text-emerald-400' }}">
                            {!! $item['icon'] !!}
                        </svg>
                    </div>
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <!-- Logout -->
        <div class="p-8 border-t border-white/5">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-3 px-6 py-4 bg-rose-500/10 border border-rose-500/20 text-rose-400 hover:bg-rose-500 hover:text-white rounded-[20px] font-black text-[12px] uppercase tracking-widest transition-all duration-500 group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12" />
                    </svg>
                    Logout System
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-[340px] min-h-screen relative z-10">
        <!-- Topbar -->
        <header class="h-28 glass-nav sticky top-0 z-40 flex items-center justify-between px-12 shadow-2xl">
            <div class="animate-in fade-in slide-in-from-left-4 duration-700">
                @yield('header')
            </div>
            
            <div class="flex items-center gap-8">
                <!-- Admin Notifications -->
                @php
                    $unreadAdminNotifs = \App\Models\Notification::where('role', 'admin')
                        ->where('is_read', false)
                        ->count();
                    $recentAdminNotifs = \App\Models\Notification::where('role', 'admin')
                        ->orderBy('created_at', 'desc')
                        ->take(5)
                        ->get();
                @endphp
                <div class="relative group/admin-notif">
                    <button class="relative w-14 h-14 rounded-2xl bg-white/5 border border-white/10 text-white flex items-center justify-center hover:bg-white/10 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                        @if($unreadAdminNotifs > 0)
                            <span class="absolute -top-1 -right-1 bg-amber-500 text-white text-[10px] font-black w-6 h-6 rounded-full flex items-center justify-center border-4 border-emerald-950 shadow-lg animate-bounce">
                                {{ $unreadAdminNotifs }}
                            </span>
                        @endif
                    </button>

                    <!-- Dropdown -->
                    <div class="absolute right-0 mt-4 w-[380px] bg-white rounded-[40px] shadow-2xl border border-emerald-100 overflow-hidden opacity-0 invisible group-hover/admin-notif:opacity-100 group-hover/admin-notif:visible transition-all duration-300 z-50 translate-y-4 group-hover/admin-notif:translate-y-0">
                        <div class="p-8 bg-emerald-950 text-white flex items-center justify-between">
                            <div>
                                <h4 class="font-black text-[16px] tracking-tight">Pusat Informasi</h4>
                                <p class="text-[10px] font-bold text-emerald-400 uppercase tracking-widest mt-1">Aktivitas Sistem Terbaru</p>
                            </div>
                            @if($unreadAdminNotifs > 0)
                                <a href="{{ url('/admin/notifications/read-all') }}" class="text-[10px] font-black bg-white/10 px-3 py-1.5 rounded-lg hover:bg-white/20 transition-all uppercase tracking-widest">Baca Semua</a>
                            @endif
                        </div>
                        <div class="max-h-[400px] overflow-y-auto custom-scrollbar">
                            @forelse($recentAdminNotifs as $notif)
                                <a href="{{ $notif->link ?? '#' }}" class="block p-8 border-b border-emerald-50 hover:bg-emerald-50 transition-colors {{ !$notif->is_read ? 'bg-emerald-50/50' : '' }}">
                                    <div class="flex gap-5">
                                        <div class="w-3 h-3 rounded-full mt-2 shrink-0 {{ $notif->type == 'success' ? 'bg-emerald-500' : ($notif->type == 'warning' ? 'bg-amber-500' : 'bg-blue-500') }} shadow-lg shadow-current/20"></div>
                                        <div>
                                            <p class="font-black text-emerald-950 text-[15px] leading-tight mb-2">{{ $notif->title }}</p>
                                            <p class="text-[13px] text-emerald-800 leading-relaxed font-medium">{{ $notif->message }}</p>
                                            <div class="flex items-center gap-2 mt-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3 h-3 text-emerald-300"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                                <p class="text-[10px] font-black text-emerald-300 uppercase tracking-widest">{{ $notif->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="p-16 text-center">
                                    <div class="w-20 h-20 bg-emerald-50 rounded-[32px] flex items-center justify-center mx-auto mb-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10 text-emerald-100"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" /></svg>
                                    </div>
                                    <p class="text-emerald-950 font-black text-[15px]">Hening di Sini...</p>
                                    <p class="text-emerald-600 font-bold text-[12px] mt-1">Belum ada aktivitas baru.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <a href="{{ url('/admin/profil') }}" class="flex items-center gap-5 bg-white/5 px-6 py-3 rounded-[28px] border border-white/10 group hover:border-white/20 transition-all hover:bg-white/10">
                    @php
                        $adminUser = \App\Models\Admin::where('username', session('username'))->first();
                    @endphp
                    <div class="text-right">
                        <p class="text-[14px] font-black text-white leading-none tracking-tight">{{ session('username') ?? 'Admin' }}</p>
                        <p class="text-[10px] font-black text-emerald-400 uppercase tracking-[0.2em] mt-1.5">Authorized System Admin</p>
                    </div>
                    <div class="w-14 h-14 bg-white text-emerald-950 rounded-2xl flex items-center justify-center font-black shadow-xl border border-white uppercase text-[20px] transform group-hover:scale-105 transition-transform duration-500 overflow-hidden">
                        @if($adminUser && $adminUser->profile_photo)
                            <img src="{{ $adminUser->profile_photo }}" class="w-full h-full object-cover">
                        @else
                            {{ substr(session('username') ?? 'A', 0, 1) }}
                        @endif
                    </div>
                </a>
            </div>
        </header>

        <!-- Body -->
        <div class="p-12">
            @hasSection('topbar_actions')
            <div class="mb-10 flex justify-end">
                @yield('topbar_actions')
            </div>
            @endif
            @if(session('success'))
            <div class="mb-10 p-6 bg-emerald-950 rounded-[32px] flex items-center gap-6 shadow-2xl border border-emerald-800/30 animate-in fade-in zoom-in-95 duration-500">
                <div class="w-14 h-14 rounded-2xl bg-emerald-500 text-white flex items-center justify-center shadow-lg shadow-emerald-500/30">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                </div>
                <div>
                    <p class="text-[10px] uppercase tracking-[0.3em] text-emerald-400 font-black mb-1">System Notification</p>
                    <p class="text-white font-bold text-lg leading-tight">{{ session('success') }}</p>
                </div>
            </div>
            @endif

            <div class="animate-in fade-in slide-in-from-bottom-4 duration-700">
                @yield('content')
            </div>
        </div>
    </main>

    @yield('modals')
    @yield('scripts')
</body>
</html>
