<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    protected $fillable = [
        'definisi',
        'kedudukan_peran',
        'visi',
        'misi',
        'gambar_stuktural'
    ];

    protected $casts = [
        'misi' => 'array'
    ];
}
