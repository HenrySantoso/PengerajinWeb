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
            'kode_usaha' => 'required|string|max:255',
            'nama_usaha' => 'required|string|max:255',
            'deskripsi_usaha' => 'nullable|string',
        ]);

        Usaha::create($request->all());

        return redirect()->route('admin.usaha-index')
            ->with('success', 'Usaha berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kode_usaha' => 'required|string|max:255',
            'nama_usaha' => 'required|string|max:255',
            'deskripsi_usaha' => 'nullable|string',
        ]);

        $usaha = Usaha::findOrFail($id);
        $usaha->update($data);

        return redirect()->route('admin.usaha-index')
            ->with('success', 'Usaha berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $usaha = Usaha::findOrFail($id);
        $usaha->delete();

        return redirect()->route('admin.usaha-index')
            ->with('success', 'Usaha berhasil dihapus.');
    }
}
