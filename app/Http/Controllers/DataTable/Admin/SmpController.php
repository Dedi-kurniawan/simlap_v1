<?php

namespace App\Http\Controllers\DataTable\Admin;

use App\Http\Controllers\DataTable\BaseController as Controller;
use App\Models\School;
use App\Models\Smp\EmployeeReport;
use App\Models\Smp\FacilityReport;
use App\Models\Smp\NeedReport;
use App\Models\Smp\StudentReport;
use App\Models\Smp\TeacherReport;
use App\Models\Smp\Report;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class SmpController extends Controller
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
            return $data->usia_11+$data->usia_12+$data->usia_13+$data->usia_14+$data->usia_15+$data->usia_16+$data->usia_17+$data->usia_18+$data->usia_19;
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
