<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tk_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id')->comment('kelas');
            $table->foreign('room_id')->references('id')->on('rooms');
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
        Schema::dropIfExists('tk_students');
    }
}
