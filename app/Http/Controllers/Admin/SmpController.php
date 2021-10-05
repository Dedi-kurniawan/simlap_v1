<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use App\Models\District;
use App\Models\School;
use App\Models\Setting;
use Illuminate\Http\Request;

class SmpController extends Controller
{
    public function dashboard()
    {
        $settings = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        $report = $this->reportActive();
        $bcrum = $this->bcrum('Dashboard', 'MAIN MENU', route('admin.smp.dashboard'), 'Dashboard');
        return view('admin.smp.dashboard', compact('bcrum', 'settings', 'report'));
    }

    public function report()
    {
        $bcrum = $this->bcrum('Laporan', 'MAIN MENU', route('admin.smp.laporan'), 'LAPORAN');
        $schools  = School::OfAdminSchool(4)->select('id','role_id', 'nama_sekolah')->get();
        $settings = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        $district = District::orderBy('nama', 'asc')->get();
        return view('admin.smp.report', compact('bcrum', 'settings', 'district', 'schools'));
    }

    public function school()
    {
        $bcrum = $this->bcrum('Sekolah', 'MAIN MENU', route('admin.smp.sekolah'), 'SEKOLAH');
        return view('admin.smp.school', compact('bcrum'));
    }

    public function findSchool($id)
    {
        $show = School::with(['district', 'village', 'koordinator'])->find($id);
        if ($show) {
            $show['korwil'] = $show->koordinator->nama;
            $show['kecamatan'] = $show->district->nama;
            $show['desa'] = $show->village->nama;
            return response()->json(['status' => 'success', 'show' => $show]);
        }else{
            return response()->json(['status' => 'error']);
        }
    }

    public function teacher()
    {
        $bcrum = $this->bcrum('Data Tenaga Pendidik', 'MAIN MENU', route('admin.smp.tenaga-pendidik'), 'TENAGA PENDIDIK');
        $schools = School::OfAdminSchool(4)->select('id','role_id', 'nama_sekolah')->get();
        $tahun = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.smp.teacher', compact('bcrum', 'schools', 'tahun'));
    }

    public function employee()
    {
        $bcrum = $this->bcrum('Data Tenaga Keendidikan', 'MAIN MENU', route('admin.smp.tenaga-kependidikan'), 'TENAGA PENDIDIK');
        $schools = School::OfAdminSchool(4)->select('id','role_id', 'nama_sekolah')->get();
        $tahun = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.smp.employee', compact('bcrum', 'schools', 'tahun'));
    }

    public function need()
    {
        $bcrum = $this->bcrum('Analisi Kebutuhan Guru', 'MAIN MENU', route('admin.smp.kebutuhan-guru'), 'ANALISI KEBUTUHAN GUTU');
        $schools = School::OfAdminSchool(4)->select('id','role_id', 'nama_sekolah')->get();
        $tahun = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.smp.need', compact('bcrum', 'schools', 'tahun'));
    }

    public function student()
    {
        $bcrum = $this->bcrum('Data Pesrta Didik', 'MAIN MENU', route('admin.smp.peserta-didik'), 'PESERTA DIDIK');
        $schools = School::OfAdminSchool(4)->select('id','role_id', 'nama_sekolah')->get();
        $tahun = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.smp.student', compact('bcrum', 'schools', 'tahun'));
    }

    public function facility()
    {
        $bcrum = $this->bcrum('Data Kondisi Sarana dan Prasarana', 'MAIN MENU', route('admin.smp.sarana-prasarana'), 'KONDISI SARANA & PRASARANA');
        $schools = School::OfAdminSchool(4)->select('id','role_id', 'nama_sekolah')->get();
        $tahun = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.smp.facility', compact('bcrum', 'schools', 'tahun'));
    }
}
