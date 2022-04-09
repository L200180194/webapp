<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserCont;
use App\Http\Controllers\API\PosisiMagangCont;
use App\Http\Controllers\API\PendaftaranUserCont;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::Post('/register', [UserCont::class, 'register']);
Route::Post('/login', [UserCont::class, 'login']);
Route::get('/posisimagang/api', [PosisiMagangCont::class, 'all']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/userlogin', [UserCont::class, 'fetch']);
    Route::post('/userupdate', [UserCont::class, 'updateprofile']);
    Route::post('/userupdatefoto', [UserCont::class, 'updatefoto']);
    Route::post('/gantipass', [UserCont::class, 'uppass']);
    Route::post('/logout', [UserCont::class, 'logout']);
    Route::post('/pendaftaranuser', [PendaftaranUserCont::class, 'daftar']);
    Route::post('/informasipendaftar', [PendaftaranUserCont::class, 'informasi']);
    Route::post('/informasipendaftardetail', [PendaftaranUserCont::class, 'detailinformasi']);
});
