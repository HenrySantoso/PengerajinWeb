@extends('adminlte::page')

@section('title', 'Create Data Produk')

@section('content_header')
    <h1>Create Data Produk</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('admin.produk-store') }}" method="POST" id="createProdukForm" enctype="multipart/form-data">
        @csrf
        <!-- Nama Produk -->
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi Produk" required>
        </div>

        <!-- Harga -->
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Produk" required>
        </div>

        <!-- Stok -->
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok Produk" required>
        </div>

        <!-- Gambar -->
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
</div>
@stop

@section('css')
    <!-- Custom CSS jika diperlukan -->
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <!-- Validasi form sederhana dengan JavaScript -->
    <script>
        document.getElementById('createProdukForm').addEventListener('submit', function(e) {
            // Contoh validasi dasar: memastikan nama tidak kosong
            const nama = document.getElementById('nama_produk').value.trim();
            if (nama === '') {
                alert('Nama Produk wajib diisi!');
                e.preventDefault();
                return false;
            }
            // Validasi lainnya bisa ditambahkan di sini jika diperlukan
        });

        console.log("Form Create Pengerajin loaded");
    </script>
@stop
