@extends('adminlte::page')

@section('title', 'Usaha')

@section('content_header')
    <h1>Data Usaha</h1>
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

<a href="{{ route('admin.usaha-create') }}" class="btn btn-success">+ Tambah Usaha</a>

<table>
    <thead>
        <tr>
            <th>Nama Usaha</th>
            <th>Jenis Usaha</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usahas as $usaha)
            <tr>
                <td>{{ $usaha->nama_usaha }}</td>
                <td>{{ $usaha->jenis_usaha }}</td>
                <td>
                    <a href="{{ route('admin.usaha-edit', $usaha->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.usaha-destroy', $usaha->id) }}" method="POST" style="display:inline;">
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
