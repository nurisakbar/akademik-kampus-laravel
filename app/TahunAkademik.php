<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    protected $table="tahun_akademik";
    protected $fillable=['kode_tahun_akademik','tahun_akademik','status','tanggal_awal_kuliah',
                        'tanggal_akhir_kuliah','tanggal_awal_uts','tanggal_akhir_uts',
                        'tanggal_awal_uas','tanggal_akhir_uas','tanggal_awal_isi_krs','tanggal_akhir_isi_krs'];

}
