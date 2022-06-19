<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\prodi;

class ProdiContApi extends Controller
{
    public function getAll()
    {
        $prodi = prodi::all();
        if ($prodi) {
            return ResponseFormatter::success(
                [
                    'message' => 'Data prodi berhasil diambil',
                    'prodi' => $prodi
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
