<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserManual extends Model
{
    use HasFactory;

    protected $table = 'user_manuals'; // change ONLY if table name is different

    protected $fillable = [
        'dept_name',
        'service_name',
        'type',
        'short_desc',
        'pdf_file',
        'status',
        'display_order',
    ];

    protected $casts = [
        'status' => 'boolean',
        'display_order' => 'integer',
    ];

    /* =====================
     | Scopes
     ===================== */

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeByDepartment($query, string $deptName)
    {
        return $query->where('dept_name', $deptName);
    }

    public function scopeByType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')
                     ->orderByDesc('id');
    }

    /* =====================
     | Accessors
     ===================== */

    public function getPdfUrlAttribute(): string
    {
        if ($this->pdf_file && Storage::disk('public')->exists($this->pdf_file)) {
            return Storage::url($this->pdf_file);
        }

        return $this->pdf_file ? asset($this->pdf_file) : '';
    }

    public function getDownloadFilenameAttribute(): string
    {
        $filename = $this->service_name ?: 'User_Manual';

        $filename = preg_replace('/[^a-zA-Z0-9\s\-_]/', '', $filename);
        $filename = preg_replace('/\s+/', '_', trim($filename));
        $filename = substr($filename, 0, 200);

        return str_ends_with(strtolower($filename), '.pdf')
            ? $filename
            : $filename . '.pdf';
    }
}
