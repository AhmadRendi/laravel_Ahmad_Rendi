<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
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
