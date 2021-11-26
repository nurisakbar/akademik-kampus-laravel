<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwalkuliah extends Model
{
    protected $table="jadwal_kuliah";

    protected $fillable=['hari','kode_mk','kode_dosen','kode_ruangan','jam','semester','kode_tahun_akademik','kode_jurusan'];
}
