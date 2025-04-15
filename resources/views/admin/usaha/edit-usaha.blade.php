{{-- resources/views/admin/usaha-edit.blade.php --}}
@extends('adminlte::page')

@section('title', 'Edit Data Usaha')

@section('content_header')
    <h1>Edit Data Usaha</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('admin.usaha-update', $usaha->id) }}" method="POST" id="editUsahaForm">
            @csrf
            @method('PUT')

            <!-- Nama usaha -->
            <div class="form-group mb-3">
                <label for="nama_usaha">Nama usaha</label>
                <input type="text" class="form-control" id="nama_usaha" name="nama_usaha"
                    value="{{ old('nama_usaha', $usaha->nama_usaha) }}" required>
            </div>

            <!-- Jenis Usaha -->
            <div class="form-group mb-3">
                <label for="jenis_usaha">Jenis Usaha</label>
                <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha"
                    value="{{ old('jenis_usaha', $usaha->jenis_usaha) }}" required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Update Data</button>
            <a href="{{ route('admin.usaha-index') }}" class="btn btn-secondary">Batal</a>
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
        document.getElementById('editUsahaForm').addEventListener('submit', function(e) {
            const nama = document.getElementById('nama_usaha').value.trim();
            if (!nama) {
                alert('Nama usaha tidak boleh kosong!');
                e.preventDefault();
            }
        });
        console.log("Form Edit Usaha loaded");
    </script>
@stop
