{{-- memanggil file layout/main.blade.php --}}
@extends('layout.main')

{{-- bagian konten utama disimpan di method section --}}
@section('content')
    
    {{-- tombol untuk kembali ke halaman daftar buku --}}
    <a href="{{ route('buku.index') }}" class="btn btn-secondary mb-4">Kembali</a>

    {{-- judul halaman edit buku --}}
    <h2 class="mb-3">Edit Buku</h2>

    {{-- form untuk mengedit buku --}}
    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">

        {{-- token CSRF untuk keamanan --}}
        @csrf
        @method('PUT')

        {{-- input untuk kode buku --}}
        <div class="mb-3">
            <label for="kode" class="form-label">Kode</label>
            <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $buku) }}">
            @error('kode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- input untuk judul buku --}}
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $buku) }}">
            @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- input untuk penulis buku --}}
        <div class="mb-3">
            <label for="pengarang" class="form-label">Penulis/Pengarang</label>
            <input type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang" value="{{ old('pengarang', $buku) }}">
            @error('pengarang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- input untuk penerbit buku --}}
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit" value="{{ old('penerbit', $buku) }}">
            @error('penerbit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- input untuk tanggal terbit --}}
        <div class="mb-3">
            <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
            <input type="date" class="form-control @error('tanggal_terbit') is-invalid @enderror" id="tanggal_terbit" name="tanggal_terbit" value="{{ old('tanggal_terbit', $buku) }}">
            @error('tanggal_terbit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- input untuk cover buku --}}
        <div class="mb-3">
            <label for="cover" class="form-label">Cover Buku</label>
            @if ($buku->cover)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku" style="max-width: 150px;">
                </div>
                <input type="hidden" name="gambar_lama" value="{{ $buku->cover }}">
            @endif
            <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover">
            @error('cover')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection