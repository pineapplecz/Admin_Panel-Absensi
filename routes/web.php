<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
// Redirect ke dashboard
Route::get('/', function () {
    return view('welcome');
});



// ✅ Gunakan controller untuk dashboard agar variabel dikirim
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Group route yang hanya bisa diakses oleh user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::resource('jabatans', JabatanController::class);
    Route::resource('absensis', AbsensiController::class);
    Route::resource('cutis', CutiController::class);
    Route::resource('pegawais', PegawaiController::class);
    Route::get('/profile/edit', function () {
        return view('profile.edit');
    })->name('profile.edit');
});

use App\Http\Controllers\UserAbsensiController;

Route::middleware(['auth'])->group(function () {
    Route::get('/absen', [UserAbsensiController::class, 'index'])->name('absen.index');
    Route::post('/absen', [UserAbsensiController::class, 'store'])->name('absen.store');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::post('/cuti-izin', [CutiController::class, 'storeFromDashboard'])->name('cuti.izin.store');
});
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
});
// Autentikasi (Laravel Breeze)
require __DIR__.'/auth.php';
