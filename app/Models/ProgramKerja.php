<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramKerja extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'judul',
        'deskripsi',
        'departemen_biro_id',
    ];

    /**
     * Get the departemen biro that owns the program kerja.
     */
    public function departemenBiro(): BelongsTo
    {
        return $this->belongsTo(DepartemenBiro::class);
    }

    /**
     * Scope a query to only include program kerja from specific departemen biro.
     */
    public function scopeByDepartemen($query, $departemenBiroId)
    {
        return $query->where('departemen_biro_id', $departemenBiroId);
    }

    /**
     * Scope a query to search program kerja by title or description.
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('judul', 'like', "%{$term}%")
            ->orWhere('deskripsi', 'like', "%{$term}%");
    }
}
