<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Buku - CIVAD Admin</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background-color: #F8FAFC; }
        .modal-overlay { background-color: rgba(0, 0, 0, 0.4); backdrop-filter: blur(4px); }
    </style>
</head>
<body class="text-gray-800">

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-[260px] bg-white border-r border-gray-100 flex flex-col shadow-[2px_0_10px_rgba(0,0,0,0.02)] z-10">
        <!-- Logo -->
        <div class="h-20 flex items-center px-6 border-b border-gray-50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#2563EB] text-white rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <div>
                    <h1 class="font-bold text-[18px] text-[#111827] leading-none">CIVAD Admin</h1>
                    <p class="text-[11px] text-gray-500 mt-0.5">Sistem Manajemen</p>
                </div>
            </div>
        </div>

        <!-- Nav Links -->
        <nav class="flex-1 px-4 py-6 space-y-2 text-[14px]">
            <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" /></svg>
                Dashboard
            </a>
            <a href="{{ url('/admin/manajemen-buku') }}" class="flex items-center gap-3 px-4 py-3 bg-[#F0F5FF] text-[#2563EB] font-semibold rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                Manajemen Buku
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>
                Data Pelanggan
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl font-medium transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                Manajemen Pesanan
            </a>
            <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl font-semibold transition mt-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" /></svg>
                Keluar
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="ml-[260px] min-h-screen">
        <header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-8 sticky top-0 z-10">
            <div class="flex items-center gap-2 text-[14px]">
                <a href="{{ url('/admin/dashboard') }}" class="text-gray-400 hover:text-gray-600 transition">Dashboard</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3 text-gray-300"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                <span class="font-semibold text-gray-800">Manajemen Buku</span>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-[13px] font-bold text-gray-800 leading-tight">Admin CIVAD</p>
                    <p class="text-[11px] text-gray-500">Administrator</p>
                </div>
                <div class="w-9 h-9 bg-blue-50 text-[#2563EB] rounded-full flex items-center justify-center font-bold">A</div>
            </div>
        </header>

        <div class="p-8">
            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-600 text-[14px] rounded-xl font-bold flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                {{ session('success') }}
            </div>
            @endif

            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-[26px] font-bold text-[#111827] tracking-tight">Manajemen Buku</h2>
                    <p class="text-[14px] text-gray-500 mt-1">Kelola data buku yang tersedia di toko</p>
                </div>
                <button onclick="openAddModal()" class="bg-[#2563EB] text-white px-5 py-2.5 rounded-xl text-[14px] font-bold hover:bg-blue-700 transition flex items-center gap-2 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                    Tambah Buku
                </button>
            </div>

            <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm mb-8">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                    <input type="text" placeholder="Cari buku berdasarkan judul atau kategori..." class="w-full bg-gray-50/50 border border-gray-100 rounded-xl py-2.5 pl-12 pr-4 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-500 transition">
                </div>
            </div>

            <div class="bg-white rounded-[24px] border border-gray-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[11px] uppercase tracking-wider text-gray-400 font-bold border-b border-gray-50">
                                <th class="px-6 py-4 w-24">Gambar</th>
                                <th class="px-6 py-4">Judul Buku</th>
                                <th class="px-6 py-4">Jenjang / Kelas</th>
                                <th class="px-6 py-4 text-center">Harga</th>
                                <th class="px-6 py-4 text-center">Stok</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($dummyBooks as $id => $book)
                            <tr class="hover:bg-gray-50/30 transition">
                                <td class="px-6 py-4">
                                    <div class="w-14 h-16 bg-gray-50 rounded-lg overflow-hidden border border-gray-100">
                                        <img src="{{ $book['image'] }}" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-6 py-4"><p class="font-bold text-[#111827] text-[14px]">{{ $book['title'] }}</p></td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col gap-1">
                                        <span class="inline-block px-2 py-0.5 bg-blue-50 text-[#2563EB] text-[10px] font-bold rounded border border-blue-100 w-max uppercase">{{ $book['category'] }}</span>
                                        <span class="text-[11px] text-gray-400 font-medium ml-0.5">{{ $book['class'] }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center"><p class="font-bold text-gray-900 text-[14px]">{{ $book['price'] }}</p></td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-block px-2.5 py-1 bg-green-50 text-green-600 text-[11px] font-bold rounded-lg border border-green-100">{{ $book['stock'] }} unit</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <button onclick="openEditModal('{{ $id }}', '{{ addslashes($book['title']) }}', '{{ $book['category'] }}', '{{ str_replace('Kelas ', '', $book['class']) }}', '{{ $book['base_price'] }}', '{{ $book['stock'] }}', '{{ addslashes($book['desc'] ?? '') }}', '{{ $book['image'] }}')" class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-[18px] h-[18px]"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1-2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
                                        </button>
                                        <button onclick="openDeleteModal('{{ $id }}', '{{ addslashes($book['title']) }}')" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-[18px] h-[18px]"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
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

    <!-- Modal Tambah -->
    <div id="modal-add" class="fixed inset-0 z-[60] flex items-center justify-center p-4 modal-overlay hidden">
        <div class="bg-white w-full max-w-[600px] rounded-[24px] shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-200">
            <div class="flex items-center justify-between p-6 border-b border-gray-100">
                <h3 class="text-[20px] font-bold text-[#111827]">Tambah Buku Baru</h3>
                <button onclick="closeAddModal()" class="text-gray-400 hover:text-gray-600 transition tracking-tighter text-xl">✕</button>
            </div>
            <form action="{{ url('/admin/buku/store') }}" method="POST" class="p-8">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-2 flex items-start gap-4 mb-2">
                        <div class="w-20 h-24 bg-gray-50 rounded-xl border border-gray-100 overflow-hidden shadow-inner shrink-0">
                            <img id="add-preview" src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-grow pt-2">
                            <label class="block text-[13px] font-bold text-gray-700 mb-2">Gambar Sampul</label>
                            <input type="file" id="add-file-input" class="hidden" accept="image/*" onchange="previewAddImage(this)">
                            <input type="hidden" name="image" id="add-image-url">
                            <button type="button" onclick="document.getElementById('add-file-input').click()" class="w-full border-2 border-dashed border-gray-200 rounded-xl py-4 flex items-center justify-center gap-2 text-[13px] text-gray-400 hover:bg-gray-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 9 9m-9-9v18" /></svg>
                                Pilih Gambar
                            </button>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Judul Buku</label>
                        <input type="text" name="title" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="Masukkan judul buku">
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Jenjang Pendidikan</label>
                        <select name="category" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none">
                            <option value="SD/MI" selected>SD/MI</option>
                            <option value="SMP/MTs">SMP/MTs</option>
                            <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Kelas</label>
                        <input type="text" name="class_level" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="Contoh: 10">
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Harga (Rp)</label>
                        <input type="number" name="price" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="85000">
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Stok</label>
                        <input type="number" name="stock" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="50">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Deskripsi</label>
                        <textarea name="desc" rows="3" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-500 resize-none" placeholder="Masukkan deskripsi buku..."></textarea>
                    </div>
                </div>
                <div class="flex items-center gap-3 mt-8">
                    <button type="button" onclick="closeAddModal()" class="flex-1 py-3 rounded-xl border border-gray-200 text-[14px] font-bold text-gray-600 hover:bg-gray-50 transition">Batal</button>
                    <button type="submit" class="flex-1 py-3 rounded-xl bg-[#2563EB] text-white text-[14px] font-bold hover:bg-blue-700 transition shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="modal-edit" class="fixed inset-0 z-[60] flex items-center justify-center p-4 modal-overlay hidden">
        <div class="bg-white w-full max-w-[600px] rounded-[24px] shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-200">
            <div class="flex items-center justify-between p-6 border-b border-gray-100">
                <h3 class="text-[20px] font-bold text-[#111827]">Edit Buku</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition tracking-tighter text-xl">✕</button>
            </div>
            <form action="{{ url('/admin/buku/update') }}" method="POST" class="p-8">
                @csrf
                <input type="hidden" name="id" id="edit-id">
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-2 flex items-start gap-4 mb-2">
                        <div class="w-20 h-24 bg-gray-50 rounded-xl border border-gray-100 overflow-hidden shadow-inner">
                            <img id="edit-preview" src="" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-grow pt-2">
                            <label class="block text-[13px] font-bold text-gray-700 mb-2">Gambar Sampul</label>
                            <input type="file" id="edit-file-input" class="hidden" accept="image/*" onchange="previewImage(this)">
                            <input type="hidden" name="image" id="edit-image-url">
                            <button type="button" onclick="document.getElementById('edit-file-input').click()" class="w-full border-2 border-dashed border-gray-200 rounded-xl py-4 flex items-center justify-center gap-2 text-[13px] text-gray-400 hover:bg-gray-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 9 9m-9-9v18" /></svg>
                                Ganti Gambar
                            </button>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Judul Buku</label>
                        <input type="text" name="title" id="edit-title" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Jenjang Pendidikan</label>
                        <select name="category" id="edit-category" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none">
                            <option value="SD/MI">SD/MI</option>
                            <option value="SMP/MTs">SMP/MTs</option>
                            <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Kelas</label>
                        <input type="text" name="class_level" id="edit-class" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Harga (Rp)</label>
                        <input type="number" name="price" id="edit-price" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Stok</label>
                        <input type="number" name="stock" id="edit-stock" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Deskripsi</label>
                        <textarea name="desc" id="edit-desc" rows="3" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[14px] focus:outline-none focus:ring-1 focus:ring-blue-500 resize-none"></textarea>
                    </div>
                </div>
                <div class="flex items-center gap-3 mt-8">
                    <button type="button" onclick="closeEditModal()" class="flex-1 py-3 rounded-xl border border-gray-200 text-[14px] font-bold text-gray-600 hover:bg-gray-50 transition">Batal</button>
                    <button type="submit" class="flex-1 py-3 rounded-xl bg-[#2563EB] text-white text-[14px] font-bold hover:bg-blue-700 transition shadow-sm">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div id="modal-delete" class="fixed inset-0 z-[60] flex items-center justify-center p-4 modal-overlay hidden">
        <div class="bg-white w-full max-w-[420px] rounded-[24px] shadow-2xl p-8 text-center animate-in fade-in zoom-in duration-200">
            <div class="w-16 h-16 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6 border border-red-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" /></svg>
            </div>
            <h3 class="text-[20px] font-bold text-[#111827] mb-2">Hapus Buku?</h3>
            <p class="text-[14px] text-gray-500 leading-relaxed mb-8">Apakah Anda yakin ingin menghapus buku <br><span id="delete-book-title" class="font-bold text-gray-900 line-clamp-2 mt-1"></span>? Tindakan ini tidak dapat dibatalkan.</p>
            <form action="{{ url('/admin/buku/delete') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="delete-id">
                <div class="flex items-center gap-3">
                    <button type="button" onclick="closeDeleteModal()" class="flex-1 py-3 rounded-xl border border-gray-200 text-[14px] font-bold text-gray-600 hover:bg-gray-50 transition">Batal</button>
                    <button type="submit" class="flex-1 py-3 rounded-xl bg-red-600 text-white text-[14px] font-bold hover:bg-red-700 transition shadow-sm">Ya, Hapus Buku</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('modal-add').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('modal-add').classList.add('hidden');
        }

        function previewAddImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('add-preview').src = e.target.result;
                    document.getElementById('add-image-url').value = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function openEditModal(id, title, category, classLevel, price, stock, desc, image) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-title').value = title;
            document.getElementById('edit-category').value = category;
            document.getElementById('edit-class').value = classLevel;
            document.getElementById('edit-price').value = price;
            document.getElementById('edit-stock').value = stock;
            document.getElementById('edit-desc').value = desc;
            document.getElementById('edit-preview').src = image;
            document.getElementById('edit-image-url').value = image;
            document.getElementById('modal-edit').classList.remove('hidden');
        }

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('edit-preview').src = e.target.result;
                    document.getElementById('edit-image-url').value = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function closeEditModal() {
            document.getElementById('modal-edit').classList.add('hidden');
        }

        function openDeleteModal(id, title) {
            document.getElementById('delete-id').value = id;
            document.getElementById('delete-book-title').innerText = '"' + title + '"';
            document.getElementById('modal-delete').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('modal-delete').classList.add('hidden');
        }
    </script>
</body>
</html>
