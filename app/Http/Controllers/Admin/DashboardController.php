<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use App\Models\PolicyDocument;
use App\Models\PressRelease;
use App\Services\GoogleAnalyticsService;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index(GoogleAnalyticsService $analytics)
    {
        $isProduction = app()->environment('production');

        $today = ['users' => 0, 'page_views' => 0];
        $last7 = ['users' => 0, 'page_views' => 0];
        $total = ['users' => 0, 'page_views' => 0];
        $userStats = [
            'active_users' => 0,
            'new_users' => 0,
            'sessions' => 0,
            'engagement_rate' => 0,
        ];
        $locations = [];
        $topPages = [];
        $trafficSources = [];
        $realtimeUsers = 0;
        $dailyVisitors = [];

        if ($isProduction) {
            $today = Cache::remember('ga_today', 300, fn() => $analytics->getStats('today', 'today'));
            $last7 = Cache::remember('ga_last7', 300, fn() => $analytics->getStats('7daysAgo', 'today'));
            $total = Cache::remember('ga_total', 300, fn() => $analytics->getStats('30daysAgo', 'today'));

            $userStats = Cache::remember('ga_user_stats', 300, fn() => $analytics->getUserStats());
            $locations = Cache::remember('ga_locations', 600, fn() => $analytics->getLocationStats());
            $topPages = Cache::remember('ga_top_pages', 600, fn() => $analytics->getTopPages());
            $trafficSources = Cache::remember('ga_traffic_sources', 600, fn() => $analytics->getTrafficSources());
            $dailyVisitors = Cache::remember('ga_daily_visitors', 600, fn() => $analytics->getDailyVisitors());

            $realtimeUsers = $analytics->getRealtimeUsers();
        }

        $stats = [
            'total_documents' => PolicyDocument::count(),
            'active_documents' => PolicyDocument::active()->count(),
            'total_gallery_items' => GalleryItem::count(),
            'visible_gallery_items' => GalleryItem::visible()->count(),
            'total_press_releases' => PressRelease::count(),
            'published_press_releases' => PressRelease::published()->count(),

            'today_visitors' => $today['users'],
            'today_page_views' => $today['page_views'],
            'last7_visitors' => $last7['users'],
            'last7_page_views' => $last7['page_views'],
            'total_visitors' => $total['users'],
            'total_page_views' => $total['page_views'],

            'user_stats' => $userStats,
            'locations' => $locations,
            'top_pages' => $topPages,
            'traffic_sources' => $trafficSources,
            'realtime_users' => $realtimeUsers,
            'daily_visitors' => $dailyVisitors,

            'recent_documents' => PolicyDocument::latest()->take(5)->get(),
            'recent_gallery_items' => GalleryItem::latest()->take(5)->get(),
            'recent_press_releases' => PressRelease::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}