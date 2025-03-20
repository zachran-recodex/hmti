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
        'Staff 2022',
        'Staff 2023',
        'Staff 2024',
        'Staff 2025',
        'Staff 2026'
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
