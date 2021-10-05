<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'smp', 'middleware' => 'auth'], function () {
    Route::post('tenaga-pendidik', [App\Http\Controllers\DataTable\Smp\DataTableController::class, 'tendikData']);
    Route::post('tenaga-kependidikan', [App\Http\Controllers\DataTable\Smp\DataTableController::class, 'tenkedikData']);
    Route::post('kebutuhan-guru', [App\Http\Controllers\DataTable\Smp\DataTableController::class, 'kebutuhanData']);
    Route::post('peserta-didik', [App\Http\Controllers\DataTable\Smp\DataTableController::class, 'pendikData']);
    Route::post('sarana-prasarana', [App\Http\Controllers\DataTable\Smp\DataTableController::class, 'saranaData']);
});

Route::group(['prefix' => 'sd', 'middleware' => 'auth'], function () {
    Route::post('tenaga-pendidik', [App\Http\Controllers\DataTable\Sd\DataTableController::class, 'tendikData']);
    Route::post('tenaga-kependidikan', [App\Http\Controllers\DataTable\Sd\DataTableController::class, 'tenkedikData']);
    Route::post('kebutuhan-guru', [App\Http\Controllers\DataTable\Sd\DataTableController::class, 'kebutuhanData']);
    Route::post('peserta-didik', [App\Http\Controllers\DataTable\Sd\DataTableController::class, 'pendikData']);
    Route::post('sarana-prasarana', [App\Http\Controllers\DataTable\Sd\DataTableController::class, 'saranaData']);
});

Route::group(['prefix' => 'paud', 'middleware' => 'auth'], function () {
    Route::post('tenaga-pendidik', [App\Http\Controllers\DataTable\Paud\DataTableController::class, 'tendikData']);
    Route::post('tenaga-kependidikan', [App\Http\Controllers\DataTable\Paud\DataTableController::class, 'tenkedikData']);
    Route::post('kebutuhan-guru', [App\Http\Controllers\DataTable\Paud\DataTableController::class, 'kebutuhanData']);
    Route::post('peserta-didik', [App\Http\Controllers\DataTable\Paud\DataTableController::class, 'pendikData']);
    Route::post('sarana-prasarana', [App\Http\Controllers\DataTable\Paud\DataTableController::class, 'saranaData']);
});

Route::group(['prefix' => 'superadmin', 'middleware' => 'auth'], function () {
    Route::post('dashboard', [App\Http\Controllers\DataTable\Admin\SuperAdminController::class, 'dashboard']);
});

Route::group(['prefix' => 'admin/smp', 'middleware' => 'auth'], function () {
    Route::post('sekolah', [App\Http\Controllers\DataTable\Admin\SmpController::class, 'sekolah']);
    Route::post('tenaga-pendidik', [App\Http\Controllers\DataTable\Admin\SmpController::class, 'tendikData']);
    Route::post('tenaga-kependidikan', [App\Http\Controllers\DataTable\Admin\SmpController::class, 'tenkedikData']);
    Route::post('kebutuhan-guru', [App\Http\Controllers\DataTable\Admin\SmpController::class, 'kebutuhanData']);
    Route::post('peserta-didik', [App\Http\Controllers\DataTable\Admin\SmpController::class, 'pendikData']);
    Route::post('sarana-prasarana', [App\Http\Controllers\DataTable\Admin\SmpController::class, 'saranaData']);
    Route::post('dashboard', [App\Http\Controllers\DataTable\Admin\SmpController::class, 'dashboard']);
});

Route::group(['prefix' => 'admin/sd', 'middleware' => 'auth'], function () {
    Route::post('tenaga-pendidik', [App\Http\Controllers\DataTable\Admin\SdController::class, 'tendikData']);
    Route::post('tenaga-kependidikan', [App\Http\Controllers\DataTable\Admin\SdController::class, 'tenkedikData']);
    Route::post('kebutuhan-guru', [App\Http\Controllers\DataTable\Admin\SdController::class, 'kebutuhanData']);
    Route::post('peserta-didik', [App\Http\Controllers\DataTable\Admin\SdController::class, 'pendikData']);
    Route::post('sarana-prasarana', [App\Http\Controllers\DataTable\Admin\SdController::class, 'saranaData']);
    Route::post('dashboard', [App\Http\Controllers\DataTable\Admin\SdController::class, 'dashboard']);
});

Route::group(['prefix' => 'admin/paud', 'middleware' => 'auth'], function () {
    Route::post('tenaga-pendidik', [App\Http\Controllers\DataTable\Admin\PaudController::class, 'tendikData']);
    Route::post('tenaga-kependidikan', [App\Http\Controllers\DataTable\Admin\PaudController::class, 'tenkedikData']);
    Route::post('kebutuhan-guru', [App\Http\Controllers\DataTable\Admin\PaudController::class, 'kebutuhanData']);
    Route::post('peserta-didik', [App\Http\Controllers\DataTable\Admin\PaudController::class, 'pendikData']);
    Route::post('sarana-prasarana', [App\Http\Controllers\DataTable\Admin\PaudController::class, 'saranaData']);
    Route::post('dashboard', [App\Http\Controllers\DataTable\Admin\PaudController::class, 'dashboard']);
});

Route::group(['prefix' => 'admin/master', 'middleware' => 'auth'], function () {
    Route::post('sekolah', [App\Http\Controllers\DataTable\Admin\MasterController::class, 'sekolah']);
    Route::post('kelas', [App\Http\Controllers\DataTable\Admin\MasterController::class, 'kelas']);
    Route::post('mata-pelajaran', [App\Http\Controllers\DataTable\Admin\MasterController::class, 'subject']);
    Route::post('fasilitas', [App\Http\Controllers\DataTable\Admin\MasterController::class, 'facility']);
    Route::post('koordinator', [App\Http\Controllers\DataTable\Admin\MasterController::class, 'koordinator']);
    Route::post('jabatan', [App\Http\Controllers\DataTable\Admin\MasterController::class, 'position']);
    Route::post('pangkat', [App\Http\Controllers\DataTable\Admin\MasterController::class, 'rank']);
    Route::post('kecamatan', [App\Http\Controllers\DataTable\Admin\MasterController::class, 'district']);
    Route::post('desa', [App\Http\Controllers\DataTable\Admin\MasterController::class, 'village']);
    Route::post('jurusan', [App\Http\Controllers\DataTable\Admin\MasterController::class, 'major']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::post('pengaturan', [App\Http\Controllers\DataTable\Admin\MasterController::class, 'pengaturan']);
    Route::post('akun', [App\Http\Controllers\DataTable\Admin\MasterController::class, 'akun']);
});