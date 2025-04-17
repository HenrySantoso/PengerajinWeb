<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public function index()
    {
        return view('admin.kategori-produk.index-kategori-produk');
    }
    public function create()
    {
        return view('admin.kategori-produk.create-kategori-produk');
    }
    public function edit($id)
    {
        return view('admin.kategori-produk.edit-kategori-produk', compact('id'));
    }
}
