<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkFacilityReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tk_facility_reports', function (Blueprint $table) {
            $table->id();
            $table->string('uraian');
            $table->integer('baik');
            $table->integer('rusak_ringan');
            $table->integer('rusak_sedang');
            $table->integer('rusak_berat');
            $table->integer('kebutuhan');
            $table->unsignedBigInteger('school_id')->comment('sekolah');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->string('operator');
            $table->enum('bulan', ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']);
            $table->string('tahun', 4);
            $table->enum('semester', ['1', '2']);
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
        Schema::dropIfExists('tk_facility_reports');
    }
}
