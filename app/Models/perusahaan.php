<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class perusahaan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id'];
    // protected $fillable = ['nama_perusahaan', 'alamat_perusahaan', 'foto_perusahaan', 'email', 'password', 'status_perusahaan', 'surat_perusahaan', 'tgl_statusperusahaan', 'deskripsi_perusahaan', 'notlp_perusahaan', 'admin_id', 'created_at', '	updated_at'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posisi_magang()
    {
        return $this->hasMany(posisi_magang::class);
    }
    public function posisi_magangs()
    {
        return $this->hasMany(posisi_magang::class);
    }
    //     public function Posisim()
    //     {
    //         return $this->hasMany(Posisim::class, 'posisim_id');
    //     }
    public function admin()
    {
        return $this->belongsTo(admin::class);
    }
    public function scopeSearch($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            return $query->where('nama_perusahaan', 'like', '%' . $search . '%');
        });
    }
    public function scopeSearchver($query, array $filter)
    {
        $query->when($filter['searchver'] ?? false, function ($query, $searchver) {
            return $query->where('nama_perusahaan', 'like', '%' . $searchver . '%');
        });
    }
}
