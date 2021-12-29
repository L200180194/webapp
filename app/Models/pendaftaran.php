<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function scopeSearch($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            return $query->where('users.name', 'like', '%' . $search . '%');
        });
    }
    public function users()
    {
        return $this->belongsTo(user::class);
    }
}
