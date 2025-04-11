<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengerajin extends Model
{
    protected $table = 'pengerajin';
    protected $fillable = [
        'nama_pengerajin',
        'alamat',
        'no_telp',
        'email'
        // 'usaha_id',
        // 'produk_id',
    ];

    // public function usaha()
    // {
    //     return $this->belongsTo(Usaha::class);
    // }

    // public function produk()
    // {
    //     return $this->belongsTo(Produk::class);
    // }
}
