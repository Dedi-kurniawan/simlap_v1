<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = "rooms";

    protected $fillable = [
        'kelas', 'role_id', 'no_urut'
    ];

    public function scopeOfAdminSchool($query, $value)
    {
        return $query->where('role_id', $value); 
    }
}
