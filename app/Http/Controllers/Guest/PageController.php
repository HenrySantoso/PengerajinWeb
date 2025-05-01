<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\FotoProduk;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $kategoris = KategoriProduk::all();
        $produks = Produk::with('kategoriProduk', 'fotoProduk')->get();
        return view('guest.pages.index', [
            'produks' => $produks,
            'kategoris' => $kategoris,
        ]);
    }

    public function productsByCategory($slug)
    {
        $kategoris = KategoriProduk::all();
        $kategori = KategoriProduk::where('slug', $slug)->firstOrFail();
        $produks = Produk::where('kategori_produk_id', $kategori->id)->get();

        return view('guest.pages.products', [
            'kategori' => $kategori,
            'produks' => $produks,
            'kategoris' => $kategoris,
        ]);
    }

    public function singleProduct($slug)
    {
        $kategoris = KategoriProduk::all();
        $produk = Produk::where('slug', $slug)->firstOrFail();
        return view('guest.pages.single-product',[
            'produk' => $produk,
            'kategoris' => $kategoris,
        ]);
    }

    public function about()
    {
        $kategoris = KategoriProduk::all();
        return view('guest.pages.about', compact('kategoris'));
    }
    public function contact()
    {
        $kategoris = KategoriProduk::all();
        return view('guest.pages.contact', compact('kategoris'));
    }
}
