@extends('adminlte::page')

@section('title', 'Usaha Jenis - Admin')

@section('content_header')
    <h1>Data Usaha - Jenis</h1>
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

<a href="{{ route('admin.usaha_jenis-create') }}" class="btn btn-success">+ Tambah Usaha Jenis</a>

<table>
    <thead>
        <tr>
            <th>Nama Usaha</th>
            <th>Jenis Usaha</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usahaJeniss as $usahaJenis)
            <tr>
                <td>{{ $usahaJenis->usaha->nama_usaha }}</td>
                <td>{{ $usahaJenis->jenisUsaha->nama_jenis_usaha}}</td>
                <td>
                    <a href="{{ route('admin.usaha_jenis-edit', $usahaJenis->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.usaha_jenis-destroy', $usahaJenis->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        @if($usahaJeniss->isEmpty())
            <tr>
                <td colspan="3" class="text-center">Tidak ada data usaha jenis</td>
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
