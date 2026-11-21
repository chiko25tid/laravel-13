<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio_1040 extends Model
{
    protected $table = 'portofolio_1040';

    protected $fillable = [
        'judul',
        'deskripsi',
        'teknologi',
        'gambar',
        'is_published',
    ];
}