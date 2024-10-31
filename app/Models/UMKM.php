<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    protected $fillable = [
        'name',
        'nama_umkm',
        'kategori',
        'alamat_umkm',
        'no_telp',
    ];
}