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
            $table->date('tanggal_awal_kuliah');
            $table->date('tanggal_akhir_kuliah');
            $table->date('tanggal_awal_uts');
            $table->date('tanggal_akhir_uts');
            $table->date('tanggal_awal_uas');
            $table->date('tanggal_akhir_uas');
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
