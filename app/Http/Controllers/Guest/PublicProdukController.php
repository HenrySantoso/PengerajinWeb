<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class PublicProdukController extends Controller
{
    public function byCategory($slug)
    {
        // Ambil kategori berdasarkan slug
        $category = KategoriProduk::where('slug', $slug)->firstOrFail();

        // Ambil produk terkait kategori
        $products = $category->products;

        // Kirim data ke view
        return view('products.by-category', compact('category', 'products'));
    }
}
