@extends('adminlte::page')

@section('title', 'Create Data Usaha - Jenis Usaha')

@section('content_header')
    <h1>Create Data Usaha - Jenis Usaha</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('admin.usaha_jenis-store') }}" method="POST" id="createUsahaJenisForm">
        @csrf
        <!-- Nama Usaha -->
        <div class="form-group">
            <label for="usaha_id">Nama Usaha</label>
            <select class="form-control" id="usaha_id" name="usaha_id" required>
                <option value="">Pilih Usaha</option>
                @foreach ($usahas as $usaha)
                    <option value="{{ $usaha->id }}">{{ $usaha->nama_usaha }}</option>
                @endforeach
            </select>
        </div>

        <!-- Nama jenis_usaha -->
        <div class="form-group">
            <label for="jenis_usaha_id">Kode Jenis Usaha</label>
            <select class="form-control" id="jenis_usaha_id" name="jenis_usaha_id" required>
                <option value="">Pilih Kode jenis_usaha</option>
                @foreach ($jenisUsahas as $jenis_usaha)
                    <option value="{{ $jenis_usaha->id }}">{{ $jenis_usaha->nama_jenis_usaha }}</option>
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
        document.getElementById('createUsahaJenisForm">').addEventListener('submit', function(e) {
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
