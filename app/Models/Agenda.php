<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Agenda extends Model
{
    protected $fillable = [
        'title',
        'description',
        'agendaable_id',
        'agendaable_type'
    ];

    public function agendaable(): MorphTo
    {
        return $this->morphTo();
    }
}
