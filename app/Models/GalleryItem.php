<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_type',
        'title',
        'image_path',
        'video_url',
        'youtube_id',
        'display_order',
        'published_at',
        'is_visible',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_visible' => 'boolean',
    ];

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public function scopeImages($query)
    {
        return $query->where('media_type', 'image');
    }

    public function scopeVideos($query)
    {
        return $query->where('media_type', 'video');
    }

    public function getMediaUrlAttribute(): ?string
    {
        if ($this->media_type !== 'image' || !$this->image_path) {
            return null;
        }

        // If it's already a full URL, return it
        if (Str::startsWith($this->image_path, ['http://', 'https://'])) {
            return $this->image_path;
        }

        // Check if file exists in storage
        if (Storage::disk('public')->exists($this->image_path)) {
            return Storage::url($this->image_path);
        }

        // Fallback: try to construct URL from path
        // Remove 'public/' prefix if present
        $path = Str::startsWith($this->image_path, 'public/') 
            ? Str::after($this->image_path, 'public/') 
            : $this->image_path;
        
        return Storage::url($path);
    }

    public function getEmbedUrlAttribute(): ?string
    {
        if ($this->youtube_id) {
            return sprintf('https://www.youtube.com/embed/%s', $this->youtube_id);
        }

        if (!$this->video_url) {
            return null;
        }

        if (str_contains($this->video_url, 'embed')) {
            return $this->video_url;
        }

        if (str_contains($this->video_url, 'watch?v=')) {
            return str_replace('watch?v=', 'embed/', $this->video_url);
        }

        return $this->video_url;
    }

    public function getDisplayTitleAttribute(): string
    {
        return $this->title ?? ($this->media_type === 'video' ? 'Untitled Video' : 'Gallery Image');
    }
}
