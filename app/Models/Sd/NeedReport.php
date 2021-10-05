<?php

namespace App\Models\Sd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeedReport extends Model
{
    use HasFactory;

    protected $table = "sd_need_reports";

    protected $fillable = [
        'mapel', 'rombel', 'jam_rombel', 'jam_perminggu', 'jumlah_guru', 
        'status_kepegawaian', 'keterangan', 'school_id', 'operator', 'bulan', 'tahun'
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
