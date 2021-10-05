<?php

namespace App\Http\Controllers\School\Paud;

use App\Http\Controllers\School\Paud\BaseController as Controller;
use App\Http\Requests\Paud\StudentRequest;
use App\Models\Paud\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Paud\Student;
use App\Models\Paud\StudentReport;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bcrum = $this->bcrum('Data Peserta Didik Paud', 'MAIN MENU', route('paud.peserta-didik.index'), 'PESERTA DIDIK PAUD');
        $rooms = Room::where('role_id', $this->roleId())->get();       
        return view('school.paud.students.index', compact('bcrum', 'rooms'));
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
    public function store(StudentRequest $request)
    {
        DB::beginTransaction();
        try {
            $rooms = Room::where('id', $request->room_id)->first();   
            $data = $request->all();
            $data['school_id'] = $this->schoolId();
            $data['user_id'] = $this->userId();
            $data['no_urut'] = $rooms->no_urut;
            $create = Student::create($data); 
            DB::commit();
            return response()->json(['status' => 'success', 'message' => $create->room->kelas. " BERHASIL"]);
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
        $edit = Student::find($id);
        if ($edit) {
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
    public function update(StudentRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $update = Student::find($id);
            if ($update) {
                $rooms = Room::where('id', $request->room_id)->first(); 
                $data   = $request->all();
                $data['user_id'] = $this->userId();
                $data['no_urut'] = $rooms->no_urut;
                $update->update($data);
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $update->room->kelas. ' BERHASIL']);                                                                                                                              
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
            $delete = Student::find($id);
            if ($delete) {
                $delete->delete();
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $delete->room->kelas. ' BERHASIL']);                                                                                                                              
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
            $report = StudentReport::OfSchoolId($this->schoolId())->OfBulan($setting['bulan-save'])->OfTahun($setting['tahun'])->first();
            if ($setting['status'] != "aktif") {
                return response()->json(['status' => 'error', 'message' => 'Tidak ada laporan aktif']);       
            }elseif($report){
                $message = 'Laporan Peserta Didik '.$setting['bulan'].' '.$setting['tahun'].' sudah di generate';
                return response()->json(['status' => 'error', 'message' => $message]); 
            }else{
                $students = Student::OfSchoolId($this->schoolId())->with(['room','user'])->get();
                $record = [];
                $now = Carbon::now();
                foreach ($students as $v) {
                    $record[] =[
                        'kelas' => $v->room->kelas, 
                        'no_urut' => $v->no_urut, 
                        'siswa_l' => $v->siswa_l, 
                        'siswa_p' => $v->siswa_p,
                        'usia_2' => $v->usia_2, 
                        'usia_3' => $v->usia_3, 
                        'usia_4' => $v->usia_4, 
                        'usia_5' => $v->usia_5, 
                        'usia_6' => $v->usia_6, 
                        'islam' => $v->islam, 
                        'katolik' => $v->katolik, 
                        'protestan' => $v->protestan, 
                        'hindu' => $v->hindu, 
                        'budha' => $v->budha, 
                        'lain' => $v->lain, 
                        'school_id' => $v->school_id, 
                        'operator' => $v->user->name, 
                        'bulan' => $setting['bulan-save'], 
                        'tahun' => $setting['tahun'],
                        'semester' => $setting['semester'],
                        'created_at' => $now,
                    ];
                }

                if ($students->count() == "0") {
                    $message = 'Laporan Peserta Didik '.$setting['bulan'].' '.$setting['tahun'].' Di Larang Kosong';
                    return response()->json(['status' => 'error', 'message' => $message]);
                } else {
                    StudentReport::insert($record);
                    $this->createReport($this->schoolId(), $setting['bulan-save'], $setting['tahun'], $setting['semester']);
                    DB::commit();
                    $message = 'Laporan Peserta Didik '.$setting['bulan'].' '.$setting['tahun'].' berhasil di generate';
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
            if ($report->teacher != '0' && $report->employee != '0' && $report->need != '0' && $report->facility != '0') {
                $nourut = Report::OfBulan($bulan)->OfTahun($tahun)->OfSemester($semester)->orderby('no_urut', 'desc')->first();
                return $report->update([
                    'student' => '1',
                    'no_urut' => $nourut->no_urut+1,
                    'completed_date' => $now,
                ]);
            }else{
                return $report->update([
                    'student' => '1',
                ]);
            }
        }else{
            return Report::create([
                'student' => '1',
                'operator' => $this->userName(), 
                'bulan' => $bulan, 
                'tahun' => $tahun,
                'school_id' => $school,
                'semester' => $semester, 
            ]);
        }
    }
}
