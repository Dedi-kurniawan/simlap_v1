<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sekolah', 'nss', 'npsn', 'status_sekolah', 'tahun_berdiri', 'akreditasi', 'nilai_akreditasi', 
        'alamat_sekolah', 'district_id', 'village_id', 'telepon_sekolah', 'email', 'kurikulum', 'koordinator_id', 
        'kepala_sekolah', 'nip_kepala_sekolah', 'sertifikasi_kepala_sekolah', 'hp_kepala_sekolah', 'role_id', 'full_field'
    ];

    public function district() 
    {
        return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function village() 
    {
        return $this->belongsTo('App\Models\Village', 'village_id');
    }

    public function koordinator() 
    {
        return $this->belongsTo('App\Models\Koordinator', 'koordinator_id');
    }

    public function getAkreditasiSchoolAttribute()
    {
        if($this->akreditasi == NULL){
            return 'Belum Akreditasi';
        }else{
            return $this->akreditasi;
        }
    }

    public function scopeOfAdminSchool($query, $value)
    {
        if (!empty($value)) {
            return $query->where('role_id', $value); 
        }
    }

    public function scopeOfKoordinatorId($query, $value)
    {
        if (!empty($value)) {
            return $query->where('koordinator_id', $value); 
        }
    }

    public function teacherReportSmp() 
    {
        return $this->hasMany('App\Models\Smp\TeacherReport', 'school_id');
    }

    public function employeeReportSmp() 
    {
        return $this->hasMany('App\Models\Smp\EmployeeReport', 'school_id');
    }

    public function studentReportSmp()
    {
        return $this->hasMany('App\Models\Smp\StudentReport', 'school_id');
    }

    public function scopeOfTeacherReportSmp($query, $month, $year)
    {
        if (!empty($month)) {
            return $query->with('teacherReportSmp', function ($query) use ($month, $year) {
                return $query->where('bulan', '=', $month)->where('tahun', '=', $year);
            }); 
        }
    }

    public function scopeOfEmployeeReportSmp($query, $month, $year)
    {
        if (!empty($month)) {
            return $query->with('employeeReportSmp', function ($query) use ($month, $year) {
                return $query->where('bulan', '=', $month)->where('tahun', '=', $year);
            }); 
        }
    }

    public function scopeOfStudentReportSmp($query, $month, $year)
    {
        if (!empty($month)) {
            return $query->with('studentReportSmp', function ($query) use ($month, $year) {
                return $query->where('bulan', '=', $month)->where('tahun', '=', $year);
            }); 
        }
    }
}
