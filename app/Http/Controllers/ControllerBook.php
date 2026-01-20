<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ControllerBook extends Controller
{
    //fucntion index untuk menampilkan halaman buku
    public function index()
    {
        // ambil semua data buku dari database lalu simpan ke variabel books
        $books = Book::all();

        // tampilkan view buku.index dan kirim data books ke view tersebut
        return view('book.index', [
            'books' => $books
        ]);
    }
}
