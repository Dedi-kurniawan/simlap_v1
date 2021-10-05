<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmpNeedReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smp_need_reports', function (Blueprint $table) {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('need_reports');
    }
}
