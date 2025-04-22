<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
    ];

    public function daftarProduk()
    {
        return $this->hasMany(DaftarProduk::class, 'produk_id');
    }

    public function fotoProduk()
    {
        return $this->hasMany(FotoProduk::class, 'foto_produk_id');
    }
}
