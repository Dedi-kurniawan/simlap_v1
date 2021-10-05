<?php

namespace App\Models\Smp;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = "smp_reports";

    protected $fillable = [
        'teacher', 'student', 'employee', 'need', 'facility', 'bulan', 'tahun', 
        'operator', 'school_id', 'semester', 'no_urut', 'completed_date'
    ];

    public function school() 
    {
        return $this->belongsTo('App\Models\School', 'school_id');
    }

    public function getCompletedDateFormatAttribute()
    {
        if ($this->attributes['completed_date'] == NULL) {
            return "<span class='label label-lg label-light-warning label-inline'>Belum Selesai</span>";
        } else {
            $date = Carbon::parse($this->attributes['completed_date'])->isoFormat('dddd, D MMMM Y H:mm');
            return "<span class='label label-lg label-light-primary label-inline'>$date</span>";
        }             
    }

    public function getCreatedDateFormatAttribute()
    {
        $date = Carbon::parse($this->attributes['created_at'])->isoFormat('dddd, D MMMM Y H:mm');
        return "<span class='label label-lg label-light-success label-inline'>$date</span>";        
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
