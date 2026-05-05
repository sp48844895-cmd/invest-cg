@extends('layouts.app')

@section('title', 'Press Releases')

@section('content')
<!-- Hero Banner -->
<section class="sector-hero">
    <img src="{{ asset('assets/img/sectors/media-update.jpg') }}" class="hero-video" alt="Press Releases">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
        <div class="hero-content-wrapper">
            <div class="hero-text">
                <h1 class="hero-title">Press Releases</h1>
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<div class="breadcrumb-nav">
    <div class="container breadcrumb-container">      
        <a href="{{ route('media-updates.index') }}">News</a>
        <span>›</span>
        <a href="#" class="tab-breadcrumb active">Press Releases</a>
      
    </div>
</div>

<!-- Press Releases Section -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- Search and Filter -->
                <div class="mb-4">
                    <form method="GET" action="{{ route('press-releases.index') }}" class="row g-3">
                        <div class="col-md-8">
                            <input type="text" name="search" class="form-control" 
                                   placeholder="Search press releases..." 
                                   value="{{ request('search') }}">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn-hero-primary w-100">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Press Releases Grid -->
                <div class="row g-4">
                    @forelse($pressReleases as $pressRelease)
                    <div class="col-md-6 col-lg-4">
                        <article class="press-release-card">
                            <a href="{{ route('press-releases.show', $pressRelease->slug) }}" class="press-release-link">
                                <div class="press-release-thumbnail">
                                    @if($pressRelease->thumbnail)
                                        <img src="{{ $pressRelease->thumbnail }}" 
                                             alt="{{ $pressRelease->title }}"
                                             loading="lazy"
                                             onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="press-release-placeholder" style="display: none;">
                                            <i class="bi bi-file-text"></i>
                                        </div>
                                    @else
                                        <div class="press-release-placeholder">
                                            <i class="bi bi-file-text"></i>
                                        </div>
                                    @endif
                                    <div class="press-release-date-badge">
                                        <i class="bi bi-calendar3"></i> {{ $pressRelease->formatted_published_date }}
                                    </div>
                                </div>
                                <div class="press-release-content">
                                    <h3 class="press-release-title">{{ $pressRelease->title }}</h3>
                                    <p class="press-release-summary">{{ Str::limit($pressRelease->summary, 120) }}</p>
                                    @if($pressRelease->tags && count($pressRelease->tags) > 0)
                                        <div class="press-release-tags">
                                            @foreach(array_slice($pressRelease->tags, 0, 3) as $tag)
                                                <span class="tag-badge">{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="press-release-read-more">
                                        Read More <i class="bi bi-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="text-muted mt-3">No press releases found.</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($pressReleases->hasPages())
                <div class="mt-5">
                    {{ $pressReleases->appends(request()->query())->links() }}
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="press-release-sidebar">
                    <!-- Tags Filter -->
                    @if($allTags->count() > 0)
                    <div class="sidebar-widget">
                        <h4 class="sidebar-title">Filter by Tags</h4>
                        <div class="tags-filter">
                            @foreach($allTags as $tag)
                                <a href="{{ route('press-releases.index', ['tag' => $tag]) }}" 
                                   class="tag-link {{ request('tag') == $tag ? 'active' : '' }}">
                                    {{ $tag }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

