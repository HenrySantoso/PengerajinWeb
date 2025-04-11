@extends('adminlte::page')

@section('title', 'Pengerajin')

@section('content_header')
    <h1>Pengerajin</h1>
@stop

@section('content')
<style>
    .btn-tambah {
        display: inline-block;
        margin-bottom: 15px;
        padding: 8px 15px;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }

    .btn-tambah:hover {
        background-color: #218838;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
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

<a href="{{ route('admin.pengerajin-create') }}" class="btn btn-success">+ Tambah Pengerajin</a>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengerajins as $pengerajin)
            <tr>
                <td>{{ $pengerajin->nama_pengerajin }}</td>
                <td>{{ $pengerajin->alamat }}</td>
                <td>{{ $pengerajin->email }}</td>
                <td>{{ $pengerajin->no_telp }}</td>
                <td>
                    <a href="{{ route('admin.pengerajin-edit', $pengerajin->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.pengerajin-destroy', $pengerajin->id) }}" method="POST" style="display:inline;">
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
    <script> console.log("Pengerajin loaded"); </script>
@stop
