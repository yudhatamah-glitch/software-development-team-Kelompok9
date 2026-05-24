<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    protected $table = 'pajak';

    protected $fillable = [
        'nama_pajak',
        'tipe',
        'nilai',
        'batas_bebas',
        'berlaku'
    ];

    // ambil pajak aktif
    public static function aktif()
    {
        return self::where('berlaku', 1)->first();
    }
}