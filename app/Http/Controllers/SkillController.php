<?php

namespace App\Http\Controllers;

use App\Models\skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = DB::table('skills')->orderBy('nama_skill', 'asc')->get();
        return view('admin.informasilainya.skill.index', ['skill' => $skill]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.informasilainya.skill.create');
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

                'nama_skill' => 'required|unique:skills',

            ]
        );
        skill::create($validatedData);
        return Redirect('/admin/informasilainya/skill')->with('success', 'Skill berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(skill $skill)
    {
        return view('admin.informasilainya.skill.edit', [
            'skill' => $skill
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, skill $skill)
    {
        $validatedData = $request->validate(['nama_skill' => 'required|unique:skills']);

        skill::where('id', $skill->id)->update([
            'nama_skill' => $validatedData['nama_skill']
        ]);
        return Redirect('/admin/informasilainya/skill')->with('success', 'Skill berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(skill $skill)
    {
        $skill->delete();
        return Redirect('/admin/informasilainya/skill')->with('success', 'Berhasil Dihapus');
    }
}
