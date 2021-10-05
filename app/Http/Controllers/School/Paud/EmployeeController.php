<?php

namespace App\Http\Controllers\School\Paud;

use App\Http\Controllers\School\Paud\BaseController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Paud\EmployeeRequest;
use App\Models\Paud\Employee;
use App\Models\Paud\EmployeeReport;
use App\Models\Position;
use App\Models\District;
use App\Models\Rank;
use App\Models\Paud\Report;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bcrum     = $this->bcrum('Data Tenaga Kependidikan', 'MAIN MENU', route('paud.tenaga-kependidikan.index'), 'TENAGA KEPENDIDIKAN');
        $ranks     = Rank::select('id', 'nama')->get();
        $positions = Position::select('id', 'nama')->where('id', '!=', '1')->get();
        $districts = District::select('id', 'nama')->get();
        $district_id = $this->districtId();
        return view('school.paud.employees.index', compact('bcrum', 'ranks', 'positions', 'districts', 'district_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['koordinator_id'] = $this->koordinatorId();
            $data['school_id'] = $this->schoolId();
            $data['user_id'] = $this->userId();
            $create = Employee::create($data); 
            DB::commit();
            return response()->json(['status' => 'success', 'message' => $create->nama. ' BERHASIL']);
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Employee::find($id);
        if ($edit) {
            $edit['mapel'] = explode(",", $edit->mapel);
            return response()->json(['status' => 'success', 'edit' => $edit]);
        }else{
            return response()->json(['status' => 'error']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $update = Employee::find($id);
            if ($update) {
                $data   = $request->all();
                $data['user_id'] = $this->userId();
                $update->update($data);
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $update->nama. ' BERHASIL']);                                                                                                                              
            }else{
                return response()->json(['status' => 'error']);
            }
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $delete = Employee::find($id);
            if ($delete) {
                $delete->delete();
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $delete->nama. ' BERHASIL']);                                                                                                                              
            }else{
                return response()->json(['status' => 'error', 'message' => 'Data tidak di temukan']);
            }
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
        }
    }

    public function generateReport()
    {
        DB::beginTransaction();
        try {
            $setting = $this->reportActive();
            $report = EmployeeReport::OfSchoolId($this->schoolId())->OfBulan($setting['bulan-save'])->OfTahun($setting['tahun'])->first();
            if ($setting['status'] != "aktif") {
                return response()->json(['status' => 'error', 'message' => 'Tidak ada laporan aktif']);       
            }elseif($report){
                $message = 'Laporan '.$setting['bulan'].' '.$setting['tahun'].' sudah di generate';
                return response()->json(['status' => 'error', 'message' => $message]); 
            }else{
                $employees = Employee::OfSchoolId($this->schoolId())->with(['village', 'koordinator', 'district', 'user'])->get();
                $now = Carbon::now();
                foreach ($employees as $v) {
                    $record[] =  [
                        'nama' => $v->nama, 
                        'nip' => $v->nip,  
                        'jenis_kelamin' => $v->jenis_kelamin, 
                        'tempat_lahir' => $v->tempat_lahir, 
                        'tanggal_lahir' => $v->tanggal_lahir, 
                        'pendidikan' => $v->pendidikan,
                        'status_pegawai' => $v->status_pegawai, 
                        'golongan' => $v->golongan,
                        'tanggal_mulai_bekerja' => $v->tanggal_mulai_bekerja, 
                        'tmt_gol_terakhir' => $v->tmt_gol_terakhir, 
                        'tmt_capeg' => $v->tmt_capeg, 
                        'jabatan' => $v->jabatan,
                        'school_id' => $v->school_id, 
                        'koordinator' => $v->koordinator->nama, 
                        'desa' => $v->village->nama, 
                        'kecamatan' => $v->district->nama, 
                        'operator' => $v->user->name, 
                        'alamat_rumah' => $v->alamat_rumah,
                        'bulan' => $setting['bulan-save'], 
                        'tahun' => $setting['tahun'],
                        'semester' => $setting['semester'],
                        'created_at' => $now,
                    ];
                }

                if ($employees->count() == "0") {
                    $message = 'Laporan Tenaga Kependidikan '.$setting['bulan'].' '.$setting['tahun'].' Di Larang Kosong';
                    return response()->json(['status' => 'error', 'message' => $message]);
                } else {
                    EmployeeReport::insert($record);
                    $this->createReport($this->schoolId(), $setting['bulan-save'], $setting['tahun'], $setting['semester']);
                    DB::commit();
                    $message = 'Laporan '.$setting['bulan'].' '.$setting['tahun'].' berhasil di generate';
                    return response()->json(['status' => 'success', 'message' => $message]);
                }
                
            }
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $qe->getMessage()]);
        }
    }

    public function createReport($school, $bulan, $tahun, $semester)
    {
        $report = Report::OfSchoolId($school)->OfBulan($bulan)->OfTahun($tahun)->OfSemester($semester)->first();
        if ($report) {
            $now = Carbon::now();
            if ($report->teacher != '0' && $report->student != '0' && $report->need != '0' && $report->facility != '0') {
                $nourut = Report::OfBulan($bulan)->OfTahun($tahun)->OfSemester($semester)->orderby('no_urut', 'desc')->first();
                return $report->update([
                    'employee' => '1',
                    'no_urut' => $nourut->no_urut+1,
                    'completed_date' => $now,
                ]);
            }else{
                return $report->update([
                    'employee' => '1',
                ]);
            }
        }else{
            return Report::create([
                'employee' => '1',
                'operator' => $this->userName(), 
                'bulan' => $bulan, 
                'tahun' => $tahun,
                'school_id' => $school,
                'semester' => $semester, 
            ]);
        }
    }
}
