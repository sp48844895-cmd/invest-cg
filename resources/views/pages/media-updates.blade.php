@extends('layouts.app')

@section('content')
<!-- Hero Banner with Image -->
<section class="sector-hero">
  <img src="assets/img/sectors/media-update.jpg" class="hero-video" alt="">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">In the News</h1>

      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb/Tabs Navigation -->
<!-- Breadcrumb/Tabs Navigation -->
<div class="breadcrumb-nav">
  <div class="container breadcrumb-wrapper">
    <button class="breadcrumb-nav-btn breadcrumb-nav-prev" id="breadcrumbPrev" aria-label="Previous">
      <i class="fa-solid fa-chevron-left"></i>
    </button>
    <div class="breadcrumb-container" id="breadcrumbContainer">  
      
      <a href="#" class="tab-breadcrumb active" data-tab="news">News</a>
      <span class="breadcrumb-separator">›</span>
      <a href="{{ route('press-releases.index') }}" class="tab-breadcrumb">Press Releases</a>
    
    </div>
    <button class="breadcrumb-nav-btn breadcrumb-nav-next" id="breadcrumbNext" aria-label="Next">
      <i class="fa-solid fa-chevron-right"></i>
    </button>
  </div>
</div>

<!-- In The News Section (No Slider) -->
<section class="news-modern-section section-padding">
  <div class="tab-panel active" id="news">
  <div class="container">
    {{-- <div class="section-header-modern text-center mb-5">
      <span class="section-tag">Latest Updates</span>
      <h2 class="section-title-modern">In The News</h2>
      <p class="section-desc-modern">Stay updated with Chhattisgarh’s investment momentum and policy milestones</p>
      <div class="mt-3">
        <a href="{{ route('media-updates.create') }}" class="btn btn-outline-light btn-sm">
          Submit News
        </a>
      </div>
    </div> --}}

    @if (session('status'))
      <div class="alert alert-success text-center">
        {{ session('status') }}
      </div>
    @endif

    <div class="row g-4 news-grid-js" id="newsGrid">
      <!-- News Cards will be injected here via JS (first 6 shown by default) -->
    </div>

    <!-- Load More Button -->
    <div class="text-center mt-5">
      <button id="loadMoreBtn" class="btn-hero-primary" style="display: none;">
        Load More News <i class="fas fa-arrow-down ms-2"></i>
      </button>
    </div>
  </div>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const newsData = @json($newsData);
  const grid = document.getElementById('newsGrid');
  const loadMoreBtn = document.getElementById('loadMoreBtn');
  let currentIndex = 0;
  const itemsPerLoad = 6;
  const fallbackImage = "{{ asset('assets/img/message_bg.jpg') }}";

  if (!newsData.length) {
    grid.innerHTML = `<p class="text-center text-muted">No media updates have been published yet.</p>`;
    loadMoreBtn.remove();
    return;
  }

  // Render a batch of news cards
  function renderBatch(start) {
    const batch = newsData.slice(start, start + itemsPerLoad);
    batch.forEach(item => {
      const col = document.createElement('div');
      col.className = 'col-lg-4 col-md-6 mb-4';

      col.innerHTML = `
        <article class="news-card-js">
          <div class="news-thumb-js">
            <img src="${item.img || fallbackImage}" alt="${item.title}">
            <div class="news-date-badge">${item.date}</div>
          </div>
          <div class="news-content-js">
            <h3 class="news-title-js">
              <a href="${item.link}" target="_blank">${item.title}</a>
            </h3>
            <p class="news-excerpt-js">${item.desc}</p>
            <div class="news-footer-js">
              <a href="${item.link}" target="_blank" class="read-more-js">
                Read More <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>
      `;

      grid.appendChild(col);
    });
  }

  // Initial load – first 6 cards
  renderBatch(0);
  currentIndex = itemsPerLoad;

  // Show Load More button if there are more items
  if (currentIndex < newsData.length) {
    loadMoreBtn.style.display = 'inline-flex';
  }

  // Load More Click Handler
  loadMoreBtn.addEventListener('click', function () {
    // Render the next batch of items
    renderBatch(currentIndex);
    currentIndex += itemsPerLoad;

    // Hide button when no more items
    if (currentIndex >= newsData.length) {
      loadMoreBtn.style.display = 'none';
    }
  });
});
</script>
@endsection
