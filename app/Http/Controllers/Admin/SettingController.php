<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Master\SettingRequest;
use App\Models\Setting;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin', ['only' => ['destroy']]);
    }

    public function index()
    {
        $settings = Setting::OfAdminSchool($this->school()['school_id'])->distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        $report = $this->reportActive();
        $bcrum = $this->bcrum('Pengaturan Laporan Sekolah', 'MAIN MENU', route('admin.pengaturan.index'), 'PENGATURAN LAPORAN SEKOLAH');
        $sekolah = $this->school()['nama'];
        return view('admin.master.settings.index', compact('bcrum', 'sekolah', 'report', 'settings'));
    }

    public function store(SettingRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            if ($request->role_id) {
                $data['role_id'] = $request->role_id;
            } else {
                $data['role_id'] = $this->school()['school_id'];
            }
            $setting = Setting::OfAdminSchool($this->school()['school_id'])->OfStatusActive()->first();
            if ($setting) {
                $message = "Silahkan non aktifkan status pada bulan: ". $setting->BulanFormat." ".$setting->tahun;
                return response()->json(['status' => 'error', 'message' => $message]);
            }else{
                $create = Setting::create($data);
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $create->name. " BERHASIL"]);
            }            
            
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
        $edit = Setting::find($id);
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
    public function update(SettingRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $update = Setting::find($id);
            if ($update) {
                $data = $request->all();
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
            $delete = Setting::find($id);
            if ($delete) {
                $delete->delete();
                DB::commit();
                return response()->json(['status' => 'success', 'message' => $delete->BulanFormat." ".$delete->tahun. ' BERHASIL']);                                                                                                                              
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
            $status = Setting::find($id);
            $update = $request->status == "Aktif" ? "aktif" : "tidak aktif";
            $setting = Setting::OfAdminSchool($this->school()['school_id'])->OfStatusActive()->first();
            if ($setting) {
                $setting->update([
                    'status' => 'tidak aktif',
                ]);
                $status->update([
                    'status' => $update
                ]);
            }else{
                $status->update([
                    'status' => $update
                ]);
            }            
            DB::commit();
            return response()->json(['status' => 'success', 'message' => $request->status]);
        } catch (QueryException $qe) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Terjadi Kesalah Pada Server, Mohon Di Ulangi']);
        }
    }
}
