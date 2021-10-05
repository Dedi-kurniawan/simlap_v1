<?php

namespace App\Http\Controllers\School\Smp;

use App\Http\Controllers\School\Smp\BaseController as Controller;
use App\Models\School;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Smp\EmployeeReport;
use App\Models\Smp\FacilityReport;
use App\Models\Smp\NeedReport;
use App\Models\Smp\StudentReport;
use App\Models\Smp\TeacherReport;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $bcrum = $this->bcrum('Laporan', 'MAIN MENU', route('smp.laporan.index'), 'LAPORAN');
        $settings = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('school.smp.reports.index', compact('bcrum', 'settings'));
    }

    public function show(Request $request)
    {
        $teachers   = $this->teacher($request);
        $employees  = $this->employee($request);
        $needs      = $this->need($request);
        $students   = $this->student($request);
        $facilities = $this->facility($request);
        $bulan = $this->getBulanFormat($request->bulan)." ".$request->tahun;
        $schools = School::where('id', $this->schoolId())->with(['district', 'village'])->first();
        return view('school.smp.reports.report', compact('teachers', 'schools', 'bulan', 'employees', 'needs', 'students', 'facilities'));
    }

    public function teacher($request)
    {
        return TeacherReport::OfSchoolId($this->schoolId())
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->get();
    }

    public function employee($request)
    {
        return EmployeeReport::OfSchoolId($this->schoolId())
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->get();
    }

    public function need($request)
    {
        return NeedReport::OfSchoolId($this->schoolId())
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->get();
    }

    public function facility($request)
    {
        return FacilityReport::OfSchoolId($this->schoolId())
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->get();
    }

    public function student($request)
    {
        return StudentReport::OfSchoolId($this->schoolId())
                    ->OfBulan($request->bulan)
                    ->OfTahun($request->tahun)
                    ->orderBy('no_urut', 'ASC')
                    ->orderBy('kelas', 'ASC')
                    ->get()->groupBy('no_urut');
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
