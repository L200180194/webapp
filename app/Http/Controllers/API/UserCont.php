<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Laravel\Sanctum\HasApiTokens;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Contracts\Validation\Validator;

class UserCont extends Controller
{
    public function register(Request $request)
    {
        try {
            $valdat = $request->validate([
                'name' => 'required|string|max:255',
                'notlp_user' => 'required|max:255',
                'alamat_user' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|min:8',
                'kota_id' => 'required|integer',
                'pendidikan_id' => 'required|integer',
                'prodi_id' => 'required|integer',
                'skill_id' => 'required|integer',
                'cv_user' => 'required|mimes:pdf|file|max:1524'
            ]);
            $valdat['cv_user'] = $request->file('cv_user')->store('cv-user');
            User::create($valdat);
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
        } catch (\Illuminate\Contracts\Validation\Validator $validator) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something Went Wrong',
                    'error' => $validator->getMessageBag()
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
                    'message' => 'Gagal',
                    'err' => 'User belum memiliki akun atau email input salah'
                ], 'Login Gagal', 500);
            }
            $user = User::where('email', $request->email)->with('pendidikan', 'skill', 'prodi', 'kota')->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' =>  $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'Berhasil Login');
        } catch (\Illuminate\Contracts\Validation\Validator $validator) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $validator->getMessageBag()
            ], 'Login Gagal', 500);
        }
    }
    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(), 'Data Profile User Berhasil Diambil');
    }
    public function updateprofile(Request $request)
    {
        try {
            if (Auth::user()->cv_user == null or Auth::user()->kota_id == null or Auth::user()->pendidikan_id == null or Auth::user()->prodi_id == null or Auth::user()->skill_id == null) {
                $validatedData = $request->validate([
                    'name' => 'required|max:255|string',
                    'alamat_user' =>  'required|max:255|string',
                    'notlp_user' => 'required',
                    'kota_id' => 'required|integer',
                    'pendidikan_id' => 'required|integer',
                    'prodi_id' => 'required|integer',
                    'skill_id' => 'required|integer',
                    'cv_user' => 'mimes:pdf|file|max:1524'
                ]);
                $validatedData['cv_user'] = $request->file('cv_user')->store('cv-user');
            } else {
                $validatedData = $request->validate([
                    'name' => 'required|max:255|string',
                    'alamat_user' =>  'required|max:255|string',
                    'notlp_user' => 'required',
                    'kota_id' => 'required|integer',
                    'pendidikan_id' => 'required|integer',
                    'prodi_id' => 'required|integer',
                    'skill_id' => 'required|integer',
                    'cv_user' => 'mimes:pdf|file|max:1524'
                ]);
            }
            if ($request->cv_user != null) {
                Storage::delete(Auth::user()->cv_user);
                $validatedData['cv_user'] = $request->file('cv_user')->store('cv-user');
            }
            $user = Auth::user();
            $user->update($validatedData);


            return ResponseFormatter::success($usr, 'Profile Updated');
        } catch (Validator $error) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something Went Wrong',
                    'error' => $error->getMessageBag()
                ],
                'Gagal'
            );
        }
    }
    public function updatefoto(Request $request)
    {
        try {
            if (Auth::user()->foto_user == null) {
                $validatedData = $request->validate([
                    'foto_user' => 'required|mimes:jpg,png|file|max:1524'
                ]);
                $validatedData['foto_user'] = $request->file('foto_user')->store('foto-user');
            } else {
                $validatedData = $request->validate([
                    'foto_user' => 'required|mimes:jpg,png|file|max:1524'
                ]);
            }
            if ($request->foto_user != null) {
                Storage::delete(Auth::user()->foto_user);
                $validatedData['foto_user'] = $request->file('foto_user')->store('foto-user');
            }
            $user = Auth::user();
            $user->update($validatedData);
            return ResponseFormatter::success($user, 'Profile Updated');
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
    public function uppass(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|min:8',
                'passwordbaru' => 'required|min:8|confirmed',
                'passwordbaru_confirmation' => 'required|min:8',
            ]
        );
        $hashedpass = Auth::user()->password;

        if (Hash::check($request->password, $hashedpass)) {
            if (Hash::check($request->passwordbaru, $hashedpass) == FALSE) {

                $newhashedpass = bcrypt($request->passwordbaru);
                User::where('id', Auth::user()->id)->update(['password' => $newhashedpass]);
                return ResponseFormatter::success(
                    [
                        'message' => 'password updated successfully',

                    ],
                    'Berhasil'
                );
            } else {
                return ResponseFormatter::error(
                    [
                        'message' => 'new password can not be the old password!',

                    ],
                    'Gagal'
                );
            }
        } else {
            return ResponseFormatter::error(
                [
                    'message' => 'old password doesnt matched',

                ],
                'Gagal'
            );
        }
    }
    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();
        return ResponseFormatter::success($token, 'Berhasil Logout');
    }
}
