<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsahaPengerajin extends Model
{
    protected $table = 'usaha_pengerajin';
    protected $fillable = [
        'usaha_id',
        'pengerajin_id',
    ];

    public function usaha()
    {
        return $this->belongsTo(Usaha::class, 'usaha_id');
    }

    public function pengerajin()
    {
        return $this->belongsTo(Pengerajin::class, 'pengerajin_id');
    }
}
