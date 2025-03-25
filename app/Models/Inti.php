<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inti extends Model
{

    protected $fillable = [
        'name',
        'photo',
        'position',
    ];

    const POSITIONS = [
        'Ketua Himpunan',
        'Wakil Ketua Himpunan',
        'Sekretaris Jenderal',
        'Sekretaris',
        'Bendahara',
    ];

    public static function getPositions()
    {
        return self::POSITIONS;
    }
}
