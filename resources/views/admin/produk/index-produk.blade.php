@extends('adminlte::page')

@section('title', 'Produk')

@section('content_header')
    <h1>Data Produk</h1>
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

<a href="{{ route('admin.produk-create') }}" class="btn btn-success">+ Tambah Produk</a>

<table>
    <thead>
        <tr>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produks as $produk)
            <tr>
                <td>{{ $produk->kode_produk }}</td>
                <td>{{ $produk->nama_produk }}</td>
                <td>{{ $produk->deskripsi }}</td>
                <td>{{ number_format($produk->harga, 2, ',', '.') }}</td>
                <td>{{ $produk->stok }}</td>
                <td>
                    <a href="{{ route('admin.produk-edit', $produk->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.produk-destroy', $produk->id) }}" method="POST" style="display:inline;">
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
    <script> console.log("Produk loaded"); </script>
@stop
