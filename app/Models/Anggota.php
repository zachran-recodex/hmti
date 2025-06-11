<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anggota extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'tahun_mulai',
        'tahun_selesai',
        'departemen_biro_id',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'tahun_mulai' => 'integer',
        'tahun_selesai' => 'integer',
    ];

    /**
     * Get the departemen biro that owns the anggota.
     */
    public function departemenBiro(): BelongsTo
    {
        return $this->belongsTo(DepartemenBiro::class);
    }

    /**
     * Scope a query to only include active members.
     */
    public function scopeActive($query)
    {
        return $query->whereNull('tahun_selesai')
            ->orWhere('tahun_selesai', '>=', now()->year);
    }

    /**
     * Scope a query to only include members by position.
     */
    public function scopeByJabatan($query, $jabatan)
    {
        return $query->where('jabatan', $jabatan);
    }

    /**
     * Scope a query to only include members from specific departemen biro.
     */
    public function scopeByDepartemen($query, $departemenBiroId)
    {
        return $query->where('departemen_biro_id', $departemenBiroId);
    }

    /**
     * Scope a query to only include members from specific year range.
     */
    public function scopeByYear($query, $year)
    {
        return $query->where('tahun_mulai', '<=', $year)
            ->where(function ($q) use ($year) {
                $q->whereNull('tahun_selesai')
                    ->orWhere('tahun_selesai', '>=', $year);
            });
    }

    /**
     * Check if member is currently active.
     */
    public function isActive(): bool
    {
        return is_null($this->tahun_selesai) || $this->tahun_selesai >= now()->year;
    }

    /**
     * Check if member is head of department.
     */
    public function isKepala(): bool
    {
        return $this->jabatan === 'Kepala';
    }

    /**
     * Get tenure duration in years.
     */
    public function getTenureDuration(): int
    {
        $endYear = $this->tahun_selesai ?? now()->year;
        return $endYear - $this->tahun_mulai + 1;
    }
}
