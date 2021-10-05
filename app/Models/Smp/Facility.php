<?php

namespace App\Models\Smp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $table = "smp_facilities";

    protected $fillable = [
        'uraian' ,'baik' ,'rusak_ringan' ,'rusak_sedang' ,'rusak_berat' ,'kebutuhan', 'school_id', 'user_id'
    ];

    public function getJumlahKondisiAttribute()
    {
        return $this->baik+$this->rusak_ringan+$this->rusak_sedang+$this->rusak_berat;
    }

    public function school() 
    {
        return $this->belongsTo('App\Models\School', 'school_id');
    }

    public function user() 
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function scopeOfSchoolId($query, $value)
    {
        $query->where('school_id', $value); 
    }
}
