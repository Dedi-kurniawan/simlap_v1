<?php

namespace App\Models\Paud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class EmployeeReport extends Model
{
    use HasFactory;

    protected $table = "tk_employee_reports";

    protected $fillable = [
        'nama' ,'nuptk', 'nip', 'tmt_sebagai_guru', 'golongan', 'tmt_gol_terakhir', 'tmt_sekolah', 'jabatan', 
        'tmt_jabatan', 'tempat_lahir', 'tanggal_lahir', 'alamat_rumah', 'kecamatan', 'jenis_kelamin', 'status_pegawai',
        'pendidikan', 'school_id', 'operator', 'desa', 'koordinator', 'bulan', 'tahun'
    ];

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
