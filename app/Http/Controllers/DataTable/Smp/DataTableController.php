<?php

namespace App\Http\Controllers\DataTable\Smp;

use App\Http\Controllers\DataTable\BaseController as Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Smp\Teacher;
use App\Models\Smp\Employee;
use App\Models\Smp\Need;
use App\Models\Smp\Student;
use App\Models\Smp\Facility;

class DataTableController extends Controller
{
    public function tendikData()
    {
        $data = Teacher::OfSchoolId($this->schoolId())->with(['district', 'village'])->orderBy('nama', 'ASC');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('tmt_sebagai_guru', function($data){
            return $this->formatTanggal($data->tmt_sebagai_guru);
        })
        ->addColumn('tmt_gol_terakhir', function($data){
            return $this->formatTanggal($data->tmt_gol_terakhir);
        })
        ->addColumn('tmt_sekolah', function($data){
            return $this->formatTanggal($data->tmt_sekolah);
        })
        ->addColumn('tanggal_lahir', function($data){
            return $this->formatTanggal($data->tanggal_lahir);
        })
        ->addColumn('tmt_jabatan', function($data){
            return $this->formatTanggal($data->tmt_jabatan);
        })
        ->addColumn('mapel', function($data){
            return str_replace(",","/", $data->mapel);
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
        ->addColumn('tmt_sebagai_guru', function($data){
            return $this->formatTanggal($data->tmt_sebagai_guru);
        })
        ->addColumn('tmt_gol_terakhir', function($data){
            return $this->formatTanggal($data->tmt_gol_terakhir);
        })
        ->addColumn('tmt_sekolah', function($data){
            return $this->formatTanggal($data->tmt_sekolah);
        })
        ->addColumn('tanggal_lahir', function($data){
            return $this->formatTanggal($data->tanggal_lahir);
        })
        ->addColumn('tmt_jabatan', function($data){
            return $this->formatTanggal($data->tmt_jabatan);
        })
        ->with([
            't_laki' => Employee::select('id', 'jenis_kelamin', 'school_id')->OfSchoolId($this->schoolId())->where('jenis_kelamin', 'L')->count(),
            't_perempuan' => Employee::select('id', 'jenis_kelamin', 'school_id')->OfSchoolId($this->schoolId())->where('jenis_kelamin', 'P')->count(),
        ])        
        ->toJson();
    }

    public function kebutuhanData()
    {
        $data = Need::OfSchoolId($this->schoolId());
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
            return $data->usia_11+$data->usia_12+$data->usia_13+$data->usia_14+$data->usia_15+$data->usia_16+$data->usia_17+$data->usia_18+$data->usia_19;
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
