<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PosisimController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\PosisiMagangController;
use App\Http\Controllers\ProfilPerusahaanContrl;
use App\Http\Controllers\DashboardPosisiController;
use App\Http\Controllers\PendaftarPerusahaanCont;

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

Route::get('/dashboard', function () {
    return view('perusahaan.dashboard.index');
})->middleware('auth:perusahaan');

Route::get('/login', [loginController::class, 'index'])->middleware('guest');
Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->middleware('guest');
Route::Post('/login', [loginController::class, 'authenticate'])->middleware('guest');
Route::Post('/logoutperusahaan', [loginController::class, 'logout'])->middleware('auth:perusahaan');
// Route::resource('/dashboard/posisi', DashboardPosisiController::class)->middleware('auth:perusahaan');
Route::resource('/dashboard/posisi', PosisiMagangController::class)->middleware('auth:perusahaan');
// Route::resource('/dashboard/posisi', PosisimController::class)->middleware('auth:perusahaan');

// Route::resource('/dashboard/profil', PerusahaanController::class)->middleware('auth:perusahaan');
Route::get('/dashboard/profil', [ProfilPerusahaanContrl::class, 'index'])->middleware('auth:perusahaan');
Route::put('/dashboard/profil', [ProfilPerusahaanContrl::class, 'updateprofil'])->middleware('auth:perusahaan');
Route::POST('/dashboard/profil/update-password', [ProfilPerusahaanContrl::class, 'uppass'])->middleware('auth:perusahaan');
Route::get('/dashboard/pendaftar', [PendaftarPerusahaanCont::class, 'index'])->middleware('auth:perusahaan');
Route::get('/dashboard/pendaftar/{id}', [PendaftarPerusahaanCont::class, 'show'])->middleware('auth:perusahaan');
Route::post('/dashboard/pendaftar/update/{id}', [PendaftarPerusahaanCont::class, 'update'])->middleware('auth:perusahaan');
Route::get('/dashboard/pendaftar/detail/{id}/{pivotid}', [PendaftarPerusahaanCont::class, 'detail'])->middleware('auth:perusahaan');
// Route::get('/dashboard/back', [PendaftarPerusahaanCont::class, 'back'])->middleware('auth:perusahaan');
