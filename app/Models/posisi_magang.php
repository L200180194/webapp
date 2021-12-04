<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posisi_magang extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $table = 'posisi_magangs';

    public function perusahaan()
    {
        return $this->belongsTo(perusahaan::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'pendaftarans')->withPivot('tgl_daftar', 'tgl_perubahanstatus', 'keterangan_daftar', 'status_daftar', 'perusahaan_id', 'id');
    }
}
