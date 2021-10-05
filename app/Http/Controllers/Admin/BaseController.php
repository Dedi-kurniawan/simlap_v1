<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

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
        ];
    }

    public function school()
    {
        if(Auth::user()->role_id == '1') {
            return [
                'nama' => 'SEKOLAH',
                'school_id' => '',
            ];
        }else if(Auth::user()->role_id == '5'){
            return [
                'nama' => 'PAUD',
                'school_id' => '2',
            ];
        }else if(Auth::user()->role_id == '6'){
            return [
                'nama' => 'SD',
                'school_id' => '3',
            ];
        }else if(Auth::user()->role_id == '7'){
            return [
                'nama' => 'SMP',
                'school_id' => '4',
            ];
        }else{
            Auth::logout();
            return redirect('/login');
        }
    }

    public function reportActive()
    {
        $setting = Setting::where('role_id', Auth::user()->RoleBidangAdmin)->OfStatusActive()->first();
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
}
