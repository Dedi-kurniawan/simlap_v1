<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\School;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        $settings = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        $report = $this->reportActive();
        $bcrum = $this->bcrum('Dashboard', 'MAIN MENU', route('superadmin.dashboard'), 'Dashboard');
        return view('admin.superadmin.dashboard', compact('bcrum', 'settings', 'report'));
    }

    public function report()
    {
        $bcrum = $this->bcrum('Laporan', 'MAIN MENU', '#', 'LAPORAN');
        $settings = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.superadmin.report', compact('bcrum', 'settings'));
    }

    public function sekolah(Request $request)
    {
        $data = School::select('id', 'nama_sekolah as nama', 'role_id')->where('role_id', $request->role_id)->get();
        $selected = $request->role_id;
        $title = "SEKOLAH";
        $select = view('layouts.backend.partials.render.select', compact('data', 'title', 'selected'))->render();
        return response()->json(['options' => $select]);
    }
}
