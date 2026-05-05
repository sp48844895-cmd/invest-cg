@extends('layouts.app')

@section('title', $pressRelease->meta_title ?? $pressRelease->title)

@section('content')
<!-- Hero Banner -->
<section class="sector-hero" style="min-height: 200px;">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
        <div class="hero-content-wrapper">
            <div class="hero-text">
              
            </div>
        </div>
    </div>
</section>


                <!-- Breadcrumb -->
<div class="breadcrumb-nav">
    <div class="container breadcrumb-container">      
        <a href="{{ route('press-releases.index') }}">Press Releases</a>
        <span>›</span>
        <a href="{{ route('calculator.index') }}">{{ Str::limit($pressRelease->title, 40) }}</a>
      
    </div>
</div>

<!-- Press Release Detail Section -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <article class="press-release-detail">
                    <!-- Header -->
                    <header class="press-release-header mb-4">
                        <div class="press-release-meta mb-3">
                            <span class="meta-item">
                                <i class="bi bi-calendar3"></i> {{ $pressRelease->formatted_published_date }}
                            </span>
                            @if($pressRelease->author)
                            <span class="meta-item">
                                <i class="bi bi-person"></i> {{ $pressRelease->author }}
                            </span>
                            @endif
                            <span class="meta-item">
                                <i class="bi bi-eye"></i> {{ $pressRelease->view_count }} views
                            </span>
                        </div>
                        <h1 class="press-release-detail-title">{{ $pressRelease->title }}</h1>
                        @if($pressRelease->tags)
                        <div class="press-release-tags mt-3">
                            @foreach($pressRelease->tags as $tag)
                                <span class="tag-badge">{{ $tag }}</span>
                            @endforeach
                        </div>
                        @endif
                    </header>

                    <!-- Thumbnail -->
                    @if($pressRelease->thumbnail)
                    <div class="press-release-detail-thumbnail mb-4">
                        <img src="{{ $pressRelease->thumbnail }}" 
                             alt="{{ $pressRelease->title }}" 
                             class="img-fluid rounded"
                             loading="lazy"
                             onerror="this.onerror=null; this.src='{{ asset('assets/img/message_bg.jpg') }}';">
                    </div>
                    @else
                    <div class="press-release-detail-thumbnail mb-4">
                        <div class="press-release-detail-placeholder">
                            <i class="bi bi-file-text"></i>
                            <p>No Image Available</p>
                        </div>
                    </div>
                    @endif

                    <!-- Summary -->
                    <div class="press-release-summary-box mb-4">
                        <p class="lead">{{ $pressRelease->summary }}</p>
                    </div>

                    <!-- Content -->
                    <div class="press-release-content">
                        {!! $pressRelease->content !!}
                    </div>

                    <!-- Social Share -->
                    <div class="press-release-share mt-5 pt-4 border-top">
                        <h5 class="mb-3">Share this Press Release</h5>
                        <div class="social-share-buttons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                               target="_blank" class="social-share-btn facebook" title="Share on Facebook">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($pressRelease->title) }}" 
                               target="_blank" class="social-share-btn twitter" title="Share on Twitter">
                                <i class="bi bi-twitter"></i> Twitter
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" 
                               target="_blank" class="social-share-btn linkedin" title="Share on LinkedIn">
                                <i class="bi bi-linkedin"></i> LinkedIn
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($pressRelease->title . ' ' . request()->fullUrl()) }}" 
                               target="_blank" class="social-share-btn whatsapp" title="Share on WhatsApp">
                                <i class="bi bi-whatsapp"></i> WhatsApp
                            </a>
                            <button onclick="copyToClipboard('{{ request()->fullUrl() }}')" 
                                    class="social-share-btn copy-link" title="Copy Link">
                                <i class="bi bi-link-45deg"></i> Copy Link
                            </button>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="press-release-sidebar">
                    <!-- Search -->
                    <div class="sidebar-widget">
                        <h4 class="sidebar-title">
                            <i class="bi bi-search"></i> Search Press Releases
                        </h4>
                        <form method="GET" action="{{ route('press-releases.index') }}">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" 
                                       placeholder="Search..." value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Recent Press Releases -->
                    @if($recentPressReleases->count() > 0)
                    <div class="sidebar-widget">
                        <h4 class="sidebar-title">
                            <i class="bi bi-clock-history"></i> Recent Press Releases
                        </h4>
                        <div class="recent-press-releases">
                            @foreach($recentPressReleases as $recent)
                            <div class="recent-item">
                                <a href="{{ route('press-releases.show', $recent->slug) }}" class="recent-link">
                                    @if($recent->thumbnail)
                                    <div class="recent-thumbnail">
                                        <img src="{{ $recent->thumbnail }}" 
                                             alt="{{ $recent->title }}"
                                             loading="lazy"
                                             onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="recent-thumbnail-placeholder" style="display: none;">
                                            <i class="bi bi-file-text"></i>
                                        </div>
                                    </div>
                                    @else
                                    <div class="recent-thumbnail recent-thumbnail-placeholder">
                                        <i class="bi bi-file-text"></i>
                                    </div>
                                    @endif
                                    <div class="recent-content">
                                        <h6 class="recent-title">{{ Str::limit($recent->title, 60) }}</h6>
                                        <span class="recent-date">{{ $recent->formatted_published_date }}</span>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Tags -->
                    @if($allTags->count() > 0)
                    <div class="sidebar-widget">
                        <h4 class="sidebar-title">
                            <i class="bi bi-tags"></i> Popular Tags
                        </h4>
                        <div class="tags-filter">
                            @foreach($allTags->take(10) as $tag)
                                <a href="{{ route('press-releases.index', ['tag' => $tag]) }}" 
                                   class="tag-link">
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



@push('scripts')
<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('Link copied to clipboard!');
    }, function(err) {
        // Fallback for older browsers
        const textarea = document.createElement('textarea');
        textarea.value = text;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        alert('Link copied to clipboard!');
    });
}
</script>
@endpush
@endsection

