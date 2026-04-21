<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // 👉 MASUK KE PROJECT KAMU
        return redirect('/');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah',
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
    return view('dashboard');
});

Route::get('/barang', function () {
    return view('barang');
});

Route::get('/tambah', function () {
    return view('tambah_barang');
});

Route::get('/riwayat', function () {
    return view('riwayat');
});

Route::get('/penghuni', function () {
    return view('penghuni');
});

Route::get('/tambah-penghuni', function () {
    return view('tambah_penghuni');
});

Route::get('/pembayaran', function () {
    return view('pembayaran');
});
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->regenerateToken();

    return redirect('/login');
});