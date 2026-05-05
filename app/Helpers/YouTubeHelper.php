<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class YouTubeHelper
{
    /**
     * Extract YouTube video ID from URL
     */
    public static function extractVideoId(string $url): ?string
    {
        $patterns = [
            '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }

    /**
     * Fetch YouTube video title using oEmbed API
     */
    public static function fetchVideoTitle(string $url): ?string
    {
        try {
            $videoId = self::extractVideoId($url);
            
            if (!$videoId) {
                return null;
            }

            // Use oEmbed API (no API key required)
            $oEmbedUrl = "https://www.youtube.com/oembed?url={$url}&format=json";
            
            $response = Http::timeout(5)->get($oEmbedUrl);
            
            if ($response->successful()) {
                $data = $response->json();
                return $data['title'] ?? null;
            }
        } catch (\Exception $e) {
            Log::warning('Failed to fetch YouTube title: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Check if URL is a YouTube URL
     */
    public static function isYouTubeUrl(string $url): bool
    {
        return str_contains($url, 'youtube.com') || str_contains($url, 'youtu.be');
    }
}




