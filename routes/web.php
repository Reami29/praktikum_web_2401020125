<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/latihan-php', function () {
    // 1. Variabel dan Array (Nama & Daftar Nilai)
    $nama = 'Muhammad Fatahillah Ilmi';
    $nilai = [80, 75, 90, 85, 70];

    // 2. Fungsi Hitung Rata-rata
    $hitungRataRata = function (array $data): float {
        $total = 0;
        foreach ($data as $angka) {
            $total += $angka;
        }
        return $total / count($data);
    };

    // 3. Menghitung Rata-rata dan Penentuan Status
    $rataRata = $hitungRataRata($nilai);
    $status = ($rataRata >= 75) ? 'Lulus' : 'Perlu Perbaikan';

    // 4. Mengirim Data ke View Blade
    return view('latihan-php', compact('nama', 'nilai', 'rataRata', 'status'));
});
