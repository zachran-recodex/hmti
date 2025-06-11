<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fungsi extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'judul',
        'departemen_biro_id',
    ];

    /**
     * Get the departemen biro that owns the fungsi.
     */
    public function departemenBiro(): BelongsTo
    {
        return $this->belongsTo(DepartemenBiro::class);
    }

    /**
     * Scope a query to only include fungsi from specific departemen biro.
     */
    public function scopeByDepartemen($query, $departemenBiroId)
    {
        return $query->where('departemen_biro_id', $departemenBiroId);
    }
}
