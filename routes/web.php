<?php

use App\Http\Controllers\ControllerBook;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman buku
Route::get('/buku', [ControllerBook::class, 'index'])->name('buku.index');