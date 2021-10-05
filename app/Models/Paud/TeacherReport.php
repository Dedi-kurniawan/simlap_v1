<?php

namespace App\Models\Paud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TeacherReport extends Model
{
    use HasFactory;

    protected $table = "tk_teacher_reports";

    protected $fillable = [
        'nama', 'nip', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'pendidikan', 'status_pegawai', 
        'golongan', 'tugas_mengajar', 'tanggal_mulai_bekerja', 'tmt_gol_terakhir', 'tmt_capeg', 'pelatihan', 'sertifikasi',  
        'sertifikasi_tahun', 'koordinator', 'school_id', 'operator', 'bulan', 'tahun', 'semester', 'alamat_rumah', 'jabatan'
    ];
    

    public function school() 
    {
        return $this->belongsTo('App\Models\School', 'school_id');
    }

    public function getTanggalMulaiMengajarFormatAttribute()
    {         
        if ($this->attributes['tanggal_mulai_bekerja'] == NULL) {
            return "-";
        } else {
            return Carbon::parse($this->attributes['tanggal_mulai_bekerja'])->format('d-m-Y');
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
        if ($this->attributes['tmt_capeg'] == NULL) {
            return "-";
        } else {
            return Carbon::parse($this->attributes['tmt_capeg'])->format('d-m-Y');
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
