<?php

namespace App\Http\Controllers\DataTable\Admin;

use App\Http\Controllers\DataTable\BaseController as Controller;
use App\Models\Description;
use App\Models\District;
use App\Models\Koordinator;
use App\Models\Major;
use App\Models\Position;
use App\Models\Rank;
use App\Models\Room;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Setting;
use App\Models\Subject;
use App\Models\User;
use App\Models\Village;

class MasterController extends Controller
{
    public function pengaturan(Request $request)
    {
        $data = Setting::OfAdminSchool($this->schoolRoleId())
        ->OfSemester($request->semester)
        ->OfTahun($request->tahun)
        ->orderBy('tahun', 'desc')
        ->orderBy('bulan', 'asc');
        return DataTables::of($data)
        ->addIndexColumn()    
        ->addColumn('status',function($data){
            return view('layouts.backend.partials.action._status',[
                'id' => $data->id,
                'name' => $data->BulanFormat." ".$data->tahun,
                'status' => $data->status == "aktif" ? "1" : "0",
            ]);
        })
        ->addColumn('bulan',function($data){
            return $data->BulanFormat;
        })
        ->toJson();
    }

    public function akun(Request $request)
    {
        if ($this->roleId() == '1') {
            if ($request->role_id == 'bidang') {
                $data = User::whereIn('role_id', ['5','6','7']);
            } else {
                $data = User::OfAdminSchool($request->role_id);
            }
         }else{
             $data = User::OfAdminSchool($this->schoolRoleId());
         }
        $data->with('school:id,nama_sekolah')
        ->orderby('name', 'asc');
        return DataTables::of($data)
        ->addIndexColumn()    
        ->addColumn('status',function($data){
            return view('layouts.backend.partials.action._status',[
                'id' => $data->id,
                'name' => $data->name,
                'status' => $data->status,
            ]);
        })
        ->toJson();
    }

    public function sekolah(Request $request)
    {
        if ($this->roleId() == '1') {
           $q = $request->role_id;
        }else{
            $q = $this->schoolRoleId();
        }
        $data = School::OfAdminSchool($q)
        ->OfKoordinatorId($request->koordinator_id)
        ->with(['district', 'village', 'koordinator'])
        ->orderby('role_id', 'asc')
        ->orderby('nama_sekolah', 'asc');
        return DataTables::of($data)
        ->addIndexColumn()    
        ->addColumn('akreditasi_nilai', function($data){
            return $data->akreditasi."/".$data->nilai_akreditasi;
        })
        ->toJson();
    }


    public function kelas()
    {
        $data = Room::OfAdminSchool($this->schoolRoleId())
        ->orderby('no_urut', 'asc')
        ->orderby('kelas', 'asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->toJson();
    }

    public function subject()
    {
        $data = Subject::OfAdminSchool($this->schoolRoleId())
        ->orderby('nama', 'asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->toJson();
    }

    public function facility()
    {
        $data = Description::orderby('nama', 'asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->toJson();
    }

    public function koordinator()
    {
        $data = Koordinator::orderby('nama', 'asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->toJson();
    }

    public function position()
    {
        $data = Position::orderby('nama', 'asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->toJson();
    }

    public function rank()
    {
        $data = Rank::orderby('nama', 'asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->toJson();
    }

    public function district()
    {
        $data = District::orderby('nama', 'asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->toJson();
    }

    public function village()
    {
        $data = Village::with('district')->orderby('nama', 'asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->toJson();
    }

    public function major()
    {
        $data = Major::orderby('nama', 'asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->toJson();
    }
}
