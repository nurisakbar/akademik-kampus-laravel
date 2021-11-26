<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $table="kurikulum";

    protected $fillable=['kode_mk','kode_jurusan','semester'];
}
