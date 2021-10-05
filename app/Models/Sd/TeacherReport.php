<?php

namespace App\Models\Sd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TeacherReport extends Model
{
    use HasFactory;

    protected $table = "sd_teacher_reports";

    protected $fillable = [
        'nama', 'nuptk', 'nip', 'tmt_sebagai_guru', 'golongan', 'tmt_gol_terakhir', 'tmt_sekolah', 'jabatan', 'tmt_jabatan', 'tempat_lahir', 
        'tanggal_lahir', 'alamat_rumah', 'mapel', 'sertifikasi', 'jenis_kelamin', 'status_pegawai', 'pendidikan', 'jurusan', 'jjm', 'school_id', 
        'koordinator', 'desa', 'kecamatan', 'operator', 'bulan', 'tahun', 'semester'
    ];
    

    public function school() 
    {
        return $this->belongsTo('App\Models\School', 'school_id');
    }

    public function getTmtSebagaiGuruFormatAttribute()
    {         
        if ($this->attributes['tmt_sebagai_guru'] == NULL) {
            return "-";
        } else {
            return Carbon::parse($this->attributes['tmt_sebagai_guru'])->format('d-m-Y');
        }          
    }

    public function getTmtGolTerakhirFormatAttribute()
    {
        if ($this->attributes['tmt_gol_terakhir'] == NULL) {
            return "-";
        } else {
            return Carbon::parse($this->attributes['tmt_gol_terakhir'])->format('d-m-Y');
        }
                   
    }

    public function getTmtJabatanFormatAttribute()
    {
        if ($this->attributes['tmt_jabatan'] == NULL) {
            return "-";
        } else {
            return Carbon::parse($this->attributes['tmt_jabatan'])->format('d-m-Y');
        }           
    }

    public function getTanggalLahirFormatAttribute()
    {
        if ($this->attributes['tanggal_lahir'] == NULL) {
            return "-";
        } else {
            return Carbon::parse($this->attributes['tanggal_lahir'])->format('d-m-Y');
        }             
    }

    public function getTmtSekolahFormatAttribute()
    {
        if ($this->attributes['tmt_sekolah'] == NULL) {
            return "-";
        } else {
            return Carbon::parse($this->attributes['tmt_sekolah'])->format('d-m-Y');
        }          
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
