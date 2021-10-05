<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SdReportAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_teacher_reports', function (Blueprint $table) {
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
        Schema::create('sd_student_reports', function (Blueprint $table) {
            $table->id();
            $table->string('kelas');
            $table->integer('no_urut');
            $table->integer('siswa_l');
            $table->integer('siswa_p');
            $table->integer('usia_6');
            $table->integer('usia_7');
            $table->integer('usia_8');
            $table->integer('usia_9');
            $table->integer('usia_10');
            $table->integer('usia_11');
            $table->integer('usia_12');
            $table->integer('usia_13');
            $table->integer('usia_14');
            $table->integer('usia_15');
            $table->integer('islam');
            $table->integer('katolik');
            $table->integer('protestan');
            $table->integer('hindu');
            $table->integer('budha');
            $table->integer('lain');
            $table->unsignedBigInteger('school_id')->comment('sekolah');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->string('operator');
            $table->enum('bulan', ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']);
            $table->string('tahun', 4);
            $table->enum('semester', ['1', '2']);
            $table->timestamps();
        });
        Schema::create('sd_need_reports', function (Blueprint $table) {
            $table->id();
            $table->string('mapel');
            $table->integer('rombel');
            $table->integer('jam_rombel');
            $table->integer('jam_perminggu');
            $table->integer('jumlah_guru');
            $table->string('status_kepegawaian');
            $table->string('keterangan');
            $table->string('operator');
            $table->enum('bulan', ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']);
            $table->string('tahun', 4);
            $table->enum('semester', ['1', '2']);
            $table->unsignedBigInteger('school_id')->nullable()->comment('sekolah');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->timestamps();
        });
        Schema::create('sd_employee_reports', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nuptk', 50)->nullable();
            $table->string('nip', 50)->nullable();
            $table->date('tmt_sebagai_guru')->nullable();
            $table->string('golongan', 50)->nullable();
            $table->date('tmt_gol_terakhir')->nullable();
            $table->date('tmt_sekolah');
            $table->string('jabatan', 50)->nullable();
            $table->date('tmt_jabatan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat_rumah');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('status_pegawai', ['PNS', 'PTT', 'PTY']);
            $table->string('pendidikan');
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
        Schema::dropIfExists('sd_teacher_reports');
    }
}
