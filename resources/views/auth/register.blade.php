<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Arya Duta</title>
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
                            50: '#f0fdf4', 100: '#dcfce7', 200: '#bbf7d0', 300: '#86efac',
                            400: '#4ade80', 500: '#22c55e', 600: '#16a34a', 700: '#15803d',
                            800: '#166534', 900: '#14532d', 950: '#052e16',
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
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Only bold on focus for these */
        .input-dynamic {
            background: #f0fdf4;
            border: 1px solid rgba(5, 46, 22, 0.2);
            transition: all 0.3s ease;
        }
        .input-dynamic:focus {
            background: white;
            border: 2.5px solid #052e16;
            outline: none;
        }
        /* Keep others permanent or follow dynamic as well */
    </style>
</head>
<body class="min-h-screen flex text-emerald-950 overflow-x-hidden bg-white">

    <!-- Right Panel: Visual -->
    <div class="hidden lg:flex lg:w-3/5 relative overflow-hidden bg-emerald-950 order-2">
        <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?q=80&w=1973&auto=format&fit=crop" 
             class="absolute inset-0 w-full h-full object-cover opacity-25 mix-blend-luminosity" alt="Reading">
        <div class="absolute inset-0 bg-gradient-to-tl from-emerald-950 via-emerald-950/80 to-transparent"></div>
        <div class="relative z-10 flex flex-col justify-between p-20 w-full h-full text-right">
            <div class="flex items-center gap-5 justify-end">
                <div class="flex flex-col">
                    <span class="text-white font-black text-3xl tracking-tighter leading-none">Arya Duta</span>
                    <span class="text-emerald-400 font-bold text-[10px] uppercase tracking-[0.4em] mt-1.5">New Horizons</span>
                </div>
                <div class="bg-white p-2.5 rounded-2xl shadow-2xl border border-emerald-800/30">
                    <img src="{{ asset('logo.jpg') }}" alt="Logo AD" class="h-12 w-auto">
                </div>
            </div>
            <div class="max-w-xl ml-auto">
                <h2 class="text-6xl font-black text-white leading-[1.1] tracking-tighter mb-10 font-serif">
                    Investasi Terbaik <br>Adalah <span class="italic text-emerald-400">Ilmu</span>.
                </h2>
                <div class="relative pr-12 border-r-4 border-emerald-500/40">
                    <p class="text-2xl text-emerald-100 font-medium italic leading-relaxed mb-6">
                        "Setiap lembar yang dibuka adalah langkah menuju masa depan yang cerah."
                    </p>
                    <cite class="text-emerald-400 font-black text-sm uppercase tracking-[0.25em] block">— Arya Duta Digital</cite>
                </div>
            </div>
        </div>
    </div>

    <!-- Left Panel: Form -->
    <div class="w-full lg:w-2/5 flex flex-col justify-center items-center p-8 lg:p-16 relative bg-white order-1 overflow-y-auto">
        <div class="w-full max-w-[460px] my-10">
            <a href="{{ url('/login') }}" class="inline-flex items-center gap-4 text-[14px] text-emerald-950 font-black mb-14 group">
                <div class="w-10 h-10 rounded-full bg-emerald-50 border border-emerald-100 flex items-center justify-center group-hover:-translate-x-2 transition-transform shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
                </div>
                Back to Login
            </a>

            <div class="mb-12">
                <h1 class="text-4xl font-black text-emerald-950 tracking-tighter mb-4">Daftar Akun</h1>
                <p class="text-emerald-950/70 font-semibold text-lg">Mulai perjalanan literasi Anda hari ini.</p>
            </div>

            @if($errors->any())
            <div class="mb-8 p-4 bg-red-50 border border-red-200 text-red-600 text-[13px] rounded-2xl font-bold">
                <ul class="list-disc pl-5 space-y-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('register.submit') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label class="text-[12px] font-black text-emerald-950 uppercase tracking-[0.2em] ml-2">Nama Lengkap</label>
                    <input type="text" name="name" placeholder="Nama Anda" value="{{ old('name') }}" required class="w-full px-6 py-5 input-dynamic rounded-[28px] text-[16px] font-bold text-emerald-950">
                </div>

                <div class="space-y-2">
                    <label class="text-[12px] font-black text-emerald-950 uppercase tracking-[0.2em] ml-2">Email</label>
                    <input type="email" name="email" placeholder="contoh@email.com" value="{{ old('email') }}" required class="w-full px-6 py-5 input-dynamic rounded-[28px] text-[16px] font-bold text-emerald-950">
                </div>

                <div class="space-y-2">
                    <label class="text-[12px] font-black text-emerald-950 uppercase tracking-[0.2em] ml-2">Username</label>
                    <input type="text" name="username" placeholder="johndoe123" value="{{ old('username') }}" required class="w-full px-6 py-5 input-dynamic rounded-[28px] text-[16px] font-bold text-emerald-950">
                </div>

                <div class="space-y-2">
                    <label class="text-[12px] font-black text-emerald-950 uppercase tracking-[0.2em] ml-2">Password</label>
                    <div class="relative group">
                        <input type="password" id="password" name="password" placeholder="••••••••" required class="w-full pl-6 pr-16 py-5 input-dynamic rounded-[28px] text-[16px] font-bold text-emerald-950">
                        <button type="button" onclick="togglePassword('password', 'eye-1')" class="absolute inset-y-0 right-0 pr-6 flex items-center text-emerald-950/30">
                            <svg id="eye-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                        </button>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[12px] font-black text-emerald-950 uppercase tracking-[0.2em] ml-2">Konfirmasi Password</label>
                    <div class="relative group">
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required class="w-full pl-6 pr-16 py-5 input-dynamic rounded-[28px] text-[16px] font-bold text-emerald-950">
                        <button type="button" onclick="togglePassword('password_confirmation', 'eye-2')" class="absolute inset-y-0 right-0 pr-6 flex items-center text-emerald-950/30">
                            <svg id="eye-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                        </button>
                    </div>
                </div>

                <div class="space-y-2 pb-4">
                    <label class="text-[12px] font-black text-emerald-950 uppercase tracking-[0.2em] ml-2">Daerah</label>
                    <select name="daerah" class="w-full px-8 py-5 input-dynamic rounded-[28px] text-[16px] font-bold text-emerald-950 appearance-none cursor-pointer">
                        <option value="Jakarta">Jakarta</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Surabaya">Surabaya</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-emerald-950 text-white py-6 rounded-[28px] font-black text-[18px] shadow-2xl shadow-emerald-950/30 hover:bg-emerald-900 transition-all duration-300 active:scale-[0.97] flex items-center justify-center gap-4 group">
                    Buat Akun Sekarang
                </button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const pass = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (pass.type === 'password') {
                pass.type = 'text';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />';
            } else {
                pass.type = 'password';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />';
            }
        }
    </script>
</body>
</html>
