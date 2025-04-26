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

    <a href="{{ route('admin.usaha-create') }}" class="btn btn-success">+ Tambah Usaha</a>

    <table>
        <thead>
            <tr>
                <th>Kode Usaha</th>
                <th>Nama Usaha</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Link Gmap</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usahas as $usaha)
                <tr>
                    <td>{{ $usaha->kode_usaha }}</td>
                    <td>{{ $usaha->nama_usaha }}</td>
                    <td>{{ $usaha->telp_usaha }}</td>
                    <td>{{ $usaha->email_usaha }}</td>
                    <td>{{ $usaha->deskripsi_usaha }}</td>
                    <td>
                        @if ($usaha->foto_usaha)
                            <img src="{{ asset('storage/' . $usaha->foto_usaha) }}" alt="Foto Usaha"
                                style="width: 50px; height: auto;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $usaha->link_gmap_usaha }}</td>
                    <td>
                        @if ($usaha->status_usaha == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                        @elseif($usaha->status_usaha == 'nonaktif')
                            <span class="badge bg-secondary">Tidak Aktif</span>
                        @elseif($usaha->status_usaha == 'tutup')
                            <span class="badge bg-danger">Tutup</span>
                        @elseif($usaha->status_usaha == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif($usaha->status_usaha == 'dibekukan')
                            <span class="badge bg-info">Dibekukan</span>
                        @else
                            <span class="badge bg-dark">Unknown</span> <!-- kalau status tidak dikenali -->
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.usaha-edit', $usaha->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.usaha-destroy', $usaha->id) }}" method="POST"
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
        console.log("Pengerajin loaded");
    </script>
@stop
