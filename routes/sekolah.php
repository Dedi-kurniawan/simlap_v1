<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'smp.', 'prefix' => 'smp', 'middleware' => ['auth', 'role:smp']], function () {
    Route::get('/dashboard', [App\Http\Controllers\School\Smp\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/chart-tenaga-pendidik', [App\Http\Controllers\School\Smp\DashboardController::class, 'teacher']);
    Route::resource('tenaga-pendidik', App\Http\Controllers\School\Smp\TeacherController::class);
    Route::get('/get-desa', [App\Http\Controllers\School\Smp\TeacherController::class, 'getVillage']);
    Route::post('/report-tenaga-pendidik', [App\Http\Controllers\School\Smp\TeacherController::class, 'generateReport']);
    Route::resource('tenaga-kependidikan', App\Http\Controllers\School\Smp\EmployeeController::class);
    Route::post('/report-tenaga-kependidikan', [App\Http\Controllers\School\Smp\EmployeeController::class, 'generateReport']);
    Route::resource('kebutuhan-guru', App\Http\Controllers\School\Smp\NeedController::class);
    Route::post('/report-kebutuhan-guru', [App\Http\Controllers\School\Smp\NeedController::class, 'generateReport']);
    Route::resource('peserta-didik', App\Http\Controllers\School\Smp\StudentController::class);
    Route::post('/report-peserta-didik', [App\Http\Controllers\School\Smp\StudentController::class, 'generateReport']);
    Route::resource('sarana-prasarana', App\Http\Controllers\School\Smp\FacilityController::class);
    Route::post('/report-sarana-prasarana', [App\Http\Controllers\School\Smp\FacilityController::class, 'generateReport']);
    Route::get('/laporan', [App\Http\Controllers\School\Smp\ReportController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/show', [App\Http\Controllers\School\Smp\ReportController::class, 'show'])->name('laporan.show');
});


Route::group(['as' => 'sd.', 'prefix' => 'sd', 'middleware' => ['auth', 'role:sd']], function () {
    Route::get('/dashboard', [App\Http\Controllers\School\Sd\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/chart-tenaga-pendidik', [App\Http\Controllers\School\Sd\DashboardController::class, 'teacher']);
    Route::resource('tenaga-pendidik', App\Http\Controllers\School\Sd\TeacherController::class);
    Route::get('/get-desa', [App\Http\Controllers\School\Sd\TeacherController::class, 'getVillage']);
    Route::post('/report-tenaga-pendidik', [App\Http\Controllers\School\Sd\TeacherController::class, 'generateReport']);
    Route::resource('tenaga-kependidikan', App\Http\Controllers\School\Sd\EmployeeController::class);
    Route::post('/report-tenaga-kependidikan', [App\Http\Controllers\School\Sd\EmployeeController::class, 'generateReport']);
    Route::resource('kebutuhan-guru', App\Http\Controllers\School\Sd\NeedController::class);
    Route::post('/report-kebutuhan-guru', [App\Http\Controllers\School\Sd\NeedController::class, 'generateReport']);
    Route::resource('peserta-didik', App\Http\Controllers\School\Sd\StudentController::class);
    Route::post('/report-peserta-didik', [App\Http\Controllers\School\Sd\StudentController::class, 'generateReport']);
    Route::resource('sarana-prasarana', App\Http\Controllers\School\Sd\FacilityController::class);
    Route::post('/report-sarana-prasarana', [App\Http\Controllers\School\Sd\FacilityController::class, 'generateReport']);
    Route::get('/laporan', [App\Http\Controllers\School\Sd\ReportController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/show', [App\Http\Controllers\School\Sd\ReportController::class, 'show'])->name('laporan.show');
});


Route::group(['as' => 'paud.', 'prefix' => 'paud', 'middleware' => ['auth', 'role:paud']], function () {
    Route::get('/dashboard', [App\Http\Controllers\School\Paud\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/chart-tenaga-pendidik', [App\Http\Controllers\School\Paud\DashboardController::class, 'teacher']);
    Route::resource('tenaga-pendidik', App\Http\Controllers\School\Paud\TeacherController::class);
    Route::get('/get-desa', [App\Http\Controllers\School\Paud\TeacherController::class, 'getVillage']);
    Route::post('/report-tenaga-pendidik', [App\Http\Controllers\School\Paud\TeacherController::class, 'generateReport']);
    Route::resource('tenaga-kependidikan', App\Http\Controllers\School\Paud\EmployeeController::class);
    Route::post('/report-tenaga-kependidikan', [App\Http\Controllers\School\Paud\EmployeeController::class, 'generateReport']);
    Route::resource('kebutuhan-guru', App\Http\Controllers\School\Paud\NeedController::class);
    Route::post('/report-kebutuhan-guru', [App\Http\Controllers\School\Paud\NeedController::class, 'generateReport']);
    Route::resource('peserta-didik', App\Http\Controllers\School\Paud\StudentController::class);
    Route::post('/report-peserta-didik', [App\Http\Controllers\School\Paud\StudentController::class, 'generateReport']);
    Route::resource('sarana-prasarana', App\Http\Controllers\School\Paud\FacilityController::class);
    Route::post('/report-sarana-prasarana', [App\Http\Controllers\School\Paud\FacilityController::class, 'generateReport']);
    Route::get('/laporan', [App\Http\Controllers\School\Paud\ReportController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/show', [App\Http\Controllers\School\Paud\ReportController::class, 'show'])->name('laporan.show');
});

Route::group(['as' => 'm.', 'prefix' => 'm', 'middleware' => ['auth', 'role:paud|sd|smp']], function () {
    Route::get('/sekolah', [App\Http\Controllers\School\Master\SchoolController::class, 'index'])->name('sekolah');
    Route::put('/sekolah/{sekolah}', [App\Http\Controllers\School\Master\SchoolController::class, 'update'])->name('sekolah.update');
});

Route::get('/get-desa-modal-school', [App\Http\Controllers\School\Paud\TeacherController::class, 'getVillage']);