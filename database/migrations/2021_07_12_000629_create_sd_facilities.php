<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdFacilities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('uraian');
            $table->integer('baik');
            $table->integer('rusak_ringan');
            $table->integer('rusak_sedang');
            $table->integer('rusak_berat');
            $table->integer('kebutuhan');
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
        Schema::dropIfExists('sd_facilities');
    }
}
