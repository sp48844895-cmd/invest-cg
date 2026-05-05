<?php

namespace App\Services;

use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\RunReportRequest;
use Google\Analytics\Data\V1beta\RunRealtimeReportRequest;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\Dimension;
use Illuminate\Support\Facades\Cache;

class GoogleAnalyticsService
{
    protected $client;
    protected $propertyId;

    public function __construct()
    {
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . storage_path('app/google-analytics.json'));

        $this->client = new BetaAnalyticsDataClient();
        $this->propertyId = 'properties/' . config('services.google_analytics.property_id');
    }

    // 🔹 BASIC STATS
    public function getStats($startDate = '7daysAgo', $endDate = 'today')
    {
        return Cache::remember("ga_stats_{$startDate}_{$endDate}", 300, function () use ($startDate, $endDate) {
            try {
                $request = new RunReportRequest([
                    'property' => $this->propertyId,
                    'date_ranges' => [
                        new DateRange([
                            'start_date' => $startDate,
                            'end_date' => $endDate,
                        ]),
                    ],
                    'metrics' => [
                        new Metric(['name' => 'totalUsers']),
                        new Metric(['name' => 'screenPageViews']),
                    ],
                ]);

                $response = $this->client->runReport($request);

                $rows = $response->getRows();
                $row = $rows[0] ?? null;

                return [
                    'users' => $row ? (int) $row->getMetricValues()[0]->getValue() : 0,
                    'page_views' => $row ? (int) $row->getMetricValues()[1]->getValue() : 0,
                ];
            } catch (\Exception $e) {
                return ['users' => 0, 'page_views' => 0];
            }
        });
    }

    // 📊 USER STATS
    public function getUserStats()
    {
        return Cache::remember('ga_user_stats', 300, function () {
            try {
                $request = new RunReportRequest([
                    'property' => $this->propertyId,
                    'date_ranges' => [
                        new DateRange(['start_date' => '7daysAgo', 'end_date' => 'today']),
                    ],
                    'metrics' => [
                        new Metric(['name' => 'activeUsers']),
                        new Metric(['name' => 'newUsers']),
                        new Metric(['name' => 'sessions']),
                        new Metric(['name' => 'engagementRate']),
                    ],
                ]);

                $response = $this->client->runReport($request);
                $rows = $response->getRows();
                $row = $rows[0] ?? null;

                return [
                    'active_users' => $row ? (int) $row->getMetricValues()[0]->getValue() : 0,
                    'new_users' => $row ? (int) $row->getMetricValues()[1]->getValue() : 0,
                    'sessions' => $row ? (int) $row->getMetricValues()[2]->getValue() : 0,
                    'engagement_rate' => $row ? (float) $row->getMetricValues()[3]->getValue() : 0,
                ];
            } catch (\Exception $e) {
                return [
                    'active_users' => 0,
                    'new_users' => 0,
                    'sessions' => 0,
                    'engagement_rate' => 0,
                ];
            }
        });
    }

    // 🌍 LOCATION
    public function getLocationStats()
    {
        return Cache::remember('ga_locations', 600, function () {
            try {
                $request = new RunReportRequest([
                    'property' => $this->propertyId,
                    'date_ranges' => [
                        new DateRange(['start_date' => '7daysAgo', 'end_date' => 'today']),
                    ],
                    'dimensions' => [
                        new Dimension(['name' => 'country']),
                        new Dimension(['name' => 'city']),
                    ],
                    'metrics' => [
                        new Metric(['name' => 'activeUsers']),
                    ],
                ]);

                $response = $this->client->runReport($request);

                $data = [];
                foreach ($response->getRows() as $row) {
                    $data[] = [
                        'country' => $row->getDimensionValues()[0]->getValue(),
                        'city' => $row->getDimensionValues()[1]->getValue(),
                        'users' => (int) $row->getMetricValues()[0]->getValue(),
                    ];
                }

                return $data;
            } catch (\Exception $e) {
                return [];
            }
        });
    }

    // 📄 TOP PAGES
    public function getTopPages()
    {
        return Cache::remember('ga_top_pages', 600, function () {
            try {
                $request = new RunReportRequest([
                    'property' => $this->propertyId,
                    'date_ranges' => [
                        new DateRange(['start_date' => '7daysAgo', 'end_date' => 'today']),
                    ],
                    'dimensions' => [
                        new Dimension(['name' => 'pagePath']),
                    ],
                    'metrics' => [
                        new Metric(['name' => 'screenPageViews']),
                        new Metric(['name' => 'averageSessionDuration']),
                    ],
                    'limit' => 10,
                ]);

                $response = $this->client->runReport($request);

                $pages = [];
                foreach ($response->getRows() as $row) {
                    $pages[] = [
                        'page' => $row->getDimensionValues()[0]->getValue(),
                        'views' => (int) $row->getMetricValues()[0]->getValue(),
                        'avg_time' => (float) $row->getMetricValues()[1]->getValue(),
                    ];
                }

                return $pages;
            } catch (\Exception $e) {
                return [];
            }
        });
    }

    // 📈 TRAFFIC SOURCES
    public function getTrafficSources()
    {
        return Cache::remember('ga_traffic_sources', 600, function () {
            try {
                $request = new RunReportRequest([
                    'property' => $this->propertyId,
                    'date_ranges' => [
                        new DateRange(['start_date' => '7daysAgo', 'end_date' => 'today']),
                    ],
                    'dimensions' => [
                        new Dimension(['name' => 'sessionSource']),
                        new Dimension(['name' => 'sessionMedium']),
                    ],
                    'metrics' => [
                        new Metric(['name' => 'sessions']),
                    ],
                ]);

                $response = $this->client->runReport($request);

                $sources = [];
                foreach ($response->getRows() as $row) {
                    $sources[] = [
                        'source' => $row->getDimensionValues()[0]->getValue(),
                        'medium' => $row->getDimensionValues()[1]->getValue(),
                        'sessions' => (int) $row->getMetricValues()[0]->getValue(),
                    ];
                }

                return $sources;
            } catch (\Exception $e) {
                return [];
            }
        });
    }

    // ⚡ REALTIME USERS (NO CACHE)
    public function getRealtimeUsers()
    {
        try {
            $request = new RunRealtimeReportRequest([
                'property' => $this->propertyId,
                'metrics' => [
                    new Metric(['name' => 'activeUsers']),
                ],
            ]);

            $response = $this->client->runRealtimeReport($request);

            $rows = $response->getRows();
            $row = $rows[0] ?? null;

            return $row ? (int) $row->getMetricValues()[0]->getValue() : 0;
        } catch (\Exception $e) {
            return 0;
        }
    }
    public function getDailyVisitors()
    {
        return Cache::remember('ga_daily_visitors', 600, function () {
            try {
                $request = new RunReportRequest([
                    'property' => $this->propertyId,
                    'date_ranges' => [
                        new DateRange([
                            'start_date' => '7daysAgo',
                            'end_date' => 'today',
                        ]),
                    ],
                    'dimensions' => [
                        new Dimension(['name' => 'date']),
                    ],
                    'metrics' => [
                        new Metric(['name' => 'activeUsers']),
                    ],
                ]);

                $response = $this->client->runReport($request);

                $data = [];
                foreach ($response->getRows() as $row) {
                    $rawDate = $row->getDimensionValues()[0]->getValue();
                    $data[] = [
                        'date' => date('d M', strtotime($rawDate)),
                        'sort_key' => $rawDate,
                        'users' => (int) $row->getMetricValues()[0]->getValue(),
                    ];
                }

                usort($data, fn($a, $b) => strcmp($a['sort_key'], $b['sort_key']));

                return array_map(fn($item) => [
                    'date' => $item['date'],
                    'users' => $item['users'],
                ], $data);
            } catch (\Exception $e) {
                return [];
            }
        });
    }
}