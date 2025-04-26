<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class PublicKategoriProdukController extends Controller
{
    public function tatah()
    {
        $kategoriProduks = KategoriProduk::all();
        return view('guest.kategori_produk.index', compact('kategoriProduks'));
    }

    public function show($slug)
    {
        $kategoriProduk = KategoriProduk::where('slug', $slug)->firstOrFail();
        return view('guest.kategori_produk.show', compact('kategoriProduk'));
    }
}
