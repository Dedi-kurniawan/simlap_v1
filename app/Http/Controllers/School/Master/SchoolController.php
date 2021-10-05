<?php

namespace App\Http\Controllers\School\Master;

use App\Http\Controllers\School\Paud\BaseController as Controller;
use App\Http\Requests\Master\SchoolRequest;
use App\Models\District;
use App\Models\Koordinator;
use App\Models\School;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{
    public function index()
    {
        $bcrum = $this->bcrum('Sekolah', 'MAIN MENU', route('sd.dashboard'), 'Sekolah');
        $districts = District::select('id', 'nama')->get();
        $koordinators = Koordinator::select('id', 'nama')->get();
        $school = School::where('id', Auth::user()->school_id)->first();
        return view('school.master.schools.index', compact('bcrum', 'school', 'districts', 'koordinators'));
    }

    public function update(SchoolRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            if ($id != Auth::user()->school_id) {
                return redirect()->back()->withInput($request->input())->with(['status' => 'danger', 'message' => 'Kamu tidak memiliki Akses']);
            }
            $school = School::find($id);
            $data = $request->all();
            $data['full_field'] = "1";
            $school->update($data);
            DB::commit();
            return redirect()->back();
        } catch (QueryException $qe) {
            DB::rollback();
            return redirect()->back()->withInput($request->input())->with(['status' => 'danger', 'message' => 'Silahkan cek kembali data yang inputkan']);
        }
    }
}
