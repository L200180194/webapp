<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\posisi_magang;
use Illuminate\Http\Request;

class PosisiMagangCont extends Controller
{
    public function data()
    {
        return ResponseFormatter::success(
            posisi_magang::all(),
            'Data Berhasil Diambil'
        );
        // return posisi_magang::all();
    }
    // public function all(Request $request)
    // {
    //     $id = $request->input('id');
    //     $limit = $request->input('limit');
    //     $nama_posisi = $request->input('nama_posisi');
    //     $foto_posisi = $request->input('foto_posisi');
    //     $persyaratan_posisi = $request->input('persyaratan_posisi');
    //     $keterangan_posisi = $request->input('keterangan_posisi');
    //     $fasilitas_posisi = $request->input('fasilitas_posisi');
    //     $deskripsi_posisi = $request->input('deskripsi_posisi');
    //     $deadline_posisi = $request->input('deadline_posisi');

    //     return ResponseFormatter::success(
    //         posisi_magang::all()->paginate(5)
    //     );
    // }
}
