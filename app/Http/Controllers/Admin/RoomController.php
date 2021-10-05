<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Master\RoomRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:superadmin', ['only' => ['destroy']]);
    }

    
    public function index()
    {
        $nama  = $this->school()['nama'];
        $bcrum = $this->bcrum('Kelas '.$nama,'MAIN MENU', '#', 'KELAS');
        return view('admin.master.rooms.index', compact('bcrum','nama'));
    }

    public function store(RoomRequest $request)
    {
        DB::beginTransaction();
        try {
            $data   = $request->all();
            $data['role_id'] = $this->school()['school_id'];
            $create = Room::create($data); 
            DB::commit();
            return response()->json(['status' => 'success', 'message' => $create->kelas. ' BERHASIL']);
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
        }
    }

    public function edit($id)
    {
        $edit = Room::find($id);
        if ($edit) {
            return response()->json(['status' => 'success', 'edit' => $edit]);
        }else{
            return response()->json(['status' => 'error']);
        }
    }

    public function update(RoomRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $update = Room::find($id);
            if ($update) {
                $data   = $request->all();
                $update->update($data);
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $update->kelas. ' BERHASIL DI UBAH']);                                                                                                                              
            }else{
                return response()->json(['status' => 'error']);
            }
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $qe->getMessage()]);
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
            $delete = Room::find($id);
            if ($delete) {
                $delete->delete();
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $delete->kelas. ' BERHASIL']);                                                                                                                              
            }else{
                return response()->json(['status' => 'error', 'message' => 'Data tidak di temukan']);
            }
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
        }
    }
}
