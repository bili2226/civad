<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Buku - CIVAD Admin</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; }
        .modal-overlay { background-color: rgba(15, 23, 42, 0.4); backdrop-filter: blur(8px); }
        .table-row:hover { background-color: rgba(248, 250, 252, 1); }
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
            <a href="{{ url('/admin/manajemen-buku') }}" class="flex items-center gap-3 px-4 py-3 bg-indigo-50 text-indigo-600 font-bold rounded-2xl transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                Manajemen Buku
            </a>
            <a href="{{ url('/admin/data-pelanggan') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-semibold transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>
                Data Pelanggan
            </a>
            <a href="{{ url('/admin/manajemen-pesanan') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-semibold transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                Manajemen Pesanan
            </a>
            <a href="{{ url('/admin/tambah-admin') }}" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-2xl font-semibold transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>
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
                    <span class="text-indigo-600">Manajemen Buku</span>
                </div>
                <h2 class="text-[20px] font-extrabold text-indigo-950 tracking-tight">Katalog Buku CIVAD</h2>
            </div>
            
            <div class="flex items-center gap-6">
                <button onclick="openAddModal()" class="bg-indigo-600 text-white px-6 py-3 rounded-2xl text-[14px] font-extrabold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100 flex items-center gap-2 active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                    Tambah Koleksi
                </button>
            </div>
        </header>

        <div class="p-10">
            @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 text-emerald-600 text-[14px] rounded-2xl font-bold flex items-center gap-3 animate-in fade-in slide-in-from-top duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                {{ session('success') }}
            </div>
            @endif

            <!-- Search & Filter -->
            <div class="bg-white p-4 rounded-[28px] border border-slate-100 shadow-sm mb-10 flex gap-4">
                <div class="relative flex-grow group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-indigo-600 transition-colors"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                    <input type="text" placeholder="Cari berdasarkan judul, penulis, atau kategori buku..." class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl py-3.5 pl-14 pr-6 text-[14px] focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 transition-all font-medium">
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-[11px] font-bold uppercase tracking-widest text-slate-400 bg-slate-50/50">
                                <th class="px-8 py-5 w-32">Sampul</th>
                                <th class="px-8 py-5">Detail Informasi</th>
                                <th class="px-8 py-5">Jenjang / Kelas</th>
                                <th class="px-8 py-5 text-center">Harga Jual</th>
                                <th class="px-8 py-5 text-center">Stok</th>
                                <th class="px-8 py-5 text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="text-[14px] text-slate-600 divide-y divide-slate-50">
                            @foreach($dummyBooks as $book)
                            <tr class="table-row transition-colors">
                                <td class="px-8 py-6">
                                    <div class="w-20 h-24 bg-slate-100 rounded-2xl overflow-hidden border border-slate-50 shadow-sm">
                                        <img src="{{ $book->image }}" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <p class="font-extrabold text-indigo-950 text-[15px] mb-1 leading-tight">{{ $book->title }}</p>
                                    <div class="flex items-center gap-2 text-[12px] text-slate-400 font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                                        {{ $book->author }}
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex flex-col gap-2">
                                        <span class="inline-block px-3 py-1 bg-indigo-50 text-indigo-600 text-[11px] font-bold rounded-full border border-indigo-100 w-max">{{ $book->category }}</span>
                                        <span class="text-[12px] font-bold text-slate-400 ml-1">{{ $book->class }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <p class="font-black text-indigo-950">Rp {{ number_format($book->base_price, 0, ',', '.') }}</p>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <span class="inline-block px-4 py-1.5 bg-emerald-50 text-emerald-600 text-[12px] font-bold rounded-full border border-emerald-100">{{ $book->stock }} <span class="text-[10px] opacity-70">Unit</span></span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center justify-center gap-2">
                                        <button onclick="openEditModal('{{ $book->id }}', '{{ addslashes($book->title) }}', '{{ addslashes($book->author) }}', '{{ $book->category }}', '{{ str_replace('Kelas ', '', $book->class) }}', '{{ $book->base_price }}', '{{ $book->stock }}', '{{ addslashes($book->desc ?? '') }}', '{{ $book->image }}')" class="w-10 h-10 flex items-center justify-center text-indigo-600 bg-indigo-50 hover:bg-indigo-600 hover:text-white rounded-xl transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1-2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
                                        </button>
                                        <button onclick="openDeleteModal('{{ $book->id }}', '{{ addslashes($book->title) }}')" class="w-10 h-10 flex items-center justify-center text-rose-600 bg-rose-50 hover:bg-rose-600 hover:text-white rounded-xl transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Layout -->
    <div id="modal-container" class="fixed inset-0 z-[60] flex items-center justify-center p-6 modal-overlay hidden">
        <div id="modal-card" class="bg-white w-full max-w-[700px] rounded-[40px] shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
            <div class="flex items-center justify-between px-10 py-8 border-b border-slate-50 bg-slate-50/30">
                <div>
                    <h3 id="modal-title" class="text-[22px] font-black text-indigo-950 tracking-tight">Tambah Buku Baru</h3>
                    <p class="text-[12px] font-bold text-slate-400 uppercase tracking-widest mt-1">Lengkapi informasi katalog buku</p>
                </div>
                <button onclick="closeModal()" class="w-10 h-10 flex items-center justify-center rounded-full bg-white shadow-sm border border-slate-100 text-slate-400 hover:text-rose-500 transition-colors">✕</button>
            </div>
            
            <form id="book-form" action="" method="POST" class="p-10">
                @csrf
                <input type="hidden" name="id" id="input-id">
                <div class="grid grid-cols-2 gap-8">
                    <!-- Image Area -->
                    <div class="col-span-2 md:col-span-1">
                        <label class="text-[13px] font-bold text-slate-700 ml-1 block mb-3">Foto Sampul</label>
                        <div class="relative group h-[280px] bg-slate-50 rounded-[32px] border-2 border-dashed border-slate-200 overflow-hidden flex flex-col items-center justify-center gap-4 transition-all hover:border-indigo-300">
                            <img id="preview-image" src="" class="absolute inset-0 w-full h-full object-cover hidden">
                            <div id="upload-placeholder" class="flex flex-col items-center gap-3">
                                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm text-slate-400 group-hover:text-indigo-600 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 9 9m-9-9v18" /></svg>
                                </div>
                                <span class="text-[13px] font-bold text-slate-400">Upload Image</span>
                            </div>
                            <input type="file" id="file-input" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*" onchange="handleImage(this)">
                            <input type="hidden" name="image" id="input-image">
                        </div>
                    </div>

                    <!-- Inputs Area -->
                    <div class="col-span-2 md:col-span-1 space-y-5">
                        <div class="space-y-2">
                            <label class="text-[13px] font-bold text-slate-700 ml-1">Judul Katalog</label>
                            <input type="text" name="title" id="input-title" required class="w-full px-5 py-3.5 bg-slate-50 border border-slate-100 rounded-[20px] text-[14px] font-bold text-indigo-950 focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 transition-all placeholder:text-slate-300">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[13px] font-bold text-slate-700 ml-1">Nama Penulis</label>
                            <input type="text" name="author" id="input-author" required class="w-full px-5 py-3.5 bg-slate-50 border border-slate-100 rounded-[20px] text-[14px] font-bold text-indigo-950 focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 transition-all">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="text-[13px] font-bold text-slate-700 ml-1">Jenjang</label>
                                <select name="category" id="input-category" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-100 rounded-[20px] text-[14px] font-bold text-indigo-950 focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 appearance-none">
                                    <option value="SD/MI">SD/MI</option>
                                    <option value="SMP/MTs">SMP/MTs</option>
                                    <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[13px] font-bold text-slate-700 ml-1">Kelas</label>
                                <input type="text" name="class_level" id="input-class" required class="w-full px-5 py-3.5 bg-slate-50 border border-slate-100 rounded-[20px] text-[14px] font-bold text-indigo-950 focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600" placeholder="10">
                            </div>
                        </div>
                    </div>

                    <div class="col-span-2 grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[13px] font-bold text-slate-700 ml-1">Harga Satuan (Rp)</label>
                            <input type="number" name="price" id="input-price" required class="w-full px-5 py-3.5 bg-slate-50 border border-slate-100 rounded-[20px] text-[14px] font-black text-indigo-600 focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[13px] font-bold text-slate-700 ml-1">Stok Inventaris</label>
                            <input type="number" name="stock" id="input-stock" required class="w-full px-5 py-3.5 bg-slate-50 border border-slate-100 rounded-[20px] text-[14px] font-black text-emerald-600 focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600">
                        </div>
                    </div>

                    <div class="col-span-2 space-y-2">
                        <label class="text-[13px] font-bold text-slate-700 ml-1">Deskripsi Singkat</label>
                        <textarea name="desc" id="input-desc" rows="3" class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-[24px] text-[14px] font-medium text-slate-600 focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 resize-none transition-all"></textarea>
                    </div>
                </div>

                <div class="flex items-center gap-4 mt-10">
                    <button type="button" onclick="closeModal()" class="flex-1 py-4 rounded-[20px] border border-slate-200 text-[14px] font-extrabold text-slate-500 hover:bg-slate-50 transition-all">Batal</button>
                    <button type="submit" class="flex-1 py-4 rounded-[20px] bg-indigo-600 text-white text-[14px] font-extrabold hover:bg-indigo-700 transition-all shadow-xl shadow-indigo-100 active:scale-95">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div id="modal-delete" class="fixed inset-0 z-[60] flex items-center justify-center p-6 modal-overlay hidden">
        <div class="bg-white w-full max-w-[440px] rounded-[40px] shadow-2xl p-10 text-center animate-in fade-in zoom-in duration-300">
            <div class="w-20 h-20 bg-rose-50 text-rose-500 rounded-[28px] flex items-center justify-center mx-auto mb-8 border border-rose-100 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
            </div>
            <h3 class="text-[24px] font-black text-indigo-950 tracking-tight mb-3">Hapus Katalog?</h3>
            <p class="text-[14px] text-slate-500 leading-relaxed font-medium mb-10">Data buku <span id="delete-name" class="font-extrabold text-indigo-950 italic"></span> akan dihapus permanen. Tindakan ini tidak dapat dibatalkan.</p>
            <form action="{{ url('/admin/buku/delete') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="delete-id">
                <div class="flex items-center gap-4">
                    <button type="button" onclick="closeDelete()" class="flex-1 py-4 rounded-[20px] border border-slate-200 text-[14px] font-extrabold text-slate-500 hover:bg-slate-50 transition-all">Batal</button>
                    <button type="submit" class="flex-1 py-4 rounded-[20px] bg-rose-600 text-white text-[14px] font-extrabold hover:bg-rose-700 transition-all shadow-xl shadow-rose-100 active:scale-95">Ya, Hapus Data</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('modal-title').innerText = "Tambah Buku Baru";
            document.getElementById('book-form').action = "{{ url('/admin/buku/store') }}";
            document.getElementById('input-id').value = "";
            document.getElementById('input-title').value = "";
            document.getElementById('input-author').value = "";
            document.getElementById('input-class').value = "";
            document.getElementById('input-price').value = "";
            document.getElementById('input-stock').value = "";
            document.getElementById('input-desc').value = "";
            document.getElementById('input-image').value = "";
            document.getElementById('preview-image').classList.add('hidden');
            document.getElementById('upload-placeholder').classList.remove('hidden');
            document.getElementById('modal-container').classList.remove('hidden');
        }

        function openEditModal(id, title, author, category, classLevel, price, stock, desc, image) {
            document.getElementById('modal-title').innerText = "Edit Katalog Buku";
            document.getElementById('book-form').action = "{{ url('/admin/buku/update') }}";
            document.getElementById('input-id').value = id;
            document.getElementById('input-title').value = title;
            document.getElementById('input-author').value = author;
            document.getElementById('input-category').value = category;
            document.getElementById('input-class').value = classLevel;
            document.getElementById('input-price').value = price;
            document.getElementById('input-stock').value = stock;
            document.getElementById('input-desc').value = desc;
            document.getElementById('input-image').value = image;
            
            const preview = document.getElementById('preview-image');
            preview.src = image;
            preview.classList.remove('hidden');
            document.getElementById('upload-placeholder').classList.add('hidden');
            
            document.getElementById('modal-container').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal-container').classList.add('hidden');
        }

        function handleImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview-image');
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    document.getElementById('upload-placeholder').classList.add('hidden');
                    document.getElementById('input-image').value = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function openDeleteModal(id, name) {
            document.getElementById('delete-id').value = id;
            document.getElementById('delete-name').innerText = name;
            document.getElementById('modal-delete').classList.remove('hidden');
        }

        function closeDelete() {
            document.getElementById('modal-delete').classList.add('hidden');
        }
    </script>
</body>
</html>
