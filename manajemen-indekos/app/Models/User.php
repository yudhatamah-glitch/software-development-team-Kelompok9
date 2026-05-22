<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'password',
        'role',
        'penghuni_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // 🔗 RELASI KE PENGHUNI
    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }

    // 🔥 HELPER ROLE
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isPenghuni()
    {
        return $this->role === 'penghuni';
    }
}