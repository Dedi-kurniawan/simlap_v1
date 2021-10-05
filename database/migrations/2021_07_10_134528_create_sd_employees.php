<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_employees', function (Blueprint $table) {
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
        Schema::dropIfExists('sd_employees');
    }
}
