<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tk_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip', 50)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pendidikan');
            $table->enum('status_pegawai', ['PNS', 'GBD', 'GTT', 'GTY']);
            $table->string('jabatan');
            $table->string('golongan')->nullable();
            $table->string('tahun_gol_terakhir')->nullable();
            $table->string('bulan_gol_terakhir')->nullable();
            $table->string('tugas_mengajar')->nullable();
            $table->date('tanggal_mulai_bekerja');
            $table->date('tmt_gol_terakhir')->nullable();
            $table->date('tmt_capeg')->nullable();
            $table->string('pelatihan')->nullable();
            $table->enum('sertifikasi', ['1', '0']);
            $table->string('sertifikasi_tahun', 4)->nullable();
            $table->unsignedBigInteger('school_id')->comment('sekolah');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->unsignedBigInteger('koordinator_id')->nullable()->comment('koordinator');
            $table->foreign('koordinator_id')->references('id')->on('koordinators');
            $table->unsignedBigInteger('village_id')->nullable()->comment('desa');
            $table->foreign('village_id')->references('id')->on('villages');
            $table->unsignedBigInteger('district_id')->nullable()->comment('kecamatan');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete("set null");;
            $table->unsignedBigInteger('user_id')->nullable()->comment('user');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("set null");
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
        Schema::dropIfExists('tk_teachers');
    }
}
