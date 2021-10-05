<?php

namespace App\Http\Controllers\School\Paud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use Carbon\Carbon;

class BaseController extends Controller
{
    protected function bcrum($title, $nameFirst, $urlSecond, $nameSecond)
    {
        //takute ganti name route jadi gak harus ganti satu-satu di controller
        return [
            'title' => $title,
            'name-first' => $nameFirst,
            'url-second' => $urlSecond,
            'name-second' => $nameSecond,
            'name-school' => $this->nameSchool(),
            'report' => $this->reportActive(),
        ];
    }

    public function schoolId()
    {
        return Auth::user()->school_id;
    }

    public function userId()
    {
        return Auth::user()->id;
    }

    public function reportActive()
    {
        $setting = Setting::where('role_id', Auth::user()->role_id)->OfStatusActive()->first();
        if ($setting) {
            return [
                'status' => "aktif",
                'bulan'  => $setting->BulanFormat,
                'tahun'  => $setting->tahun,
                'bulan-save' => $setting->bulan,
                'semester' => $setting->semester,
            ];
        } else {
            return [
                'status'  => "tidak aktif",
                'bulan' => "",
                'tahun' => "",
                'bulan-save' => '',
                'semester' => '',
            ];
        }
    }

    public function nameSchool()
    {
        return Auth::user()->school->nama_sekolah;
    }

    public function kurikulum()
    {
        return Auth::user()->school->kurikulum;
    }

    public function roleNama()
    {
        return Auth::user()->role->nama;
    }

    public function userName()
    {
        return Auth::user()->name;
    }

    public function roleId()
    {
        return Auth::user()->role_id;
    }

    public function koordinatorId()
    {
        return Auth::user()->school->koordinator_id;
    }

    public function districtId()
    {
        return Auth::user()->school->district_id;
    }

}
