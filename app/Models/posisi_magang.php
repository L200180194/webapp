<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class posisi_magang extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $table = 'posisi_magangs';

    public function perusahaan()
    {
        return $this->belongsTo(perusahaan::class);
    }
    public function pendaftarans()
    {
        return $this->hasMany(pendaftaran::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'pendaftarans')->withPivot('tgl_daftar', 'tgl_perubahanstatus', 'keterangan_daftar', 'status_daftar', 'perusahaan_id', 'id');
    }
    public function scopeSearch($query, array $filter)
    {
        // if (isset($filter['search']) ? $filter['search'] : false) {
        //     $query->where('nama_posisi', 'like', '%' . $filter['search'] . '%');
        // }

        $query->when($filter['search'] ?? false, function ($query, $search) {
            return $query->where('nama_posisi', 'like', '%' . $search . '%');
        });
    }
    public function scopeSearchadmin($query, array $filter)
    {
        // if (isset($filter['search']) ? $filter['search'] : false) {
        //     $query->where('nama_posisi', 'like', '%' . $filter['search'] . '%');
        // }

        $query->when($filter['search'] ?? false, function ($query, $search) {
            return $query->where('nama_posisi', 'like', '%' . $search . '%')->orWhere('nama_perusahaan', 'like', '%' . $search . '%');
        });
    }
}
