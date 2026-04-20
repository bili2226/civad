<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Helper to get books from session or initialize them
function getBooks() {
    if (!session()->has('books')) {
        $initialBooks = [
            1 => ['id' => 1, 'title' => 'Matematika SMA Kelas 10', 'category' => 'SMA/SMK/MA', 'class' => 'Kelas 10', 'price' => 'Rp 85.000', 'base_price' => 85000, 'stock' => 50, 'image' => 'https://images.unsplash.com/photo-1632516643720-e7f5d7d6eca9?q=80&w=800&auto=format&fit=crop', 'desc' => 'Buku panduan Matematika terlengkap untuk SMA Kelas 10.'],
            2 => ['id' => 2, 'title' => 'Bahasa Indonesia SMP Kelas 8', 'category' => 'SMP/MTs', 'class' => 'Kelas 8', 'price' => 'Rp 75.000', 'base_price' => 75000, 'stock' => 35, 'image' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=800&auto=format&fit=crop', 'desc' => 'Panduan lengkap belajar Bahasa Indonesia untuk siswa SMP kelas 8. Mencakup materi tata bahasa, sastra, dan latihan soal.'],
            3 => ['id' => 3, 'title' => 'Fisika SMA Kelas 11', 'category' => 'SMA/SMK/MA', 'class' => 'Kelas 11', 'price' => 'Rp 95.000', 'base_price' => 95000, 'stock' => 40, 'image' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?q=80&w=800&auto=format&fit=crop', 'desc' => 'Buku fisika untuk SMA kelas 11 dengan pendekatan praktis dan mudah dipahami. Dilengkapi ilustrasi dan eksperimen sederhana.'],
            4 => ['id' => 4, 'title' => 'Kimia SMA Kelas 12', 'category' => 'SMA/SMK/MA', 'class' => 'Kelas 12', 'price' => 'Rp 90.000', 'base_price' => 90000, 'stock' => 25, 'image' => 'https://images.unsplash.com/photo-1603126859738-ca3de276db69?q=80&w=800&auto=format&fit=crop', 'desc' => 'Pembahasan mendalam materi Kimia untuk kelas 12 dengan latihan soal UTBK.'],
            5 => ['id' => 5, 'title' => 'Biologi SMP Kelas 7', 'category' => 'SMP/MTs', 'class' => 'Kelas 7', 'price' => 'Rp 70.000', 'base_price' => 70000, 'stock' => 45, 'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=800&auto=format&fit=crop', 'desc' => 'Buku Biologi SMP Kelas 7 yang menarik dan penuh warna.'],
            6 => ['id' => 6, 'title' => 'Sejarah Indonesia SMA Kelas 10', 'category' => 'SMA/SMK/MA', 'class' => 'Kelas 10', 'price' => 'Rp 80.000', 'base_price' => 80000, 'stock' => 25, 'image' => 'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?q=80&w=800&auto=format&fit=crop', 'desc' => 'Buku Sejarah Indonesia SMA/MA dengan pendekatan lingkungan hidup dan sosial kemasyarakatan.']
        ];
        session(['books' => $initialBooks]);
    }
    return session('books');
}

Route::get('/', function () {
    return view('welcome', ['dummyBooks' => getBooks()]);
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/login-submit', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');
    $role = $request->input('role');

    if ($role === 'admin') {
        if ($username === 'admin' && $password === 'password123') {
            $request->session()->put('username', 'Admin CIVAD');
            $request->session()->put('role', 'admin');
            return redirect('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Username atau password admin salah!');
        }
    }

    if ($request->filled('username')) {
        $request->session()->put('username', $username);
        $request->session()->put('role', 'pelanggan');
    }
    return redirect('/pelanggan/dashboard');
})->name('login.submit');

// ADMIN ROUTES
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/manajemen-buku', function () {
    return view('admin.manajemen_buku', ['dummyBooks' => getBooks()]);
});

Route::post('/admin/buku/store', function (Request $request) {
    $books = getBooks();
    $newId = count($books) > 0 ? max(array_keys($books)) + 1 : 1;
    
    $basePrice = (int) $request->input('price');
    $books[$newId] = [
        'id' => $newId,
        'title' => $request->input('title'),
        'category' => $request->input('category'),
        'class' => 'Kelas ' . $request->input('class_level'),
        'base_price' => $basePrice,
        'price' => 'Rp ' . number_format($basePrice, 0, ',', '.'),
        'stock' => (int) $request->input('stock'),
        'image' => $request->input('image') ?? 'https://images.unsplash.com/photo-1543002588-bfa74002ed7e?q=80&w=800&auto=format&fit=crop',
        'desc' => $request->input('desc')
    ];
    
    session(['books' => $books]);
    return redirect()->back()->with('success', 'Buku baru berhasil ditambahkan!');
});

