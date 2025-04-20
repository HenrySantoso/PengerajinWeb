@extends('adminlte::page')

@section('title', 'Create Data Pengerajin')

@section('content_header')
    <h1>Create Data Usaha</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('admin.usaha-store') }}" method="POST" id="createUsahaForm">
            @csrf
            <!-- Kode Usaha -->
            <div class="form-group">
                <label for="kode_usaha">Kode Usaha</label>
                <input type="text" class="form-control" id="kode_usaha" name="kode_usaha" placeholder="Masukkan Kode Usaha"
                    required>
            </div>

            <!-- Pengerajin -->
            <div class="form-group">
                <label for="pengerajin_id">Nama Pengerajin</label>
                <select class="form-control" id="pengerajin_id" name="pengerajin_id" required>
                    <option value="">Pilih Nama Pengerajin</option>
                    @foreach ($pengerajins as $pengerajin)
                        <option value="{{ $pengerajin->id }}">{{ $pengerajin->nama_pengerajin }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Jenis Usaha -->
            <div class="form-group">
                <label for="jenis_usaha_id">Kode Jenis Usaha</label>
                <select class="form-control" id="jenis_usaha_id" name="jenis_usaha_id" required>
                    <option value="">Pilih Kode Jenis Usaha</option>
                    @foreach ($jenisUsahas as $jenisUsaha)
                        <option value="{{ $jenisUsaha->id }}">{{ $jenisUsaha->nama_jenis_usaha }}</option>
                    @endforeach
                </select>
            </div>
            {{--
            <!-- Jenis Usaha -->
            <div class="form-group">
                <label>Jenis Usaha</label>
                <div>
                    @foreach ($jenisUsahas as $jenisUsaha)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="jenis_usaha_id[]"
                                id="jenis_usaha_{{ $jenisUsaha->id }}" value="{{ $jenisUsaha->id }}"
                                {{ is_array(old('jenis_usaha_id')) && in_array($jenisUsaha->id, old('jenis_usaha_id')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="jenis_usaha_{{ $jenisUsaha->id }}">
                                {{ $jenisUsaha->nama_jenis_usaha }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div> --}}

            <!-- Nama usaha -->
            <div class="mb-3">
                <label for="nama_usaha" class="form-label">Nama Usaha</label>
                <input type="text" class="form-control" id="nama_usaha" name="nama_usaha"
                    placeholder="Masukkan Nama Usaha" required>
            </div>

            <!-- Deskripsi Usaha -->
            <div class="mb-3">
                <label for="deskripsi_usaha" class="form-label">Deskripsi Usaha</label>
                <textarea class="form-control" id="deskripsi_usaha" name="deskripsi_usaha" rows="3"
                    placeholder="Masukkan Deskripsi Usaha" required></textarea>
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
        document.getElementById('createUsahaForm').addEventListener('submit', function(e) {
            if (document.getElementById('kode_pengerajin').value == '') {
                alert('Kode Pengerajin wajib diisi!');
                e.preventDefault();
                return false;
            }
            if (document.getElementById('kode_jenis_usaha').value == '') {
                alert('Kode Jenis Usaha wajib diisi!');
                e.preventDefault();
                return false;
            }
            if (document.getElementById('kode_usaha').value.trim() === '') {
                alert('Kode Usaha wajib diisi!');
                e.preventDefault();
                return false;
            }
            if (document.getElementById('nama_usaha').value.trim() === '') {
                alert('Nama Usaha wajib diisi!');
                e.preventDefault();
                return false;
            }
            if (document.getElementById('jenis_usaha').value.trim() === '') {
                alert('Jenis Usaha wajib diisi!');
                e.preventDefault();
                return false;
            }
            if (document.getElementById('deskripsi_usaha').value.trim() === '') {
                alert('Deskripsi Usaha wajib diisi!');
                e.preventDefault();
                return false;
            }
        });

        console.log("Form Create Usaha loaded");
    </script>
@stop
