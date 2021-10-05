<?php

namespace App\Http\Controllers\DataTable\Admin;

use App\Http\Controllers\DataTable\BaseController as Controller;
use App\Models\School;
use App\Models\Setting;
use App\Models\Paud\EmployeeReport;
use App\Models\Paud\FacilityReport;
use App\Models\Paud\NeedReport;
use App\Models\Paud\StudentReport;
use App\Models\Paud\TeacherReport;
use App\Models\User;
use App\Models\Paud\Report;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class PaudController extends Controller
{

    public function dashboard(Request $request)
    {
        $data = Report::with('school:id,nama_sekolah')
        ->OfBulan($request->bulan)
        ->OfTahun($request->tahun)
        ->OfSemester($request->semester)
        ->orderByRaw('ISNULL(completed_date), completed_date ASC');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('teacher',function($data){
            return view('layouts.backend.partials.action._report',[
                'report' => $data->teacher,
            ]);
        })
        ->addColumn('employee',function($data){
            return view('layouts.backend.partials.action._report',[
                'report' => $data->employee,
            ]);
        })
        ->addColumn('need',function($data){
            return view('layouts.backend.partials.action._report',[
                'report' => $data->need,
            ]);
        })
        ->addColumn('student',function($data){
            return view('layouts.backend.partials.action._report',[
                'report' => $data->student,
            ]);
        })
        ->addColumn('facility',function($data){
            return view('layouts.backend.partials.action._report',[
                'report' => $data->facility,
            ]);
        })
        ->addColumn('completed_date_format',function($data){
            return $data->CompletedDateFormat;
        })
        ->addColumn('created_date_format',function($data){
            return $data->CreatedDateFormat;
        })
        ->rawColumns(['teacher', 'employee', 'student', 'need', 'facility', 'completed_date_format', 'created_date_format'])
        ->toJson();
    }

    public function tendikData(Request $request)
    {
        $data = TeacherReport::OfSchoolId($request->school_id)
        ->OfBulan($request->bulan)
        ->OfTahun($request->tahun)
        ->orderBy('nama', 'ASC');
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
                return "Sudah";
            } else if($data->sertifikasi == "0"){
                return "Belum";
            }            
        })      
        ->toJson();
    }

    public function tenkedikData(Request $request)
    {
        $data = EmployeeReport::OfSchoolId($request->school_id)
        ->OfBulan($request->bulan)
        ->OfTahun($request->tahun)
        ->orderBy('nama', 'ASC');
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
        ->toJson();
    }

    public function kebutuhanData(Request $request)
    {
        $school = School::find($request->school_id);
        $data = NeedReport::OfSchoolId($request->school_id)
        ->OfBulan($request->bulan)
        ->OfTahun($request->tahun);
        return DataTables::of($data)
        ->addIndexColumn()    
        ->addColumn('total_jam', function($data){
            return $data->rombel*$data->jam_rombel;
        })
        ->with(['kurikulum' => $school ? $school->kurikulum : "kurikulum"])
        ->toJson();
    }

    public function pendikData(Request $request)
    {
        $data = StudentReport::OfSchoolId($request->school_id)
        ->OfBulan($request->bulan)
        ->OfTahun($request->tahun)
        ->orderBy('no_urut', 'asc');
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

    public function saranaData(Request $request)
    {
        $data = FacilityReport::OfSchoolId($request->school_id)
        ->OfBulan($request->bulan)
        ->OfTahun($request->tahun)
        ->orderBy('uraian', 'asc');
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
