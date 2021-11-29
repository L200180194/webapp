<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisim extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    // protected $with = ['perusahaan'];

    public function perusahaan()
    {
        // return $this->belongsTo(perusahaan::class);
        return $this->belongsTo(perusahaan::class, 'perusahaan_id');
    }
}
