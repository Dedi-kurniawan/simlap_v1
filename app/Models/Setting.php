<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan', 'tahun', 'status', 'role_id', 'semester'
    ];

    public function scopeOfAdminSchool($query, $value)
    {
        return $query->where('role_id', $value); 
    }

    public function getBulanFormatAttribute()
    {
            switch ($this->attributes['bulan']) {
                case "01":
                    $bulan = "Januari";
                    break;
                case "02":
                    $bulan = "Februari";
                    break;
                case "03":
                    $bulan = "Maret";
                    break;
                case "04":
                    $bulan = "April";
                    break;
                case "05":
                    $bulan = "Mei";
                    break;
                case "06":
                    $bulan = "Juni";
                    break;
                case "07":
                    $bulan = "Juli";
                    break;
                case "08":
                    $bulan = "Agustus";
                    break;
                case "09":
                    $bulan = "September";
                    break;
                case "10":
                    $bulan = "Oktober";
                    break;
                case "11":
                    $bulan = "November";
                    break;
                case "12":
                    $bulan = "Desember";
                    break;
            }
            return $bulan;
    }

    public function scopeOfStatusActive($query)
    {
        return $query->where('status', 'aktif'); 
    }

    public function scopeOfSemester($query, $value)
    {
        if (!empty($value)) {
            return $query->where('semester', $value); 
        }
    }

    public function scopeOfTahun($query, $value)
    {
        if (!empty($value)) {
            return $query->where('tahun', $value); 
        }
    }
}
