<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create storage directories if they don't exist
        $directories = [
            'policy-documents',
            'gallery',
            'press-releases',
            'startup-notifications',
            'startup-events',
            'startup-events/pre-event',
            'startup-events/post-event',
        ];

        foreach ($directories as $directory) {
            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optionally remove directories (commented out for safety)
        // Storage::disk('public')->deleteDirectory('policy-documents');
        // Storage::disk('public')->deleteDirectory('gallery');
    }
};




