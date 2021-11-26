<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    protected $guard = 'mahasiswa';


    protected $table="mahasiswa";

    protected $fillable=['nim','nama_mahasiswa','email','password','alamat','kode_jurusan','kode_tahun_akademik','semester_aktif'];

    protected $primaryKey = 'nim';

    public $incrementing = false;


    function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
