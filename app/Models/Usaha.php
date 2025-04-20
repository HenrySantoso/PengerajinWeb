<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table = 'usaha';
    protected $fillable = [
        'jenis_usaha_id',
        'pengerajin_id',
        'kode_usaha',
        'nama_usaha',
        'deskripsi_usaha'
    ];

    public function jenisUsaha()
    {
        return $this->belongsTo(JenisUsaha::class, 'jenis_usaha_id');
    }
    public function pengerajin()
    {
        return $this->belongsTo(Pengerajin::class, 'pengerajin_id');
    }

}
