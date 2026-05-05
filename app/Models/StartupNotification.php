<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StartupNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'pdf_path',
        'pdf_name',
        'pdf_size',
        'notification_date',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'notification_date' => 'date',
        'pdf_size' => 'decimal:2',
        'display_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderByDesc('notification_date')->orderByDesc('id');
    }

    public function getPdfUrlAttribute(): string
    {
        if (Storage::disk('public')->exists($this->pdf_path)) {
            return Storage::url($this->pdf_path);
        }

        return asset($this->pdf_path);
    }

    public function getFormattedPdfSizeAttribute(): string
    {
        if ($this->pdf_size === null) {
            return '';
        }

        return number_format((float) $this->pdf_size, 1) . ' MB';
    }
}
