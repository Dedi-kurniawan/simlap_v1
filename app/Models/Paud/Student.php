<?php

namespace App\Models\Paud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "tk_students";

    protected $fillable = [
        'room_id', 'siswa_l', 'siswa_p', 'usia_2', 'usia_3', 'usia_4', 'usia_5', 'usia_6', 
        'usia_18', 'usia_19', 'islam', 'katolik', 'protestan', 'hindu', 'budha', 'lain', 'school_id', 'user_id', 'no_urut'
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
