<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepartemenBiro extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'logo',
        'division'
    ];

    const DIVISION = [
        'Internal',
        'PSTI',
        'Eksternal',
    ];

    public function fungsis(): MorphMany
    {
        return $this->morphMany(Fungsi::class, 'fungsiable');
    }

    public function programKerjas(): MorphMany
    {
        return $this->morphMany(ProgramKerja::class, 'program_kerjaable');
    }

    public function agendas(): MorphMany
    {
        return $this->morphMany(Agenda::class, 'agendaable');
    }

    public function members(): MorphMany
    {
        return $this->morphMany(Member::class, 'memberable');
    }
}
