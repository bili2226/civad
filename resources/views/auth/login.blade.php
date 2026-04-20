<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - CIVAD</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F4F7FB] min-h-screen flex items-center justify-center p-4">
    
    <div class="bg-white max-w-md w-full rounded-[24px] p-8 shadow-sm border border-gray-50">
        
        <!-- Logo -->
        <div class="w-[72px] h-[72px] bg-[#2563EB] text-white rounded-[20px] flex items-center justify-center mx-auto mb-6 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>
        </div>

        <h1 class="text-[24px] font-bold text-[#111827] text-center mb-1">Masuk ke CIVAD</h1>
        <p class="text-[14px] text-gray-500 text-center mb-8">Masukkan username dan kata sandi Anda</p>

        @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-600 text-[13px] rounded-xl font-medium flex items-center gap-3 animate-pulse">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" /></svg>
            {{ session('error') }}
        </div>
        @endif

        <!-- Role Toggle -->
        <div class="mb-6">
            <label class="block text-[13px] font-bold text-gray-700 mb-2">Masuk sebagai</label>
            <div class="flex gap-3">
                <button type="button" id="btn-pelanggan" onclick="setRole('pelanggan')" class="flex-1 flex items-center justify-center gap-2 border-[1.5px] border-[#2563EB] bg-[#F0F5FF] text-[#2563EB] py-2.5 rounded-xl text-[14px] font-semibold transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-[18px] h-[18px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    Pelanggan
                </button>
                <button type="button" id="btn-admin" onclick="setRole('admin')" class="flex-1 flex items-center justify-center gap-2 border border-gray-300 bg-white text-gray-600 py-2.5 rounded-xl text-[14px] font-medium hover:bg-gray-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-[18px] h-[18px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>
                    Admin
                </button>
            </div>
        </div>

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="role" id="role-input" value="pelanggan">
            <!-- Username Input -->
            <div class="mb-4">
                <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Username</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    <input type="text" name="username" placeholder="username" class="w-full pl-[42px] pr-4 py-[11px] rounded-[10px] border border-gray-300 text-[14px] text-gray-900 focus:outline-none focus:border-[#2563EB] focus:ring-1 focus:ring-[#2563EB] placeholder-gray-400">
                </div>
            </div>

            <!-- Password Input -->
            <div class="mb-6">
                <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Kata Sandi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </div>
                    <input type="password" name="password" placeholder="Masukkan kata sandi" class="w-full pl-[42px] pr-4 py-[11px] rounded-[10px] border border-gray-300 text-[14px] text-gray-900 focus:outline-none focus:border-[#2563EB] focus:ring-1 focus:ring-[#2563EB] placeholder-gray-400">
                </div>
            </div>

            <button type="submit" class="w-full bg-[#2563EB] text-white py-3 rounded-xl font-bold text-[15px] hover:bg-blue-700 transition shadow-sm mb-6">
                Masuk
            </button>
        </form>

        <div class="text-center text-[13px] text-gray-500">
            Belum punya akun? <a href="{{ url('/register') }}" class="text-[#2563EB] font-bold hover:underline">Daftar sekarang</a>
        </div>

    </div>

    <script>
        function setRole(role) {
            document.getElementById('role-input').value = role;

            const btnPelanggan = document.getElementById('btn-pelanggan');
            const btnAdmin = document.getElementById('btn-admin');

            if (role === 'pelanggan') {
                // Style Pelanggan Active
                btnPelanggan.className = "flex-1 flex items-center justify-center gap-2 border-[1.5px] border-[#2563EB] bg-[#F0F5FF] text-[#2563EB] py-2.5 rounded-xl text-[14px] font-semibold transition";
                // Style Admin Inactive
                btnAdmin.className = "flex-1 flex items-center justify-center gap-2 border border-gray-300 bg-white text-gray-600 py-2.5 rounded-xl text-[14px] font-medium hover:bg-gray-50 transition";
            } else {
                // Style Admin Active
                btnAdmin.className = "flex-1 flex items-center justify-center gap-2 border-[1.5px] border-[#2563EB] bg-[#F0F5FF] text-[#2563EB] py-2.5 rounded-xl text-[14px] font-semibold transition";
                // Style Pelanggan Inactive
                btnPelanggan.className = "flex-1 flex items-center justify-center gap-2 border border-gray-300 bg-white text-gray-600 py-2.5 rounded-xl text-[14px] font-medium hover:bg-gray-50 transition";
            }
        }
    </script>
</body>
</html>
