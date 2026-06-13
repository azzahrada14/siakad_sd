<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\WaliNilaiController;
use App\Http\Controllers\WaliAbsensiController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\StatusSiswaController;
use App\Http\Controllers\RaporController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\KepalaSekolahDashboardController;
use App\Http\Controllers\KelulusanController;
use App\Http\Controllers\JadwalController;
/*
|--------------------------------------------------------------------------
| WELCOME
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

Route::middleware('guest')->group(function () {

    Route::get('/login', [

        AuthenticatedSessionController::class,
        'create'

    ])->name('login');

    Route::post('/login', [

        AuthenticatedSessionController::class,
        'store'

    ]);

});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */

   Route::get('/dashboard', function () {

    if (Auth::user()->role == 'guru') {
        return redirect()->route('guru.dashboard');
    }

    if (Auth::user()->role == 'kepala_sekolah') {
        return redirect()->route('kepala.dashboard');
    }

    return view('dashboard');

})->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD GURU
    |--------------------------------------------------------------------------
    */

    Route::get('/guru/dashboard', function () {

        if (Auth::user()->role != 'guru') {

            return redirect()->route('dashboard');

        }

        return view('guru.dashboard');

    })->name('guru.dashboard');

    /*
|--------------------------------------------------------------------------
| DASHBOARD KEPALA SEKOLAH
|--------------------------------------------------------------------------
*/

Route::get(
    '/kepala-sekolah/dashboard',
    [KepalaSekolahDashboardController::class,'dashboard']
)->name('kepala.dashboard');
    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [

        ProfileController::class,
        'edit'

    ])->name('profile.edit');

    Route::get(
    '/ganti-password',
    [PasswordController::class, 'edit']
)->name('password.edit');

Route::post(
    '/ganti-password',
    [PasswordController::class, 'update']
)->name('password.update');

    /*
    |--------------------------------------------------------------------------
    | RESOURCE
    |--------------------------------------------------------------------------
    */

Route::post('/guru/import', [GuruController::class, 'import'])
    ->name('guru.import');

Route::get('/guru/export', [GuruController::class, 'export'])
    ->name('guru.export');



    Route::resource('guru', GuruController::class);

    Route::resource('kelas', KelasController::class);

    Route::post('/siswa/import', [SiswaController::class, 'import'])
    ->name('siswa.import');

Route::get('/siswa/export', [SiswaController::class, 'export'])
    ->name('siswa.export');

    Route::resource('siswa', SiswaController::class);
   
    Route::post('/mapel/import', [MapelController::class, 'import'])
    ->name('mapel.import');

Route::get('/mapel/export', [MapelController::class, 'export'])
    ->name('mapel.export');

    Route::resource('mapel', MapelController::class);

    Route::resource('admin', AdminController::class);

    Route::resource('tahunajaran', TahunAjaranController::class);
Route::resource(
    'ekstrakurikuler',
    EkstrakurikulerController::class
);

Route::resource('kelulusan', KelulusanController::class)
    ->except(['edit','update']);

Route::get(
    '/jadwal/export',
    [JadwalController::class,'export']
)->name('jadwal.export');

Route::resource('jadwal', JadwalController::class);

Route::post(
    '/nilai/import',
    [NilaiController::class, 'import']
)->name('nilai.import');

Route::get(
    '/nilai/export',
    [NilaiController::class, 'export']
)->name('nilai.export');

    Route::resource('nilai', NilaiController::class);

    Route::get(
    '/absensi/export',
    [AbsensiController::class, 'export']
)->name('absensi.export');
    /* 
    |--------------------------------------------------------------------------
    | NILAI
    |--------------------------------------------------------------------------
    */

    Route::post('/nilai/mass-store', [

        NilaiController::class,
        'massStore'

    ])->name('nilai.mass.store');

    /*
    |--------------------------------------------------------------------------
    | ABSENSI
    |--------------------------------------------------------------------------
    */

    Route::get('/absensi', [

        AbsensiController::class,
        'index'

    ])->name('absensi.index');

    Route::post('/absensi/mass-store', [

        AbsensiController::class,
        'massStore'

    ])->name('absensi.mass.store');

    Route::get('/absensi/edit/{id}', [

        AbsensiController::class,
        'edit'

    ])->name('absensi.edit');

    Route::put('/absensi/update/{id}', [

        AbsensiController::class,
        'update'

    ])->name('absensi.update');

    /*
    |--------------------------------------------------------------------------
    | WALI KELAS
    |--------------------------------------------------------------------------
    */

    Route::get('/wali/nilai', [

        WaliNilaiController::class,
        'index'

    ])->name('wali.nilai');

    Route::get('/wali/absensi', [

        WaliAbsensiController::class,
        'index'

    ])->name('wali.absensi');

    Route::post(
    '/guru/{id}/reset-password',
    [GuruController::class, 'resetPassword']
)->name('guru.reset-password');

/*
|--------------------------------------------------------------------------
| STATUS SISWA
|--------------------------------------------------------------------------
*/

Route::get('/status-siswa', [
    StatusSiswaController::class,
    'index'
])->name('status-siswa.index');

Route::put('/status-siswa/{id}', [
    StatusSiswaController::class,
    'update'
])->name('status-siswa.update');



/*
|--------------------------------------------------------------------------
| RANKING
|--------------------------------------------------------------------------
*/

Route::get('/ranking', [
    RankingController::class,
    'index'
])->name('ranking.index');

Route::get('/ranking/generate', [
    RankingController::class,
    'generate'
])->name('ranking.generate');

/*
|--------------------------------------------------------------------------
| RAPOR
|--------------------------------------------------------------------------
*/

Route::resource(
    'rapor',
    RaporController::class
);

Route::post(
    '/rapor/generate',
    [
        RaporController::class,
        'generate'
    ]
)->name('rapor.generate');

Route::get(
    '/rapor/{id}/print',
    [
        RaporController::class,
        'print'
    ]
)->name('rapor.print');



    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [

        AuthenticatedSessionController::class,
        'destroy'

    ])->name('logout');


}); 
/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
