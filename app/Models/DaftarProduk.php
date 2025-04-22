<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarProduk extends Model
{
    protected $table = 'daftar_produk';
    protected $fillable = [
        'produk_id',
        'kategori_produk_id'
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
    public function kategoriProduk()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_produk_id');
    }
}
