<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
            'report-aktif' => $this->reportActive(),
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
        return "Maret 2021";
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

    public function koordinatorId()
    {
        return Auth::user()->school->koordinator_id;
    }

    public function districtId()
    {
        return Auth::user()->school->district_id;
    }
}
