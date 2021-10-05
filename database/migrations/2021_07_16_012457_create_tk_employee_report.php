<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkEmployeeReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tk_employee_reports', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip', 50)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat_rumah');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pendidikan');
            $table->string('status_pegawai')->nullable();
            $table->string('jabatan');
            $table->string('golongan')->nullable();
            $table->date('tanggal_mulai_bekerja');
            $table->date('tmt_gol_terakhir')->nullable();
            $table->date('tmt_capeg')->nullable();
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('koordinator');
            $table->string('operator');
            $table->enum('bulan', ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']);
            $table->string('tahun', 4);
            $table->enum('semester', ['1', '2']);
            $table->unsignedBigInteger('school_id')->nullable()->comment('sekolah');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tk_employee_reports');
    }
}
