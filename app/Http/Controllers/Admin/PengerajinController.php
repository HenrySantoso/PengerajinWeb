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
        $pengerajin = Pengerajin::findOrFail($id);
        return view('admin.pengerajin-edit', compact('pengerajin'));
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

    public function updatePengerajin(Request $request, $id)
    {
        $data = $request->validate([
            'nama_pengerajin' => 'required|string|max:255',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'no_telp' => 'required|string',
        ]);

        Pengerajin::where('id', $id)->update($data);

        return redirect()->route('admin.pengerajin')
            ->with('success', 'Data Pengerajin berhasil diupdate.');
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
