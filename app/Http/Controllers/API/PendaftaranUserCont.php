<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\pendaftaran;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PendaftaranUserCont extends Controller
{
    public function daftar(Request $request)
    {
        $validated = $request->validate([
            'tgl_daftar' => 'required|date',
            'user_id' => 'required',
            'posisi_magang_id' => 'required',
            'perusahaan_id' => 'required',
            'status_daftar' => 'required',
            'keterangan_daftar' => 'required'
        ]);
        $user = pendaftaran::where('user_id', $request->user_id)->where('posisi_magang_id', $request->posisi_magang_id)->first();
        // $id = $user->user_id;
        // return $user->user_id;
        // return ResponseFormatter::success($user);
        if ($user != null) {
            # code...
            if ($user->user_id == $request->user_id and $user->posisi_magang_id == $request->posisi_magang_id) {
                return ResponseFormatter::error('Sudah Mendaftar');
            }
        } elseif ($user == null) {
            # code...
            $pendaftaran = pendaftaran::create($validated);
            return ResponseFormatter::success($pendaftaran->load('posisi_magangs', 'users'), 'Pendaftaran Berhasil');
        }
    }
    public function informasi()
    {

        $id =  Auth::user()->id;
        $pendaftaran = pendaftaran::join('perusahaans', 'pendaftarans.perusahaan_id', '=', 'perusahaans.id')
            ->join('users', 'pendaftarans.user_id', '=', 'users.id')->select('perusahaans.*', 'users.*', 'pendaftarans.*')->join('posisi_magangs', 'pendaftarans.posisi_magang_id', '=', 'posisi_magangs.id')->where('users.id', '=', $id)->orderBy('pendaftarans.created_at', 'desc')->get();
        // return Auth::user();
        return ResponseFormatter::success(
            [
                'pendaftaran' => $pendaftaran

            ],
            'Data Berhasil '

        );
    }

    public function detailinformasi(Request $request)
    {
        $perusahaan_id = $request->perusahaan_id;
        $user_id = $request->user_id;
        $posisi_magang_id = $request->posisi_magang_id;
        $pendaftaran = pendaftaran::join('perusahaans', 'pendaftarans.perusahaan_id', '=', 'perusahaans.id')
            ->join('users', 'pendaftarans.user_id', '=', 'users.id')->select('perusahaans.*', 'users.*', 'pendaftarans.*')->join('posisi_magangs', 'pendaftarans.posisi_magang_id', '=', 'posisi_magangs.id')->where('users.id', '=', $user_id)->where('perusahaans.id', '=', $perusahaan_id)->where('posisi_magangs.id', '=', $posisi_magang_id)->first();
        // return Auth::user();
        return ResponseFormatter::success(
            [
                'pendaftaran' => $pendaftaran

            ],
            'Data Berhasil '

        );
    }
}
