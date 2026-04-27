<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

// Landing Page
Route::get('/', function () {
    return view('welcome', ['dummyBooks' => Book::all()]);
});

// AUTH ROUTES
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:4|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'daerah' => $request->daerah,
        'role' => 'pelanggan', // Keep for compatibility if needed, but users table is now customers only
    ]);

    return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
})->name('register.submit');

Route::post('/login-submit', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');
    $role = $request->input('role');

    if ($role === 'admin') {
        $admin = Admin::where('username', $username)->first();
        if ($admin && Hash::check($password, $admin->password)) {
            $request->session()->put('username', $admin->name);
            $request->session()->put('role', 'admin');
            return redirect('/admin/dashboard')->with('success', 'Selamat datang, ' . $admin->name . '!');
        }
    } else {
        // Customer login
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $user = Auth::user();
            $request->session()->put('username', $user->name);
            $request->session()->put('role', 'pelanggan');
            return redirect('/pelanggan/dashboard')->with('success', 'Selamat datang, ' . $user->name . '!');
        }
    }

    return redirect()->back()->with('error', 'Username atau password salah!');
})->name('login.submit');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// ADMIN ROUTES
Route::get('/admin/dashboard', function () {
    if (session('role') !== 'admin') return redirect('/')->with('error', 'Akses ditolak!');
    
    $totalPelanggan = User::where('role', 'pelanggan')->count();
    $totalPesanan = Order::count();
    $totalBukuTerjual = OrderItem::sum('quantity');
    $totalPendapatan = Order::sum('total_amount');
    $totalJenisBuku = Book::count();
    $menungguVerifikasi = Order::where('status', 'Menunggu Verifikasi')->count();
    
    return view('admin.dashboard', [
        'totalPelanggan' => $totalPelanggan,
        'totalPesanan' => $totalPesanan,
        'totalBukuTerjual' => $totalBukuTerjual,
        'totalPendapatan' => $totalPendapatan,
        'totalJenisBuku' => $totalJenisBuku,
        'menungguVerifikasi' => $menungguVerifikasi
    ]);
});

Route::get('/admin/tambah-admin', function () {
    if (session('role') !== 'admin') return redirect('/')->with('error', 'Akses ditolak!');
    return view('admin.tambah_admin');
});

Route::post('/admin/tambah-admin/submit', function (Request $request) {
    if (session('role') !== 'admin') return redirect('/')->with('error', 'Akses ditolak!');
    
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:admins',
        'password' => 'required|string|min:4',
    ]);

    Admin::create([
        'name' => $request->name,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'daerah' => $request->daerah ?? 'Pusat',
    ]);

    return redirect('/admin/dashboard')->with('success', 'Admin baru berhasil ditambahkan ke tabel admins!');
})->name('admin.tambah.submit');

Route::get('/admin/data-pelanggan', function () {
    if (session('role') !== 'admin') return redirect('/')->with('error', 'Akses ditolak!');
    
    $customers = User::all(); // Now all users are customers
    $totalOrders = Order::count();
    
    return view('admin.pelanggan', [
        'customers' => $customers,
        'totalOrders' => $totalOrders
    ]);
});

Route::get('/admin/manajemen-pesanan', function () {
    if (session('role') !== 'admin') return redirect('/')->with('error', 'Akses ditolak!');
    
    $orders = Order::with(['user', 'items.book'])->orderBy('created_at', 'desc')->get();
    
    return view('admin.pesanan', [
        'orders' => $orders
    ]);
});

Route::post('/admin/pesanan/update-status', function (Request $request) {
    if (session('role') !== 'admin') return redirect('/')->with('error', 'Akses ditolak!');
    
    $order = Order::findOrFail($request->input('id'));
    $order->status = $request->input('status');
    
    if ($request->filled('rejection_reason')) {
        $order->rejection_reason = $request->input('rejection_reason');
    }
    
    $order->save();
    
    return redirect()->back()->with('success', 'Status pesanan #' . $order->order_number . ' berhasil diubah menjadi ' . $order->status);
});

Route::get('/admin/manajemen-buku', function () {
    if (session('role') !== 'admin') return redirect('/')->with('error', 'Akses ditolak!');
    return view('admin.manajemen_buku', ['dummyBooks' => Book::all()]);
});

Route::post('/admin/buku/store', function (Request $request) {
    if (session('role') !== 'admin') return redirect('/')->with('error', 'Akses ditolak!');
    
    $basePrice = (int) $request->input('price');
    Book::create([
        'title' => $request->input('title'),
        'author' => $request->input('author') ?? 'Admin',
        'category' => $request->input('category'),
        'class' => 'Kelas ' . $request->input('class_level'),
        'base_price' => $basePrice,
        'price' => 'Rp ' . number_format($basePrice, 0, ',', '.'),
        'stock' => (int) $request->input('stock'),
        'image' => $request->input('image') ?? 'https://images.unsplash.com/photo-1543002588-bfa74002ed7e?q=80&w=800&auto=format&fit=crop',
        'desc' => $request->input('desc')
    ]);
    
    return redirect()->back()->with('success', 'Buku baru berhasil ditambahkan ke database!');
});

Route::post('/admin/buku/update', function (Request $request) {
    if (session('role') !== 'admin') return redirect('/')->with('error', 'Akses ditolak!');
    
    $book = Book::findOrFail($request->input('id'));
    $basePrice = (int) $request->input('price');
    
    $book->update([
        'title' => $request->input('title'),
        'author' => $request->input('author'),
        'category' => $request->input('category'),
        'class' => 'Kelas ' . $request->input('class_level'),
        'base_price' => $basePrice,
        'price' => 'Rp ' . number_format($basePrice, 0, ',', '.'),
        'stock' => (int) $request->input('stock'),
        'desc' => $request->input('desc'),
        'image' => $request->filled('image') ? $request->input('image') : $book->image
    ]);
    
    return redirect()->back()->with('success', 'Data buku di database berhasil diperbarui!');
});

