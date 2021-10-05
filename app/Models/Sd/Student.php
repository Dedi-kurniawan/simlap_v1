<?php

namespace App\Models\Sd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "sd_students";

    protected $fillable = [
        'room_id', 'siswa_l', 'siswa_p', 'usia_6', 'usia_7', 'usia_8', 'usia_9', 'usia_10', 
        'usia_11', 'usia_12', 'usia_13', 'usia_14', 'usia_15', 'islam', 'katolik', 'protestan', 
        'hindu', 'budha', 'lain', 'school_id', 'user_id', 'no_urut'
    ];

    public function user() 
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function room() 
    {
        return $this->belongsTo('App\Models\Room', 'room_id')->orderBy('no_urut', 'desc');
    }

    public function scopeOfSchoolId($query, $value)
    {
        return $query->where('school_id', $value); 
    }
}
