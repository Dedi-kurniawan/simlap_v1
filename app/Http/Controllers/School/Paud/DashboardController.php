<?php

namespace App\Http\Controllers\School\Paud;

use App\Http\Controllers\School\Paud\BaseController as Controller;
use App\Models\Paud\TeacherReport;
use App\Models\Paud\Report;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $bcrum = $this->bcrum('Dashboard', 'MAIN MENU', route('paud.dashboard'), 'Dashboard');
        $settings = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        $report = $this->report();
        $setting = $this->reportActive();
        return view('school.paud.dashboards.index', compact('bcrum', 'settings', 'report', 'setting'));
    }

    public function report()
    {
        $setting = $this->reportActive();
        $report  = Report::OfSchoolId($this->schoolId())->OfBulan($setting['bulan-save'])->OfTahun($setting['tahun'])->first();
        if ($report) {
                return [
                    'total_value' => ($report->employee+$report->student+$report->need+$report->teacher+$report->facility)*20,
                    'employee' => $report->employee == '1' ? '1' : '',
                    'student' => $report->student == '1' ? '1' : '',
                    'need' => $report->need == '1' ? '1' : '',
                    'teacher' => $report->teacher == '1' ? '1' : '',
                    'facility' => $report->facility == '1' ? '1' : '',
                    'tahun'   => $report->tahun,
                    'bulan'   => $report->bulan,
                    'semester' => $report->semester,
                    'status'  => 'ada'
                ];
            }else{
                return [
                    'total_value' => '0',
                    'employee' => '',
                    'student' => '',
                    'need' => '',
                    'teacher' => '',
                    'facility' => '',
                    'tahun'   => '',
                    'bulan'   => '',
                    'semester' => '',
                    'status'  => 'tidak ada'
                ];    
        }
    }

    public function teacher($request)
    {
        if($request->has('tahun')) {
            $tahun = $request->tahun;
        }else{
            $tahun = date('Y');
        }
        $data = TeacherReport::OfSchoolId($this->schoolId())->OfTahun($tahun)
                ->select('jenis_kelamin', 'bulan', DB::raw('count(*) as total'))
                 ->groupBy('jenis_kelamin', 'bulan')
                 ->orderBy('bulan', 'ASC')
                 ->get();
                 $group = $data->mapToGroups(function ($item, $key) {
                    return [
                        $item['jenis_kelamin'] => $item['total'],
                    ];
                });

                $bulan = $data->mapToGroups(function ($item, $key) {
                    return [
                        $item['bulan'] => $item['bulan']
                    ];
                });
                
                $dataset = [];
                foreach($group as $key => $d){
                    $dataset[] = [
                        'name' => $key == "P" ? "Perempuan" : "Laki-laki",
                        'data' => $d,
                    ];
                }

                $category = [];
                foreach($bulan as $key => $d){
                    $category[] = $this->getBulanFormat($key);
                }

               return [
                    'dataset' => $dataset,
                    'category' => $category,
                    'tahun' => $tahun,
                ];        
        
                // return response()->json(['status' => 'success', 'data' => $result]);
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
