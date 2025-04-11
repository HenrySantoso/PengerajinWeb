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

        return view('admin.usaha', [
            'usahas' => $dataUsaha
        ]);
    }

    public function createUsaha()
    {
        return view('admin.usaha-create');
    }

    public function edit($id)
    {
        return view('admin.usaha.edit', compact('id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'owner' => 'required|string',
        ]);

        Usaha::create($request->all());

        return redirect()->route('admin.usaha')->with('success', 'Usaha berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'owner' => 'required|string',
        ]);

        $usaha = Usaha::findOrFail($id);
        $usaha->update($request->all());

        return redirect()->route('admin.usaha')->with('success', 'Usaha berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $usaha = Usaha::findOrFail($id);
        $usaha->delete();

        return redirect()->route('admin.usaha')->with('success', 'Usaha berhasil dihapus.');
    }

    public function show($id)
    {
        $usaha = Usaha::findOrFail($id);
        return view('admin.usaha.show', compact('usaha'));
    }
}
