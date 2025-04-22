{{-- resources/views/admin/produk-edit.blade.php --}}
@extends('adminlte::page')

@section('title', 'Edit Data Daftar Produk')

@section('content_header')
    <h1>Edit Data Daftar Produk</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('admin.daftar_produk-update', $daftarProduk->id) }}" method="POST" id="editDaftarProdukForm">
            @csrf
            @method('PUT')
            <!-- Kode Produk -->
            <div class="form-group mb-3">
                <label for="produk_id">Kode Produk</label>
                <select class="form-control" id="produk_id" name="produk_id" required>
                    <option value="">Pilih Kode Produk</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}" {{ $daftarProduk->produk_id == $produk->id ? 'selected' : '' }}>
                            {{ $produk->kode_produk }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Kode Kategori Produk -->
            <div class="form-group mb-3">
                <label for="kategori_produk_id">Kode Kategori Produk</label>
                <select class="form-control" id="kategori_produk_id" name="kategori_produk_id" required>
                    <option value="">Pilih Kode Kategori Produk</option>
                    @foreach ($kategoriProduks as $kategoriProduk)
                        <option value="{{ $kategoriProduk->id }}" {{ $daftarProduk->kategori_produk_id == $kategoriProduk->id ? 'selected' : '' }}>
                            {{ $kategoriProduk->kode_kategori_produk }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Update Data</button>
            <a href="{{ route('admin.daftar_produk-index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@stop

@section('css')
    <!-- Custom CSS jika diperlukan -->
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script>
        // Contoh validasi sederhana sebelum submit
        document.getElementById('editDaftarProdukForm').addEventListener('submit', function(e) {
            const produk = document.getElementById('produk_id').value.trim();
            if (!produk) {
                alert('Kode Produk tidak boleh kosong!');
                e.preventDefault();
            }

            const kategori = document.getElementById('kategori_produk_id').value.trim();
            if (!kategori) {
                alert('Kode Kategori Produk tidak boleh kosong!');
                e.preventDefault();
            }
        });
        console.log("Form Edit Daftar Produk loaded");
    </script>
@stop
