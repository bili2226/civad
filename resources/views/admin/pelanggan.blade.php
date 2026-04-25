<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Pelanggan - CIVAD Admin</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; }
        .table-row:hover { background-color: rgba(248, 250, 252, 1); }
        .avatar-gradient { background: linear-gradient(135deg, #6366f1 0%, #4338ca 100%); }
    </style>
</head>
<body class="text-[#1E293B]">

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-[280px] bg-white border-r border-slate-100 flex flex-col z-50 shadow-sm">
        <div class="h-24 flex items-center px-8">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-indigo-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-indigo-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <div>
                    <h1 class="font-extrabold text-[18px] text-indigo-950 leading-none tracking-tight">CIVAD</h1>
                    <p class="text-[11px] font-bold text-indigo-400 uppercase tracking-widest mt-1">Admin Panel</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 px-4 py-4 space-y-1">
            <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-semibold transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" /></svg>
                Dashboard
            </a>
            <a href="{{ url('/admin/manajemen-buku') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-semibold transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                Manajemen Buku
            </a>
            <a href="{{ url('/admin/data-pelanggan') }}" class="flex items-center gap-3 px-4 py-3 bg-indigo-50 text-indigo-600 font-bold rounded-2xl transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>
                Data Pelanggan
            </a>
            <a href="{{ url('/admin/manajemen-pesanan') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-semibold transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                Manajemen Pesanan
            </a>
            <a href="{{ url('/admin/tambah-admin') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-semibold transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" /></svg>
                Tambah Admin
            </a>
        </nav>

        <div class="p-4 border-t border-slate-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-rose-500 hover:bg-rose-50 rounded-2xl font-bold transition-all group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 group-hover:translate-x-1 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" /></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-[280px] min-h-screen">
        <header class="h-24 bg-white/80 backdrop-blur-md sticky top-0 z-40 border-b border-slate-100 flex items-center justify-between px-10">
            <div>
                <div class="flex items-center gap-2 text-[12px] font-bold text-slate-400 uppercase tracking-widest mb-1">
                    <a href="{{ url('/admin/dashboard') }}" class="hover:text-indigo-600 transition-colors">Admin</a>
                    <span>/</span>
                    <span class="text-indigo-600">Manajemen Pelanggan</span>
                </div>
                <h2 class="text-[20px] font-extrabold text-indigo-950 tracking-tight">Database Pelanggan CIVAD</h2>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-3 px-5 py-3 bg-indigo-50 rounded-2xl border border-indigo-100">
                    <span class="text-[13px] font-extrabold text-indigo-600">{{ count($customers) }} Pelanggan Terdaftar</span>
                </div>
            </div>
        </header>

        <div class="p-10">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-sm flex items-center justify-between group hover:border-indigo-200 transition-all">
                    <div>
                        <p class="text-[12px] font-bold text-slate-400 uppercase tracking-widest mb-2">Total Akun Aktif</p>
                        <h3 class="text-[36px] font-black text-indigo-950 tracking-tighter leading-none">{{ count($customers) }}</h3>
                    </div>
                    <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-[24px] flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-sm flex items-center justify-between group hover:border-indigo-200 transition-all">
                    <div>
                        <p class="text-[12px] font-bold text-slate-400 uppercase tracking-widest mb-2">Total Akumulasi Pesanan</p>
                        <h3 class="text-[36px] font-black text-indigo-950 tracking-tighter leading-none">{{ $totalOrders }}</h3>
                    </div>
                    <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-[24px] flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                    </div>
                </div>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden mb-10">
                <div class="p-8 border-b border-slate-50 flex items-center justify-between">
                    <h3 class="text-[18px] font-black text-indigo-950 tracking-tight">Daftar Akun Pelanggan</h3>
                    <div class="relative group w-72">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-indigo-600 transition-colors"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                        <input type="text" placeholder="Cari nama atau username..." class="w-full bg-slate-50/50 border border-slate-100 rounded-xl py-2.5 pl-11 pr-5 text-[13px] font-bold focus:outline-none focus:ring-4 focus:ring-indigo-50 transition-all">
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-[11px] font-extrabold uppercase tracking-widest text-slate-400 bg-slate-50/50">
                                <th class="px-8 py-5">Pelanggan</th>
                                <th class="px-8 py-5">Username</th>
                                <th class="px-8 py-5">Kontak & Wilayah</th>
                                <th class="px-8 py-5">Alamat Pengiriman</th>
                                <th class="px-8 py-5 text-center">Loyalty Points</th>
                            </tr>
                        </thead>
                        <tbody class="text-[14px] text-slate-600 divide-y divide-slate-50">
                            @forelse($customers as $customer)
                            <tr class="table-row transition-colors">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 avatar-gradient text-white rounded-[18px] flex items-center justify-center font-black text-[15px] shadow-lg shadow-indigo-100/50">
                                            {{ substr($customer->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="font-black text-indigo-950 text-[15px]">{{ $customer->name }}</p>
                                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Customer</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 font-bold text-indigo-600">@ {{ $customer->username }}</td>
                                <td class="px-8 py-6">
                                    <p class="font-bold text-indigo-950">{{ $customer->phone ?? '0812-3456-7890' }}</p>
                                    <span class="inline-block mt-2 px-3 py-1 bg-slate-100 text-slate-500 text-[11px] font-extrabold rounded-lg uppercase tracking-tight">{{ $customer->daerah ?? 'Jakarta' }}</span>
                                </td>
                                <td class="px-8 py-6">
                                    <p class="text-[13px] font-medium text-slate-500 leading-relaxed max-w-[250px] line-clamp-2">
                                        {{ $customer->address ?? 'Jl. Contoh Alamat No. 123, Kelurahan Menteng, Jakarta Selatan' }}
                                    </p>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex flex-col items-center gap-3">
                                        <span class="px-4 py-2 bg-indigo-50 text-indigo-600 text-[13px] font-black rounded-2xl border border-indigo-100 shadow-sm min-w-[100px] text-center">
                                            {{ $customer->points ?? 0 }} <span class="text-[10px] opacity-70">PTS</span>
                                        </span>
                                        <div class="flex items-center gap-2">
                                            <input type="number" placeholder="+ / -" class="w-20 bg-slate-50 border border-slate-100 rounded-lg px-3 py-1.5 text-[11px] font-bold focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                            <button class="w-8 h-8 flex items-center justify-center bg-indigo-600 text-white rounded-lg shadow-sm hover:bg-indigo-700 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-8 py-20 text-center text-slate-400 font-bold">Data pelanggan belum tersedia di sistem.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Dashboard Message -->
            <div class="bg-indigo-950 rounded-[40px] p-10 text-white relative overflow-hidden">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-600 rounded-full blur-[100px] opacity-30"></div>
                <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-indigo-400 rounded-full blur-[100px] opacity-20"></div>
                
                <div class="relative z-10 flex items-start gap-8">
                    <div class="w-16 h-16 bg-white/10 backdrop-blur-xl rounded-[24px] flex items-center justify-center border border-white/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0Zm-9-3.75h.008v.008H12V8.25Z" /></svg>
                    </div>
                    <div>
                        <h4 class="text-[20px] font-black tracking-tight mb-2">Informasi Manajemen Akun</h4>
                        <p class="text-indigo-100/70 text-[14px] leading-relaxed max-w-3xl">
                            Seluruh data pelanggan di atas bersumber dari pendaftaran langsung melalui platform CIVAD. Anda memiliki wewenang untuk memantau aktivitas transaksi dan mengelola Loyalty Points pelanggan secara manual jika diperlukan. Harap gunakan data ini dengan bijak sesuai kebijakan privasi perusahaan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
