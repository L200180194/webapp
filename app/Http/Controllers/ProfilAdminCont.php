<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilAdminCont extends Controller
{
    public function index()
    {
        return view('admin.profil.index');
    }
    public function editform()
    {
        return view('admin.profil.edit');
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
        $hashedpass = Auth::guard('admin')->user()->password;
        // dd(Hash::check($request->password, $hashedpass));
        if (Hash::check($request->password, $hashedpass)) {
            if (Hash::check($request->passwordbaru, $hashedpass) == FALSE) {
                // pendaftaran::where('id', $id)->update(['status_daftar' => $status]);
                $newhashedpass = bcrypt($request->passwordbaru);
                admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => $newhashedpass]);

                session()->flash('success', 'password updated successfully');
                return redirect('/admin/profiladmin');
            } else {
                session()->flash('message', 'new password can not be the old password!');
                return redirect()->back();
            }
        } else {
            session()->flash('message', 'old password doesnt matched');
            return redirect()->back();
        }
    }
}
