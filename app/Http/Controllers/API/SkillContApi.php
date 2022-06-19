<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\skill;

class SkillContApi extends Controller
{
    public function getAll()
    {
        $skill = skill::all();
        if ($skill) {
            return ResponseFormatter::success(
                [
                    'message' => 'Data skill berhasil diambil',
                    'skill' => $skill
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
