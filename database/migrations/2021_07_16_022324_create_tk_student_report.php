<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkStudentReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tk_student_reports', function (Blueprint $table) {
            $table->id();
            $table->string('kelas');
            $table->integer('no_urut');
            $table->integer('siswa_l');
            $table->integer('siswa_p');
            $table->integer('usia_2');
            $table->integer('usia_3');
            $table->integer('usia_4');
            $table->integer('usia_5');
            $table->integer('usia_6');
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tk_student_reports');
    }
}
