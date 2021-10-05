<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('nss')->nullable();
            $table->string('npsn');
            $table->enum('status_sekolah', ['NEGERI', 'SWASTA']);
            $table->date('tahun_berdiri')->nullable();
            $table->string('akreditasi', 2)->nullable();
            $table->string('nilai_akreditasi', 5)->nullable();
            $table->string('alamat_sekolah')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('village_id')->nullable();
            $table->foreign('village_id')->references('id')->on('villages');
            $table->string('telepon_sekolah', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('kurikulum')->nullable();
            $table->unsignedBigInteger('koordinator_id')->nullable();
            $table->foreign('koordinator_id')->references('id')->on('koordinators');
            $table->string('kepala_sekolah')->nullable();
            $table->string('nip_kepala_sekolah')->nullable();
            $table->string('sertifikasi_kepala_sekolah')->nullable();
            $table->string('hp_kepala_sekolah')->nullable();
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
        Schema::dropIfExists('schools');
    }
}
