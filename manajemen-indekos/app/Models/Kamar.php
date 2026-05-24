<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';

    protected $fillable = [
        'nomor_kamar',
        'harga',
        'deskripsi',
        'status',
        'panjang',
        'lebar',
        'tinggi'
    ];

    // RELASI

    public function penghuni()
    {
        return $this->hasMany(Penghuni::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function fotos()
    {
        return $this->hasMany(FotoKamar::class);
    }
}
