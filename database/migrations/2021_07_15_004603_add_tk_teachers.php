<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTkTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tk_teachers', function (Blueprint $table) {
            $table->dropColumn('tugas_mengajar');
        });

        Schema::table('tk_teachers', function (Blueprint $table) {
            $table->string('tugas_mengajar_tk_a')->nullable();
            $table->string('tugas_mengajar_tk_b')->nullable();
            $table->string('tugas_mengajar_kb')->nullable();
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
