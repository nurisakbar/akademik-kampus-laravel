<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table="setting";

    protected $fillable=['nama_universitas','email','no_telpon','fax','alamat'];
}
