<?php

namespace App\Http\Controllers;

use App\Models\prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi = prodi::all();
        return view('admin.informasilainya.prodi.index', ['prodi' => $prodi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.informasilainya.prodi.create');
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

                'nama_prodi' => 'required|unique:prodis',

            ]
        );
        prodi::create($validatedData);
        return Redirect('/admin/informasilainya/prodi')->with('success', 'Jenjang pendidikan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit(prodi $prodi)
    {
        return view('admin.informasilainya.prodi.edit', [
            'prodi' => $prodi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prodi $prodi)
    {
        $validatedData = $request->validate(['nama_prodi' => 'required|unique:prodis']);

        prodi::where('id', $prodi->id)->update([
            'nama_prodi' => $validatedData['nama_prodi']
        ]);
        return Redirect('/admin/informasilainya/prodi')->with('success', 'Jenjang pendidikan berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(prodi $prodi)
    {
        $prodi->delete();
        return Redirect('/admin/informasilainya/prodi')->with('success', 'Berhasil Dihapus');
    }
}
