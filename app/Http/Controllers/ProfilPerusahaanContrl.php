<?php

namespace App\Http\Controllers;

use App\Models\perusahaan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilPerusahaanContrl extends Controller
{
    public function index()
    {
        return view('perusahaan.dashboard.profil.index');
    }

    public function updateprofil(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama_perusahaan' => 'required|max:30',
                'alamat_perusahaan' => 'required|max:255',
                'notlp_perusahaan' => 'required|max:30',
                'deskripsi_perusahaan' => 'required',
                'foto_perusahaan' => 'mimes:jpg,png|file|max:1524',
                'surat_perusahaan' => 'mimes:pdf|file|max:1524',
            ]
        );
        if ($request->foto_perusahaan != null) {
            $validatedData['foto_perusahaan'] = $request->file('foto_perusahaan')->store('images-perusahaan');
            Storage::delete(Auth::guard('perusahaan')->user()->foto_perusahaan);
        } elseif ($request->surat_perusahaan != null) {
            $validatedData['surat_perusahaan'] = $request->file('surat_perusahaan')->store('surat-perusahaan');
            Storage::delete(Auth::guard('perusahaan')->user()->surat_perusahaan);
        } elseif ($request->foto_perusahaan != null and $request->surat_perusahaan != null) {
            $validatedData['foto_perusahaan'] = $request->file('foto_perusahaan')->store('images-perusahaan');
            $validatedData['surat_perusahaan'] = $request->file('surat_perusahaan')->store('surat-perusahaan');
            Storage::delete(Auth::guard('perusahaan')->user()->foto_perusahaan);
            Storage::delete(Auth::guard('perusahaan')->user()->surat_perusahaan);
        }

        // perusahaan::create($validatedData);
        perusahaan::where('id', Auth::guard('perusahaan')->user()->id)->update($validatedData);
        return Redirect('dashboard/profil')->with('success', 'Profil Berhasil di Update');
        // $validatedData = $request->validate([
        //     'nama_posisi' => 'required|max:30',
        //     'foto_posisi' => 'required|mimes:jpg,png|file|max:1524',
        //     // 'foto_posisi' => 'required',
        //     'persyaratan_posisi' => 'required',
        //     'keterangan_posisi' => 'required',
        //     'fasilitas_posisi' => 'required',
        //     'deskripsi_posisi' => 'required',
        //     'deadline_posisi' => 'required',
        // ]);
        // $validatedData["foto_posisi"] =  $request->file('foto_posisi')->store('images-posisi');
        // $validatedData["perusahaan_id"] =  Auth::guard('perusahaan')->user()->id;
        // // posisi_magang::create($validatedData);
        // posisi_magang::where('id', $id)->update($validatedData);
        // return Redirect('dashboard/posisi')->with('success', 'Posisi Magang Berhasil di Update');
    }

    public function uppass(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|min:8',
                'passwordbaru' => 'required|min:8|confirmed',
                'passwordbaru_confirmation' => 'required|min:8',
            ]
        );
        $hashedpass = Auth::guard('perusahaan')->user()->password;
        // dd(Hash::check($request->password, $hashedpass));
        if (Hash::check($request->password, $hashedpass)) {
            if (Hash::check($request->passwordbaru, $hashedpass) == FALSE) {
                // pendaftaran::where('id', $id)->update(['status_daftar' => $status]);
                $newhashedpass = bcrypt($request->passwordbaru);
                perusahaan::where('id', Auth::guard('perusahaan')->user()->id)->update(['password' => $newhashedpass]);

                session()->flash('success', 'password updated successfully');
                return redirect()->back();
            } else {
                session()->flash('message', 'new password can not be the old password!');
                return redirect()->back();
            }
        } else {
            session()->flash('message', 'old password doesnt matched');
            return redirect()->back();
        }
    }
    public function back()
    {
        return redirect()->back();
    }
}
