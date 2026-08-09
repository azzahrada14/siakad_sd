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
use App\Http\Controllers\DashboardKepalaSekolahController;
use App\Http\Controllers\KelulusanController;
use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\KelolaAkademikController;
use App\Http\Controllers\GuruDashboardController;
use App\Http\Controllers\KenaikanKelasController;
use App\Http\Controllers\LingkupMateriController;
use App\Http\Controllers\TujuanPembelajaranController;
use App\Http\Controllers\MasterEkstrakurikulerController;
use App\Http\Controllers\AlumniController;

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
        return redirect()->route('dashboardKepala');
    }

    return view('dashboard');

})->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD GURU
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/guru/dashboard',
        [GuruDashboardController::class,'index']
    )->name('guru.dashboard');

    /*
|--------------------------------------------------------------------------
| DASHBOARD KEPALA SEKOLAH
|--------------------------------------------------------------------------
*/

Route::get(
    '/kepala-sekolah',
    [DashboardKepalaSekolahController::class, 'index']
)->name('dashboardKepala');

Route::get(
    '/informasi-akademik',
    [DashboardKepalaSekolahController::class, 'informasiAkademik']
)->name('informasi-akademik.index');
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

Route::get('/kenaikan', [KenaikanKelasController::class,'index'])
    ->name('kenaikan.index');

Route::post('/kenaikan/proses', [KenaikanKelasController::class,'proses'])
    ->name('kenaikan.proses');




Route::get('/guru', [GuruController::class,'index'])
    ->name('guru.index');

Route::post('/guru/import', [GuruController::class,'import'])
    ->name('guru.import');

Route::get('/guru/export', [GuruController::class,'export'])
    ->name('guru.export');

Route::get('/guru/template', [GuruController::class,'template'])
    ->name('guru.template');

Route::post('/guru/{id}/reset-password',
    [GuruController::class,'resetPassword'])
    ->name('guru.reset-password');

Route::get('/guru/{id}', [GuruController::class,'show'])
    ->name('guru.show');

Route::get('/guru/{id}/edit', [GuruController::class,'edit'])
    ->name('guru.edit');

Route::put('/guru/{id}', [GuruController::class,'update'])
    ->name('guru.update');

Route::patch(
    '/guru/{guru}/mutasi',
    [GuruController::class, 'mutasi']
)->name('guru.mutasi');

   Route::post('/siswa/import', [SiswaController::class,'import'])
    ->name('siswa.import');

Route::get('/siswa/export', [SiswaController::class,'export'])
    ->name('siswa.export');

Route::get('/siswa/template', [SiswaController::class,'template'])
    ->name('siswa.template');

Route::resource('siswa', SiswaController::class);

Route::prefix('kelulusan')->group(function () {

    Route::get(
        '/',
        [KelulusanController::class,'index']
    )->name('kelulusan.index');

    Route::post(
        '/generate',
        [KelulusanController::class,'generate']
    )->name('kelulusan.generate');

    Route::get(
        '/export',
        [KelulusanController::class,'export']
    )->name('kelulusan.export');

});


Route::resource(
    'alumni',
    AlumniController::class
);

Route::post(
    'alumni/generate',
    [AlumniController::class,'generate']
)->name('alumni.generate');

Route::get(
    '/alumni/{alumni}',
    [AlumniController::class,'show']
)->name('alumni.show');

Route::get(
    'alumni/export',
    [AlumniController::class,'export']
)->name('alumni.export');
    /*
|--------------------------------------------------------------------------
| MAPEL
|--------------------------------------------------------------------------
*/

Route::get('/mapel', [MapelController::class, 'index'])
    ->name('mapel.index');

Route::get('/mapel/create', [MapelController::class, 'create'])
    ->name('mapel.create');

Route::post('/mapel', [MapelController::class, 'store'])
    ->name('mapel.store');

Route::get('/mapel/{id}', [MapelController::class, 'show'])
    ->whereNumber('id')
    ->name('mapel.show');

Route::get('/mapel/{id}/edit', [MapelController::class, 'edit'])
    ->whereNumber('id')
    ->name('mapel.edit');

Route::put('/mapel/{id}', [MapelController::class, 'update'])
    ->whereNumber('id')
    ->name('mapel.update');
    
Route::patch('/mapel/{mapel}/nonaktif', [MapelController::class, 'nonaktif'])
    ->name('mapel.nonaktif');
/*
|--------------------------------------------------------------------------
| IMPORT EXPORT
|--------------------------------------------------------------------------
*/
Route::post('/mapel/import', [MapelController::class, 'import'])
    ->name('mapel.import');

Route::get('/mapel/export', [MapelController::class, 'export'])
    ->name('mapel.export');

Route::get('/mapel/template', [MapelController::class, 'template'])
    ->name('mapel.template');

Route::resource('tujuan-pembelajaran', TujuanPembelajaranController::class);


    Route::resource('admin', AdminController::class);

/*
|--------------------------------------------------------------------------
| TAHUN AJARAN
|--------------------------------------------------------------------------
*/

Route::get('/tahunajaran', [TahunAjaranController::class,'index'])
    ->name('tahun-ajaran.index');
    
Route::get('/tahunajaran/export', [TahunAjaranController::class,'export'])
    ->name('tahun-ajaran.export');


Route::get('/tahunajaran/create', [TahunAjaranController::class,'create'])
    ->name('tahun-ajaran.create');

Route::post('/tahunajaran', [TahunAjaranController::class,'store'])
    ->name('tahun-ajaran.store');

