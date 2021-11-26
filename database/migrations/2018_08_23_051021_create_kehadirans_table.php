<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKehadiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_mk');
            $table->String('kode_dosen');
            $table->string('kode_jurusan');
            $table->string('kode_ruang');
            $table->string('kode_tahun_akademik');
            $table->string('topik_pembahasan');
            $table->integer('pertemuan_ke');
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
        Schema::dropIfExists('kehadirans');
    }
}
