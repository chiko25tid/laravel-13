<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv_1040 extends Model
{
    protected $table = 'cv_1040';

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'deskripsi_diri',
        'pendidikan',
        'keahlian',
        'foto',
    ];
}