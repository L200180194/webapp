<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\perusahaan;
use App\Models\posisi_magang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftarPerusahaanCont extends Controller
{
    public function index()
    {
        // $posisi_magang = posisi_magang::where('perusahaan_id', Auth::guard('perusahaan')->user()->id)->get();

        // $posisis = posisi_magang::find(Auth::guard('perusahaan')->user()->id);
        $posisi_magang = posisi_magang::where('perusahaan_id', Auth::guard('perusahaan')->user()->id)->with('users')->get();
        // $posisi_magang = posisi_magang::has('peruahaan_id', Auth::guard('perusahaan')->user()->id);
        // dd($posisi_magang);
        // $posisi_magang = posisi_magang::where('perusahaan_id', Auth::guard('perusahaan')->user()->id)->get();
        // $users = $posisi_magang['id']->users;
        // dd($users);
        return view('dashboard.pendaftaran.index', [
            'pendaftars' => $posisi_magang
        ]);
    }

    public function show($id)
    {
        $pendaftar = posisi_magang::find($id);
        $users = $pendaftar->users;
        // dd($pendaftar);
        return view('dashboard.pendaftaran.show', [
            'daftar' => $pendaftar

        ]);
    }
}
