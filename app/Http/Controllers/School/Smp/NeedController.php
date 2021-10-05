<?php

namespace App\Http\Controllers\School\Smp;

use App\Http\Controllers\School\Smp\BaseController as Controller;
use App\Http\Requests\Smp\NeedRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Smp\Need;
use App\Models\Smp\NeedReport;
use App\Models\Smp\Report;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class NeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bcrum     = $this->bcrum('Data Analisis Kebutuhan Guru', 'MAIN MENU', route('smp.kebutuhan-guru.index'), 'ANALISIS KEBUTUHAN GURU');
        $subjects  = Subject::select('id', 'nama', 'role_id')->where('role_id', 4)->get();
        $coloumn = $this->kurikulum(). " " .$this->roleNama();
        return view('school.smp.needs.index', compact('bcrum', 'subjects', 'coloumn'));
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
    public function store(NeedRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['status_kepegawaian'] = implode(",", $request->status_kepegawaian);
            $data['school_id'] = $this->schoolId();
            $data['user_id'] = $this->userId();
            $create = Need::create($data); 
            DB::commit();
            return response()->json(['status' => 'success', 'message' => $create->mapel. " BERHASIL"]);
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
        $edit = Need::find($id);
        if ($edit) {
            $edit['status_kepegawaian'] = explode(",", $edit->status_kepegawaian);
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
    public function update(NeedRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $update = Need::find($id);
            if ($update) {
                $data   = $request->all();
                $data['status_kepegawaian'] = implode(",", $request->status_kepegawaian);
                $data['user_id'] = $this->userId();
                $update->update($data);
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $update->mapel. ' BERHASIL']);                                                                                                                              
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
            $delete = Need::find($id);
            if ($delete) {
                $delete->delete();
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $delete->mapel. ' BERHASIL']);                                                                                                                              
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
            $report = NeedReport::OfSchoolId($this->schoolId())->OfBulan($setting['bulan-save'])->OfTahun($setting['tahun'])->first();
            if ($setting['status'] != "aktif") {
                return response()->json(['status' => 'error', 'message' => 'Tidak ada laporan aktif']);       
            }elseif($report){
                $message = 'Laporan Analisis Kebutuhan Guru '.$setting['bulan'].' '.$setting['tahun'].' sudah di generate';
                return response()->json(['status' => 'error', 'message' => $message]); 
            }else{
                $needs = Need::with('user')->OfSchoolId($this->schoolId())->get();
                $need_record = [];
                $now = Carbon::now();
                foreach ($needs as $v) {
                    $need_record[] = [
                        'mapel' => $v->mapel, 
                        'rombel' => $v->rombel, 
                        'jam_rombel' => $v->jam_rombel, 
                        'jam_perminggu' => $v->jam_perminggu, 
                        'jumlah_guru' => $v->jumlah_guru, 
                        'status_kepegawaian' => $v->status_kepegawaian, 
                        'keterangan' => $v->keterangan,
                        'school_id' => $v->school_id, 
                        'operator' => $v->user->name, 
                        'bulan' => $setting['bulan-save'], 
                        'tahun' => $setting['tahun'],
                        'created_at' => $now
                    ];
                }

                if ($needs->count() == "0") {
                    $message = 'Laporan Analisis Kebutuhan Guru '.$setting['bulan'].' '.$setting['tahun'].' Di Larang Kosong';
                    return response()->json(['status' => 'error', 'message' => $message]);
                } else {
                    NeedReport::insert($need_record);
                    $this->createReport($this->schoolId(), $setting['bulan-save'], $setting['tahun'], $setting['semester']);
                    DB::commit();
                    $message = 'Laporan Analisis Kebutuhan Guru '.$setting['bulan'].' '.$setting['tahun'].' berhasil di generate';
                    return response()->json(['status' => 'success', 'message' => $message]);
                }
            }
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $qe]);
        }
    }

    public function createReport($school, $bulan, $tahun, $semester)
    {
        $report = Report::OfSchoolId($school)->OfBulan($bulan)->OfTahun($tahun)->OfSemester($semester)->first();
        if ($report) {
            $now = Carbon::now();
            if ($report->teacher != '0' && $report->student != '0' && $report->employee != '0' && $report->facility != '0') {
                $nourut = Report::OfBulan($bulan)->OfTahun($tahun)->OfSemester($semester)->orderby('no_urut', 'desc')->first();
                return $report->update([
                    'need' => '1',
                    'no_urut' => $nourut->no_urut+1,
                    'completed_date' => $now,
                ]);
            }else{
                return $report->update([
                    'need' => '1',
                ]);
            }
        }else{
            return Report::create([
                'need' => '1',
                'operator' => $this->userName(), 
                'bulan' => $bulan, 
                'tahun' => $tahun,
                'school_id' => $school,
                'semester' => $semester, 
            ]);
        }
    }
}
