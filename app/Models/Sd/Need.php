<?php

namespace App\Models\Sd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    use HasFactory;

    protected $table = "sd_needs";

    protected $fillable = [
        'mapel', 'rombel', 'jam_rombel', 'jam_perminggu', 'jumlah_guru', 
        'status_kepegawaian', 'keterangan', 'school_id', 'user_id'
    ];

    
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
