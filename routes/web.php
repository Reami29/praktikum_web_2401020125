<?php

use Illuminate\Support\Facades\Route;
// 1. Impor LatihanController di paling atas
use App\Http\Controllers\LatihanController;

Route::get('/', function () {
    return view('welcome');
});

// 2. Panggil method 'index' dari LatihanController
Route::get('/latihan-php', [LatihanController::class, 'index']);