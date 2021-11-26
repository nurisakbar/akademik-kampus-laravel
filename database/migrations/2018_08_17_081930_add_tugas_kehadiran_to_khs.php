<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTugasKehadiranToKhs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('khs', function (Blueprint $table) {
            $table->integer('nilai_tugas');
            $table->integer('nilai_kehadiran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('khs', function (Blueprint $table) {
            //
        });
    }
}
