<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $dataProduk = Produk::all(); // atau bisa juga pakai paginate()

        return view('admin.produk.index-produk', [
            'produks' => $dataProduk
        ]);
    }

    public function create()
    {
        return view('admin.produk.create-produk');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit-produk', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required|string',
            'nama_produk' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        // Simpan data produk ke database
        Produk::create($request->all());

        return redirect()->route('admin.produk-index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kode_produk' => 'required|string',
            'nama_produk' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        // Update data produk di database
        Produk::where('id', $id)->update($data);

        return redirect()->route('admin.produk-index')
            ->with('success', 'Data Produk berhasil diupdate.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('admin.produk-index')
            ->with('success', 'Data Produk berhasil dihapus.');
    }
}
