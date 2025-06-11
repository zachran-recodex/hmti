<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DepartemenBiro extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama',
        'logo',
        'deskripsi',
        'divisi',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'divisi' => 'string',
    ];

    /**
     * Get the fungsi for the departemen biro.
     */
    public function fungsis(): HasMany
    {
        return $this->hasMany(Fungsi::class);
    }

    /**
     * Get the program kerja for the departemen biro.
     */
    public function programKerjas(): HasMany
    {
        return $this->hasMany(ProgramKerja::class);
    }

    /**
     * Get the agenda for the departemen biro.
     */
    public function agendas(): HasMany
    {
        return $this->hasMany(Agenda::class);
    }

    /**
     * Get the anggota for the departemen biro.
     */
    public function anggotas(): HasMany
    {
        return $this->hasMany(Anggota::class);
    }

    /**
     * Get current members (anggota yang masih aktif).
     */
    public function currentAnggota(): HasMany
    {
        return $this->hasMany(Anggota::class)
            ->whereNull('tahun_selesai')
            ->orWhere('tahun_selesai', '>=', now()->year);
    }

    /**
     * Get kepala departemen (head of department).
     */
    public function kepala(): HasMany
    {
        return $this->anggotas()->where('jabatan', 'Kepala');
    }

    /**
     * Get staff members.
     */
    public function staff(): HasMany
    {
        return $this->anggotas()->where('jabatan', 'Staff');
    }

    /**
     * Scope a query to only include specific divisi.
     */
    public function scopeDivisi($query, $divisi)
    {
        return $query->where('divisi', $divisi);
    }
}
