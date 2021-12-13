<?php

namespace App\Http\Controllers;

use App\Models\perusahaan;
use Illuminate\Http\Request;

class PerusahaanAdminCont extends Controller
{
    public function index()
    {
        $proses = perusahaan::where('status_perusahaan', 'proses')->get();
        // $proses = perusahaan::all();
        // dd($proses);
        // 'posisis' => posisi_magang::where('perusahaan_id', Auth::guard('perusahaan')->user()->id)->get()
        return view('admin.perusahaan.index', [
            'proses' => $proses
        ]);
    }

    public function detail($id)
    {
        $perusahaan = perusahaan::find($id);
        return view('admin.perusahaan.detail', [
            'perusahaan' => $perusahaan
        ]);
    }
}
