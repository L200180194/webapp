<?php

namespace App\Http\Controllers;

use App\Models\perusahaan;
use App\Models\posisi_magang;
use Illuminate\Http\Request;

class AdminPosisiCont extends Controller
{
    public function index()
    {
        // return 'Haiiii';
        // $admin = posisi_magang::where('id', 1)->get();
        // $admin = perusahaan::join('posisi_magangs', 'perusahaans.id', '=', 'posisi_magangs.perusahaan_id')->select('perusahaans.*', 'posisi_magangs.*')->get();
        $posisi = posisi_magang::join('perusahaans', 'posisi_magangs.perusahaan_id', '=', 'perusahaans.id')->select('perusahaans.*', 'posisi_magangs.*')->get();
        // dd($admin);
        return view('admin.posisimagang.index', [
            // 'posisi' => posisi_magang::all()
            'posisi' => $posisi
        ]);
    }
    public function show($id, $perusahanid)
    {

        $posisi = posisi_magang::find($id);
        $perusahaan = perusahaan::find($perusahanid);

        return view('admin.posisimagang.show', [

            'posisi' => $posisi,
            'perusahaan' => $perusahaan,
        ]);
    }
}
