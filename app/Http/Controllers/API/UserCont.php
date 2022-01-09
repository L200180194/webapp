<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserCont extends Controller
{
    public function register(Request $request)
    {

        // $validatedData = $request->validate(
        //     [
        //         // 'email' => 'required|email:dns|unique:perusahaans',
        //         'email' => 'required|unique:perusahaans',
        //         'password' => 'required|min:8',
        //         'nama_perusahaan' => 'required|unique:perusahaans',
        //         'notlp_perusahaan' => 'required',
        //         'alamat_perusahaan' => 'required',
        //     ]

        // );
        // $validatedData['password'] = bcrypt($validatedData['password']);
        // perusahaan::create($validatedData);
        // // dd($validatedData);
        // $request->session()->flash('Success', 'Registration was successful! please login');

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'notlp_user' => 'required|max:255',
        //     'alamat_user' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users|max:255',
        //     'password' => 'required|min:8',
        // ]);

        // User::create([
        //     'name' => $request->name,
        //     'notlp_user' => $request->notlp_user,
        //     'alamat_user' => $request->alamat_user,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        // $user = User::where('email', $request->email)->first();

        // $tokenResult = $user->createToken('authToken')->plainTextToken;
        // return ResponseFormatter::success(
        //     [
        //         'access_token' =>  $tokenResult,
        //         // 'id' => $id,
        //         'token_type' => 'Bearer',
        //         'user' => $user,

        //     ],
        //     'Berhasil Terdaftar'
        // );

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'notlp_user' => 'required|max:255',
                'alamat_user' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|min:8',
            ]);
            // $validateddata['password'] = bcrypt($validateddata['password']);
            User::create([
                'name' => $request->name,
                'notlp_user' => $request->notlp_user,
                'alamat_user' => $request->alamat_user,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success(
                [
                    'access_token' =>  $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $user,

                ],
                'Berhasil Terdaftar'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something Went Wrong',
                    'error' => $error
                ],
                'Gagal'
            );
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Gagal'
                ], 'Login Gagal', 500);
            }
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' =>  $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'Berhasil Login');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Login Gagal', 500);
        }
    }
}
