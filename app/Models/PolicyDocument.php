<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PolicyDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'policy_period',
        'title',
        'file_path',
        'file_name',
        'file_size',
        'published_date',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'published_date' => 'date',
        'file_size' => 'decimal:2',
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeByPolicyPeriod($query, $period)
    {
        return $query->where('policy_period', $period);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderByDesc('published_date')->orderByDesc('id');
    }

    public function getFileUrlAttribute(): string
    {
        if (Storage::disk('public')->exists($this->file_path)) {
            return Storage::url($this->file_path);
        }
        
        return asset($this->file_path);
    }

    public function getFormattedFileSizeAttribute(): string
    {
        return number_format($this->file_size, 1) . ' MB';
    }

    /**
     * Get a safe filename for download based on the title
     */
    public function getDownloadFilenameAttribute(): string
    {
        // Sanitize the title to create a safe filename
        $filename = $this->title;
        
        // Remove or replace special characters
        $filename = preg_replace('/[^a-zA-Z0-9\s\-_]/', '', $filename);
        
        // Replace spaces with underscores
        $filename = preg_replace('/\s+/', '_', trim($filename));
        
        // Limit length
        $filename = substr($filename, 0, 200);
        
        // Ensure it ends with .pdf
        if (!str_ends_with(strtolower($filename), '.pdf')) {
            $filename .= '.pdf';
        }
        
        return $filename;
    }
}





