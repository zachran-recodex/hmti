<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Fungsi extends Model
{
    protected $fillable = [
        'title',
        'fungsiable_id',
        'fungsiable_type'
    ];

    public function fungsiable(): MorphTo
    {
        return $this->morphTo();
    }
}
