<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RumahSakit extends Authenticatable
{
    //
    protected $table = "rumah_sakit";

    protected $fillable = [
        'ID',
        'nama',
        'alamat',
        'telepon',
        'email',
        'is_delete'
    ];
}
