<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StartupEvent extends Model
{
    use HasFactory;

    public const EVENT_TYPES = [
        'Startup Investor Connect',
        'Startup Connect',
        'Mentor Connect',
        'Incubator Connect',
        'Institutional Awareness',
        'Department Sensitization Program',
        'Collaborative Events',
        'Compliance Workshop',
    ];

    protected $fillable = [
        'event_type',
        'event_name',
        'event_date',
        'pre_event_promotion_path',
        'pre_event_promotion_name',
        'pre_event_promotion_size',
        'post_event_report_path',
        'post_event_report_name',
        'post_event_report_size',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'event_date' => 'date',
        'pre_event_promotion_size' => 'decimal:2',
        'post_event_report_size' => 'decimal:2',
        'display_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderByDesc('event_date')->orderByDesc('id');
    }

    public function getPreEventPromotionUrlAttribute(): ?string
    {
        if (!$this->pre_event_promotion_path) {
            return null;
        }

        if (Storage::disk('public')->exists($this->pre_event_promotion_path)) {
            return Storage::url($this->pre_event_promotion_path);
        }

        return asset($this->pre_event_promotion_path);
    }

    public function getPostEventReportUrlAttribute(): ?string
    {
        if (!$this->post_event_report_path) {
            return null;
        }

        if (Storage::disk('public')->exists($this->post_event_report_path)) {
            return Storage::url($this->post_event_report_path);
        }

        return asset($this->post_event_report_path);
    }
}
