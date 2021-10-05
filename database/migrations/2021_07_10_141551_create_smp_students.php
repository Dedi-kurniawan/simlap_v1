<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmpStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smp_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id')->comment('kelas');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->integer('no_urut');
            $table->integer('siswa_l');
            $table->integer('siswa_p');
            $table->integer('usia_11');
            $table->integer('usia_12');
            $table->integer('usia_13');
            $table->integer('usia_14');
            $table->integer('usia_15');
            $table->integer('usia_16');
            $table->integer('usia_17');
            $table->integer('usia_18');
            $table->integer('usia_19');
            $table->integer('islam');
            $table->integer('katolik');
            $table->integer('protestan');
            $table->integer('hindu');
            $table->integer('budha');
            $table->integer('lain');
            $table->unsignedBigInteger('school_id')->comment('sekolah');
            $table->foreign('school_id')->references('id')->on('schools');
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
        Schema::dropIfExists('smp_students');
    }
}
