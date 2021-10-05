<?php

namespace App\Http\Controllers\School\Paud;

use App\Http\Controllers\School\Paud\BaseController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Paud\TeacherRequest;
use App\Models\Paud\Teacher;
use App\Models\Paud\TeacherReport;
use App\Models\Position;
use App\Models\District;
use App\Models\Rank;
use App\Models\Major;
use App\Models\Village;
use App\Models\Paud\Report;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bcrum     = $this->bcrum('Data Tenaga Pendidik', 'MAIN MENU', route('paud.tenaga-pendidik.index'), 'TENAGA PENDIDIK');
        $ranks     = Rank::select('id', 'nama')->get();
        $majors    = Major::select('id', 'nama')->get();
        $positions = Position::select('id', 'nama')->get();
        $rooms     = Room::select('id', 'kelas', 'role_id')->where('role_id', '2')->get();
        $districts = District::select('id', 'nama')->get();
        $district_id = $this->districtId();
        return view('school.paud.teachers.index', compact('bcrum', 'ranks', 'majors', 'positions', 'rooms', 'districts', 'district_id'));
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
    public function store(TeacherRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['koordinator_id'] = $this->koordinatorId();
            $data['school_id'] = $this->schoolId();
            $data['user_id'] = $this->userId();
            $data['tugas_mengajar'] = implode(",", $request->tugas_mengajar);
            $create = Teacher::create($data); 
            DB::commit();
            return response()->json(['status' => 'success', 'message' => $create->nama. ' BERHASIL']);
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $qe->getMessage()]);
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
        $edit = Teacher::find($id);
        if ($edit) {
            $edit['tugas_mengajar'] = explode(",", $edit->tugas_mengajar);
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
    public function update(TeacherRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $update = Teacher::find($id);
            if ($update) {
                $data   = $request->all();
                $data['user_id'] = $this->userId();
                $data['tugas_mengajar'] = implode(",", $request->tugas_mengajar);
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
            $delete = Teacher::find($id);
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
            $report = TeacherReport::OfSchoolId($this->schoolId())
                                    ->OfBulan($setting['bulan-save'])
                                    ->OfTahun($setting['tahun'])
                                    ->OfSemester($setting['semester'])
                                    ->first();
            if ($setting['status'] != "aktif") {
                return response()->json(['status' => 'error', 'message' => 'Tidak ada laporan aktif']);       
            }elseif($report){
                $message = 'Laporan '.$setting['bulan'].' '.$setting['tahun'].' '.$setting['semester'].' sudah di generate';
                return response()->json(['status' => 'error', 'message' => $message]); 
            }else{
                $teachers = Teacher::OfSchoolId($this->schoolId())->with(['village', 'koordinator', 'district', 'user'])->get();
                $now = Carbon::now();
                $teacher_record = [];
                foreach ($teachers as $v) {
                    $teacher_record[] = [
                        'nama' => $v->nama, 
                        'nip' => $v->nip,  
                        'jenis_kelamin' => $v->jenis_kelamin, 
                        'tempat_lahir' => $v->tempat_lahir, 
                        'tanggal_lahir' => $v->tanggal_lahir, 
                        'pendidikan' => $v->pendidikan,
                        'status_pegawai' => $v->status_pegawai, 
                        'golongan' => $v->golongan,
                        'tugas_mengajar' => $v->tugas_mengajar, 
                        'tanggal_mulai_bekerja' => $v->tanggal_mulai_bekerja, 
                        'tmt_gol_terakhir' => $v->tmt_gol_terakhir, 
                        'tmt_capeg' => $v->tmt_capeg, 
                        'jabatan' => $v->jabatan,
                        'pelatihan' => $v->pelatihan, 
                        'sertifikasi' => $v->sertifikasi, 
                        'sertifikasi_tahun' => $v->sertifikasi_tahun,
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
                if ($teachers->count() == "0") {
                    $message = 'Laporan Tenaga Pendidik '.$setting['bulan'].' '.$setting['tahun'].' Di Larang Kosong';
                    return response()->json(['status' => 'error', 'message' => $message]);
                } else {
                    TeacherReport::insert($teacher_record);
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

    public function getVillage(Request $request)
    {
        $data = Village::where('district_id', $request->district_id)->get();
        $selected = $request->village_id;
        $title = "DESA";
        $select = view('layouts.backend.partials.render.select', compact('data', 'title', 'selected'))->render();
        return response()->json(['options' => $select]);
    }

    public function createReport($school, $bulan, $tahun, $semester)
    {
        $report = Report::OfSchoolId($school)->OfBulan($bulan)->OfTahun($tahun)->OfSemester($semester)->first();
        if ($report) {
            $now = Carbon::now();
            if ($report->student != '0' && $report->employee != '0' && $report->need != '0' && $report->facility != '0') {
                $nourut = Report::OfBulan($bulan)->OfTahun($tahun)->OfSemester($semester)->orderby('no_urut', 'desc')->first();
                return $report->update([
                    'teacher' => '1',
                    'no_urut' => $nourut->no_urut+1,
                    'completed_date' => $now,
                ]);
            }else{
                return $report->update([
                    'teacher' => '1',
                ]);
            }
        }else{
            return Report::create([
                'teacher' => '1',
                'operator' => $this->userName(), 
                'bulan' => $bulan, 
                'tahun' => $tahun,
                'school_id' => $school,
                'semester' => $semester, 
            ]);
        }
    }
}
