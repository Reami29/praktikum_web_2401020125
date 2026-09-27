<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index()
    {
        $nama = 'Muhammad Fatahillah Ilmi';
        $nilai = [80, 75, 90, 85, 70];

        $total = array_sum($nilai);
        $rataRata = $total / count($nilai);
        $status = ($rataRata >= 75) ? 'Lulus' : 'Perlu Perbaikan';

        return view('latihan-php', compact('nama', 'nilai', 'rataRata', 'status'));
    }
}