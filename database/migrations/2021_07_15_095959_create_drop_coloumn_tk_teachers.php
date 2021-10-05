<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDropColoumnTkTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tk_teachers', function (Blueprint $table) {
            $table->dropColumn('tugas_mengajar_tk_a')->nullable();
            $table->dropColumn('tugas_mengajar_tk_b')->nullable();
            $table->dropColumn('tugas_mengajar_kb')->nullable();
        });

        Schema::table('tk_teachers', function (Blueprint $table) {
            $table->string('tugas_mengajar')->nullable();
            $table->string('alamat_rumah')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tk_teachers', function (Blueprint $table) {
            //
        });
    }
}
