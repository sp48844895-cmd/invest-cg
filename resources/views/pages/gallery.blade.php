@extends('layouts.app')

@section('content')
<!-- Hero Banner with Image -->
<section class="sector-hero">
  <img src="assets/img/sectors/gallery-banner.jpg" class="hero-video" alt="">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">Gallery</h1>

      </div>
    </div>
  </div>
</section>
@php
    $imagePage = $imagePagination['current'] ?? 1;
    $totalImagePages = $imagePagination['total'] ?? 1;
    $videoPage = $videoPagination['current'] ?? 1;
    $totalVideoPages = $videoPagination['total'] ?? 1;
    $imageArray = $images->map(fn ($image) => ['src' => $image->media_url])->values();
@endphp

<style type="text/css">
    :root {
        --primary-color: #0077ff;
        --secondary-color: #00b8a9;
        --light-bg: #f5f7fa;
        --card-bg: #ffffff;
        --text-dark: #0f172a;
        --text-muted: #64748b;
        --shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        --pagination-bg: rgba(0, 119, 255, 0.10);
    }


    .section-padding {
        padding: 60px 0;
    }

    .section-title h2 {
        font-weight: 700;
        color: var(--text-dark);
        font-size: 2.5rem;
 
        position: relative;
        display: inline-block;
    }

    .masonry-grid {
        column-count: 4;
        column-gap: 2px;
        margin-bottom: 40px;
        margin-top: 20px;
    }

    .masonry-item {
        break-inside: avoid;
        margin-bottom: 2px;
        position: relative;    
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .masonry-item:hover {
        transform: scale(1.01);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    }

    .masonry-item img {
        width: 100%;
        display: block;
        transition: opacity 0.3s ease;
    }

    .masonry-item:hover img {
        opacity: 0.8;
    }

    .video-preview-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 10px;
        margin-top: 20px;
    }

    .video-preview-item {
        background: var(--card-bg);

        box-shadow: var(--shadow);
        overflow: hidden;
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .video-preview-item:hover {
        transform: translateY(-5px);
    }

    .video-preview-item .video-thumb-wrap {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
        background: #000;
    }

    .video-preview-item .video-thumb-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .video-preview-item .play-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 60px;
        background: rgba(255, 0, 0, 0.85);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.2s ease, background 0.2s ease;
    }

    .video-preview-item:hover .play-btn {
        transform: translate(-50%, -50%) scale(1.1);
        background: rgba(255, 0, 0, 1);
    }

    .video-preview-item .play-btn::after {
        content: '';
        display: block;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 10px 0 10px 18px;
        border-color: transparent transparent transparent #fff;
        margin-left: 3px;
    }

    .video-preview-item .title {
        padding: 10px;
        font-size: 1.1rem;
        color: var(--text-dark);
        text-align: center;
        background: #f9f9f9;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Minimalistic Pagination Styles */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
        gap: 8px;
    }

    .pagination a {
        padding: 8px 12px;
        font-size: 0.8rem;
        font-weight: 500;
        text-decoration: none;
        color: var(--secondary-color);
        background: var(--pagination-bg);
        border: 1px solid transparent;
        border-radius: 5px; /* Circular buttons for minimalistic look */
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 28px;
        height: 28px;
    }

    .pagination a:hover {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
        transform: scale(1.05);
    }

    .pagination a.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
        font-weight: 600;
    }

    .pagination a.disabled {
        color: var(--text-muted);
        background: var(--pagination-bg);
        opacity: 0.5;
        pointer-events: none;
    }

    /* Image Modal */
    .image-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        justify-content: center;
        align-items: center;
        z-index: 99999;
        padding: 20px;
    }

    .image-modal img {
        max-width: 100%;
        max-height: 90vh;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    /* Video Modal — override global styles.css that sets opacity:0 / visibility:hidden */
    #videoModal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.95);
        z-index: 99999;
        padding: 0;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        opacity: 1 !important;
        visibility: visible !important;
        transition: none !important;
    }

    #videoModal iframe {
        width: 90vw;
        max-width: 900px;
        height: 50.625vw;
        max-height: 506px;
        border: none;
        z-index: 100000;
        position: relative;
        background: #000;
    }

    .modal-close, .modal-prev, .modal-next {
        position: absolute;
        color: white;
        font-size: 2rem;
        cursor: pointer;
        padding: 10px;
        transition: color 0.3s ease;
    }

    .modal-close:hover, .modal-prev:hover, .modal-next:hover {
        color: var(--primary-color);
    }

    .modal-close {
        top: 20px;
        right: 20px;
    }

    .modal-prev {
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
    }

    .modal-next {
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
    }

    @media (max-width: 992px) {
        .masonry-grid {
            column-count: 4;
        }
    }

    @media (max-width: 768px) {
        .masonry-grid {
            column-count: 4;
        }
        .video-modal iframe {
            width: 100%;
            height: 300px;
        }
    }

    @media (max-width: 576px) {
        .masonry-grid {
            column-count: 3;
        }
        .section-title h2 {
            font-size: 2rem;
        }
    }
</style>

