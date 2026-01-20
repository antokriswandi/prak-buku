{{-- memanggil file layout/main.blade.php --}}
@extends('layout.main')

{{-- bagian konten utama disimpan di method section --}}
@section('content')

    {{-- tombol untuk kembali ke halaman daftar buku --}}
    <a href="{{ route('buku.index') }}" class="btn btn-secondary mb-4">Kembali</a>

    {{-- konten utama untuk halaman detail buku --}}
    <h2 class="mb-3">Detail Buku</h2>

    <div class="row">
        {{-- menampilkan gambar cover buku --}}
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $buku->cover) }}" alt="{{ $buku->judul }}" class="img-fluid">
        </div>
        <div class="col-md-8">
            <div class="mb-3">
                <span>Kode Buku</span>
                <h3>{{ $buku->kode }}</h3>
            </div>
            <div class="mb-3">
                <span>Judul Buku</span>
                <h3>{{ $buku->judul }}</h3>
            </div>
            <div class="mb-3">
                <span>Penulis</span>
                <h3>{{ $buku->pengarang }}</h3>
            </div>
            <div class="mb-3">
                <span>Penerbit</span>
                <h3>{{ $buku->penerbit }}</h3>
            </div>
            <div class="mb-3">
                <span>Tanggal Terbit</span>
                <h3>{{ $buku->tanggal_terbit }}</h3>
            </div>
        </div>

    </div>

    {{-- tombol edit buku --}}
    <a href="" class="btn btn-primary mt-4">Edit Buku</a>

    {{-- tombol hapus buku --}}
    <form action="" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-4">Hapus Buku</button>
    </form>

@endsection