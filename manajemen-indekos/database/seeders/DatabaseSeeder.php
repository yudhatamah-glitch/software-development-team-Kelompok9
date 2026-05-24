<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Kamar;
use App\Models\Penghuni;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        User::create([
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'role'     => 'admin',
        ]);

        /*
        |--------------------------------------------------------------------------
        | KAMAR 1
        |--------------------------------------------------------------------------
        */

        $kamar1 = Kamar::create([
            'nomor_kamar' => 'A1',
            'harga'       => 500000,
            'status'      => 'terisi',
            'panjang'     => 3,
            'lebar'       => 3,
            'tinggi'      => 3,
            'deskripsi'   => 'Kamar nyaman dan bersih'
        ]);

        /*
        |--------------------------------------------------------------------------
        | KAMAR 2
        |--------------------------------------------------------------------------
        */

        $kamar2 = Kamar::create([
            'nomor_kamar' => 'A2',
            'harga'       => 650000,
            'status'      => 'kosong',
            'panjang'     => 4,
            'lebar'       => 3,
            'tinggi'      => 3,
            'deskripsi'   => 'Kamar luas dekat jendela'
        ]);

        /*
        |--------------------------------------------------------------------------
        | PENGHUNI
        |--------------------------------------------------------------------------
        */

        $penghuni = Penghuni::create([
            'nama'      => 'Budi',
            'no_hp'  => '08123456789',
            'kamar_id'  => $kamar1->id
        ]);

        /*
        |--------------------------------------------------------------------------
        | USER PENGHUNI
        |--------------------------------------------------------------------------
        */

        User::create([
            'username'    => 'budi',
            'password'    => Hash::make('123456'),
            'role'        => 'penghuni',
            'penghuni_id' => $penghuni->id
        ]);
    }
}