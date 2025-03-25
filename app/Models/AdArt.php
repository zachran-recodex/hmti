<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdArt extends Model
{
    protected $table = 'ad_art';

    protected $fillable = [
        'file_path'
    ];
}
