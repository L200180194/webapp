<?php

namespace App\Http\Controllers;

use App\Models\pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikan = pendidikan::all();
        return view('admin.informasilainya.pendidikan.pendidikan', ['pendidikan' => $pendidikan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(pendidikan $pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pendidikan $pendidikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pendidikan $pendidikan)
    {
        //
    }
}
