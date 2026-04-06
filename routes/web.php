<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController; // ✅ BENAR

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::resource('guru', GuruController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('admin', AdminController::class);

    // ✅ LOGOUT (WAJIB POST)
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    
        Route::get('/logout', function () {
    return redirect('/dashboard');
});

});

// ✅ WAJIB (LOGIN, REGISTER DLL)
require __DIR__.'/auth.php';