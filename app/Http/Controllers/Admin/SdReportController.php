<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Sd\EmployeeReport;
use App\Models\Sd\FacilityReport;
use App\Models\Sd\NeedReport;
use App\Models\Sd\StudentReport;
use App\Models\Sd\TeacherReport;
use Illuminate\Http\Request;
use App\Models\Sd\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class SdReportController extends Controller
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
        $students = StudentReport::OfSchoolId($request->school_id)
            ->OfBulan($request->bulan)
            ->OfTahun($request->tahun)
            ->orderBy('no_urut', 'ASC')
            ->orderBy('kelas', 'ASC')
            ->get()->groupBy('no_urut');
                $bulan = $this->getBulanFormat($request->bulan)." ".$request->tahun;
        $schools = School::where('id', $request->school_id)->with(['district', 'village'])->first();
        return view('admin.sd.report.report', compact('teachers', 'schools', 'bulan', 'employees', 'needs', 'students', 'facilities'));
    }

    public function teacher(Request $request)
    {
        $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;
        $schools   = School::where('id', $request->school_id)->with(['district', 'village'])->first();
        $teachers  = TeacherReport::OfSchoolId($request->school_id)
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->get();
        return view('admin.sd.report.teacher', compact('teachers', 'schools', 'bulan'));
    }

    public function employee(Request $request)
    {
        $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;
        $schools   = School::where('id', $request->school_id)->with(['district', 'village'])->first();
        $employees = EmployeeReport::OfSchoolId($request->school_id)
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->get();
        return view('admin.sd.report.employee', compact('employees', 'schools', 'bulan'));
    }

    public function need(Request $request)
    {
        $bulan     = $this->getBulanFormat($request->bulan)." ".$request->tahun;
        $schools   = School::where('id', $request->school_id)->with(['district', 'village'])->first();
        $needs     = NeedReport::OfSchoolId($request->school_id)
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->get();
        return view('admin.sd.report.need', compact('needs', 'schools', 'bulan'));
    }

    public function facility(Request $request)
    {
        $bulan      = $this->getBulanFormat($request->bulan)." ".$request->tahun;
        $schools    = School::where('id', $request->school_id)->with(['district', 'village'])->first();
        $facilities = FacilityReport::OfSchoolId($request->school_id)
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->get();
                    return view('admin.sd.report.facility', compact('facilities', 'schools', 'bulan'));
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
        return view('admin.sd.report.student', compact('students', 'schools', 'bulan'));
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
                        }else{
                            return response()->json(['status' => 'error', 'message' => 'Laporan '.$request->message_alert.' Tidak di temukan']);
                        }
                    break;
                case 'student':
                    $students = StudentReport::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
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
                        }else{
                            return response()->json(['status' => 'error', 'message' => 'Laporan '.$request->message_alert.' Tidak di temukan']);
                        }
                    break;
                case 'need':
                    $needs = NeedReport::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
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
                        }else{
                            return response()->json(['status' => 'error', 'message' => 'Laporan '.$request->message_alert.' Tidak di temukan']);
                        }
                    break;
                case 'facility':
                    $facility = FacilityReport::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
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
                        }else{
                            return response()->json(['status' => 'error', 'message' => 'Laporan '.$request->message_alert.' Tidak di temukan']);
                        }
                    break;
                case 'employee':
                    $students = EmployeeReport::OfSchoolId($request->school_id)
                        ->OfBulan($request->bulan)
                        ->OfTahun($request->tahun)
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
                        }else{
                            return response()->json(['status' => 'error', 'message' => 'Laporan '.$request->message_alert.' Tidak di temukan']);
                        }
                    break;
                
                default:
                    return response()->json(['status' => 'error', 'message' => 'Laporan '.$request->message_alert.' Tidak di temukan']);
                    break;
            }
            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Laporan '.$request->message_alert.' Berhasil di reset']);
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $qe->getMessage()]);
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
