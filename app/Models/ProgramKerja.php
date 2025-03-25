<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ProgramKerja extends Model
{

    protected $table = 'program_kerja';
    protected $fillable = [
        'title',
        'description',
        'program_kerjaable_id',
        'program_kerjaable_type'
    ];

    public function programKerjaable(): MorphTo
    {
        return $this->morphTo();
    }
}
