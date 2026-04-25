<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - CIVAD</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-mesh {
            background-color: #ffffff;
            background-image: radial-gradient(at 0% 0%, hsla(225, 100%, 94%, 1) 0, transparent 50%), 
                              radial-gradient(at 100% 100%, hsla(225, 100%, 94%, 1) 0, transparent 50%);
        }
        .glass { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.3); }
    </style>
</head>
<body class="bg-mesh min-h-screen flex items-center justify-center p-6 text-[#1E293B]">
    
    <div class="w-full max-w-[480px] my-10">
        <!-- Back Link -->
        <a href="{{ url('/login') }}" class="inline-flex items-center gap-2 text-[14px] text-slate-500 hover:text-indigo-600 mb-6 ml-2 font-bold transition-all group">
            <div class="w-8 h-8 rounded-full bg-white shadow-sm flex items-center justify-center group-hover:bg-indigo-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </div>
            Kembali ke Login
        </a>

        <div class="glass rounded-[32px] p-10 shadow-2xl relative overflow-hidden">
            <!-- Abstract Decorations -->
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-100 rounded-full blur-3xl opacity-50"></div>
            
            <div class="relative z-10">
                <h1 class="text-[28px] font-extrabold text-indigo-950 tracking-tight leading-none mb-2">Buat Akun Baru</h1>
                <p class="text-[14px] text-slate-500 font-medium mb-8">Bergabunglah dengan komunitas CIVAD hari ini</p>

                @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-600 text-[13px] rounded-2xl font-bold">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('register.submit') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-5">
                        <div class="space-y-2">
                            <label class="text-[13px] font-bold text-slate-700 ml-1">Nama Lengkap</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                                </div>
                                <input type="text" name="name" placeholder="Nama Anda" required class="w-full pl-12 pr-4 py-3 bg-white/50 border border-slate-200 rounded-[18px] text-[14px] text-slate-900 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all placeholder:text-slate-400">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[13px] font-bold text-slate-700 ml-1">Username</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                                </div>
                                <input type="text" name="username" placeholder="Username unik" required class="w-full pl-12 pr-4 py-3 bg-white/50 border border-slate-200 rounded-[18px] text-[14px] text-slate-900 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all placeholder:text-slate-400">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="space-y-2">
                            <label class="text-[13px] font-bold text-slate-700 ml-1">Kata Sandi</label>
                            <input type="password" name="password" placeholder="••••••••" required class="w-full px-5 py-3 bg-white/50 border border-slate-200 rounded-[18px] text-[14px] text-slate-900 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all placeholder:text-slate-400">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[13px] font-bold text-slate-700 ml-1">Konfirmasi</label>
                            <input type="password" name="password_confirmation" placeholder="••••••••" required class="w-full px-5 py-3 bg-white/50 border border-slate-200 rounded-[18px] text-[14px] text-slate-900 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all placeholder:text-slate-400">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[13px] font-bold text-slate-700 ml-1">Pilih Daerah</label>
                        <div class="relative group">
                            <select name="daerah" class="w-full px-5 py-3.5 bg-white/50 border border-slate-200 rounded-[18px] text-[14px] text-slate-900 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all appearance-none">
                                <option value="Jakarta">Jakarta</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Surabaya">Surabaya</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 text-white py-4 rounded-[18px] font-bold text-[15px] shadow-xl shadow-indigo-100 hover:bg-indigo-700 hover:shadow-indigo-200 transition-all duration-300 active:scale-95">
                        Daftar Akun Sekarang
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-[14px] text-slate-500 font-medium">
                        Sudah punya akun? <a href="{{ url('/login') }}" class="text-indigo-600 font-bold hover:underline">Masuk sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
