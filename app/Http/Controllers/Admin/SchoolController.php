<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use App\Models\District;
use App\Models\Koordinator;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Master\SchoolRequest;
use App\Imports\SchoolImport;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Village;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin', ['only' => ['destroy']]);
    }

    public function index()
    {
        $nama = $this->school()['nama'];
        $districts = District::select('id', 'nama')->get();
        $koordinators = Koordinator::select('id', 'nama')->get();
        $bcrum = $this->bcrum('Sekolah '.$nama,'MAIN MENU', '#', 'SEKOLAH');
        return view('admin.master.schools.index', compact('bcrum', 'districts', 'koordinators'));
    }

    public function store(SchoolRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            if ($request->role_id) {
                $data['role_id'] = $request->role_id;
            } else {
                $data['role_id'] = $this->school()['school_id'];
            }
            $create = School::create($data); 
            DB::commit();
            return response()->json(['status' => 'success', 'message' => $create->nama_sekolah. ' BERHASIL']);
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
        }
    }

    public function edit($id)
    {
        $edit = School::find($id);
        if ($edit) {
            return response()->json(['status' => 'success', 'edit' => $edit]);
        }else{
            return response()->json(['status' => 'error']);
        }
    }

    public function show($id)
    {
        $show = School::with(['district', 'village', 'koordinator'])->find($id);
        if ($show) {
            $show['korwil']     = $show->koordinator == NULL ? "" : $show->koordinator->nama;
            $show['kecamatan']  = $show->district == NULL ? "" : $show->district->nama;
            $show['desa']       = $show->village == NULL ? ""  : $show->village->nama;
            return response()->json(['status' => 'success', 'show' => $show]);
        }else{
            return response()->json(['status' => 'error']);
        }
    }

    public function update(SchoolRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $update = School::find($id);
            if ($update) {
                $data   = $request->all();
                $update->update($data);
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $update->nama_sekolah. ' BERHASIL DI UBAH']);                                                                                                                              
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
            $delete = School::find($id);
            if ($delete) {
                $delete->delete();
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $delete->nama_sekolah. ' BERHASIL']);                                                                                                                              
            }else{
                return response()->json(['status' => 'error', 'message' => 'Data tidak di temukan']);
            }
        } catch (QueryException $qe) {
            DB::rollback();
            if ($qe->getCode() == '23000') {
                if ($delete->user) {
                    return response()->json(['status' => 'error', 'message' => 'Hapus operator sekolah terlebih dahulu']);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Sekolah sudah memiliki laporan tidak dapat di hapus']);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
            }
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

    public function import(Request $request)
    {
        DB::beginTransaction();
        try {
            $file = $request->file('file');
            Excel::import(new SchoolImport, $file);            
            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Sekolah Berhasil Di Import']);
        } catch (QueryException $q) {
            DB::rollback();           
            return response()->json(['status' => 'error', 'message' => 'Terjadi kesalahan pada saat import, pastikan dengan banar format.']);
        }
    }

    public function download()
    {
        $myFile = public_path("/backend/assets/sd_simlap.xlsx");
        $headers = ['Content-Type: application/xlsx'];
        $newName = 'contoh_file'.'.xlsx';
        return response()->download($myFile, $newName, $headers);
    }
}
