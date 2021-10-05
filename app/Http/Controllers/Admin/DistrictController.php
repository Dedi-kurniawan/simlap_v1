<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use App\Models\District;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Master\DistrictRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $bcrum = $this->bcrum('Kecamatan','MAIN MENU', '#', 'KECAMATAN');
        return view('admin.master.districts.index', compact('bcrum'));
    }

    public function store(DistrictRequest $request)
    {
        DB::beginTransaction();
        try {
            $data   = $request->all();
            $create = District::create($data); 
            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'TAMBAH DATA ' .$create->nama. ' BERHASIL']);
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
        }
    }

    public function edit($id)
    {
        $edit = District::find($id);
        if ($edit) {
            return response()->json(['status' => 'success', 'edit' => $edit]);
        }else{
            return response()->json(['status' => 'error']);
        }
    }

    public function update(DistrictRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $update = District::find($id);
            if ($update) {
                $data   = $request->all();
                $update->update($data);
                DB::commit();
                return response()->json(['status' => 'success', 'message' => 'UBAH DATA ' .$update->nama. ' BERHASIL']);                                                                                                                              
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
            $delete = District::find($id);
            if ($delete) {
                $delete->delete();
                DB::commit();
                return response()->json(['status' => 'success', 'message' => 'HAPUS '. $delete->nama. ' BERHASIL']);                                                                                                                              
            }else{
                return response()->json(['status' => 'error', 'message' => 'Data tidak di temukan']);
            }
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
        }
    }
}
