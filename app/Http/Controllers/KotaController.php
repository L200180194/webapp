<?php

namespace App\Http\Controllers;

use App\Models\kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kota = DB::table('kotas')->orderBy('nama_kota', 'asc')->get();
        // $kota = kota::all();
        return view('admin.informasilainya.kota.index', ['kota' => $kota]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.informasilainya.kota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [

                'nama_kota' => 'required|unique:kotas',

            ]
        );
        kota::create($validatedData);
        return Redirect('/admin/informasilainya/kota')->with('success', 'Nama Kota berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show(kota $kota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
    //  * @param  \App\Models\kota  $kota
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // var_dump($kota);
        $kota = kota::find($id);
        return view('admin.informasilainya.kota.edit', [
            'kota' => $kota
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\kota  $kota
     * @param  int  $id

     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate(
            [

                'nama_kota' => 'required|unique:kotas',

            ]
        );
        kota::where('id', $id)->update([
            'nama_kota' => $validatedData['nama_kota']
        ]);
        return Redirect('/admin/informasilainya/kota')->with('success', 'Kota berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
    //  * @param  \App\Models\kota  $kota
     * @param  int  $id

     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // var_dump($id);
        $posisi = kota::find($id);
        // Storage::delete($posisi->foto_posisi);
        kota::destroy($id);
        return Redirect('/admin/informasilainya/kota')->with('success', 'Kota Berhasil di Hapus');
        // return var_dump($id);
    }
}
