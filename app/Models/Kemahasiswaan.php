<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Kemahasiswaan extends Model
{
    protected $fillable = [
        'logo',
        'description',
    ];

    public function fungsi(): MorphMany
    {
        return $this->morphMany(Fungsi::class, 'fungsiable');
    }

    public function programKerja(): MorphMany
    {
        return $this->morphMany(ProgramKerja::class, 'program_kerjaable');
    }

    public function agenda(): MorphMany
    {
        return $this->morphMany(Agenda::class, 'agendaable');
    }
}
