@extends('adminlte::page')

@section('title', 'Create Data Daftar Produk')

@section('content_header')
    <h1>Create Data Daftar Produk</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('admin.daftar_produk-store') }}" method="POST" id="createDaftarProdukForm">
        @csrf
        <!-- Kode Produk -->
        <div class="mb-3">
            <label for="produk_id" class="form-label">Kode Produk</label>
            <select class="form-control" id="produk_id" name="produk_id" required>
                <option value="">Pilih Kode Produk</option>
                @foreach ($produks as $produk)
                    <option value="{{ $produk->id }}">{{ $produk->kode_produk }}</option>
                @endforeach
            </select>
        </div>

        <!-- Kode Kategori Produk -->
        <div class="mb-3">
            <label for="kategori_produk_id" class="form-label">Kode Kategori Produk</label>
            <select class="form-control" id="kategori_produk_id" name="kategori_produk_id" required>
                <option value="">Pilih Kode Kategori Produk</option>
                @foreach ($kategoriProduks as $kategoriProduk)
                    <option value="{{ $kategoriProduk->id }}">{{ $kategoriProduk->kode_kategori_produk }}</option>
                @endforeach
            </select>
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
        document.getElementById('createDaftarProdukForm').addEventListener('submit', function(e) {
            // Contoh validasi dasar: memastikan produk tidak kosong
            if (document.getElementById('produk_id').value.trim() === '') {
                alert('Kode Produk wajib dipilih!');
                e.preventDefault();
                return false;
            }

            // Contoh validasi dasar: memastikan kategori produk tidak kosong
            if (document.getElementById('kategori_produk_id').value.trim() === '') {
                alert('Kode Kategori Produk wajib dipilih!');
                e.preventDefault();
                return false;
            }

        });

        console.log("Form Create Pengerajin loaded");
    </script>
@stop
