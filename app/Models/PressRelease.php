<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PressRelease extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'thumbnail_path',
        'thumbnail_url',
        'published_at',
        'is_published',
        'tags',
        'meta_title',
        'meta_description',
        'author',
        'view_count',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_published' => 'boolean',
        'tags' => 'array',
        'view_count' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pressRelease) {
            if (empty($pressRelease->slug)) {
                $pressRelease->slug = Str::slug($pressRelease->title);
            }
        });

        static::updating(function ($pressRelease) {
            if ($pressRelease->isDirty('title') && empty($pressRelease->slug)) {
                $pressRelease->slug = Str::slug($pressRelease->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->where('published_at', '<=', now());
    }

    public function scopeRecent($query, $limit = 5)
    {
        return $query->published()
            ->orderByDesc('published_at')
            ->limit($limit);
    }

    public function getThumbnailAttribute(): ?string
    {
        // If thumbnail_url is provided and is a full URL, return it
        if ($this->thumbnail_url && Str::startsWith($this->thumbnail_url, ['http://', 'https://'])) {
            return $this->thumbnail_url;
        }

        // If thumbnail_path exists, try to get the storage URL
        if ($this->thumbnail_path) {
            // Check if it's already a full URL
            if (Str::startsWith($this->thumbnail_path, ['http://', 'https://'])) {
                return $this->thumbnail_path;
            }

            // Check if file exists in storage
            if (Storage::disk('public')->exists($this->thumbnail_path)) {
                return Storage::url($this->thumbnail_path);
            }

            // Fallback: try to construct URL from path
            // Remove 'public/' prefix if present
            $path = Str::startsWith($this->thumbnail_path, 'public/') 
                ? Str::after($this->thumbnail_path, 'public/') 
                : $this->thumbnail_path;
            
            return Storage::url($path);
        }

        // Return thumbnail_url as fallback
        return $this->thumbnail_url;
    }

    public function getFormattedPublishedDateAttribute(): string
    {
        return $this->published_at ? $this->published_at->format('d M Y') : '';
    }

    public function getTagsListAttribute(): array
    {
        return $this->tags ?? [];
    }

    public function incrementViews()
    {
        $this->increment('view_count');
    }
}
