@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <!-- Documents Stats Section -->
    <div class="mb-4">
        <h6 class="mb-3" style="color: #333; font-weight: 600;">Document Statistics</h6>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-card-value">{{ $stats['total_documents'] }}</div>
                        <div class="stat-card-label">Total Documents</div>
                    </div>
                    <div class="stat-card-icon primary">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-card-value">{{ $stats['active_documents'] }}</div>
                        <div class="stat-card-label">Active Documents</div>
                    </div>
                    <div class="stat-card-icon success">
                        <i class="bi bi-check-circle"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-card-value">{{ $stats['total_gallery_items'] }}</div>
                        <div class="stat-card-label">Gallery Items</div>
                    </div>
                    <div class="stat-card-icon primary">
                        <i class="bi bi-images"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-card-value">{{ $stats['visible_gallery_items'] }}</div>
                        <div class="stat-card-label">Visible Items</div>
                    </div>
                    <div class="stat-card-icon success">
                        <i class="bi bi-eye"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-card-value">{{ $stats['total_press_releases'] }}</div>
                        <div class="stat-card-label">Press Releases</div>
                    </div>
                    <div class="stat-card-icon primary">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-card-value">{{ $stats['published_press_releases'] }}</div>
                        <div class="stat-card-label">Published</div>
                    </div>
                    <div class="stat-card-icon success">
                        <i class="bi bi-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Visitor Stats Section -->
    <div class="mb-4">
        <h6 class="mb-3" style="color: #333; font-weight: 600;">Visitor Statistics</h6>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-card-value" id="liveUsersCount">{{ $stats['realtime_users'] }}</div>
                        <div class="stat-card-label">Live Users</div>
                    </div>
                    <div class="stat-card-icon success">
                        <i class="bi bi-broadcast"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-card-value">{{ $stats['user_stats']['active_users'] }}</div>
                        <div class="stat-card-label">Active Users</div>
                    </div>
                    <div class="stat-card-icon primary">
                        <i class="bi bi-activity"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-card-value">{{ $stats['today_visitors'] }}</div>
                        <div class="stat-card-label">Visitors Today</div>
                        <div class="text-muted" style="font-size: 12px;">Page Views: {{ $stats['today_page_views'] }}</div>
                    </div>
                    <div class="stat-card-icon primary">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-card-value">{{ $stats['last7_visitors'] }}</div>
                        <div class="stat-card-label">Visitors (Last 7 Days)</div>
                        <div class="text-muted" style="font-size: 12px;">Page Views: {{ $stats['last7_page_views'] }}</div>
                    </div>
                    <div class="stat-card-icon primary">
                        <i class="bi bi-graph-up"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-card-value">{{ $stats['total_visitors'] }}</div>
                        <div class="stat-card-label">Total Visitors</div>
                        <div class="text-muted" style="font-size: 12px;">Page Views: {{ $stats['total_page_views'] }}</div>
                    </div>
                    <div class="stat-card-icon success">
                        <i class="bi bi-bar-chart"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="admin-card">
                <div class="card-header">
                    <h5 class="card-title">User Statistics</h5>
                </div>
                <div class="row ">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="d-flex justify-content-between align-items-center p-3 rounded"
                            style="background: #f8fafc;">
                            <span style="color: var(--text-secondary); font-weight: 500;"><i
                                    class="bi bi-person-plus me-2"></i>New Users</span>
                            <span
                                style="font-weight: 700; font-size: 1.1rem; color: var(--text-primary);">{{ $stats['user_stats']['new_users'] }}</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="d-flex justify-content-between align-items-center p-3 rounded"
                            style="background: #f8fafc;">
                            <span style="color: var(--text-secondary); font-weight: 500;"><i
                                    class="bi bi-window-stack me-2"></i>Sessions</span>
                            <span
                                style="font-weight: 700; font-size: 1.1rem; color: var(--text-primary);">{{ $stats['user_stats']['sessions'] }}</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="d-flex justify-content-between align-items-center p-3 rounded"
                            style="background: #f8fafc;">
                            <span style="color: var(--text-secondary); font-weight: 500;"><i
                                    class="bi bi-lightning-charge me-2"></i>Engagement Rate</span>
                            <span
                                style="font-weight: 700; font-size: 1.1rem; color: var(--success);">{{ number_format($stats['user_stats']['engagement_rate'] * 100, 1) }}%</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="card-header">
                    <h5 class="card-title">Top Locations</h5>
                </div>

                <div class="dashboard-scroll-container">
                    <div class="table-responsive">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Users</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(array_slice($stats['locations'], 0, 10) as $loc)
                                    <tr>
                                        <td>{{ $loc['country'] }}</td>
                                        <td>{{ $loc['city'] }}</td>
                                        <td>{{ $loc['users'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="card-header">
                    <h5 class="card-title">Traffic Sources</h5>
                </div>

                <div class="dashboard-scroll-container">
                    <div class="table-responsive">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Source</th>
                                    <th>Medium</th>
                                    <th>Sessions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stats['traffic_sources'] as $src)
                                    <tr>
                                        <td>{{ $src['source'] }}</td>
                                        <td>{{ $src['medium'] }}</td>
                                        <td>{{ $src['sessions'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="card-header">
                    <h5 class="card-title">Top Pages</h5>
                </div>

                <div class="dashboard-scroll-container">
                    <div class="table-responsive">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Page</th>
                                    <th>Views</th>
                                    <th>Avg Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stats['top_pages'] as $page)
                                    <tr>
                                        <td>{{ $page['page'] }}</td>
                                        <td>{{ $page['views'] }}</td>
                                        <td>
                                            @php
                                                $seconds = round($page['avg_time']);
                                                if ($seconds >= 3600) {
                                                    $hrs = floor($seconds / 3600);
                                                    $mins = floor(($seconds % 3600) / 60);
                                                    $timeStr = $hrs . ' hr' . ($mins > 0 ? ' ' . $mins . ' min' : '');
                                                } elseif ($seconds >= 60) {
                                                    $mins = floor($seconds / 60);
                                                    $secs = $seconds % 60;
                                                    $timeStr = $mins . ' min' . ($secs > 0 ? ' ' . $secs . ' sec' : '');
                                                } else {
                                                    $timeStr = $seconds . ' sec';
                                                }
                                            @endphp
                                            {{ $timeStr }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="card-header">
                    <h5 class="card-title"><i class="bi bi-graph-up me-2"></i>Visitors Trend (Last 7 Days)</h5>
                </div>
                <div class="dashboard-scroll-container"
                    style="display: flex; align-items: center; justify-content: center;">
                    <div style="position: relative; padding: 16px 8px 8px; width: 100%;">
                        <canvas id="visitorsChart" height="100" style="max-height: 320px;"></canvas>
                        <div id="chartEmptyState" class="text-center py-5 d-none" style="color: var(--text-secondary);">
                            <i class="bi bi-bar-chart" style="font-size: 2.5rem; opacity: 0.3;"></i>
                            <p class="mt-2 mb-0">No visitor data available for the last 7 days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')

    <!-- ✅ Chart.js CDN (important) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Visitors Trend Chart
            const data = @json($stats['daily_visitors'] ?? []);
            const canvas = document.getElementById('visitorsChart');
            const emptyState = document.getElementById('chartEmptyState');

            if (data.length > 0 && canvas) {
                const labels = data.map(item => item.date);
                const values = data.map(item => item.users);

                const ctx = canvas.getContext('2d');
                const gradient = ctx.createLinearGradient(0, 0, 0, 320);
                gradient.addColorStop(0, 'rgba(59, 130, 246, 0.25)');
                gradient.addColorStop(1, 'rgba(59, 130, 246, 0.02)');

                new Chart(canvas, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Active Users',
                            data: values,
                            fill: true,
                            backgroundColor: gradient,
                            borderColor: '#3b82f6',
                            borderWidth: 2.5,
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#3b82f6',
                            pointBorderWidth: 2,
                            pointRadius: 5,
                            pointHoverRadius: 7,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        interaction: { intersect: false, mode: 'index' },
                        plugins: {
                            legend: {
                                display: true,
                                labels: {
                                    usePointStyle: true,
                                    pointStyle: 'circle',
                                    padding: 20,
                                    font: { family: 'Inter', size: 12, weight: '500' }
                                }
                            },
                            tooltip: {
                                backgroundColor: '#1e293b',
                                titleFont: { family: 'Inter', size: 13 },
                                bodyFont: { family: 'Inter', size: 12 },
                                padding: 12,
                                cornerRadius: 8,
                                displayColors: false,
                                callbacks: {
                                    label: function (context) {
                                        return ' ' + context.parsed.y + ' visitors';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    font: { family: 'Inter', size: 11 },
                                    color: '#64748b',
                                    precision: 0
                                },
                                grid: { color: 'rgba(0,0,0,0.05)' }
                            },
                            x: {
                                ticks: {
                                    font: { family: 'Inter', size: 11 },
                                    color: '#64748b'
                                },
                                grid: { display: false }
                            }
                        }
                    }
                });
            } else {
                if (canvas) canvas.style.display = 'none';
                if (emptyState) emptyState.classList.remove('d-none');
            }

            // Real-time auto refresh
            @if(app()->environment('production'))
                setInterval(() => {
                    fetch('/admin/realtime-users')
                        .then(res => res.json())
                        .then(res => {
                            const el = document.getElementById('liveUsersCount');
                            if (el) el.innerText = res.users ?? 0;
                        })
                        .catch(err => console.log('Realtime error:', err));
                }, 10000);
            @endif
            });
    </script>
@endpush