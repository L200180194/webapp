<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\perusahaan;
use App\Models\pendaftaran;
use Illuminate\Http\Request;
use App\Models\posisi_magang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    public function detail($id, $pivotid)
    {
        $user = User::find($id);
        $kota = User::find($id)->kota;
        $pendidikan = User::find($id)->pendidikan;
        $prodi = User::find($id)->prodi;
        $skill = User::find($id)->skill;
        $pivot = pendaftaran::find($pivotid);
        // $users = $pendaftar->posisi_magangs;
        // dd($pivot);
        return view('dashboard.pendaftaran.detail', [
            'daftar' => $user,
            'pivot' => $pivot,
            'kota' => $kota,
            'pendidikan' => $pendidikan,
            'prodi' => $prodi,
            'skill' => $skill,
        ]);
    }
    public function update(Request $request, $id)
    {

        $status = $request->status_daftar;
        $user = $request->user_id;
        $user = $request->pivot_id;

        // dd($status);
        pendaftaran::where('id', $id)->update(['status_daftar' => $status]);
        // return Redirect('dashboard/profil')->with('success', 'Profil Berhasil di Update');
        return Redirect::back()->with('success', 'Status Berhasil di Update');
    }
}
