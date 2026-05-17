<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// 🔥 TAMBAHAN (buat dropdown)
Route::get('/login-admin', function () {
    return redirect('/login');
    
});

Route::get('/login-user', function () {
    return view('auth.login_user');
});
Route::post('/login-user', function (Request $request) {

    $phone = $request->input('phone');

    return redirect('/penghuni/dashboard')->with('success', 'Login berhasil sebagai penghuni');

});


Route::post('/login', function (Request $request) {

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect('/admin');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah',
    ]);
});


/*
|--------------------------------------------------------------------------
| HALAMAN ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::get('/barang', function () {
        return view('admin.barang');
    });

    Route::get('/tambah', function () {
        return view('admin.tambah_barang');
    });

    Route::get('/kamar', function () {
        return view('admin.kamar');
    });

    Route::get('/penghuni', function () {
        return view('admin.penghuni');
    });

    Route::get('/tambah-penghuni', function () {
        return view('admin.tambah_penghuni');
    });

    Route::get('/pembayaran', function () {
        return view('admin.pembayaran');
    });

});

/*
|--------------------------------------------------------------------------
| HALAMAN PENGHUNI
|--------------------------------------------------------------------------
*/
Route::prefix('penghuni')->group(function () {

    Route::get('/dashboard', function () {
        return view('penghuni.dashboard');
    });

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

    return redirect('/login');
});