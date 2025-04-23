<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UsahaJenis;
use App\Models\Produk;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class UsahaJenisController extends Controller
{
    public function index()
    {
        $usahaJenis = UsahaJenis::all();
        return view('admin.usaha_jenis.index', compact('usahaJenis'));
    }

    public function create()
    {
        return view('admin.usaha_jenis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_usaha_jenis' => 'required|unique:usaha_jenis,kode_usaha_jenis',
            'nama_usaha_jenis' => 'required',
        ]);

        UsahaJenis::create($request->all());
        return redirect()->route('usaha-jenis.index')->with('success', 'Usaha Jenis created successfully.');
    }

    public function edit(UsahaJenis $usahaJenis)
    {
        return view('admin.usaha_jenis.edit', compact('usahaJenis'));
    }

    public function update(Request $request, UsahaJenis $usahaJenis)
    {
        $request->validate([
            'kode_usaha_jenis' => 'required|unique:usaha_jenis,kode_usaha_jenis,' . $usahaJenis->id,
            'nama_usaha_jenis' => 'required',
        ]);

        $usahaJenis->update($request->all());
        return redirect()->route('usaha-jenis.index')->with('success', 'Usaha Jenis updated successfully.');
    }

    public function destroy(UsahaJenis $usahaJenis)
    {
        $usahaJenis->delete();
        return redirect()->route('usaha-jenis.index')->with('success', 'Usaha Jenis deleted successfully.');
    }
}
