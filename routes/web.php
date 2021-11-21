<?php

use App\Http\Controllers\DashboardPosisiController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard.index');
})->middleware('auth:perusahaan');

Route::get('/login', [loginController::class, 'index'])->middleware('guest');
Route::Post('/login', [loginController::class, 'authenticate'])->middleware('guest');
Route::Post('/logoutperusahaan', [loginController::class, 'logout'])->middleware('auth:perusahaan');
Route::resource('/dashboard/posisi', DashboardPosisiController::class)->middleware('auth:perusahaan');
