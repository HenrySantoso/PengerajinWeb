{{-- resources/views/admin/pengerajin-edit.blade.php --}}
@extends('adminlte::page')

@section('title', 'Edit Data Pengerajin')

@section('content_header')
    <h1>Edit Data Pengerajin</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('admin.pengerajin-update', $pengerajin->id) }}" method="POST" id="editPengerajinForm">
            @csrf
            @method('PUT')
            <!-- Kode Pengerajin -->
            <div class="form-group">
                <label for="kode_pengerajin">Kode Pengerajin</label>
                <input type="text" class="form-control" id="kode_pengerajin" name="kode_pengerajin"
                    value="{{ old('kode_pengerajin', $pengerajin->kode_pengerajin) }}" required>
            </div>

            <!-- Nama Pengerajin -->
            <div class="form-group mb-3">
                <label for="nama_pengerajin">Nama Pengerajin</label>
                <input type="text" class="form-control" id="nama_pengerajin" name="nama_pengerajin"
                    value="{{ old('nama_pengerajin', $pengerajin->nama_pengerajin) }}" required>
            </div>

            <!-- Alamat -->
            <div class="form-group mb-3">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $pengerajin->alamat) }}</textarea>
            </div>

            <!-- Email -->
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $pengerajin->email) }}" required>
            </div>

            <!-- No Telepon -->
            <div class="form-group mb-3">
                <label for="no_telp">No Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp"
                    value="{{ old('no_telp', $pengerajin->no_telp) }}" required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Update Data</button>
            <a href="{{ route('admin.pengerajin-index') }}" class="btn btn-secondary">Batal</a>
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
        document.getElementById('editPengerajinForm').addEventListener('submit', function(e) {
            const nama = document.getElementById('nama_pengerajin').value.trim();
            if (!nama) {
                alert('Nama Pengerajin tidak boleh kosong!');
                e.preventDefault();
            }
        });
        console.log("Form Edit Pengerajin loaded");
    </script>
@stop
