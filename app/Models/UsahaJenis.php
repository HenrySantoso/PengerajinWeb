<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsahaJenis extends Model
{
    protected $table = 'usaha_jenis';
    public $incrementing = false; // Karena primary key bukan angka auto-increment
    protected $primaryKey = null; // Tidak ada satu primary key tunggal
    protected $keyType = 'string'; // Tipe data kunci gabungan (string atau integer, sesuaikan)

    protected $fillable = [
        'usaha_id',
        'jenis_usaha_id',
    ];

    public $timestamps = true; // Karena di migrasi ada timestamps (created_at, updated_at)

    // Relasi ke Usaha
    public function usaha()
    {
        return $this->belongsTo(Usaha::class, 'usaha_id');
    }

    // Relasi ke JenisUsaha
    public function jenisUsaha()
    {
        return $this->belongsTo(JenisUsaha::class, 'jenis_usaha_id');
    }
}
