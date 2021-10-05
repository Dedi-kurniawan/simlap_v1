<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\RegisterRequest;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

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
                // $request->session()->regenerate();
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
                        return redirect()->route('auth.login')->withInput($request->input())->with(['status' => 'danger', 'message' => 'Pastikan Dengan Benar Email Dan Password Kamu !!!']); 
                        break;
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

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function registerPost(RegisterRequest $request)
    {

        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['status'] = "1";
            $data['password'] = bcrypt($request->password);
            $data['role_id'] = $this->school($request->school_id);
            $user = User::where('school_id', $request->school_id)->where('status', '1')->first();
            if ($user) {
                return redirect()->back()->withInput($request->input())->with(['status' => 'danger', 'message' => 'Operator sekolah sudah ada']);
            }
            $create = User::create($data); 
            DB::commit();
            return redirect()->route('auth.login')->withInput($request->input())->with(['status' => 'success', 'message' => 'Kamu Berhasil Buat Akun']);
        } catch (QueryException $qe) {
            DB::rollback();
            return redirect()->route('auth.register')->withInput($request->input())->with(['status' => 'danger', 'message' => 'Silahkan cek kembali data yang inputkan']);
        }
    }
    
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('auth.login');
    }

    public function school($id)
    {
        $school = School::where('id', $id)->first();
        return $school->role_id;
    }

    public function getSchool(Request $request)
    {
        $school = School::where('npsn', $request->npsn)->select('id', 'npsn', 'nama_sekolah', 'status_sekolah')->first();
        if ($school) {
            return response()->json(['status' => 'success', 'data' => $school]);
        } else {
            return response()->json(['status' => 'error', 'data' => 'Sekolah tidak di temukan']);
        }
    }
}
