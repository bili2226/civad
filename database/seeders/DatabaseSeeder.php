<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Admin::create([
            'name' => 'Admin CIVAD',
            'username' => 'admin',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            'daerah' => 'Pusat',
        ]);

        $initialBooks = [
            ['title' => 'Matematika SMA Kelas 10', 'author' => 'Tim MGMP', 'category' => 'SMA/SMK/MA', 'class' => 'Kelas 10', 'price' => 'Rp 85.000', 'base_price' => 85000, 'stock' => 50, 'image' => 'https://images.unsplash.com/photo-1632516643720-e7f5d7d6eca9?q=80&w=800&auto=format&fit=crop', 'desc' => 'Buku panduan Matematika terlengkap untuk SMA Kelas 10.'],
            ['title' => 'Bahasa Indonesia SMP Kelas 8', 'author' => 'Dr. Ahmad S.', 'category' => 'SMP/MTs', 'class' => 'Kelas 8', 'price' => 'Rp 75.000', 'base_price' => 75000, 'stock' => 35, 'image' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=800&auto=format&fit=crop', 'desc' => 'Panduan lengkap belajar Bahasa Indonesia untuk siswa SMP kelas 8.'],
            ['title' => 'Fisika SMA Kelas 11', 'author' => 'Prof. Yohanes', 'category' => 'SMA/SMK/MA', 'class' => 'Kelas 11', 'price' => 'Rp 95.000', 'base_price' => 95000, 'stock' => 40, 'image' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?q=80&w=800&auto=format&fit=crop', 'desc' => 'Buku fisika untuk SMA kelas 11 dengan pendekatan praktis.'],
            ['title' => 'Kimia SMA Kelas 12', 'author' => 'Dra. Siti K.', 'category' => 'SMA/SMK/MA', 'class' => 'Kelas 12', 'price' => 'Rp 90.000', 'base_price' => 90000, 'stock' => 25, 'image' => 'https://images.unsplash.com/photo-1603126859738-ca3de276db69?q=80&w=800&auto=format&fit=crop', 'desc' => 'Pembahasan mendalam materi Kimia untuk kelas 12.'],
            ['title' => 'Biologi SMP Kelas 7', 'author' => 'Ir. Budi M.', 'category' => 'SMP/MTs', 'class' => 'Kelas 7', 'price' => 'Rp 70.000', 'base_price' => 70000, 'stock' => 45, 'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=800&auto=format&fit=crop', 'desc' => 'Buku Biologi SMP Kelas 7 yang menarik.'],
            ['title' => 'Sejarah Indonesia SMA Kelas 10', 'author' => 'Drs. Hasan', 'category' => 'SMA/SMK/MA', 'class' => 'Kelas 10', 'price' => 'Rp 80.000', 'base_price' => 80000, 'stock' => 25, 'image' => 'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?q=80&w=800&auto=format&fit=crop', 'desc' => 'Buku Sejarah Indonesia SMA/MA.']
        ];

        foreach ($initialBooks as $book) {
            \App\Models\Book::create($book);
        }
    }
}
