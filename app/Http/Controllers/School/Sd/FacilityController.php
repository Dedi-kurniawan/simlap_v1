<?php

namespace App\Http\Controllers\School\Sd;

use App\Http\Controllers\School\Sd\BaseController as Controller;
use App\Http\Requests\Sd\FacilityRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Description;
use App\Models\Sd\Facility;
use App\Models\Sd\FacilityReport;
use App\Models\Sd\Report;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bcrum     = $this->bcrum('Data Kondisi Sarana dan Prasarana', 'MAIN MENU', route('smp.sarana-prasarana.index'), 'KONDISI SARANA DAN PRASARAN');
        $descriptions  = Description::select('id', 'nama')->get();
        return view('school.sd.facilities.index', compact('bcrum', 'descriptions'));
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
    public function store(FacilityRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['school_id'] = $this->schoolId();
            $data['user_id'] = $this->userId();
            $create = Facility::create($data); 
            DB::commit();
            return response()->json(['status' => 'success', 'message' => $create->uraian. " BERHASIL"]);
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
        $edit = Facility::find($id);
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
    public function update(FacilityRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $update = Facility::find($id);
            if ($update) {
                $data   = $request->all();
                $data['user_id'] = $this->userId();
                $update->update($data);
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $update->uraian. ' BERHASIL']);                                                                                                                              
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
            $delete = Facility::find($id);
            if ($delete) {
                $delete->delete();
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $delete->uraian. ' BERHASIL']);                                                                                                                              
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
            $report = FacilityReport::OfSchoolId($this->schoolId())->OfBulan($setting['bulan-save'])->OfTahun($setting['tahun'])->first();
            if ($setting['status'] != "aktif") {
                return response()->json(['status' => 'error', 'message' => 'Tidak ada laporan aktif']);       
            }elseif($report){
                $message = 'Laporan Kondisi Sarana dan Prasarana '.$setting['bulan'].' '.$setting['tahun'].' sudah di generate';
                return response()->json(['status' => 'error', 'message' => $message]); 
            }else{
                $facility = Facility::OfSchoolId($this->schoolId())->with('user')->get();
                $record = [];
                $now = Carbon::now();
                foreach ($facility as $v) {
                    $record[] = [
                        'uraian' => $v->uraian,
                        'baik' => $v->baik,
                        'rusak_ringan' => $v->rusak_ringan,
                        'rusak_sedang' => $v->rusak_sedang,
                        'rusak_berat' => $v->rusak_berat,
                        'kebutuhan' => $v->kebutuhan, 
                        'school_id' => $v->school_id, 
                        'operator' => $v->user->name, 
                        'bulan' => $setting['bulan-save'], 
                        'tahun' => $setting['tahun'],
                        'semester' => $setting['semester'],
                        'created_at' => $now,
                    ];
                }

                if ($facility->count() == "0") {
                    $message = 'Laporan Kondisi Sarana dan Prasarana '.$setting['bulan'].' '.$setting['tahun'].' Di Larang Kosong';
                    return response()->json(['status' => 'error', 'message' => $message]);
                } else {
                    FacilityReport::insert($record);
                    $this->createReport($this->schoolId(), $setting['bulan-save'], $setting['tahun'], $setting['semester']);
                    $message = 'Laporan Kondisi Sarana dan Prasarana '.$setting['bulan'].' '.$setting['tahun'].' berhasil di generate';
                    DB::commit();
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
            if ($report->teacher != '0' && $report->student != '0' && $report->employee != '0' && $report->need != '0') {
                $nourut = Report::OfBulan($bulan)->OfTahun($tahun)->OfSemester($semester)->orderby('no_urut', 'desc')->first();
                return $report->update([
                    'facility' => '1',
                    'no_urut' => $nourut->no_urut+1,
                    'completed_date' => $now,
                ]);
            }else{
                return $report->update([
                    'facility' => '1',
                ]);
            }
        }else{
            return Report::create([
                'facility' => '1',
                'operator' => $this->userName(), 
                'bulan' => $bulan, 
                'tahun' => $tahun,
                'school_id' => $school,
                'semester' => $semester, 
            ]);
        }
    }
}
