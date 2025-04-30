<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function indexs()
    {
        $kategoris = KategoriProduk::all();
        $kategori = KategoriProduk::latest()->first();
        return view('index', compact('kategoris', 'kategori'));
    }

    public function index()
    {
        $kategoris = KategoriProduk::all();
        return view('guest.pages.index', compact('kategoris'));
    }

    public function productsByCategory($slug)
    {
        $kategoris = KategoriProduk::all();
        $kategori = KategoriProduk::where('slug', $slug)->firstOrFail();
        $produks = Produk::where('kategori_produk_id', $kategori->id)->get();

        return view('guest.pages.products', compact('kategori', 'produks', 'kategoris'));
    }

    public function singleProduct($slug)
    {
        $produk = Produk::where('slug', $slug)->firstOrFail();
        return view('guest.pages.single-product', compact('produk'));
    }

    public function about()
    {
        return view('guest.pages.about');
    }
    public function contact()
    {
        return view('guest.pages.contact');
    }
    public function products()
    {
        return view('guest.pages.products');
    }
}
