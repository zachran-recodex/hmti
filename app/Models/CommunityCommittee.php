<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommunityCommittee extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'logo',
        'category'
    ];

    const CATEGORIES = [
        'Community',
        'Committee'
    ];

    public static function getCategories()
    {
        return self::CATEGORIES;
    }
}
