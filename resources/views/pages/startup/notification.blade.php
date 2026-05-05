@extends('layouts.app')

@section('content')
<!-- Hero Banner with Image -->
<section class="sector-hero">
    <img src="{{ asset('assets/img/sectors/startup-banner.jpg') }}" class="hero-video" alt="Startup Chhattisgarh Banner">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
        <div class="hero-content-wrapper">
            <div class="hero-text">
                <h1 class="hero-title">Startup Chhattisgarh</h1>
            </div>
        </div>
    </div>
</section>

@include('partials.startup-tabs', ['active' => 'notification'])

<div class="container startup-page py-5">
    <section class="startup-card">
        <div class="startup-card-head">
            <div class="startup-icon"><i class="fa-solid fa-bell"></i></div>
            <div>
                <h2 class="startup-title">Notifications</h2>
            </div>
        </div>
        <div class="startup-card-body">
            @if(isset($notifications) && $notifications->count() > 0)
                <div class="d-none d-md-block">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th style="width: 160px;">Date</th>
                                    <th style="width: 180px;">PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notifications as $notification)
                                    <tr>
                                        <td>{{ $notification->title }}</td>
                                        <td>{{ $notification->notification_date->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ $notification->pdf_url }}" target="_blank" class="startup-btn primary">
                                                <i class="fa-solid fa-file-pdf me-2"></i>
                                                View PDF
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-block d-md-none">
                    <div class="row g-3">
                        @foreach($notifications as $notification)
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="fw-semibold">{{ $notification->title }}</div>
                                        <div class="text-muted small mt-1">
                                            <i class="fa-solid fa-calendar-days me-1"></i>
                                            {{ $notification->notification_date->format('d M Y') }}
                                        </div>

                                        <div class="mt-3">
                                            <a href="{{ $notification->pdf_url }}" target="_blank" class="startup-btn primary w-100 justify-content-center">
                                                <i class="fa-solid fa-file-pdf me-2"></i>
                                                View PDF
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="mb-0 text-muted">No notifications available.</p>
            @endif
        </div>
    </section>
</div>
@endsection

