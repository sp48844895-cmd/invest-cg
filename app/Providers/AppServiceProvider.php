<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('partials.footer', function ($view) {
            $totalVisitors = Cache::remember('ga_total_visitors_footer', 3600, function () {
                try {
                    $analytics = app(\App\Services\GoogleAnalyticsService::class);
                    $stats = $analytics->getStats('2020-01-01', 'today');
                    return $stats['users'] ?? 0;
                } catch (\Exception $e) {
                    return 0;
                }
            });

            $view->with('totalVisitors', $totalVisitors);
        });
    }
}
