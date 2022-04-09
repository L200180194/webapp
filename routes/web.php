<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPosisiCont;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProfilAdminCont;
use App\Http\Controllers\PosisimController;
use App\Http\Controllers\PerusahaanAdminCont;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\PosisiMagangController;
use App\Http\Controllers\ProfilPerusahaanContrl;
use App\Http\Controllers\PendaftarPerusahaanCont;
use App\Http\Controllers\InformasiLainyaCont;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\DashboardPosisiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home')->middleware('guest');
Route::get('/about', function () {
    return view('about');
})->middleware('guest');
Route::get('/syarat-ketentuan', function () {
    return view('syaratketentuan');
})->middleware('guest');
Route::get('/FQA', function () {
    return view('freqans');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('perusahaan.dashboard.index');
})->middleware('auth:perusahaan');
Route::get('/admin', function () {
    return view('admin.index');
})->middleware('auth:admin')->name('admin');

Route::get('/login', [loginController::class, 'index'])->middleware('guest');
Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->middleware('guest');
Route::Post('/login', [loginController::class, 'authenticate'])->middleware('guest');
Route::Post('/logoutperusahaan', [loginController::class, 'logout'])->middleware('auth:perusahaan');
Route::Post('/logoutadmin', [loginController::class, 'logoutadmin'])->middleware('auth:admin');
// Route::resource('/dashboard/posisi', DashboardPosisiController::class)->middleware('auth:perusahaan');
Route::resource('/dashboard/posisi', PosisiMagangController::class)->middleware('auth:perusahaan');
// Route::resource('/dashboard/posisi', PosisimController::class)->middleware('auth:perusahaan');

// Route::resource('/dashboard/profil', PerusahaanController::class)->middleware('auth:perusahaan');
Route::get('/dashboard/profil', [ProfilPerusahaanContrl::class, 'index'])->middleware('auth:perusahaan');
Route::put('/dashboard/profil', [ProfilPerusahaanContrl::class, 'updateprofil'])->middleware('auth:perusahaan');
Route::POST('/dashboard/profil/update-password', [ProfilPerusahaanContrl::class, 'uppass'])->middleware('auth:perusahaan');
Route::get('/dashboard/profil/surat-perusahaan', [ProfilPerusahaanContrl::class, 'surat'])->middleware('auth:perusahaan');
Route::get('/dashboard/profil/edit-profil', [ProfilPerusahaanContrl::class, 'editprofil'])->middleware('auth:perusahaan');
Route::get('/dashboard/profil/ganti-password', [ProfilPerusahaanContrl::class, 'editpass'])->middleware('auth:perusahaan');
Route::get('/dashboard/pendaftar', [PendaftarPerusahaanCont::class, 'index'])->middleware('auth:perusahaan');
Route::get('/dashboard/pendaftar/{id}', [PendaftarPerusahaanCont::class, 'show'])->middleware('auth:perusahaan');
Route::post('/dashboard/pendaftar/update/{id}', [PendaftarPerusahaanCont::class, 'update'])->middleware('auth:perusahaan');
Route::get('/dashboard/pendaftar/detail/{id}/{pivotid}', [PendaftarPerusahaanCont::class, 'detail'])->middleware('auth:perusahaan');
Route::get('/admin/profiladmin', [ProfilAdminCont::class, 'index'])->middleware('auth:admin');
Route::get('/admin/profiladmin/edit', [ProfilAdminCont::class, 'editform'])->middleware('auth:admin');
Route::POST('/admin/profiladmin/edit/update-password', [ProfilAdminCont::class, 'uppass'])->middleware('auth:admin');
Route::get('/admin/perusahaan', [PerusahaanAdminCont::class, 'index'])->middleware('auth:admin');
Route::get('/admin/perusahaan/diterima', [PerusahaanAdminCont::class, 'diterima'])->middleware('auth:admin');
Route::get('/admin/perusahaan/ditolak', [PerusahaanAdminCont::class, 'ditolak'])->middleware('auth:admin');
Route::get('/admin/perusahaan/back{status_perusahaan}', [PerusahaanAdminCont::class, 'backprev'])->middleware('auth:admin');
Route::get('/admin/perusahaan/detail{id}', [PerusahaanAdminCont::class, 'detail'])->middleware('auth:admin');
Route::post('/admin/perusahaan/detail/update{id}', [PerusahaanAdminCont::class, 'update'])->middleware('auth:admin');
Route::resource('/admin/admins', AdminController::class)->middleware('auth:admin');
Route::get('/admin/admin/berhenti', [AdminController::class, 'berhenti'])->middleware('auth:admin');
// Route::get('/admin/posisimagang', [AdminPosisiCont::class, 'index'])->middleware('auth:admin');
Route::get('/admin/posisimagang', [AdminPosisiCont::class, 'index'])->middleware('auth:admin');
Route::get('/admin/informasilainya', [InformasiLainyaCont::class, 'index'])->middleware('auth:admin');
Route::get('/admin/informasilainya/pendidikan', [PendidikanController::class, 'index'])->middleware('auth:admin');
Route::get('/admin/posisimagang/show{id}/{perusahaanid}', [AdminPosisiCont::class, 'show'])->middleware('auth:admin');
// Route::get('/dashboard/back', [PendaftarPerusahaanCont::class, 'back'])->middleware('auth:perusahaan');
