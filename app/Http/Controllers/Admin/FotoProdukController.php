<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\FotoProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoProdukController extends Controller
{
    public function index()
    {
        // Ambil semua data foto produk dari database
        $dataFotoProduk = FotoProduk::all(); // atau bisa juga pakai paginate()
        // Kirim data ke view
        return view('admin.foto_produk.index-foto_produk', [
            'fotoProduks' => $dataFotoProduk
        ]);
    }

    public function create()
    {
        // Ambil data produk dari database
        $dataProduk = Produk::all();
        // Kirim data ke view
        return view('admin.foto_produk.create-foto_produk', [
            'produks' => $dataProduk
        ]);
    }

    public function edit($id)
    {
        // Ambil data produk dari database
        $dataProduk = Produk::all();
        // Ambil data foto produk berdasarkan ID
        $fotoProduk = FotoProduk::findOrFail($id);
        // Kirim data ke view
        return view('admin.foto_produk.edit-foto_produk', [
            'fotoProduk' => $fotoProduk,
            'produks' => $dataProduk
        ]);
    }

    public function store(Request $request)
    {
        //dd('masuk store', $request->all());
        // Validasi input data
        $request->validate([
            'kode_foto_produk' => 'required|string|max:255|unique:foto_produk,kode_foto_produk',
            'produk_id' => 'required|exists:produk,id',
            'file_foto_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan data foto produk ke database
        if ($request->hasFile('file_foto_produk')) {
            $path = $request->file('file_foto_produk')->store('foto_produk', 'public');

            FotoProduk::create([
                'kode_foto_produk' => $request->kode_foto_produk,
                'produk_id' => $request->produk_id,
                'file_foto_produk' => $path,
            ]);

            return redirect()->route('admin.foto_produk-index')
                ->with('success', 'Foto produk berhasil disimpan.');
        } else {
            return back()
                ->with('error', 'File foto tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data foto produk
        $data = $request->validate([
            'kode_foto_produk' => 'required|string|max:255',
            'produk_id' => 'required|exists:produk,id',
            'file_foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cek apakah ada file foto produk yang diupload
        if ($request->hasFile('file_foto_produk')) {
            // Hapus foto produk lama jika ada
            $fotoProduk = FotoProduk::findOrFail($id);
            if ($fotoProduk->file_foto_produk) {
                Storage::disk('public')->delete($fotoProduk->file_foto_produk);
            }

            // Simpan foto produk baru
            $path = $request->file('file_foto_produk')->store('foto_produk', 'public');
            $data['file_foto_produk'] = $path;
        }
        // Jika tidak ada file foto produk baru, tetap gunakan yang lama
        else {
            $fotoProduk = FotoProduk::findOrFail($id);
            $data['file_foto_produk'] = $fotoProduk->file_foto_produk;
        }

        // Update data ke database
        FotoProduk::where('id', $id)->update($data);

        return redirect()->route('admin.foto_produk-index')
            ->with('success', 'Foto Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data foto produk berdasarkan ID
        $fotoProduk = FotoProduk::findOrFail($id);
        $fotoProduk->delete();

        return redirect()->route('admin.foto_produk-index')
            ->with('success', 'Foto Produk berhasil dihapus.');
    }
}
