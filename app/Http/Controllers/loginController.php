<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        if (Auth::guard('perusahaan')->check()) {
            return redirect()->intended('/dashboard');
        } elseif (Auth::guard('admin')->check()) {
            return redirect()->intended('/admin');
        }
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            // 'email' => 'required|email:dns',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::guard('perusahaan')->attempt($credentials)) {
            $request->session()->regenerate();
            auth::shouldUse('perusahaan');

            return redirect()->intended('/dashboard');
        } elseif (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            auth::shouldUse('admin');
            // return ('HAIII ADMIN');
            // return view('admin.index');
            return redirect()->route('admin');
        }

        return back()->with('loginError', 'Login Gagal !');
    }
    public function logout(Request $request)
    {
        Auth::guard('perusahaan')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function logoutadmin(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
