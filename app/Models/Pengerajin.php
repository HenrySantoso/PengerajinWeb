<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengerajin extends Model
{
    protected $table = 'pengerajin';
    protected $fillable = [
        'kode_pengerajin',
        'nama_pengerajin',
        'alamat',
        'no_telp',
        'email'
    ];

    public function usaha()
    {
        return $this->hasMany(Usaha::class, 'pengerajin_id');
    }
}
