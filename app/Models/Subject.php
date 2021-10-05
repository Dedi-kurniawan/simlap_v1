<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'role_id'
    ];

    public function scopeOfAdminSchool($query, $value)
    {
        return $query->where('role_id', $value); 
    }
}
