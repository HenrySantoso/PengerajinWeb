<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = [
        'kode_produk',
        'kategori_produk_id',
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
    ];
    public function kategoriProduk()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_produk_id');
    }

    public function fotoProduk()
    {
        return $this->hasMany(FotoProduk::class, 'produk_id');
    }
}
