<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = admin::where('status', 'aktif')->get();
        // dd($admin);
        return view('admin.admins.index', [
            'admin' => $admin
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
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
                'nama_admin' => 'required|max:50',
                'alamat_admin' => 'required|max:200',
                'tlp_admin' => 'required|max:30',
                'email' => 'required|unique:admins|unique:perusahaans',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',

            ]
        );
        admin::create($validatedData);
        return Redirect('admin/admins')->with('success', 'Admin Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        // dd($admin);
        return view('admin.admins.edit', [
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        // return $admin->id;
        // dd($request, $admin);
        // pendaftaran::where('id', $id)->update(['status_daftar' => $status]);
        admin::where('id', $admin->id)->update([
            'status' => $request->status,
            'level' => $request->level,

        ]);
        return Redirect::back()->with('success', 'Status Berhasil di Update');
        // $admin->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
    public function berhenti()
    {
        $admin = admin::where('status', 'berhenti')->get();
        // dd($admin);
        return view('admin.admins.berhenti', [
            'admin' => $admin
        ]);
    }
}
