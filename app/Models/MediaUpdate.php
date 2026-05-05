<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MediaUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'source_url',
        'image_url',
        'image_path',
        'published_at',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function getDisplayImageAttribute(): ?string
    {
        if ($this->image_path) {
            return Storage::url($this->image_path);
        }

        return $this->image_url;
    }

    public function getPublishedLabelAttribute(): string
    {
        return optional($this->published_at)->format('M Y') ?? '—';
    }
}
