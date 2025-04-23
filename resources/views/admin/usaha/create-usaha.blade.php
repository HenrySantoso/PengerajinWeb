@extends('adminlte::page')

@section('title', 'Create Data Pengerajin')

@section('content_header')
    <h1>Create Data Usaha</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('admin.usaha-store') }}" method="POST" id="createUsahaForm">
            @csrf
            <!-- Kode Usaha -->
            <div class="form-group">
                <label for="kode_usaha">Kode Usaha</label>
                <input type="text" class="form-control" id="kode_usaha" name="kode_usaha" placeholder="Masukkan Kode Usaha"
                    required>
            </div>

            <!-- Nama usaha -->
            <div class="mb-3">
                <label for="nama_usaha" class="form-label">Nama Usaha</label>
                <input type="text" class="form-control" id="nama_usaha" name="nama_usaha"
                    placeholder="Masukkan Nama Usaha" required>
            </div>

            <!-- Deskripsi Usaha -->
            <div class="mb-3">
                <label for="deskripsi_usaha" class="form-label">Deskripsi Usaha</label>
                <textarea class="form-control" id="deskripsi_usaha" name="deskripsi_usaha" rows="3"
                    placeholder="Masukkan Deskripsi Usaha" required></textarea>
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
            if (document.getElementById('kode_usaha').value.trim() === '') {
                alert('Kode Usaha wajib diisi!');
                e.preventDefault();
                return false;
            }
            if (document.getElementById('nama_usaha').value.trim() === '') {
                alert('Nama Usaha wajib diisi!');
                e.preventDefault();
                return false;
            }
            if (document.getElementById('deskripsi_usaha').value.trim() === '') {
                alert('Deskripsi Usaha wajib diisi!');
                e.preventDefault();
                return false;
            }
        });

        console.log("Form Create Usaha loaded");
    </script>
@stop
