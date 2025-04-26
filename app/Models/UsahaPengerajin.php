<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsahaPengerajin extends Model
{
    protected $table = 'usaha_pengerajin';
    public $incrementing = false; // Karena primary key bukan angka auto-increment
    protected $primaryKey = null; // Tidak ada satu primary key tunggal
    protected $keyType = 'string'; // Tipe data kunci gabungan (string atau integer, sesuaikan)
    protected $fillable = [
        'usaha_id',
        'pengerajin_id',
    ];

    public $timestamps = true; // Karena di migrasi ada timestamps (created_at, updated_at)

    // Relasi ke Usaha
    public function usaha()
    {
        return $this->belongsTo(Usaha::class, 'usaha_id');
    }

    // Relasi ke Pengerajin
    public function pengerajin()
    {
        return $this->belongsTo(Pengerajin::class, 'pengerajin_id');
    }
}
