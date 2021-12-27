<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\perusahaan;
use App\Models\pendaftaran;
use Illuminate\Http\Request;
use App\Models\posisi_magang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PendaftarPerusahaanCont extends Controller
{
    public function index()
    {

        $posisi_magang = posisi_magang::where('perusahaan_id', Auth::guard('perusahaan')->user()->id)->with('users')->search(request(['search']))->paginate(15);

        // return  view('perusahaan.dashboard.posisi.index', [
        //     'posisis' => posisi_magang::where('perusahaan_id', Auth::guard('perusahaan')->user()->id)->search(request(['search']))->paginate(15)
        // ]);
        return view('perusahaan.dashboard.pendaftaran.index', [
            'pendaftars' => $posisi_magang
        ]);
    }

    public function show($id)
    {
        // $pendaftar = posisi_magang::find($id);
        $pendaftar = posisi_magang::find($id);
        $pendaftar2 = pendaftaran::join('perusahaans', 'pendaftarans.perusahaan_id', '=', 'perusahaans.id')
            ->join('users', 'pendaftarans.user_id', '=', 'users.id')->select('perusahaans.*', 'users.*', 'pendaftarans.*')->join('posisi_magangs', 'pendaftarans.posisi_magang_id', '=', 'posisi_magangs.id')->where('posisi_magangs.id', '=', $id)->search(request(['search']))->paginate(15);
        // $posisi = posisi_magang::join('perusahaans', 'posisi_magangs.perusahaan_id', '=', 'perusahaans.id')->select('perusahaans.*', 'posisi_magangs.*')->get();

        // dd($pendaftar, $pendaftar2, $posisi);
        return view('perusahaan.dashboard.pendaftaran.show', [
            'daftar' => $pendaftar,
            'full' => $pendaftar2,
            'id' => $id

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
        return view('perusahaan.dashboard.pendaftaran.detail', [
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
