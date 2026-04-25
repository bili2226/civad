<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konfirmasi Pembayaran - CIVAD</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; }
        .glass-nav { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); }
        .payment-card { transition: all 0.3s ease; }
        .step-number { background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); }
    </style>
    <script>
        function handleFile(input) {
            const btn = document.getElementById('btnSubmit');
            const file = input.files[0];
            const text = document.getElementById('uploadText');
            if (file) {
                text.innerText = file.name;
                text.classList.add('text-indigo-600');
                btn.classList.remove('bg-slate-200', 'text-slate-400', 'cursor-not-allowed');
                btn.classList.add('bg-indigo-600', 'text-white', 'hover:bg-indigo-700', 'shadow-xl', 'shadow-indigo-100');
                btn.removeAttribute('disabled');
            }
        }
    </script>
</head>
<body class="text-[#1E293B] pb-24">

    <!-- Navbar -->
    <nav class="glass-nav border-b border-slate-100 sticky top-0 z-50">
        <div class="max-w-[1280px] mx-auto px-6">
            <div class="flex justify-between h-[88px]">
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

                <div class="hidden lg:flex items-center gap-2 text-[14px] font-bold text-slate-500">
                    <a href="{{ url('/pelanggan/beranda') }}" class="px-5 py-2 hover:text-indigo-600 transition-colors">Beranda</a>
                    <a href="{{ url('/pelanggan/dashboard') }}" class="px-5 py-2 hover:text-indigo-600 transition-colors">Katalog</a>
                    <a href="{{ url('/pelanggan/status') }}" class="px-5 py-2 hover:text-indigo-600 transition-colors">Status</a>
                    <a href="{{ url('/pelanggan/riwayat') }}" class="px-5 py-2 hover:text-indigo-600 transition-colors">Riwayat</a>
                </div>

                <div class="flex items-center gap-4">
                    <div class="hidden sm:flex items-center gap-3 bg-slate-50 px-4 py-2 rounded-2xl border border-slate-100">
                        <p class="text-[13px] font-black text-indigo-950 leading-none">{{ session('username') ?? 'Customer' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-[1280px] mx-auto px-6 py-12">
        <header class="mb-12">
            <h1 class="text-[36px] font-black text-indigo-950 tracking-tighter mb-3 leading-none">Konfirmasi Pembayaran</h1>
            <p class="text-slate-400 font-bold text-[14px] uppercase tracking-widest">Unggah Bukti Transfer untuk Memulai Pemrosesan</p>
        </header>

        <form action="{{ url('/pelanggan/konfirmasi-pembayaran') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col xl:flex-row gap-12">
                <!-- Left Column: Instructions -->
                <div class="flex-grow space-y-8">
                    <div class="bg-white p-10 rounded-[48px] border border-slate-100 shadow-sm overflow-hidden relative">
                        <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-50 rounded-full blur-[100px] opacity-40"></div>
                        
                        <div class="relative z-10">
                            <h3 class="text-[20px] font-black text-indigo-950 mb-8 tracking-tight">Metode Transfer Bank</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                                <div class="payment-card p-8 rounded-[32px] border-2 border-indigo-600 bg-indigo-50/30 relative overflow-hidden group">
                                    <div class="absolute top-4 right-6 text-indigo-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" /></svg>
                                    </div>
                                    <p class="text-[11px] font-black text-indigo-400 uppercase tracking-[0.2em] mb-4">Transfer BCA</p>
                                    <p class="text-[26px] font-black text-indigo-950 tracking-tight leading-none mb-1">8691888122</p>
                                    <p class="text-[14px] font-bold text-slate-500">A/N CV ARYA DUTA</p>
                                    <div class="mt-6 flex items-center gap-2 text-[12px] font-black text-indigo-600 uppercase cursor-pointer group-hover:translate-x-1 transition-transform">
                                        Salin No. Rekening
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" /></svg>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6 mb-12">
                                <h4 class="text-[14px] font-black text-indigo-950 uppercase tracking-widest flex items-center gap-3">
                                    <span class="w-1.5 h-6 bg-indigo-600 rounded-full"></span>
                                    Instruksi Pembayaran
                                </h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="flex items-start gap-4 p-5 rounded-3xl bg-slate-50 border border-slate-100">
                                        <div class="step-number w-8 h-8 rounded-xl text-white flex items-center justify-center font-black text-[14px] shrink-0 shadow-lg shadow-indigo-100">1</div>
                                        <p class="text-[13px] font-bold text-slate-600 leading-relaxed">Transfer sesuai total nominal hingga digit terakhir.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-5 rounded-3xl bg-slate-50 border border-slate-100">
                                        <div class="step-number w-8 h-8 rounded-xl text-white flex items-center justify-center font-black text-[14px] shrink-0 shadow-lg shadow-indigo-100">2</div>
                                        <p class="text-[13px] font-bold text-slate-600 leading-relaxed">Pastikan nama penerima adalah CV ARYA DUTA.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-5 rounded-3xl bg-slate-50 border border-slate-100">
                                        <div class="step-number w-8 h-8 rounded-xl text-white flex items-center justify-center font-black text-[14px] shrink-0 shadow-lg shadow-indigo-100">3</div>
                                        <p class="text-[13px] font-bold text-slate-600 leading-relaxed">Simpan bukti transfer dalam format foto/screenshot.</p>
                                    </div>
                                    <div class="flex items-start gap-4 p-5 rounded-3xl bg-slate-50 border border-slate-100">
                                        <div class="step-number w-8 h-8 rounded-xl text-white flex items-center justify-center font-black text-[14px] shrink-0 shadow-lg shadow-indigo-100">4</div>
                                        <p class="text-[13px] font-bold text-slate-600 leading-relaxed">Unggah file pada kolom yang tersedia di bawah.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Upload Area -->
                            <div class="p-1 w-full bg-slate-100 rounded-[36px] overflow-hidden">
                                <label class="block w-full bg-white border-4 border-dashed border-slate-200 rounded-[32px] p-12 text-center cursor-pointer hover:border-indigo-400 hover:bg-indigo-50/30 transition-all group">
                                    <input type="file" name="payment_proof" class="hidden" onchange="handleFile(this)" required>
                                    <div class="flex flex-col items-center">
                                        <div class="w-20 h-20 bg-indigo-50 text-indigo-600 rounded-[24px] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500 shadow-sm border border-indigo-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0 7.5 7.5M12 3v13.5" /></svg>
                                        </div>
                                        <span class="text-[18px] font-black text-indigo-950 tracking-tight" id="uploadText">Unggah Bukti Pembayaran</span>
                                        <p class="text-[13px] font-bold text-slate-400 mt-2">Seret & lepas file di sini, atau klik untuk memilih file</p>
                                        <div class="mt-8 flex items-center gap-4 text-[11px] font-black text-indigo-400 uppercase tracking-widest">
                                            <span>JPG</span>
                                            <div class="w-1 h-1 bg-slate-200 rounded-full"></div>
                                            <span>PNG</span>
                                            <div class="w-1 h-1 bg-slate-200 rounded-full"></div>
                                            <span>PDF (MAKS 2MB)</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Summary -->
                <div class="w-full xl:w-[420px] flex-shrink-0">
                    <div class="bg-white p-10 rounded-[48px] border border-slate-100 shadow-sm sticky top-28">
                        <h3 class="text-[22px] font-black text-indigo-950 tracking-tight mb-8">Detail Tagihan</h3>
                        
                        <div class="space-y-4 mb-10">
                            @foreach(session('cart', []) as $item)
                            <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-50">
                                <div class="w-12 h-12 rounded-xl overflow-hidden bg-white shadow-sm border border-slate-100 flex-shrink-0">
                                    <img src="{{ $item['image'] }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-grow">
                                    <p class="text-[13px] font-black text-indigo-950 leading-tight line-clamp-1">{{ $item['title'] }}</p>
                                    <p class="text-[11px] font-bold text-slate-400 mt-1 uppercase">{{ $item['qty'] }} Unit</p>
                                </div>
                                <span class="text-[13px] font-black text-indigo-950">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>
                            </div>
                            @endforeach
                        </div>

                        <div class="space-y-4 mb-10 border-t border-slate-50 pt-8">
                            <div class="flex justify-between items-center text-[14px]">
                                <span class="font-bold text-slate-400">Total Produk</span>
                                <span class="font-black text-indigo-950">Rp {{ number_format(collect(session('cart', []))->sum(fn($i) => $i['price'] * $i['qty']), 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center text-[14px]">
                                <span class="font-bold text-slate-400">Biaya Pengiriman</span>
                                <span class="font-black text-emerald-500">Rp 8.400</span>
                            </div>
                        </div>

                        <div class="bg-indigo-950 p-8 rounded-[32px] text-white mb-10 shadow-xl relative overflow-hidden">
                            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-indigo-600 rounded-full blur-[60px] opacity-30"></div>
                            <p class="text-[11px] font-black text-indigo-300 uppercase tracking-[0.2em] mb-2 text-center relative z-10">Total Harus Dibayar</p>
                            <p class="text-[32px] font-black tracking-tighter text-center leading-none relative z-10">
                                Rp {{ number_format(collect(session('cart', []))->sum(fn($i) => $i['price'] * $i['qty']) + 8400, 0, ',', '.') }}
                            </p>
                        </div>

                        <button type="submit" id="btnSubmit" class="w-full flex items-center justify-center gap-3 bg-slate-200 text-slate-400 py-5 rounded-[24px] text-[16px] font-black transition-all cursor-not-allowed group" disabled>
                            Selesaikan Pembayaran
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5 group-hover:translate-x-1 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                        </button>
                        <p class="text-[11px] text-center text-slate-400 font-bold mt-6 italic">Pastikan bukti transfer yang Anda unggah terlihat jelas dan terbaca oleh sistem.</p>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>
</html>
