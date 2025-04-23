@extends('adminlte::page')

@section('title', 'Create Data Pengerajin')

@section('content_header')
    <h1>Create Data Pengerajin</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('admin.pengerajin-store') }}" method="POST" id="createPengerajinForm">
        @csrf
        <!-- Kode Pengerajin -->
        <div class="form-group">
            <label for="kode_pengerajin">Kode Pengerajin</label>
            <input type="text" class="form-control" id="kode_pengerajin" name="kode_pengerajin" placeholder="Masukkan Kode Pengerajin" required>
        </div>

        <!-- Nama Pengerajin -->
        <div class="mb-3">
            <label for="nama_pengerajin" class="form-label">Nama Pengerajin</label>
            <input type="text" class="form-control" id="nama_pengerajin" name="nama_pengerajin" placeholder="Masukkan Nama Pengerajin" required>
        </div>

        <!-- Alamat -->
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat" required></textarea>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
        </div>

        <!-- No Telepon -->
        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telepon" required>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="{{ route('admin.pengerajin-index') }}" class="btn btn-secondary">Batal</a>
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
        document.getElementById('createPengerajinForm').addEventListener('submit', function(e) {
            // Contoh validasi dasar: memastikan nama tidak kosong
            const nama = document.getElementById('nama_pengerajin').value.trim();
            if (nama === '') {
                alert('Nama Pengerajin wajib diisi!');
                e.preventDefault();
                return false;
            }
            // Validasi lainnya bisa ditambahkan di sini jika diperlukan
        });

        console.log("Form Create Pengerajin loaded");
    </script>
@stop
