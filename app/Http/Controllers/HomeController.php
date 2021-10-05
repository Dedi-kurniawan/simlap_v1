<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role_id;
        switch ($role) {
            case '4':
                return redirect()->intended('/smp/dashboard');
                break;
            case '3':
                return redirect()->intended('/sd/dashboard');
                break;
            case '2':
                return redirect()->intended('/paud/dashboard');
                break;
            case '1':
                return redirect()->intended('/superadmin/dashboard');
                break;
            case '5':
                return redirect()->intended('/admin/paud/dashboard');
                break;
            case '6':
                return redirect()->intended('/admin/sd/dashboard');
                break;
            case '7':
                return redirect()->intended('/admin/smp/dashboard');
                break;
            default:
                return redirect()->route('auth.login'); 
                break;
        }
    }
}