Route::post('/admin/buku/update', function (Request $request) {
    $id = $request->input('id');
    $books = getBooks();
    
    if (isset($books[$id])) {
        $books[$id]['title'] = $request->input('title');
        $books[$id]['category'] = $request->input('category');
        $books[$id]['class'] = 'Kelas ' . $request->input('class_level');
        $books[$id]['base_price'] = (int) $request->input('price');
        $books[$id]['price'] = 'Rp ' . number_format($books[$id]['base_price'], 0, ',', '.');
        $books[$id]['stock'] = (int) $request->input('stock');
        $books[$id]['desc'] = $request->input('desc');
        if($request->filled('image')) {
            $books[$id]['image'] = $request->input('image');
        }
        
        session(['books' => $books]);
        return redirect()->back()->with('success', 'Buku berhasil diperbarui!');
    }
    return redirect()->back()->with('error', 'Buku tidak ditemukan.');
});

Route::post('/admin/buku/delete', function (Request $request) {
    $id = $request->input('id');
    $books = getBooks();
    
    if (isset($books[$id])) {
        unset($books[$id]);
        session(['books' => $books]);
        return redirect()->back()->with('success', 'Buku berhasil dihapus!');
    }
    return redirect()->back()->with('error', 'Buku tidak ditemukan.');
});

// CUSTOMER ROUTES
Route::get('/pelanggan/dashboard', function () {
    return view('pelanggan.dashboard', ['dummyBooks' => getBooks()]);
});

Route::get('/pelanggan/buku/{id}', function ($id) {
    $books = getBooks();
    $book = $books[$id] ?? null;
    if (!$book) return abort(404);
    return view('pelanggan.detail', ['book' => $book]);
});

Route::post('/pelanggan/keranjang/tambah', function (Request $request) {
    $bukuId = $request->input('buku_id');
    $qtyToAdd = (int) $request->input('qty', 1);
    $books = getBooks();
    $book = $books[$bukuId] ?? null;

    if (!$book) return redirect()->back();

    $cart = session('cart', []);
    if (isset($cart[$bukuId])) {
        $cart[$bukuId]['qty'] += $qtyToAdd;
    } else {
        $cart[$bukuId] = [
            'id' => $book['id'],
            'title' => $book['title'],
            'price' => $book['base_price'],
            'image' => $book['image'],
            'category' => $book['category'],
            'class' => $book['class'],
            'qty' => $qtyToAdd
        ];
    }
    session(['cart' => $cart]);
    
    $totalQty = 0;
    foreach($cart as $item) { $totalQty += $item['qty']; }
    session(['cart_count' => $totalQty]);
    
    return redirect('/pelanggan/dashboard')->with('success', 'Buku berhasil ditambahkan ke keranjang!');
});

Route::get('/pelanggan/konfirmasi-pembayaran', function (Request $request) {
    $cart = session('cart', []);
    if (empty($cart)) return redirect('/pelanggan/dashboard');

    $orders = session('orders', []);
    $orderId = 'ORD-' . time();
    $total = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']) + 8400;

    $orders[$orderId] = [
        'id' => $orderId,
        'items' => $cart,
        'total' => $total,
        'status' => 'Menunggu Verifikasi Admin',
        'date' => now()->format('d F Y pukul H:i')
    ];

    session(['orders' => $orders]);
    session(['order_confirmed' => true]);
    session(['cart' => []]);
    session(['cart_count' => 0]);
    return redirect('/pelanggan/riwayat');
});

Route::get('/pelanggan/beranda', function () { return view('pelanggan.beranda'); });
Route::get('/pelanggan/keranjang', function () { return view('pelanggan.keranjang'); });
Route::get('/pelanggan/pesanan', function () { return view('pelanggan.pesanan'); });
Route::get('/pelanggan/pembayaran', function () { return view('pelanggan.pembayaran'); });
Route::get('/pelanggan/riwayat', function () { return view('pelanggan.riwayat'); });
Route::get('/pelanggan/status', function () { return view('pelanggan.status'); });
