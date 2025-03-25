<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class DepartemenBiro extends Model
{

    protected $table = 'departemen_biro';

    protected $fillable = [
        'title',
        'description',
        'logo',
        'division'
    ];

    const DIVISIONS = [
        'Internal',
        'PSTI',
        'Eksternal',
    ];

    public static function getDivisions()
    {
        return self::DIVISIONS;
    }

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
