<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use Illuminate\Support\Facades\DB;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\Master\UserRequest;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin', ['only' => ['destroy']]);
    }

    public function index()
    {
        $bcrum = $this->bcrum('Manajemen Akun', 'MAIN MENU', route('admin.akun.index'), 'MANAJEMEN AKUN');
        $schools  = School::OfAdminSchool($this->school()['school_id'])->select('id','role_id', 'nama_sekolah')->orderBy('role_id', 'ASC')->get();
        return view('admin.master.accounts.index', compact('bcrum', 'schools'));
    }

    public function store(UserRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            if($request->password){
                $data['password'] = Hash::make($request->password);
            }else{
                $data['password'] = Hash::make('password123');
            }            
            if ($request->role_id) {
                $data['role_id'] = $request->role_id;
            } else {
                $data['role_id'] = $this->school()['school_id'];
            }            
            $data['status'] = '1';
            $create = User::create($data);
            DB::commit();
            return response()->json(['status' => 'success', 'message' => "TAMBAH DATA " .$create->name. " BERHASIL"]);
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
        $edit = User::find($id);
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
    public function update(UserRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $update = User::find($id);
            if ($update) {
                $data   = $request->except('password');
                if($request->password){
                    $data['password'] = Hash::make($request->password);
                }
                $update->update($data);
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $update->name. ' BERHASIL']);                                                                                                                              
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
            $delete = User::find($id);
            if ($delete) {
                if ($delete->role_id == "5" || $delete->role_id == "6" || $delete->role_id == "7" || $delete->role_id == "1") {
                    return response()->json(['status' => 'error', 'message' => 'Admin Bidang tidak dapat di hapus']);
                } else {
                    $delete->delete();
                    DB::commit();
                    return response()->json(['status' => 'success', 'message' => $delete->name. ' BERHASIL']);
                }                                                                                                                              
            }else{
                return response()->json(['status' => 'error', 'message' => 'Data tidak di temukan']);
            }
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
        }
    }

    public function status($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $status = User::find($id);
            $status->update([
                'status' => $request->status
            ]);
            DB::commit();
            return response()->json(['status' => 'success', 'message' => $status->name]);
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
        }
    }

    public function reset($id)
    {
        DB::beginTransaction();
        try {
            $status = User::find($id);
            $status->update([
                'password' => Hash::make('password123'),
            ]);
            DB::commit();
            return response()->json(['status' => 'success', 'message' => $status->name]);
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
        }
    }
}
