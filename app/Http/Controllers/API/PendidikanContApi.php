<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\pendidikan;
use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;

class PendidikanContApi extends Controller
{
    public function getAll()
    {
        $pendidikan = pendidikan::all();
        if ($pendidikan) {
            return ResponseFormatter::success(
                [
                    'message' => 'Data pendidikan berhasil diambil',
                    'pendidikan' => $pendidikan
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
