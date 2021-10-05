<?php

namespace App\Models\Smp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeedReport extends Model
{
    use HasFactory;

    protected $table = "smp_need_reports";

    protected $fillable = [
        'mapel', 'rombel', 'jam_rombel', 'jam_perminggu', 'jumlah_guru', 
        'status_kepegawaian', 'keterangan', 'school_id', 'operator', 'bulan', 'tahun', 'semester'
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
