<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

// Route GET: Menampilkan Form
Route::get('/form-mahasiswa', function () {
    return view('form-mahasiswa');
});

// Route POST: Memproses Form, Sanitasi, dan Validasi
Route::post('/form-mahasiswa', function (Request $request) {
    // 1. Sanitasi Input (Termasuk trim spasi pada NIM)
    $dataBersih = [
        'nama'  => strip_tags(trim((string) $request->input('nama'))),
        'nim'   => trim((string) $request->input('nim')),
        'email' => filter_var((string) $request->input('email'), FILTER_SANITIZE_EMAIL),
        'usia'  => trim((string) $request->input('usia')),
    ];

    // 2. Validasi Server-Side
    $validator = Validator::make($dataBersih, [
        'nama'  => ['required', 'min:3', 'max:50'],
        'nim'   => ['required', 'digits_between:8,12'],
        'email' => ['required', 'email'],
        'usia'  => ['required', 'integer', 'min:17', 'max:60'],
    ], [
        'nama.required'      => 'Nama wajib diisi.',
        'nama.min'           => 'Nama minimal 3 karakter.',
        'nim.required'       => 'NIM wajib diisi.',
        'nim.digits_between' => 'NIM harus berisi 8 hingga 12 digit angka.',
        'email.required'     => 'Email wajib diisi.',
        'email.email'        => 'Format email tidak valid.',
        'usia.required'      => 'Usia wajib diisi.',
        'usia.integer'       => 'Usia harus berupa angka.',
        'usia.min'           => 'Usia minimal 17 tahun.',
        'usia.max'           => 'Usia maksimal 60 tahun.',
    ]);

    // Jika Validasi Gagal
    if ($validator->fails()) {
        return redirect('/form-mahasiswa')
            ->withErrors($validator)
            ->withInput();
    }

    // Jika Validasi Lolos
    $data = $validator->validated();
    $data['usia'] = (int) $data['usia'];

    return view('hasil-form', ['data' => $data]);
});