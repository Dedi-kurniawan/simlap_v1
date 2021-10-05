<?php

namespace App\Http\Controllers\DataTable\Paud;

use App\Http\Controllers\DataTable\BaseController as Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Paud\Teacher;
use App\Models\Paud\Employee;
use App\Models\Paud\Need;
use App\Models\Paud\Student;
use App\Models\Paud\Facility;

class DataTableController extends Controller
{
    public function tendikData()
    {
        $data = Teacher::OfSchoolId($this->schoolId())->with(['district', 'village'])->orderBy('nama', 'ASC');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('tmt_gol_terakhir', function($data){
            return $this->formatTanggal($data->tmt_gol_terakhir);
        })
        ->addColumn('tanggal_mulai_bekerja', function($data){
            return $this->formatTanggal($data->tanggal_mulai_bekerja);
        })
        ->addColumn('tanggal_lahir', function($data){
            return $this->formatTanggal($data->tanggal_lahir);
        })
        ->addColumn('tmt_capeg', function($data){
            return $this->formatTanggal($data->tmt_capeg);
        })
        ->addColumn('sertifikasi', function($data){
            if ($data->sertifikasi == "1") {
                return "S";
            } else if($data->sertifikasi == "0"){
                return "B";
            }            
        })
        ->with([
            't_laki' => Teacher::select('id', 'jenis_kelamin', 'school_id')->OfSchoolId($this->schoolId())->where('jenis_kelamin', 'L')->count(),
            't_perempuan' => Teacher::select('id', 'jenis_kelamin', 'school_id')->OfSchoolId($this->schoolId())->where('jenis_kelamin', 'P')->count(),
        ])        
        ->toJson();
    }

    public function tenkedikData()
    {
        $data = Employee::OfSchoolId($this->schoolId())->with(['district', 'village'])->orderBy('nama', 'ASC');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('tanggal_mulai_bekerja', function($data){
            return $this->formatTanggal($data->tanggal_mulai_bekerja);
        })
        ->addColumn('tmt_gol_terakhir', function($data){
            return $this->formatTanggal($data->tmt_gol_terakhir);
        })
        ->addColumn('tanggal_lahir', function($data){
            return $this->formatTanggal($data->tanggal_lahir);
        })
        ->addColumn('tmt_capeg', function($data){
            return $this->formatTanggal($data->tmt_capeg);
        })
        ->with([
            't_laki' => Employee::select('id', 'jenis_kelamin', 'school_id')->OfSchoolId($this->schoolId())->where('jenis_kelamin', 'L')->count(),
            't_perempuan' => Employee::select('id', 'jenis_kelamin', 'school_id')->OfSchoolId($this->schoolId())->where('jenis_kelamin', 'P')->count(),
        ])        
        ->toJson();
    }

    public function kebutuhanData()
    {
        $data = Need::OfSchoolId($this->schoolId())->orderBy('mapel', 'ASC');
        return DataTables::of($data)
        ->addIndexColumn()    
        ->addColumn('total_jam', function($data){
            return $data->rombel*$data->jam_rombel;
        })
        ->toJson();
    }

    public function pendikData()
    {
        $data = Student::OfSchoolId($this->schoolId())->with('room')->orderBy('no_urut', 'asc');
        return DataTables::of($data)
        ->addIndexColumn() 
        ->addColumn('jlh_jk', function($data){
            return $data->siswa_l+$data->siswa_p;
        })
        ->addColumn('jlh_usia', function($data){
            return $data->usia_2+$data->usia_3+$data->usia_4+$data->usia_5+$data->usia_6;
        })
        ->addColumn('jlh_agama', function($data){
            return $data->islam+$data->katolik+$data->protestan+$data->budha+$data->hindu+$data->lain;
        })
        ->toJson();
    }

    public function saranaData()
    {
        $data = Facility::OfSchoolId($this->schoolId())->orderBy('uraian', 'asc');
        return DataTables::of($data)
        ->addIndexColumn() 
        ->addColumn('jlh_kondisi', function($data){
            return $data->JumlahKondisi;
        })
        ->addColumn('keterangan', function($data){
            if ($data->JumlahKondisi > $data->kebutuhan) {
                return "LEBIH";
            }elseif ($data->JumlahKondisi == $data->kebutuhan) {
                return "CUKUP";
            }else{
                return "KURANG";
            }
        })
        ->toJson();
    }
}
