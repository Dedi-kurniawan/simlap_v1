<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use App\Models\School;
use App\Models\Setting;
use Illuminate\Http\Request;

class SdController extends Controller
{
    public function dashboard()
    {
        $settings = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        $report = $this->reportActive();
        $bcrum = $this->bcrum('Dashboard', 'MAIN MENU', route('admin.sd.dashboard'), 'Dashboard');
        return view('admin.sd.dashboard', compact('bcrum', 'settings', 'report'));
    }

    public function report()
    {
        $bcrum = $this->bcrum('Laporan', 'MAIN MENU', route('admin.sd.laporan'), 'LAPORAN');
        $schools  = School::OfAdminSchool(3)->select('id','role_id', 'nama_sekolah')->get();
        $settings = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.sd.report', compact('bcrum', 'settings', 'schools'));
    }

    public function teacher()
    {
        $bcrum   = $this->bcrum('Data Tenaga Pendidik SD', 'MAIN MENU', route('admin.sd.tenaga-pendidik'), 'TENAGA PENDIDIK');
        $schools = School::OfAdminSchool(3)->select('id','role_id', 'nama_sekolah')->get();
        $tahun   = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.sd.teacher', compact('bcrum', 'schools', 'tahun'));
    }

    public function employee()
    {
        $bcrum = $this->bcrum('Data Tenaga Kependidikan SD', 'MAIN MENU', route('admin.sd.tenaga-kependidikan'), 'TENAGA KEPENDIDIKAN');
        $schools = School::OfAdminSchool(3)->select('id','role_id', 'nama_sekolah')->get();
        $tahun = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.sd.employee', compact('bcrum', 'schools', 'tahun'));
    }

    public function need()
    {
        $bcrum = $this->bcrum('Analisi Kebutuhan Guru SD', 'MAIN MENU', route('admin.sd.kebutuhan-guru'), 'ANALISI KEBUTUHAN GUTU');
        $schools = School::OfAdminSchool(3)->select('id','role_id', 'nama_sekolah')->get();
        $tahun = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.sd.need', compact('bcrum', 'schools', 'tahun'));
    }

    public function student()
    {
        $bcrum = $this->bcrum('Data Peserta Didik SD', 'MAIN MENU', route('admin.sd.peserta-didik'), 'PESERTA DIDIK');
        $schools = School::OfAdminSchool(3)->select('id','role_id', 'nama_sekolah')->get();
        $tahun = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.sd.student', compact('bcrum', 'schools', 'tahun'));
    }

    public function facility()
    {
        $bcrum = $this->bcrum('Data Kondisi Sarana dan Prasarana SD', 'MAIN MENU', route('admin.sd.sarana-prasarana'), 'KONDISI SARANA & PRASARANA');
        $schools = School::OfAdminSchool(3)->select('id','role_id', 'nama_sekolah')->get();
        $tahun = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.sd.facility', compact('bcrum', 'schools', 'tahun'));
    }
}
