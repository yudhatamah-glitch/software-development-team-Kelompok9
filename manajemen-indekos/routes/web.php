<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\LaporBarangController;

/*
|--------------------------------------------------------------------------
| HALAMAN PENGUNJUNG
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        if (Auth::user()->role == 'admin') {
            return redirect('/admin');
        }

        return redirect('/penghuni/dashboard');
    }

    return back()->withErrors([
        'username' => 'username atau password salah',
    ]);
});

/*
|--------------------------------------------------------------------------
| HALAMAN ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    // Barang — tab tambah & laporan rusak
    Route::get('/barang', function () {
        return view('admin.barang');
    });
    Route::post('/tambah', function () {
        // backend isi nanti
    });
    Route::patch('/barang/selesai/{id}', [BarangController::class, 'selesai']);

    // Kamar
    Route::get('/kamar', function () {
        return view('admin.kamar');
    });

    // Penghuni
    Route::get('/penghuni', function () {
        return view('admin.penghuni');
    });
    Route::get('/tambah_penghuni', function () {
        return view('admin.tambah_penghuni');
    });

    // Pembayaran
    Route::get('/pembayaran',        [PembayaranController::class, 'index']);
    Route::get('/pembayaran/tambah', [PembayaranController::class, 'create']);
    Route::post('/pembayaran/simpan',[PembayaranController::class, 'store']);

});

/*
|--------------------------------------------------------------------------
| HALAMAN PENGHUNI
|--------------------------------------------------------------------------
*/
Route::prefix('penghuni')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        $user = Auth::user();
        session([
            'nama'     => $user->nama ?? 'Penghuni',
            'kamar_id' => $user->kamar_id ?? 1,
        ]);
        return view('penghuni.dashboard');
    })->name('penghuni.dashboard');

    // Lapor barang rusak (ganti tambah-barang)
    Route::get('/lapor-barang',  [LaporBarangController::class, 'create'])->name('penghuni.lapor_barang');
    Route::post('/lapor-barang', [LaporBarangController::class, 'store'])->name('penghuni.lapor_barang.store');

});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');