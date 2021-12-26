<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posisi_magang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class PosisiMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request('search'));
        $posisi = posisi_magang::where('perusahaan_id', Auth::guard('perusahaan')->user()->id);
        if (request('search')) {
            $posisi = posisi_magang::where('perusahaan_id', Auth::guard('perusahaan')->user()->id)->where('nama_posisi', 'like', '%' . request('search') . '%');
        }
        return  view('perusahaan.dashboard.posisi.index', [
            'posisis' => $posisi->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perusahaan.dashboard.posisi.create');
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
    //  * @param  \App\Models\posisi_magang  $posisi_magang
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $posisi_magang;
        $posisi_magang = posisi_magang::find($id);
        return view('perusahaan.dashboard.posisi.show', ['posisi' => $posisi_magang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
    //  * @param  \App\Models\posisi_magang  $posisi_magang
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posisi_magang = posisi_magang::find($id);

        return view('perusahaan.dashboard.posisi.edit', [
            'posisi' => $posisi_magang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\posisi_magang  $posisi_magang
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nama_posisi' => 'required|max:30',
            'foto_posisi' => 'mimes:jpg,png|file|max:1524',
            // 'foto_posisi' => 'required',
            'persyaratan_posisi' => 'required',
            'keterangan_posisi' => 'required',
            'fasilitas_posisi' => 'required',
            'deskripsi_posisi' => 'required',
            'deadline_posisi' => 'required',
        ]);
        if ($request->foto_posisi != null) {
            $validatedData["foto_posisi"] =  $request->file('foto_posisi')->store('images-posisi');
            Storage::delete($request->nama_file);
        }

        $validatedData["perusahaan_id"] =  Auth::guard('perusahaan')->user()->id;
        // posisi_magang::create($validatedData);
        posisi_magang::where('id', $id)->update($validatedData);
        return Redirect('dashboard/posisi')->with('success', 'Posisi Magang Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    //  * @param  \App\Models\posisi_magang  $posisi_magang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posisi = posisi_magang::find($id);
        Storage::delete($posisi->foto_posisi);
        posisi_magang::destroy($id);
        return Redirect('dashboard/posisi')->with('success', 'Posisi Magang Berhasil di Hapus');
    }
}
