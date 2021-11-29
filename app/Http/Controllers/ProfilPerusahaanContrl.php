<?php

namespace App\Http\Controllers;

use App\Models\perusahaan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilPerusahaanContrl extends Controller
{
    public function index()
    {
        return view('dashboard.profil.index');
    }

    public function updateprofil(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama_perusahaan' => 'required|max:30',
                'alamat_perusahaan' => 'required|max:255',
                'notlp_perusahaan' => 'required|max:30',
                'deskripsi_perusahaan' => 'required',
                'foto_perusahaan' => 'required|mimes:jpg,png|file|max:1524',
                'surat_perusahaan' => 'required|required|mimes:pdf|file|max:1524',
            ]
        );
        $validatedData['foto_perusahaan'] = $request->file('foto_perusahaan')->store('images-perusahaan');
        $validatedData['surat_perusahaan'] = $request->file('surat_perusahaan')->store('surat-perusahaan');
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
}
