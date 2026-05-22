<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoKamar extends Model
{
    protected $table = 'foto_kamar';

    protected $fillable = [
        'kamar_id',
        'foto'
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}