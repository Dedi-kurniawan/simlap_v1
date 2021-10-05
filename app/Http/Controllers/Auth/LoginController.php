<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function showLoginForm()
     {
         return view('auth.login');
     }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first(); 
        if ($user == null) {
            return redirect()->route('auth.login')->with(['status' => 'danger', 'message' => 'Pastikan Dengan Benar Email Dan Password Anda !!!']);     
        }else if($user->status == "1"){
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => "1"])){   
                if (Auth::user()->role_id == "3" || Auth::user()->role_id == "4") {
                    return redirect()->intended('/sekolah/dashboard');
                }else if(Auth::user()->role_id == "1"){
                    return redirect()->intended('/admin/dashboard');
                }else{
                    return redirect()->route('auth.login')->withInput($request->input())->with(['status' => 'danger', 'message' => 'Pastikan Dengan Benar Email Dan Password Kamu !!!']);  
                }
            }else{
                return redirect()->route('auth.login')->withInput($request->input())->with(['status' => 'danger', 'message' => 'Pastikan Dengan Benar Email Dan Password Kamu !!!']);  
            }
        }else if($user->status == "0"){
            return redirect()->route('auth.login')->withInput($request->input())->with(['status' => 'danger', 'message' => 'Silahkan Hubungi Admin Untuk Mengaktifkan Kembali Akun Kamu !!!']);  
        }else{
            return abort(404);
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    

}
