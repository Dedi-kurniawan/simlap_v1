<?php

namespace App\Http\Controllers\DataTable\Admin;

use App\Http\Controllers\DataTable\BaseController as Controller;
use App\Models\School;
use App\Models\Smp\Report as SmpReport;
use App\Models\Sd\Report as SdReport;
use App\Models\Paud\Report as PaudReport;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{

    public function dashboard(Request $request)
    {
        if ($request->kategori == "paud") {
            $data = PaudReport::with('school:id,nama_sekolah');
        } elseif ($request->kategori == "sd") {
            $data = SdReport::with('school:id,nama_sekolah');
        } elseif ($request->kategori == "smp") {
            $data = SmpReport::with('school:id,nama_sekolah');
        }
        $data->OfBulan($request->bulan)
        ->OfTahun($request->tahun)
        ->OfSemester($request->semester)
        ->orderby('no_urut', 'asc');
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
        ->rawColumns(['teacher', 'employee', 'student', 'need', 'facility'])
        ->toJson();
    }
}
