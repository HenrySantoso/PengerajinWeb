<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    protected $table = 'kategori_produk';
    protected $fillable = [
        'kode_kategori_produk',
        'nama_kategori_produk',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategori_produk_id');
    }
}
