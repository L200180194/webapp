<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\kota;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class KotaCont extends Controller
{
    public function getAll()
    {
        $kota = kota::all();
        if ($kota) {
            return ResponseFormatter::success(
                [
                    'message' => 'Data kota berhasil diambil',
                    'kota' => $kota
                ],
                'Berhasil'
            );
        } else {
            return ResponseFormatter::error(
                [
                    'message' => 'Data gagal diambil',
                ],
                'Gagal'
            );
        }
    }
}
