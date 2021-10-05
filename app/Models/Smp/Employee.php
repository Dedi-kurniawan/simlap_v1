<?php

namespace App\Models\Smp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "smp_employees";

    protected $fillable = [
        'nama' ,'nuptk', 'nip', 'tmt_sebagai_guru', 'golongan', 'tmt_gol_terakhir', 'tmt_sekolah', 'jabatan', 
        'tmt_jabatan', 'tempat_lahir', 'tanggal_lahir', 'alamat_rumah', 'village_id', 'jenis_kelamin', 'status_pegawai',
        'pendidikan', 'school_id', 'user_id', 'district_id', 'koordinator_id'
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
