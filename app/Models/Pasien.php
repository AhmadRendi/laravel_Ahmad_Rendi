<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //
    protected $table = "pasiens";

    protected $fillable = [
        'ID',
        'nama',
        'alamat',
        'telepon',
        'id_rumah_sakit',
        'is_delete'
    ];
}
