<?php

namespace App\Http\Controllers;

use App\Models\perusahaan;
use App\Models\posisi_magang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardPosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('dashboard.posisi.index', [
            'posisis' => posisi_magang::where('perusahaan_id', Auth::guard('perusahaan')->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posisi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_posisi' => 'required|max:30',
            'foto_posisi' => 'required|mimes:jpg,png|file|max:1524',
            // 'foto_posisi' => 'required',
            'persyaratan_posisi' => 'required',
            'keterangan_posisi' => 'required',
            'fasilitas_posisi' => 'required',
            'deskripsi_posisi' => 'required',
            'deadline_posisi' => 'required',
        ]);
        $validatedData["foto_posisi"] =  $request->file('foto_posisi')->store('images-posisi');
        $validatedData["perusahaan_id"] =  Auth::guard('perusahaan')->user()->id;
        posisi_magang::create($validatedData);
        return Redirect('dashboard/posisi')->with('success', 'Posisi Magang Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\posisi_magang  $posisi_magang
     * @return \Illuminate\Http\Response
     */
    public function show(posisi_magang $posisi_magang)
    {
        return $posisi_magang;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit(perusahaan $perusahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, perusahaan $perusahaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(perusahaan $perusahaan)
    {
        //
    }
}