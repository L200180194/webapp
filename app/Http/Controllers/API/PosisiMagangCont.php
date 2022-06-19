<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\posisi_magang;
use Illuminate\Http\Request;

class PosisiMagangCont extends Controller
{
    // public function data()
    // {
    //     $posisi = posisi_magang::with(['perusahaan']);
    //     return ResponseFormatter::success(
    //         $posisi->paginate(20),
    //         'Data Berhasil Diambil'
    //     );
    //     // return posisi_magang::all();
    // }
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $nama_posisi = $request->input('nama_posisi');
        // $foto_posisi = $request->input('foto_posisi');
        // $persyaratan_posisi = $request->input('persyaratan_posisi');
        // $keterangan_posisi = $request->input('keterangan_posisi');
        // $fasilitas_posisi = $request->input('fasilitas_posisi');
        // $deskripsi_posisi = $request->input('deskripsi_posisi');
        $deadline_posisi = $request->input('deadline_posisi');

        if ($id) {
            $posisi = posisi_magang::with(['perusahaan'])->find($id);
            if ($posisi) {
                return ResponseFormatter::success(
                    $posisi,
                    'Data Posisi Magang Berhasil Diambil'
                );
            } else {
                return ResponseFormatter::success(
                    null,
                    'Data Posisi Magang Tidak Ada',
                    404
                );
            }
        }
        $posisi = posisi_magang::with(['perusahaan']);

        if ($nama_posisi) {
            $posisi->where('nama_posisi', 'like', '%' . $nama_posisi . '%');
        }
        return ResponseFormatter::success(
            $posisi->orderBy('created_at', 'desc')->get(),
            'Data Posisi Magang Berhasil Diambil'
        );
    }
}
