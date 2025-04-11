<?php

namespace App\Http\Controllers\Admin;
use App\Models\Pengerajin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengerajinController extends Controller
{
    public function index()
    {
        $dataPengerajin = Pengerajin::all(); // atau bisa juga pakai paginate()

        return view('admin.pengerajin', [
            'pengerajins' => $dataPengerajin
        ]);
    }

    public function createPengerajin()
    {
        return view('admin.pengerajin-create');
    }

    public function editPengerajin($id)
    {
        return view('admin.pengerajin-edit', compact('id'));
    }

    public function storePengerajin(Request $request)
    {
        $request->validate([
            'nama_pengerajin' => 'required|string|max:255',
            'alamat' => 'required|string',
            'email' => 'required|string',
            'no_telp' => 'required|string',
        ]);

        Pengerajin::create($request->all());

        return redirect()->route('admin.pengerajin')->with('success', 'Pengerajin berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $pengerajin = Pengerajin::findOrFail($id);
        $pengerajin->update($request->all());

        return redirect()->route('admin.pengerajin')->with('success', 'Pengerajin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengerajin = Pengerajin::findOrFail($id);
        $pengerajin->delete();

        return redirect()->route('admin.pengerajin')->with('success', 'Pengerajin berhasil dihapus.');
    }

    public function show($id)
    {
        $pengerajin = Pengerajin::findOrFail($id);
        return view('admin.pengerajin-show', compact('pengerajin'));
    }
}
