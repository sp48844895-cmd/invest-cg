<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class GalleryItemSeeder extends Seeder
{
    public function run(): void
    {
        // Gallery seeder - Only create items if database is empty
        // This ensures we don't add random images from assets folder
        // Admin should upload actual gallery images through the admin panel
        
        // Only create sample videos if no items exist and you want to add sample videos
        // Uncomment and add your actual video data if needed:
        
        /*
        if (GalleryItem::count() === 0) {
            $videos = [
                // Add your actual video URLs here if needed
            ];

            foreach ($videos as $index => $video) {
                GalleryItem::create([
                    'media_type' => 'video',
                    'title' => $video['title'] ?? null,
                    'video_url' => $video['video_url'] ?? null,
                    'youtube_id' => $video['youtube_id'] ?? null,
                    'display_order' => $index + 1,
                    'published_at' => Carbon::now()->subDays($index),
                    'is_visible' => true,
                ]);
            }
        }
        */
    }
}
