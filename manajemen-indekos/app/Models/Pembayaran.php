<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'penghuni_id',
        'bulan',
        'tahun',
        'tagihan',
        'dibayar',
        'status',
        'tanggal_bayar',
        'jatuh_tempo'
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'jatuh_tempo' => 'date',
    ];

    // RELASI
    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }

    // 🔥 Helper (opsional tapi bagus)
    public function getSisaAttribute()
    {
        return $this->tagihan - $this->dibayar;
    }

    public function isLunas()
    {
        return $this->dibayar >= $this->tagihan;
    }
}