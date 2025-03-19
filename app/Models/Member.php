<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'memberable_id',
        'memberable_type'
    ];

    const POSITIONS = [
        'Kepala',
        'Anggota'
    ];

    public static function getPositions()
    {
        return self::POSITIONS;
    }

    public function memberable(): MorphTo
    {
        return $this->morphTo();
    }
}
