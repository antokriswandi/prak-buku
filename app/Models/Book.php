<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'kode',
        'judul',
        'pengarang',
        'penerbit',
        'tanggal_terbit',
        'cover',
    ];
    // variabel fillable di atas disesuaikan dengan kolom pada tabel books
    // variabel ini berfungsi untuk menentukan kolom mana saja yang boleh diisi
}
