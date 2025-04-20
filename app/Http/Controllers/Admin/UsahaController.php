<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usaha;
use App\Models\JenisUsaha;
use App\Models\Pengerajin;
use Illuminate\Http\Request;

class UsahaController extends Controller
{
    public function index()
    {
        $dataUsaha = Usaha::all(); // atau bisa juga pakai paginate()

        return view('admin.usaha.index-usaha', [
            'usahas' => $dataUsaha
        ]);
    }

    public function create()
    {
        $dataPengerajin = Pengerajin::all();
        $dataJenisUsaha = JenisUsaha::all();
        return view('admin.usaha.create-usaha', [
            'pengerajins' => $dataPengerajin,
            'jenisUsahas' => $dataJenisUsaha
        ]);
    }

    public function edit($id)
    {
        $dataPengerajin = Pengerajin::all();
        $dataJenisUsaha = JenisUsaha::all();
        $usaha = Usaha::findOrFail($id);
        // Ambil data jenis usaha berdasarkan ID
        // Kirim data ke view
        return view('admin.usaha.edit-usaha', [
            'usaha' => $usaha,
            'pengerajins' => $dataPengerajin,
            'jenisUsahas' => $dataJenisUsaha
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_usaha' => 'required|string|max:255',
            'pengerajin_id' => 'required|exists:pengerajin,id',
            'jenis_usaha_id' => 'required|exists:jenis_usaha,id',
            'nama_usaha' => 'required|string|max:255',
            'deskripsi_usaha' => 'nullable|string',
        ]);

        Usaha::create($request->all());

        return redirect()->route('admin.usaha-index')
            ->with('success', 'Usaha berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kode_usaha' => 'required|string|max:255',
            'pengerajin_id' => 'required|exists:pengerajin,id',
            'jenis_usaha_id' => 'required|exists:jenis_usaha,id',
            'nama_usaha' => 'required|string|max:255',
            'deskripsi_usaha' => 'nullable|string',
        ]);

        $usaha = Usaha::findOrFail($id);
        $usaha->update($data);

        return redirect()->route('admin.usaha-index')
            ->with('success', 'Usaha berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $usaha = Usaha::findOrFail($id);
        $usaha->delete();

        return redirect()->route('admin.usaha-index')
            ->with('success', 'Usaha berhasil dihapus.');
    }
}
