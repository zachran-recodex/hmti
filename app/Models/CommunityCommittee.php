<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityCommittee extends Model
{
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
