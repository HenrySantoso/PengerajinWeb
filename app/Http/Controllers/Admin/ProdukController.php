<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $dataProduk = Produk::all(); // atau bisa juga pakai paginate()

        return view('admin.produk', [
            'produks' => $dataProduk
        ]);
    }

    public function create()
    {
        return view('admin.produk-create');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk-edit', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload file dan simpan nama/path-nya
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/gambar_produk'), $namaFile); // Simpan ke folder public/uploads/produk

            // Simpan data produk ke database
            Produk::create([
                'nama_produk' => $request->nama_produk,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'gambar' => $namaFile, // simpan nama file-nya saja
            ]);
        }

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            $oldImage = public_path('storage/gambar_produk/' . $produk->gambar);
            if ($produk->gambar && file_exists($oldImage)) {
                unlink($oldImage);
            }

            // Simpan gambar baru ke public/storage/gambar_produk
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/gambar_produk'), $namaFile);
            $produk->gambar = $namaFile;
        }

        $produk->save();

        return redirect()->route('admin.produk')->with('success', 'Data produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Cek jika produk memiliki gambar dan gambar tersebut ada di folder public/storage/gambar_produk
        if ($produk->gambar) {
            $gambarPath = public_path('storage/gambar_produk/' . $produk->gambar);
            // Jika gambar ada, hapus file tersebut
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        // Hapus data produk dari database
        $produk->delete();

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus.');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk-show', compact('produk'));
    }
}
