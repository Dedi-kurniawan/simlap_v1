<?php

namespace App\Http\Controllers\DataTable;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BaseController extends Controller
{
    public function schoolId()
    {
        return Auth::user()->school_id;
    }

    public function formatTanggal($value)
    {
        if ($value != NULL) {
            return Carbon::parse($value)->format('d-m-Y'); 
        }else{
            return "-";
        }
    }

    public function roleId()
    {
        return Auth::user()->role_id;
    }

    public function schoolRoleId()
    {
        if(Auth::user()->role_id == '1') {
            return '';
        }else if(Auth::user()->role_id == '5'){
            return '2';
        }else if(Auth::user()->role_id == '6'){
            return '3';
        }else if(Auth::user()->role_id == '7'){
            return '4';
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
