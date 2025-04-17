<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FotoProdukController extends Controller
{
    public function index()
    {
        return view('admin.foto-produk.index-foto-produk');
    }

    public function create()
    {
        return view('admin.foto-produk.create-foto-produk');
    }

    public function edit($id)
    {
        return view('admin.foto-produk.edit-foto-produk', compact('id'));
    }
}
