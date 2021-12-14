<?php

namespace App\Http\Controllers;

use App\Models\perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
    public function diterima()
    {
        $proses = perusahaan::where('status_perusahaan', 'verifikasi')->get();
        // $proses = perusahaan::all();
        // dd($proses);
        // 'posisis' => posisi_magang::where('perusahaan_id', Auth::guard('perusahaan')->user()->id)->get()
        return view('admin.perusahaan.diterima', [
            'proses' => $proses
        ]);
    }
    public function ditolak()
    {
        $proses = perusahaan::where('status_perusahaan', 'ditolak')->get();
        // $proses = perusahaan::all();
        // dd($proses);
        // 'posisis' => posisi_magang::where('perusahaan_id', Auth::guard('perusahaan')->user()->id)->get()
        return view('admin.perusahaan.ditolak', [
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

    public function update(Request $request, $id)
    {

        $status = $request->status_perusahaan;
        // $user = $request->perusahaan_id;

        // dd($status);
        perusahaan::where('id', $id)->update(['status_perusahaan' => $status]);
        // return Redirect('dashboard/profil')->with('success', 'Profil Berhasil di Update');
        return Redirect::back()->with('success', 'Status Berhasil di Update');
    }
    public function backprev($status_perusahaan)
    {
        if ($status_perusahaan == 'proses') {
            return redirect('/admin/perusahaan');
        } elseif ($status_perusahaan == 'verifikasi') {
            return redirect('/admin/perusahaan/diterima');
        } elseif ($status_perusahaan == 'ditolak') {
            return redirect('/admin/perusahaan/ditolak');
        }
        // return back();
    }
}
