<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ControllerBook extends Controller
{
    //fucntion index untuk menampilkan halaman buku
    public function index()
    {
        // ambil semua data buku dari database lalu simpan ke variabel books
        $books = Book::all();

        // tampilkan view buku.index dan kirim data books ke view tersebut
        return view('book.index', [
            'books' => $books,
            'title' => 'Daftar Buku'
        ]);
    }


    // function create untuk menampilkan form tambah buku
    public function create()
    {
        // tampilkan view buku.create
        return view('book.create', [
            'title' => 'Tambah Buku'
        ]);
    }


    // function store untuk menyimpan data buku baru ke database
    public function store(Request $request)
    {
        // menentukan aturan validasi untuk input buku
        $aturan = [
            'kode' => 'required|max:10',
            'judul' => 'required|max:100',
            'pengarang' => 'required|max:50',
            'penerbit' => 'required|max:50',
            'tanggal_terbit' => 'required|date',
            'cover' => 'nullable|image|max:2048|mimes:jpg,jpeg,png'
        ];

        // pesan validasi error untuk setiap aturan
        $pesan = [
            'required' => ':attribute wajib diisi.',
            'max' => ':attribute maksimal :max karakter.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'image' => ':attribute harus berupa file gambar.',
            'mimes' => ':attribute harus berformat :mimes.',
        ];

        // validasi input berdasarkan aturan dan pesan yang telah ditentukan
        $validatedData = $request->validate($aturan, $pesan);

        // jika ada file cover yang diupload
        if ($request->file('cover')) {
            // simpan file cover buku ke folder 'gambar-cover'
            $validatedData['cover'] = $request->file('cover')->store('gambar-cover');
        }

        // simpan data buku baru ke database
        Book::create($validatedData);

        // redirect ke halaman daftar buku dengan pesan sukses
        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan.');
    }


    // function show untuk menampilkan halaman detail buku
    public function show(Book $buku)
    {
        // tampilkan view buku.show dan kirim data buku ke view tersebut
        return view('book.show', [
            'buku' => $buku,
            'title' => 'Detail Buku'
        ]);
    }


    // function edit untuk menampilkan data buku yang akan diubah
    public function edit(Book $buku)
    {
        // tampilkan view buku.edit dan kirim data buku ke view tersebut
        return view('book.edit', [
            'buku' => $buku,
            'title' => 'Edit Buku'
        ]);
    }


    // function update untuk menyimpan perubahan data buku ke database
    public function update(Request $request, Book $buku)
    {
        // menentukan aturan validasi untuk input buku
        $aturan = [
            'kode' => 'required|max:10',
            'judul' => 'required|max:100',
            'pengarang' => 'required|max:50',
            'penerbit' => 'required|max:50',
            'tanggal_terbit' => 'required|date',
            'cover' => 'nullable|image|max:2048|mimes:jpg,jpeg,png'
        ];

        // pesan validasi error untuk setiap aturan
        $pesan = [
            'required' => ':attribute wajib diisi.',
            'max' => ':attribute maksimal :max karakter.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'image' => ':attribute harus berupa file gambar.',
            'mimes' => ':attribute harus berformat :mimes.',
        ];

        // validasi input berdasarkan aturan dan pesan yang telah ditentukan
        $validatedData = $request->validate($aturan, $pesan);

        // jika ada file cover yang diupload
        if ($request->file('cover')) {
            // cek apakah ada cover lama yang perlu dihapus
            if ($request->input('gambar_lama')) {
                // hapus file cover lama dari penyimpanan
                Storage::delete($request->input('gambar_lama'));
            }
            // simpan file cover buku ke folder 'gambar-cover'
            $validatedData['cover'] = $request->file('cover')->store('gambar-cover');
        }

        // update data buku di database
        $buku->update($validatedData);

        // redirect ke halaman daftar buku dengan pesan sukses
        return redirect('/buku')->with('success', 'Buku berhasil diupdate.');
    }


    // function destroy untuk menghapus data buku dari database
    public function destroy(Book $buku)
    {
        // cek apakah ada cover buku yang perlu dihapus
        if ($buku->cover) {
            // hapus file cover buku dari penyimpanan
            Storage::delete($buku->cover);
        }

        // hapus data buku dari database
        $buku->delete();

        // redirect ke halaman daftar buku dengan pesan sukses
        return redirect('/buku')->with('success', 'Buku berhasil dihapus.');
    }
}