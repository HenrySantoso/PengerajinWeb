@extends('adminlte::page')

@section('title', 'Foto Produk')

@section('content_header')
    <h1>Data Foto Produk</h1>
@stop

@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
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

    <a href="{{ route('admin.foto_produk-create') }}" class="btn btn-success">+ Tambah Foto Produk</a>

    <table>
        <thead>
            <tr>
                <th>Kode Foto Produk</th>
                <th>Nama Produk</th>
                <th>Foto Produk</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fotoProduks as $fotoProduk)
                <tr>
                    <td>{{ $fotoProduk->kode_foto_produk }}</td>
                    <td>{{ $fotoProduk->produk->nama_produk }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $fotoProduk->file_foto_produk) }}" alt="Foto Produk"
                            style="width: 100px; height: auto;">
                    <td>
                        <a href="{{ route('admin.foto_produk-edit', $fotoProduk->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.foto_produk-destroy', $fotoProduk->id) }}" method="POST"
                            style="display:inline;">
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
    <script>
        console.log("Foto Produk loaded");
    </script>
@stop
