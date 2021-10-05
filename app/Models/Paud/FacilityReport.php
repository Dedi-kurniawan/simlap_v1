<?php

namespace App\Models\Paud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityReport extends Model
{
    use HasFactory;

    protected $table = "tk_facility_reports";

    protected $fillable = [
        'uraian' ,'baik' ,'rusak_ringan' ,'rusak_sedang' ,'rusak_berat' ,'kebutuhan', 'school_id', 'operator', 'bulan', 'tahun'
    ];

    public function school() 
    {
        return $this->belongsTo('App\Models\School', 'school_id');
    }

    public function getJumlahKondisiAttribute()
    {
        return $this->baik+$this->rusak_ringan+$this->rusak_sedang+$this->rusak_berat;
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
