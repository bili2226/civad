<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - CIVAD</title>
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
        .glass { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.3); shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.05); }
    </style>
</head>
<body class="bg-mesh min-h-screen flex items-center justify-center p-6 text-[#1E293B]">
    
    <div class="glass max-w-[440px] w-full rounded-[32px] p-10 shadow-2xl relative overflow-hidden">
        <!-- Abstract Decorations -->
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-100 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-blue-100 rounded-full blur-3xl opacity-50"></div>

        <!-- Logo Section -->
        <div class="relative z-10 text-center mb-10">
            <div class="w-[64px] h-[64px] bg-indigo-600 text-white rounded-[20px] flex items-center justify-center mx-auto mb-6 shadow-xl shadow-indigo-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
            </div>
            <h1 class="text-[28px] font-extrabold text-indigo-950 tracking-tight leading-none mb-2">Selamat Datang</h1>
            <p class="text-[14px] text-slate-500 font-medium">Silakan masuk ke akun CIVAD Anda</p>
        </div>

        @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-600 text-[13px] rounded-2xl font-bold flex items-center gap-3 animate-in fade-in zoom-in duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" /></svg>
            {{ session('error') }}
        </div>
        @endif

        @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-600 text-[13px] rounded-2xl font-bold flex items-center gap-3 animate-in fade-in zoom-in duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            {{ session('success') }}
        </div>
        @endif

        <!-- Role Toggle -->
        <div class="mb-8 relative z-10">
            <div class="p-1 bg-slate-100 rounded-2xl flex gap-1">
                <button type="button" id="btn-pelanggan" onclick="setRole('pelanggan')" class="flex-1 py-2.5 rounded-[14px] text-[13px] font-bold transition-all duration-300 flex items-center justify-center gap-2 bg-white text-indigo-600 shadow-sm border border-slate-200">
                    Pelanggan
                </button>
                <button type="button" id="btn-admin" onclick="setRole('admin')" class="flex-1 py-2.5 rounded-[14px] text-[13px] font-bold transition-all duration-300 flex items-center justify-center gap-2 text-slate-500 hover:text-indigo-600">
                    Admin
                </button>
            </div>
        </div>

        <form action="{{ route('login.submit') }}" method="POST" class="relative z-10 space-y-5">
            @csrf
            <input type="hidden" name="role" id="role-input" value="pelanggan">
            
            <div class="space-y-2">
                <label class="text-[13px] font-bold text-slate-700 ml-1">Username</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                    </div>
                    <input type="text" name="username" placeholder="Masukkan username" required class="w-full pl-12 pr-4 py-3.5 bg-white/50 border border-slate-200 rounded-[18px] text-[14px] text-slate-900 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all placeholder:text-slate-400">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[13px] font-bold text-slate-700 ml-1">Kata Sandi</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>
                    </div>
                    <input type="password" name="password" placeholder="••••••••" required class="w-full pl-12 pr-4 py-3.5 bg-white/50 border border-slate-200 rounded-[18px] text-[14px] text-slate-900 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all placeholder:text-slate-400">
                </div>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-4 rounded-[18px] font-bold text-[15px] shadow-xl shadow-indigo-100 hover:bg-indigo-700 hover:shadow-indigo-200 transition-all duration-300 active:scale-95">
                Masuk ke Akun
            </button>
        </form>

        <div class="relative z-10 mt-8 text-center">
            <p class="text-[14px] text-slate-500 font-medium">
                Belum punya akun? <a href="{{ url('/register') }}" class="text-indigo-600 font-bold hover:underline">Daftar sekarang</a>
            </p>
        </div>
    </div>

    <script>
        function setRole(role) {
            document.getElementById('role-input').value = role;
            const btnPelanggan = document.getElementById('btn-pelanggan');
            const btnAdmin = document.getElementById('btn-admin');

            if (role === 'pelanggan') {
                btnPelanggan.className = "flex-1 py-2.5 rounded-[14px] text-[13px] font-bold transition-all duration-300 flex items-center justify-center gap-2 bg-white text-indigo-600 shadow-sm border border-slate-200";
                btnAdmin.className = "flex-1 py-2.5 rounded-[14px] text-[13px] font-bold transition-all duration-300 flex items-center justify-center gap-2 text-slate-500 hover:text-indigo-600";
            } else {
                btnAdmin.className = "flex-1 py-2.5 rounded-[14px] text-[13px] font-bold transition-all duration-300 flex items-center justify-center gap-2 bg-white text-indigo-600 shadow-sm border border-slate-200";
                btnPelanggan.className = "flex-1 py-2.5 rounded-[14px] text-[13px] font-bold transition-all duration-300 flex items-center justify-center gap-2 text-slate-500 hover:text-indigo-600";
            }
        }
    </script>
</body>
</html>
