<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use App\Models\Position;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Master\PositionRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $nama  = $this->school()['nama'];
        $bcrum = $this->bcrum('Jabatan','MAIN MENU', '#', 'JABATAN');
        return view('admin.master.positions.index', compact('bcrum','nama'));
    }

    public function store(PositionRequest $request)
    {
        DB::beginTransaction();
        try {
            $data   = $request->all();
            $data['role_id'] = $this->school()['school_id'];
            $create = Position::create($data); 
            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'TAMBAH DATA ' .$create->nama. ' BERHASIL']);
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
        }
    }

    public function edit($id)
    {
        $edit = Position::find($id);
        if ($edit) {
            return response()->json(['status' => 'success', 'edit' => $edit]);
        }else{
            return response()->json(['status' => 'error']);
        }
    }

    public function update(PositionRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $update = Position::find($id);
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
            $delete = Position::find($id);
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
