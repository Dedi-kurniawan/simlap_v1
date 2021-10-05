<?php

namespace App\Models\Sd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReport extends Model
{
    use HasFactory;

    protected $table = "sd_student_reports";

    protected $fillable = [
        'kelas', 'siswa_l', 'siswa_p', 'usia_11', 'usia_12', 'usia_13', 'usia_14', 'usia_15', 'usia_16', 'usia_17', 
        'usia_18', 'usia_19', 'islam', 'katolik', 'protestan', 'hindu', 'budha', 'lain', 'school_id', 'operator', 'no_urut', 'bulan', 'tahun', 'operator'
    ];

    public function school() 
    {
        return $this->belongsTo('App\Models\School', 'school_id');
    }

    public function scopeOfSchoolId($query, $value)
    {
        return $query->where('school_id', $value); 
    }

    public function scopeOfBulan($query, $value)
    {
        return $query->where('bulan', $value); 
    }

    public function scopeOfTahun($query, $value)
    {
        return $query->where('tahun', $value); 
    }
}