Route::post('/admin/buku/delete', function (Request $request) {
    if (session('role') !== 'admin') return redirect('/')->with('error', 'Akses ditolak!');
    
    $book = Book::findOrFail($request->input('id'));
    $book->delete();
    
    return redirect()->back()->with('success', 'Buku telah dihapus dari database!');
});

// CUSTOMER ROUTES
Route::get('/pelanggan/dashboard', function () {
    if (session('role') !== 'pelanggan') return redirect('/')->with('error', 'Akses ditolak!');
    return view('pelanggan.dashboard', ['dummyBooks' => Book::all()]);
});

Route::get('/pelanggan/buku/{id}', function ($id) {
    $book = Book::findOrFail($id);
    return view('pelanggan.detail', ['book' => $book]);
});

Route::post('/pelanggan/keranjang/tambah', function (Request $request) {
    $book = Book::findOrFail($request->input('buku_id'));
    $qtyToAdd = (int) $request->input('qty', 1);

    $cart = session('cart', []);
    if (isset($cart[$book->id])) {
        $cart[$book->id]['qty'] += $qtyToAdd;
    } else {
        $cart[$book->id] = [
            'id' => $book->id,
            'title' => $book->title,
            'price' => $book->base_price,
            'image' => $book->image,
            'category' => $book->category,
            'class' => $book->class,
            'qty' => $qtyToAdd
        ];
    }
    session(['cart' => $cart]);
    
    $totalQty = collect($cart)->sum('qty');
    session(['cart_count' => $totalQty]);
    
    return redirect('/pelanggan/dashboard')->with('success', 'Buku berhasil ditambahkan ke keranjang!');
});

Route::post('/pelanggan/konfirmasi-pembayaran', function (Request $request) {
    $cart = session('cart', []);
    if (empty($cart)) return redirect('/pelanggan/dashboard');

    $user = Auth::user();
    if (!$user) return redirect('/login')->with('error', 'Silakan login terlebih dahulu');

    $orderNumber = 'ORD-' . strtoupper(Str::random(8));
    $subtotal = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']);
    $shipping = 8400;
    $total = $subtotal + $shipping;

    // Konfigurasi Midtrans
    Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $order = null;
    DB::transaction(function () use ($user, $orderNumber, $total, $cart, &$order) {
        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => $orderNumber,
            'total_amount' => $total,
            'status' => 'Pending',
            'payment_method' => 'Midtrans',
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $item['id'],
                'quantity' => $item['qty'],
                'price' => $item['price'],
            ]);
            
            // Potong stok buku
            $book = Book::find($item['id']);
            if ($book) {
                $book->stock -= $item['qty'];
                $book->save();
            }
        }
    });

    // Buat Transaksi Midtrans
    $params = [
        'transaction_details' => [
            'order_id' => $orderNumber,
            'gross_amount' => $total,
        ],
        'customer_details' => [
            'first_name' => $user->name,
            'email' => $user->username . '@example.com', // Dummy email as username is used
        ],
    ];

    try {
        $snapToken = Snap::getSnapToken($params);
        $order->snap_token = $snapToken;
        $order->save();

        session(['cart' => []]);
        session(['cart_count' => 0]);

        return view('pelanggan.pembayaran_midtrans', [
            'order' => $order,
            'snapToken' => $snapToken
        ]);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal terhubung ke Midtrans: ' . $e->getMessage());
    }
});

// Midtrans Notification Webhook
Route::post('/midtrans/callback', function (Request $request) {
    Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);

    $notification = new \Midtrans\Notification();

    $transaction = $notification->transaction_status;
    $type = $notification->payment_type;
    $order_id = $notification->order_id;
    $fraud = $notification->fraud_status;

    $order = Order::where('order_number', $order_id)->first();

    if ($order) {
        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $order->status = 'Pending';
                } else {
                    $order->status = 'Paid';
                }
            }
        } else if ($transaction == 'settlement') {
            $order->status = 'Paid';
        } else if ($transaction == 'pending') {
            $order->status = 'Pending';
        } else if ($transaction == 'deny') {
            $order->status = 'Cancelled';
        } else if ($transaction == 'expire') {
            $order->status = 'Cancelled';
        } else if ($transaction == 'cancel') {
            $order->status = 'Cancelled';
        }
        $order->save();
    }

    return response()->json(['status' => 'success']);
})->name('midtrans.callback');

Route::get('/pelanggan/beranda', function () { return view('pelanggan.beranda'); });
Route::get('/pelanggan/keranjang', function () { return view('pelanggan.keranjang'); });
Route::get('/pelanggan/pesanan', function () { return view('pelanggan.pesanan'); });
Route::get('/pelanggan/pembayaran', function () { return view('pelanggan.pembayaran'); });
Route::get('/pelanggan/riwayat', function () {
    if (session('role') !== 'pelanggan') return redirect('/')->with('error', 'Akses ditolak!');
    
    $orders = Order::where('user_id', Auth::id())
                   ->with('items.book')
                   ->orderBy('created_at', 'desc')
                   ->get();
                   
    return view('pelanggan.riwayat', ['orders' => $orders]);
});
Route::get('/pelanggan/status', function () {
    if (session('role') !== 'pelanggan') return redirect('/')->with('error', 'Akses ditolak!');
    
    $orders = Order::where('user_id', Auth::id())
                   ->orderBy('created_at', 'desc')
                   ->get();
                   
    return view('pelanggan.status', ['orders' => $orders]);
});
