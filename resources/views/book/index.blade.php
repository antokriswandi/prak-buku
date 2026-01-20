{{-- memanggil file layout/main.blade.php --}}
@extends('layout.main')

{{-- bagian konten utama disimpan di method section --}}
@section('content')

    {{-- alert pemberitahuan --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{-- isi pesan pemberitahuan dikirim dari controller --}}
            {{ session('success') }}

            {{-- tombol untuk menutup alert pemberitahuan --}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- konten utama untuk halaman daftar buku --}}
    <h2 class="mb-3">Daftar Buku</h2>

    {{-- tombol untuk menambah buku baru --}}
    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-5">Tambah Buku Baru</a>

    {{-- tabel untuk menampilkan daftar buku --}}
    <table class="table table-striped">
        <thead></thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->pengarang }}</td>
                    <td>{{ $book->penerbit }}</td>
                    <td>
                        <a href="{{ route('buku.show', $book->id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('buku.edit', $book->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Data buku tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection