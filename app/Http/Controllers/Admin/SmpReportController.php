<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\School;
use App\Models\Smp\EmployeeReport;
use App\Models\Smp\FacilityReport;
use App\Models\Smp\NeedReport;
use App\Models\Smp\StudentReport;
use App\Models\Smp\TeacherReport;
use App\Models\Smp\Report;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SmpReportController extends Controller
{

    public function report(Request $request)
    {
        $teachers = TeacherReport::OfSchoolId($request->school_id)
            ->OfBulan($request->bulan)
            ->OfTahun($request->tahun)
            ->get();
        $employees = EmployeeReport::OfSchoolId($request->school_id)
            ->OfBulan($request->bulan)
            ->OfTahun($request->tahun)
            ->get();
        $needs = NeedReport::OfSchoolId($request->school_id)
            ->OfBulan($request->bulan)
            ->OfTahun($request->tahun)
            ->get();
        $facilities = FacilityReport::OfSchoolId($request->school_id)
            ->OfBulan($request->bulan)
            ->OfTahun($request->tahun)
            ->get();
        $students  = StudentReport::OfSchoolId($request->school_id)
                ->OfBulan($request->bulan)
                ->OfTahun($request->tahun)
                ->orderBy('no_urut', 'ASC')
                ->orderBy('kelas', 'ASC')
                ->get()->groupBy('no_urut');
                $bulan = $this->getBulanFormat($request->bulan)." ".$request->tahun;
        $schools = School::where('id', $request->school_id)->with(['district', 'village'])->first();
        return view('admin.smp.report.report', compact('teachers', 'schools', 'bulan', 'employees', 'needs', 'students', 'facilities'));
    }

    public function teacher(Request $request)
    {
        $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;
        $schools   = School::where('id', $request->school_id)->with(['district', 'village'])->first();
        $teachers = TeacherReport::OfSchoolId($request->school_id)
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->get();
        return view('admin.smp.report.teacher', compact('teachers', 'schools', 'bulan'));
    }

    public function employee(Request $request)
    {
        $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;
        $schools   = School::where('id', $request->school_id)->with(['district', 'village'])->first();
        $employees = EmployeeReport::OfSchoolId($request->school_id)
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->get();
        return view('admin.smp.report.employee', compact('employees', 'schools', 'bulan'));
    }

    public function need(Request $request)
    {
        $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;
        $schools   = School::where('id', $request->school_id)->with(['district', 'village'])->first();
        $needs     = NeedReport::OfSchoolId($request->school_id)
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->get();
        return view('admin.smp.report.need', compact('needs', 'schools', 'bulan'));
    }

    public function facility(Request $request)
    {
        $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;
        $schools   = School::where('id', $request->school_id)->with(['district', 'village'])->first();
        $facilities = FacilityReport::OfSchoolId($request->school_id)
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->get();
                    return view('admin.smp.report.facility', compact('facilities', 'schools', 'bulan'));
    }

    public function student(Request $request)
    {
        $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;
        $schools   = School::where('id', $request->school_id)->with(['district', 'village'])->first();
        $students  = StudentReport::OfSchoolId($request->school_id)
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->orderBy('no_urut', 'ASC')
                    ->orderBy('kelas', 'ASC')
                    ->get()->groupBy('no_urut');
        return view('admin.smp.report.student', compact('students', 'schools', 'bulan'));
    }

    public function reset(Request $request)
    {
        DB::beginTransaction();
        try {
            switch ($request->laporan) {
                case 'teacher':
                    $teachers = TeacherReport::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
                        ->OfSemester($request->semester)
                        ->delete();
                    $report = Report::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
                        ->OfSemester($request->semester)
                        ->first();
                        if ($report) {
                            $report->update([
                                'teacher' => '0',
                                'completed_date' => NULL
                            ]);
                        }
                    break;
                case 'student':
                    $students = StudentReport::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
                        ->OfSemester($request->semester)
                        ->delete();
                    $report = Report::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
                        ->OfSemester($request->semester)
                        ->first();
                        if ($report) {
                            $report->update([
                                'student' => '0',
                                'completed_date' => NULL
                            ]);
                        }
                    break;
                case 'need':
                    $needs = NeedReport::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
                         ->OfSemester($request->semester)
                        ->delete();
                    $report = Report::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
                        ->OfSemester($request->semester)
                        ->first();
                        if ($report) {
                            $report->update([
                                'need' => '0',
                                'completed_date' => NULL
                            ]);
                        }
                    break;
                case 'facility':
                    $facility = FacilityReport::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
                         ->OfSemester($request->semester)
                        ->delete();
                    $report = Report::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
                        ->OfSemester($request->semester)
                        ->first();
                        if ($report) {
                            $report->update([
                                'facility' => '0',
                                'completed_date' => NULL
                            ]);
                        }
                    break;
                case 'employee':
                    $students = EmployeeReport::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
                         ->OfSemester($request->semester)
                        ->delete();
                    $report = Report::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
                        ->OfSemester($request->semester)
                        ->first();
                        if ($report) {
                            $report->update([
                                'employee' => '0',
                                'completed_date' => NULL
                            ]);
                        }
                    break;
                
                default:
                    # code...
                    break;
            }
            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Laporan '.$request->laporan.' Berhasil di reset']);
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $qe->getMessage()]);
        }
    }

    public function reportRekap(Request $request)
    {
        switch ($request->laporan) {
            case 'teacher':
                if ($request->district_id) {
                    $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;
                    $district  = District::where('id', $request->district_id)->first();
                    $schools  = School::where('role_id', '4')
                                ->where('district_id', $request->district_id)
                                ->OfTeacherReportSmp($request->bulan, $request->tahun)
                                ->get();
                    $data = [
                        'bulan' => $bulan,
                        'kecamatan' => $district->nama,
                        'jlh_sekolah' => $schools->count()
                    ];
                    return view('admin.smp.report.teacher_rekap', compact('schools', 'data'));
                } else {
                    $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;   
                    $district  = District::select('id', 'nama')->get();         
                    $schools   = School::where('role_id', '4')
                                ->whereNotNull('district_id')
                                ->OfTeacherReportSmp($request->bulan, $request->tahun)
                                ->with('district:id,nama')
                                ->get()
                                ->groupBy('district.nama');
        
                    $data = [
                        'bulan' => $bulan,
                        'kecamatan' => $district->count(),
                    ];
                    return view('admin.smp.report.teacher_rekap_all', compact('schools', 'data', 'district'));
                }
                break;
            case 'employee':
                    if ($request->district_id) {
                        $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;
                        $district  = District::where('id', $request->district_id)->first();
                        $schools  = School::where('role_id', '4')
                                    ->where('district_id', $request->district_id)
                                    ->OfEmployeeReportSmp($request->bulan, $request->tahun)
                                    ->get();
                        $data = [
                            'bulan' => $bulan,
                            'kecamatan' => $district->nama,
                            'jlh_sekolah' => $schools->count()
                        ];
                        return view('admin.smp.report.employee_rekap', compact('schools', 'data'));
                    } else {
                        $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;   
                        $district  = District::select('id', 'nama')->get();         
                        $schools   = School::where('role_id', '4')
                                    ->whereNotNull('district_id')
                                    ->OfEmployeeReportSmp($request->bulan, $request->tahun)
                                    ->with('district:id,nama')
                                    ->get()
                                    ->groupBy('district.nama');
            
                        $data = [
                            'bulan' => $bulan,
                            'kecamatan' => $district->count(),
                        ];
                        return view('admin.smp.report.employee_rekap_all', compact('schools', 'data', 'district'));
                    }
                break;
            case 'student':
                    if ($request->district_id) {
                        $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;
                        $district  = District::where('id', $request->district_id)->first();
                        $schools   = School::where('role_id', '4')->where('district_id', $request->district_id)
                                    ->OfStudentReportSmp($request->bulan, $request->tahun)
                                    ->get();
                        $data = [
                            'bulan' => $bulan,
                            'kecamatan' => $district->nama,
                            'jlh_sekolah' => $schools->count()
                        ];
                        return view('admin.smp.report.student_rekap', compact('schools', 'data'));
                    } else {
                        $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;
                        $district  = District::select('id', 'nama')->get();
                        $schools   = School::where('role_id', '4')
                                    ->whereNotNull('district_id')
                                    ->OfStudentReportSmp($request->bulan, $request->tahun)
                                    ->with('district:id,nama')
                                    ->get()
                                    ->groupBy('district.nama');
                        $data = [
                            'bulan' => $bulan,
                            'kecamatan' => $district->count(),
                        ];
                        return view('admin.smp.report.student_rekap_all', compact('schools', 'data', 'district'));
                    }
                break;
            
            default:
                # code...
                break;
        }
    }

    public function getBulanFormat($value)
    {
        switch ($value) {
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
}
