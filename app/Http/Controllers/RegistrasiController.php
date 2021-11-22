<?php

namespace App\Http\Controllers;

use App\Models\perusahaan;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('registrasi');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'email' => 'required|email:dns|unique:perusahaans',
                'password' => 'required|min:8',
                'nama_perusahaan' => 'required|unique:perusahaans',
                'notlp_perusahaan' => 'required',
                'alamat_perusahaan' => 'required',
            ]

        );
        $validatedData['password'] = bcrypt($validatedData['password']);
        perusahaan::create($validatedData);
        // dd($validatedData);
        $request->session()->flash('Success', 'Registration was successful! please login');
        return redirect('/login');
    }
}
