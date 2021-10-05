<?php

namespace App\Models\Paud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "tk_employees";

    protected $fillable = [
        'nama', 'nip', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'pendidikan', 'status_pegawai', 
        'golongan', 'tahun_gol_terakhir', 'bulan_gol_terakhir', 'tugas_mengajar', 'alamat_rumah', 
        'tanggal_mulai_bekerja', 'tmt_gol_terakhir', 'tmt_capeg', 'pelatihan', 'sertifikasi',  'sertifikasi_tahun', 
        'school_id', 'koordinator_id', 'village_id', 'district_id', 'user_id' , 'jabatan'
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
