<?php

use App\Http\Controllers\ControllerBook;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman buku
Route::get('/buku', [ControllerBook::class, 'index'])->name('buku.index');

// Route untuk menampilkan form tambah buku
Route::get('/buku/create', [ControllerBook::class, 'create'])->name('buku.create');

// Route untuk menyimpan data buku baru ke database
Route::post('/buku', [ControllerBook::class, 'store'])->name('buku.store');

// Route untuk menampilkan halaman detail buku
Route::get('/buku/{buku}', [ControllerBook::class, 'show'])->name('buku.show');