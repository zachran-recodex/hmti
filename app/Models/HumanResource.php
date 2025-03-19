<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HumanResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function fungsis(): MorphMany
    {
        return $this->morphMany(Fungsi::class, 'fungsiable')->latest();
    }

    public function programKerjas(): MorphMany
    {
        return $this->morphMany(ProgramKerja::class, 'program_kerjaable')->latest();
    }

    public function agendas(): MorphMany
    {
        return $this->morphMany(Agenda::class, 'agendaable')->latest();
    }
}
