<?php

namespace App\Models\Smp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReport extends Model
{
    use HasFactory;

    protected $table = "smp_student_reports";

    protected $fillable = [
        'kelas', 'siswa_l', 'siswa_p', 'usia_11', 'usia_12', 'usia_13', 'usia_14', 'usia_15', 'usia_16', 'usia_17', 
        'usia_18', 'usia_19', 'islam', 'katolik', 'protestan', 'hindu', 'budha', 'lain', 'school_id', 'operator', 'no_urut', 'bulan', 'tahun', 'operator', 'semester'
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

    public function scopeOfSemester($query, $value)
    {
        return $query->where('semester', $value); 
    }
}
