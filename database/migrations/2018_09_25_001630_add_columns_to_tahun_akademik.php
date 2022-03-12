<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToTahunAkademik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tahun_akademik', function (Blueprint $table) {
            $table->date('tanggal_awal_kuliah')->nullable();
            $table->date('tanggal_akhir_kuliah')->nullable();
            $table->date('tanggal_awal_uts')->nullable();
            $table->date('tanggal_akhir_uts')->nullable();
            $table->date('tanggal_awal_uas')->nullable();
            $table->date('tanggal_akhir_uas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tahun_akademik', function (Blueprint $table) {
            //
        });
    }
}
