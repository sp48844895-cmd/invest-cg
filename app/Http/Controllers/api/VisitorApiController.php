<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\GoogleAnalyticsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class VisitorApiController extends Controller
{
    public function totalVisitors(GoogleAnalyticsService $analytics): JsonResponse
    {
        try {
            $total = Cache::remember('api_total_visitors', 300, function () use ($analytics) {
                return $analytics->getStats('2026-01-01', 'today');
            });

            $totalVisitors = (int) ($total['users'] ?? 0);

            return response()->json([
                'success' => true,
                'total_visitors' => $totalVisitors,
                'formatted_total_visitors' => number_format($totalVisitors),
                'updated_at' => now()->toDateTimeString(),
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Unable to fetch visitor count',
                'total_visitors' => 0,
                'formatted_total_visitors' => '0',
            ], 500);
        }
    }
}