<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmpReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smp_reports', function (Blueprint $table) {
            $table->id();
            $table->enum('teacher', ['0', '1'])->default(0);
            $table->enum('student', ['0', '1'])->default(0);
            $table->enum('employee', ['0', '1'])->default(0);
            $table->enum('need', ['0', '1'])->default(0);
            $table->enum('facility', ['0', '1'])->default(0);
            $table->unsignedBigInteger('school_id')->comment('sekolah');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->string('operator');
            $table->enum('bulan', ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']);
            $table->string('tahun', 4);
            $table->enum('semester', ['1', '2']);
            $table->integer('no_urut')->nullable();
            $table->timestamp('completed_date')->nullable();
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
        Schema::dropIfExists('smp_reports');
    }
}
