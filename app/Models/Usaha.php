<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table = 'usaha';
    protected $fillable = [
        'kode_usaha',
        'nama_usaha',
        'deskripsi_usaha'
    ];
}
