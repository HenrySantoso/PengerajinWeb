<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarProduk;
use App\Models\Produk;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class DaftarProdukController extends Controller
{
    public function index()
    {
        return view('admin.daftar_produk.index-daftar_produk', [
            'daftarProduks' => DaftarProduk::all()
        ]);
    }

    public function create()
    {
        $produks = Produk::all();
        $kategoriProduks = KategoriProduk::all();
        return view('admin.daftar_produk.create-daftar_produk', [
            'produks' => $produks,
            'kategoriProduks' => $kategoriProduks
        ]);
    }

    public function edit($id)
    {
        $daftarProduk = DaftarProduk::findOrFail($id);
        $produks = Produk::all();
        $kategoriProduks = KategoriProduk::all();
        return view('admin.daftar_produk.edit-daftar_produk', [
            'daftarProduk' => $daftarProduk,
            'produks' => $produks,
            'kategoriProduks' => $kategoriProduks
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'kategori_produk_id' => 'required|exists:kategori_produk,id',
        ]);

        DaftarProduk::create($request->all());

        return redirect()->route('admin.daftar_produk-index')
            ->with('success', 'Daftar Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'kategori_produk_id' => 'required|exists:kategori_produk,id',
        ]);

        DaftarProduk::where('id', $id)->update($data);

        return redirect()->route('admin.daftar_produk-index')
            ->with('success', 'Data Daftar Produk berhasil diupdate.');
    }

    public function destroy($id)
    {
        DaftarProduk::destroy($id);

        return redirect()->route('admin.daftar_produk-index')
            ->with('success', 'Data Daftar Produk berhasil dihapus.');
    }
}