Route::get('/tahunajaran/{id}', [TahunAjaranController::class,'show'])
    ->name('tahun-ajaran.show');

Route::get('/tahunajaran/{id}/edit', [TahunAjaranController::class,'edit'])
    ->name('tahun-ajaran.edit');

Route::put('/tahunajaran/{id}', [TahunAjaranController::class,'update'])
    ->name('tahun-ajaran.update');

Route::delete('/tahunajaran/{id}', [TahunAjaranController::class,'destroy'])
    ->name('tahun-ajaran.destroy');

Route::put('/tahunajaran/{id}/aktifkan', [TahunAjaranController::class,'aktifkan'])
    ->name('tahun-ajaran.aktifkan');

    Route::resource('ekstrakurikuler', EkstrakurikulerController::class);

Route::get(
'/ekstrakurikuler/export',
[EkstrakurikulerController::class,'export']
)->name('ekstrakurikuler.export');

Route::get(
    '/ekstrakurikuler/{siswa}/data',
    [EkstrakurikulerController::class, 'getData']
)->name('ekstrakurikuler.data');
Route::resource(
    'master-ekstrakurikuler',
    MasterEkstrakurikulerController::class
)->except('destroy');

Route::patch(
    'master-ekstrakurikuler/{masterEkstrakurikuler}/toggle-status',
    [MasterEkstrakurikulerController::class, 'toggleStatus']
)->name('master-ekstrakurikuler.toggle-status');

Route::prefix('kelas')->name('kelas.')->group(function () {

    Route::get('/', [KelasController::class, 'index'])->name('index');

    Route::post('/', [KelasController::class, 'store'])->name('store');

    Route::get('/{id}', [KelasController::class, 'show'])->name('show');

    Route::get('/{id}/edit', [KelasController::class, 'edit'])->name('edit');

    Route::put('/{id}', [KelasController::class, 'update'])->name('update');

    Route::delete('/{id}', [KelasController::class, 'destroy'])->name('destroy');

});


/*
|--------------------------------------------------------------------------
| IMPORT EXPORT
|--------------------------------------------------------------------------
*/

Route::post(
    '/jadwal/import',
    [JadwalPelajaranController::class,'import']
)->name('jadwal.import');

Route::get(
    '/jadwal/export',
    [JadwalPelajaranController::class,'export']
)->name('jadwal.export');

Route::get(
    '/jadwal/template',
    [JadwalPelajaranController::class,'template']
)->name('jadwal.template');

Route::get(
    '/jadwal/jam/{kelas}',
    [JadwalPelajaranController::class,'getJam']
);

Route::patch('/jadwal/{jadwal}/nonaktif', [JadwalPelajaranController::class, 'nonaktif'])
    ->name('jadwal.nonaktif');

Route::patch(
    '/jadwal/{jadwal}/aktif',
    [JadwalPelajaranController::class,'aktif']
)->name('jadwal.aktif');


Route::patch('/jadwal/{jadwal}/toggle-status',
    [JadwalPelajaranController::class,'toggleStatus'])
    ->name('jadwal.toggleStatus');

Route::get(
    '/jadwal/mapel/{kelas}',
    [JadwalPelajaranController::class, 'getMapelByKelas']
)->name('jadwal.mapel');
Route::resource('lingkup-materi', LingkupMateriController::class);

Route::get(
    '/jadwal/mapel/{kelasId}',
    [JadwalPelajaranController::class, 'getMapelByKelas']
)->name('jadwal.mapel');

Route::resource('jadwal', JadwalPelajaranController::class);


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

Route::get(
    '/kelola-akademik/{kelas}/cetak',
    [KelolaAkademikController::class,'cetak']
)->name('kelola-akademik.cetak');

Route::get(
    '/kelola-akademik/{kelas}/export',
    [KelolaAkademikController::class,'export']
)->name('kelola-akademik.export');



Route::get('/kelola-akademik', [
    KelolaAkademikController::class,
    'index'
])->name('kelola-akademik.index');

Route::post('/kelola-akademik/generate', [
    KelolaAkademikController::class,
    'generate'
])->name('kelola-akademik.generate');

Route::post('/kelola-akademik/simpan', [
    KelolaAkademikController::class,
    'simpan'
])->name('kelola-akademik.simpan');


/*
|--------------------------------------------------------------------------
| RESET PEMBAGIAN
|--------------------------------------------------------------------------
*/

Route::delete(
    '/kelola-akademik/reset/{tingkat}',
    [KelolaAkademikController::class, 'reset']
)->name('kelola-akademik.reset');

    /* 
    |--------------------------------------------------------------------------
    | NILAI
    |--------------------------------------------------------------------------
    */

    Route::post('/nilai/remedial', [
    NilaiController::class,
    'remedial'
])->name('nilai.remedial');


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
Route::get(
    '/wali/nilai',
    [WaliNilaiController::class,'index']
)->name('wali.nilai.index');

Route::get(
    '/wali/nilai/export',
    [WaliNilaiController::class,'export']
)->name('wali.nilai.export');

Route::post(
    '/wali/nilai/import',
    [WaliNilaiController::class,'import']
)->name('wali.nilai.import');

    Route::get(

    '/wali/absensi/export',

    [WaliAbsensiController::class,'export']

)->name('wali.absensi.export');

Route::post(

    '/wali/absensi/import',

    [WaliAbsensiController::class,'import']

)->name('wali.absensi.import');
Route::get('/wali/absensi', [
    WaliAbsensiController::class,
    'index'
])->name('wali.absensi');


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

Route::post('/ranking/generate', [
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