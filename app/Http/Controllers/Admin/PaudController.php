<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use App\Models\School;
use App\Models\Setting;
use Illuminate\Http\Request;

class PaudController extends Controller
{
    public function dashboard()
    {
        $settings = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        $report = $this->reportActive();
        $bcrum = $this->bcrum('Dashboard', 'MAIN MENU', route('admin.paud.dashboard'), 'Dashboard');
        return view('admin.paud.dashboard', compact('bcrum', 'settings', 'report'));
    }

    public function report()
    {
        $bcrum    = $this->bcrum('Laporan', 'MAIN MENU', route('admin.paud.laporan'), 'LAPORAN');
        $schools  = School::OfAdminSchool(2)->select('id','role_id', 'nama_sekolah')->get();
        $settings = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.paud.report', compact('bcrum', 'settings', 'schools'));
    }
    
    public function teacher()
    {
        $bcrum   = $this->bcrum('Data Tenaga Pendidik', 'MAIN MENU', route('admin.paud.tenaga-pendidik'), 'TENAGA PENDIDIK');
        $schools = School::OfAdminSchool(2)->select('id','role_id', 'nama_sekolah')->get();
        $tahun   = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.paud.teacher', compact('bcrum', 'schools', 'tahun'));
    }

    public function employee()
    {
        $bcrum   = $this->bcrum('Data Tenaga Kependidikan', 'MAIN MENU', route('admin.paud.tenaga-kependidikan'), 'TENAGA PENDIDIK');
        $schools = School::OfAdminSchool(2)->select('id','role_id', 'nama_sekolah')->get();
        $tahun   = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.paud.employee', compact('bcrum', 'schools', 'tahun'));
    }

    public function need()
    {
        $bcrum   = $this->bcrum('Analisis Kebutuhan Guru', 'MAIN MENU', route('admin.paud.kebutuhan-guru'), 'ANALISIS KEBUTUHAN GURU');
        $schools = School::OfAdminSchool(2)->select('id','role_id', 'nama_sekolah')->get();
        $tahun   = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.paud.need', compact('bcrum', 'schools', 'tahun'));
    }

    public function student()
    {
        $bcrum   = $this->bcrum('Data Pesrta Didik', 'MAIN MENU', route('admin.paud.peserta-didik'), 'PESERTA DIDIK');
        $schools = School::OfAdminSchool(2)->select('id','role_id', 'nama_sekolah')->get();
        $tahun   = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.paud.student', compact('bcrum', 'schools', 'tahun'));
    }

    public function facility()
    {
        $bcrum = $this->bcrum('Data Kondisi Sarana dan Prasarana', 'MAIN MENU', route('admin.paud.sarana-prasarana'), 'KONDISI SARANA & PRASARANA');
        $schools = School::OfAdminSchool(2)->select('id','role_id', 'nama_sekolah')->get();
        $tahun   = Setting::distinct()->orderBy('tahun', 'asc')->get(['tahun']);
        return view('admin.paud.facility', compact('bcrum', 'schools', 'tahun'));
    }
}
