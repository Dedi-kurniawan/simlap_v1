<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('auth.login.post');
Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])->name('auth.login');
Route::get('/register', [App\Http\Controllers\Auth\AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'registerPost'])->name('auth.register.post');
Route::get('/', [App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])->name('index');
Route::post('/get-sekolah-npsn', [App\Http\Controllers\Auth\AuthController::class, 'getSchool'])->name('getSchool');

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

Route::group(['as' => 'superadmin.', 'prefix' => 'superadmin', 'middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\SuperAdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/laporan', [App\Http\Controllers\Admin\SuperAdminController::class, 'report'])->name('laporan');
    Route::get('/get-sekolah', [App\Http\Controllers\Admin\SuperAdminController::class, 'sekolah']);
});

Route::group(['as' => 'admin.smp.', 'prefix' => 'admin/smp', 'middleware' => ['auth', 'role:adminsmp|superadmin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\SmpController::class, 'dashboard'])->name('dashboard');
    Route::get('/sekolah', [App\Http\Controllers\Admin\SmpController::class, 'school'])->name('sekolah');
    Route::get('/sekolah/{id}', [App\Http\Controllers\Admin\SmpController::class, 'findSchool']);
    Route::get('/tenaga-pendidik', [App\Http\Controllers\Admin\SmpController::class, 'teacher'])->name('tenaga-pendidik');
    Route::get('/tenaga-pendidik/print', [App\Http\Controllers\Admin\SmpReportController::class, 'teacher']);
    Route::get('/tenaga-kependidikan', [App\Http\Controllers\Admin\SmpController::class, 'employee'])->name('tenaga-kependidikan');
    Route::get('/tenaga-kependidikan/print', [App\Http\Controllers\Admin\SmpReportController::class, 'employee']);
    Route::get('/kebutuhan-guru', [App\Http\Controllers\Admin\SmpController::class, 'need'])->name('kebutuhan-guru');
    Route::get('/kebutuhan-guru/print', [App\Http\Controllers\Admin\SmpReportController::class, 'need']);
    Route::get('/peserta-didik', [App\Http\Controllers\Admin\SmpController::class, 'student'])->name('peserta-didik');
    Route::get('/peserta-didik/print', [App\Http\Controllers\Admin\SmpReportController::class, 'student']);
    Route::get('/sarana-prasarana', [App\Http\Controllers\Admin\SmpController::class, 'facility'])->name('sarana-prasarana');
    Route::get('/sarana-prasarana/print', [App\Http\Controllers\Admin\SmpReportController::class, 'facility']);
    Route::get('/laporan', [App\Http\Controllers\Admin\SmpController::class, 'report'])->name('laporan');
    Route::get('/laporan/show', [App\Http\Controllers\Admin\SmpReportController::class, 'report']);
    Route::get('/laporan/rekap', [App\Http\Controllers\Admin\SmpReportController::class, 'reportRekap']);
    Route::post('/laporan/reset', [App\Http\Controllers\Admin\SmpReportController::class, 'reset']);
});

Route::group(['as' => 'admin.sd.', 'prefix' => 'admin/sd', 'middleware' => ['auth', 'role:adminsd|superadmin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\SdController::class, 'dashboard'])->name('dashboard');
    Route::get('/tenaga-pendidik', [App\Http\Controllers\Admin\SdController::class, 'teacher'])->name('tenaga-pendidik');
    Route::get('/tenaga-pendidik/print', [App\Http\Controllers\Admin\SdReportController::class, 'teacher']);
    Route::get('/tenaga-kependidikan', [App\Http\Controllers\Admin\SdController::class, 'employee'])->name('tenaga-kependidikan');
    Route::get('/tenaga-kependidikan/print', [App\Http\Controllers\Admin\SdReportController::class, 'employee']);
    Route::get('/kebutuhan-guru', [App\Http\Controllers\Admin\SdController::class, 'need'])->name('kebutuhan-guru');
    Route::get('/kebutuhan-guru/print', [App\Http\Controllers\Admin\SdReportController::class, 'need']);
    Route::get('/peserta-didik', [App\Http\Controllers\Admin\SdController::class, 'student'])->name('peserta-didik');
    Route::get('/peserta-didik/print', [App\Http\Controllers\Admin\SdReportController::class, 'student']);
    Route::get('/sarana-prasarana', [App\Http\Controllers\Admin\SdController::class, 'facility'])->name('sarana-prasarana');
    Route::get('/sarana-prasarana/print', [App\Http\Controllers\Admin\SdReportController::class, 'facility']);
    Route::get('/laporan', [App\Http\Controllers\Admin\SdController::class, 'report'])->name('laporan');
    Route::get('/laporan/show', [App\Http\Controllers\Admin\SdReportController::class, 'report']);
    Route::post('/laporan/reset', [App\Http\Controllers\Admin\SdReportController::class, 'reset']);
});

Route::group(['as' => 'admin.paud.', 'prefix' => 'admin/paud', 'middleware' => ['auth', 'role:adminpaud|superadmin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\PaudController::class, 'dashboard'])->name('dashboard');
    Route::get('/tenaga-pendidik', [App\Http\Controllers\Admin\PaudController::class, 'teacher'])->name('tenaga-pendidik');
    Route::get('/tenaga-pendidik/print', [App\Http\Controllers\Admin\PaudReportController::class, 'teacher']);
    Route::get('/tenaga-kependidikan', [App\Http\Controllers\Admin\PaudController::class, 'employee'])->name('tenaga-kependidikan');
    Route::get('/tenaga-kependidikan/print', [App\Http\Controllers\Admin\PaudReportController::class, 'employee']);
    Route::get('/kebutuhan-guru', [App\Http\Controllers\Admin\PaudController::class, 'need'])->name('kebutuhan-guru');
    Route::get('/kebutuhan-guru/print', [App\Http\Controllers\Admin\PaudReportController::class, 'need']);
    Route::get('/peserta-didik', [App\Http\Controllers\Admin\PaudController::class, 'student'])->name('peserta-didik');
    Route::get('/peserta-didik/print', [App\Http\Controllers\Admin\PaudReportController::class, 'student']);
    Route::get('/sarana-prasarana', [App\Http\Controllers\Admin\PaudController::class, 'facility'])->name('sarana-prasarana');
    Route::get('/sarana-prasarana/print', [App\Http\Controllers\Admin\PaudReportController::class, 'facility']);
    Route::get('/laporan', [App\Http\Controllers\Admin\PaudController::class, 'report'])->name('laporan');
    Route::get('/laporan/show', [App\Http\Controllers\Admin\PaudReportController::class, 'report']);
    Route::post('/laporan/reset', [App\Http\Controllers\Admin\PaudReportController::class, 'reset']);
    
});

Route::group(['as' => 'admin.master.', 'prefix' => 'admin/master', 'middleware' => ['auth', 'role:adminpaud|adminsd|adminsmp|superadmin']], function () {
    Route::resource('/sekolah', App\Http\Controllers\Admin\SchoolController::class);
    Route::get('/get-desa', [App\Http\Controllers\Admin\SchoolController::class, 'getVillage']);
    Route::post('/import-sekolah', [App\Http\Controllers\Admin\SchoolController::class, 'import'])->name('sekolah-import');
    Route::get('/download-sekolah', [App\Http\Controllers\Admin\SchoolController::class, 'download'])->name('sekolah-download');
    Route::resource('/kelas-siswa', App\Http\Controllers\Admin\RoomController::class);
    Route::resource('/mata-pelajaran', App\Http\Controllers\Admin\SubjectController::class);
    Route::resource('/fasilitas', App\Http\Controllers\Admin\DescriptionController::class);
    Route::resource('/koordinator', App\Http\Controllers\Admin\KoordinatorController::class);
    Route::resource('/jabatan', App\Http\Controllers\Admin\PositionController::class);
    Route::resource('/pangkat', App\Http\Controllers\Admin\RankController::class);
    Route::resource('/kecamatan', App\Http\Controllers\Admin\DistrictController::class);
    Route::resource('/desa', App\Http\Controllers\Admin\VillageController::class);
    Route::resource('/jurusan', App\Http\Controllers\Admin\MajorController::class);
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'role:adminpaud|adminsd|adminsmp|superadmin']], function () {
    Route::resource('pengaturan', App\Http\Controllers\Admin\SettingController::class);
    Route::post('/pengaturan/status/{id}', [App\Http\Controllers\Admin\SettingController::class, 'status']);
    Route::resource('akun', App\Http\Controllers\Admin\AccountController::class);
    Route::post('/status/{id}', [App\Http\Controllers\Admin\AccountController::class, 'status']);
    Route::post('/akun/reset/{id}', [App\Http\Controllers\Admin\AccountController::class, 'reset']);
});