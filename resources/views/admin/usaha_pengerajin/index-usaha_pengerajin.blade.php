@extends('adminlte::page')

@section('title', 'Usaha Jenis - Admin')

@section('content_header')
    <h1>Data Usaha - Pengerajin</h1>
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

<a href="{{ route('admin.usaha_pengerajin-create') }}" class="btn btn-success">+ Tambah Usaha Pengerajin</a>

<table>
    <thead>
        <tr>
            <th>Nama Usaha</th>
            <th>Nama Pengerajin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usahaPengerajins as $usahaPengerajin)
            <tr>
                <td>{{ $usahaPengerajin->usaha->nama_usaha }}</td>
                <td>{{ $usahaPengerajin->pengerajin->nama_pengerajin }}</td>
                <td>
                    <a href="{{ route('admin.usaha_pengerajin-edit', $usahaPengerajin->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.usaha_pengerajin-destroy', $usahaPengerajin->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        @if($usahaPengerajins->isEmpty())
            <tr>
                <td colspan="3" style="text-align: center;">Tidak ada data usaha jenis.</td>
            </tr>
        @endif
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
