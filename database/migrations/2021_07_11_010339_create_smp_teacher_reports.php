<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmpTeacherReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smp_teacher_reports', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nuptk', 50)->nullable();
            $table->string('nip', 50)->nullable();
            $table->date('tmt_sebagai_guru')->nullable();
            $table->string('golongan', 50)->nullable();
            $table->date('tmt_gol_terakhir')->nullable();
            $table->date('tmt_sekolah');
            $table->string('jabatan');
            $table->date('tmt_jabatan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat_rumah');
            $table->string('mapel')->nullable();
            $table->enum('sertifikasi', ['1', '0']);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('status_pegawai', ['PNS', 'GBD', 'GTT', 'GTY']);
            $table->string('pendidikan');
            $table->string('jurusan')->nullable();
            $table->string('jjm', 20)->nullable();
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
        Schema::dropIfExists('smp_teacher_reports');
    }
}
