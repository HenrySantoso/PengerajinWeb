@extends('adminlte::page')

@section('title', 'Daftar Produk - Admin')

@section('content_header')
    <h1>Data Daftar Produk</h1>
@stop

@section('content')
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #eef;
    }
</style>

<a href="{{ route('admin.daftar_produk-create') }}" class="btn btn-success">+ Tambah Kategori Produk</a>

<table>
    <thead>
        <tr>
            <th>Kode Produk</th>
            <th>Kode Kategori Produk</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($daftarProduks as $daftarProduk)
            <tr>
                <td>{{ $daftarProduk->produk->kode_produk }}</td>
                <td>{{ $daftarProduk->kategoriProduk->kode_kategori_produk }}</td>
                <td>
                    <a href="{{ route('admin.daftar_produk-edit', $daftarProduk->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.daftar_produk-destroy', $daftarProduk->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <!-- Tambahkan custom CSS di sini jika perlu -->
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <!-- Tambahkan custom JS di sini jika perlu -->
    <script> console.log("Kategori Produk loaded"); </script>
@stop