<!-- Start Page Section -->
<section class="our-team section-padding">
    <div class="container">
        <!-- Images Section -->
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="section-title">
                    <h2>Images</h2>
                </div>
            </div>
        </div>

        <!-- Masonry Gallery for Images Only -->
        <div class="masonry-grid">
            @forelse($images as $image)
                <div class="masonry-item" data-image-src="{{ $image->media_url }}">
                    <img src="{{ $image->media_url }}" alt="{{ $image->display_title }}">
                </div>
            @empty
                <p style="text-align: center; color: var(--text-muted); width: 100%;">No images available.</p>
            @endforelse
        </div>

        <!-- Image Pagination -->
        <div class="pagination">
            @php
                $prevImagePage = max(1, $imagePage - 1);
                $nextImagePage = min($totalImagePages, $imagePage + 1);
            @endphp
            <a href="{{ $imagePage === 1 ? '#' : request()->fullUrlWithQuery(['image_page' => $prevImagePage, 'video_page' => $videoPage]) }}"
                class="{{ $imagePage === 1 ? 'disabled' : '' }}">Prev</a>

            @for ($i = 1; $i <= $totalImagePages; $i++)
                <a href="{{ request()->fullUrlWithQuery(['image_page' => $i, 'video_page' => $videoPage]) }}"
                    class="{{ $i === $imagePage ? 'active' : '' }}">{{ $i }}</a>
            @endfor

            <a href="{{ $imagePage === $totalImagePages ? '#' : request()->fullUrlWithQuery(['image_page' => $nextImagePage, 'video_page' => $videoPage]) }}"
                class="{{ $imagePage === $totalImagePages ? 'disabled' : '' }}">Next</a>
        </div>

        <!-- Videos Preview Section -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h2>Videos</h2>
                </div>
            </div>
        </div>
        <div class="video-preview-grid">
            @forelse($videos as $video)
                @php
                    $ytId = $video->youtube_id;
                    $thumbUrl = $ytId ? "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg" : '';
                    $embedUrl = $video->embed_url;
                @endphp
                <div class="video-preview-item" data-video-url="{{ $embedUrl }}" onclick="openVideoModal('{{ $embedUrl }}')">
                    <div class="video-thumb-wrap">
                        @if($thumbUrl)
                            <img src="{{ $thumbUrl }}" alt="{{ $video->display_title }}">
                        @endif
                        <div class="play-btn"></div>
                    </div>
                    <div class="title">{{ $video->display_title }}</div>
                </div>
            @empty
                <p style="text-align: center; color: var(--text-muted); width: 100%;">No videos available.</p>
            @endforelse
        </div>

        <!-- Video Pagination -->
        <div class="pagination">
            @php
                $prevVideoPage = max(1, $videoPage - 1);
                $nextVideoPage = min($totalVideoPages, $videoPage + 1);
            @endphp
            <a href="{{ $videoPage === 1 ? '#' : request()->fullUrlWithQuery(['image_page' => $imagePage, 'video_page' => $prevVideoPage]) }}"
                class="{{ $videoPage === 1 ? 'disabled' : '' }}">Prev</a>

            @for ($i = 1; $i <= $totalVideoPages; $i++)
                <a href="{{ request()->fullUrlWithQuery(['image_page' => $imagePage, 'video_page' => $i]) }}"
                    class="{{ $i === $videoPage ? 'active' : '' }}">{{ $i }}</a>
            @endfor

            <a href="{{ $videoPage === $totalVideoPages ? '#' : request()->fullUrlWithQuery(['image_page' => $imagePage, 'video_page' => $nextVideoPage]) }}"
                class="{{ $videoPage === $totalVideoPages ? 'disabled' : '' }}">Next</a>
        </div>

        <!-- Image Modal -->
        <div id="imageModal" class="image-modal">
            <span class="modal-close" onclick="closeImageModal()">×</span>
            <span class="modal-prev" onclick="prevImage()">❮</span>
            <img id="imageModalImg" src="" alt="Image Preview">
            <span class="modal-next" onclick="nextImage()">❯</span>
        </div>

        <!-- Video Modal -->
        <div id="videoModal" class="video-modal" onclick="if(event.target===this)closeVideoModal()">
            <span class="modal-close" onclick="closeVideoModal()">×</span>
            <iframe id="videoModalIframe" src="" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div>
</section>

<script>
    const imageArray = @json($imageArray);
    let currentImageIndex = 0;

    // Image Modal Functions
    const imageModal = document.getElementById('imageModal');
    const imageModalImg = document.getElementById('imageModalImg');

    function openImageModal(src) {
        imageModal.style.display = 'flex';
        imageModalImg.src = src;
        currentImageIndex = imageArray.findIndex(item => item.src === src);
    }

    function closeImageModal() {
        imageModal.style.display = 'none';
        imageModalImg.src = '';
    }

    function prevImage() {
        currentImageIndex = (currentImageIndex - 1 + imageArray.length) % imageArray.length;
        imageModalImg.src = imageArray[currentImageIndex].src;
    }

    function nextImage() {
        currentImageIndex = (currentImageIndex + 1) % imageArray.length;
        imageModalImg.src = imageArray[currentImageIndex].src;
    }

    // Video Modal Functions
    const videoModal = document.getElementById('videoModal');
    const videoModalIframe = document.getElementById('videoModalIframe');

    function openVideoModal(embedUrl) {
        videoModal.style.display = 'flex';
        const separator = embedUrl.includes('?') ? '&' : '?';
        videoModalIframe.src = `${embedUrl}${separator}autoplay=1`;
    }

    function closeVideoModal() {
        videoModal.style.display = 'none';
        videoModalIframe.src = '';
    }

    document.addEventListener("DOMContentLoaded", function () {
        // Handle image clicks in masonry grid
        document.querySelectorAll('.masonry-item').forEach(item => {
            item.addEventListener("click", function () {
                const src = item.getAttribute('data-image-src') || item.querySelector('img').src;
                openImageModal(src);
            });
        });

        // Video click handlers are now inline onclick on each .video-preview-item
    });
</script>
@endsection
