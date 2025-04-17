<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisUsaha; // Pastikan model JenisUsaha sudah dibuat

class JenisUsahaController extends Controller
{
    public function index()
    {
        return view('admin.jenis_usaha.index-jenis-usaha');
    }

    public function create()
    {
        return view('admin.jenis_usaha.create-jenis-usaha');
    }

    public function edit($id)
    {
        return view('admin.jenis_usaha.edit-jenis-usaha', compact('id'));
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data jenis usaha
        $request->validate([
            'kode_jenis_usaha' => 'required|string|max:255',
            'nama_jenis_usaha' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        JenisUsaha::create($request->all());

        return redirect()->route('admin.jenis_usaha-index')->with('success', 'Jenis Usaha berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data jenis usaha
        $request->validate([
            'kode_jenis_usaha' => 'required|string|max:255',
            'nama_jenis_usaha' => 'required|string|max:255',
        ]);

        // Update data ke database
        JenisUsaha::where('id', $id)->update($request->all());

        return redirect()->route('admin.jenis_usaha-index')->with('success', 'Jenis Usaha berhasil diupdate.');
    }

    public function destroy($id)
    {
        // Hapus data jenis usaha
        JenisUsaha::destroy($id);

        return redirect()->route('admin.jenis_usaha-index')->with('success', 'Jenis Usaha berhasil dihapus.');
    }
}
