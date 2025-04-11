<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $dataProduk = Produk::all(); // atau bisa juga pakai paginate()

        return view('admin.produk', [
            'produks' => $dataProduk
        ]);
    }

    public function create()
    {
        return view('admin.produk-create');
    }

    public function edit($id)
    {
        return view('admin.produk-edit', compact('id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Produk::create($request->all());

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus.');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk-show', compact('produk'));
    }
}
