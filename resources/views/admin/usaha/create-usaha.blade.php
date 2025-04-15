@extends('adminlte::page')

@section('title', 'Create Data Pengerajin')

@section('content_header')
    <h1>Create Data Usaha</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('admin.usaha-store') }}" method="POST" id="createUsahaForm">
        @csrf
        <!-- Nama usaha -->
        <div class="mb-3">
            <label for="nama_usaha" class="form-label">Nama Usaha</label>
            <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Masukkan Nama Usaha" required>
        </div>

        <!-- Jenis Usaha-->
        <div class="mb-3">
            <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
            <input type="jenis_usaha" class="form-control" id="jenis_usaha" name="jenis_usaha" placeholder="Masukkan Jenis Usaha" required>
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
        document.getElementById('createUsahaForm').addEventListener('submit', function(e) {
            // Contoh validasi dasar: memastikan nama tidak kosong
            const nama = document.getElementById('nama_usaha').value.trim();
            if (nama === '') {
                alert('Nama Usaha wajib diisi!');
                e.preventDefault();
                return false;
            }
            // Validasi lainnya bisa ditambahkan di sini jika diperlukan
        });

        console.log("Form Create Usaha loaded");
    </script>
@stop
