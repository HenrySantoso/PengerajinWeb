<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usaha;
use Illuminate\Http\Request;

class UsahaController extends Controller
{
    public function index()
    {
        $dataUsaha = Usaha::all(); // atau bisa juga pakai paginate()

        return view('admin.usaha.index-usaha', [
            'usahas' => $dataUsaha
        ]);
    }

    public function create()
    {
        return view('admin.usaha.create-usaha');
    }

    public function edit($id)
    {
        $usaha = Usaha::findOrFail($id);
        return view('admin.usaha.edit-usaha', compact('usaha'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string',
            'jenis_usaha' => 'required|string',
        ]);

        Usaha::create($request->all());

        return redirect()->route('admin.usaha-index')->with('success', 'Usaha berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_usaha' => 'required|string',
            'jenis_usaha' => 'required|string',
        ]);

        $usaha = Usaha::findOrFail($id);
        $usaha->update($request->all());

        return redirect()->route('admin.usaha-index')->with('success', 'Usaha berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $usaha = Usaha::findOrFail($id);
        $usaha->delete();

        return redirect()->route('admin.usaha-index')->with('success', 'Usaha berhasil dihapus.');
    }

    public function show($id)
    {
        $usaha = Usaha::findOrFail($id);
        return view('admin.usaha.show', compact('usaha'));
    }
}
