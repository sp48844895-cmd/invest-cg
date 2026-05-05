@extends('layouts.app')

@section('content')
<!-- Hero Banner -->
<section class="sector-hero">
  <img src="assets/img/sectors/dept-of-ci-banner.jpg" class="hero-video" alt="CSIDC">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">Chhattisgarh State Industrial Development Corporation</h1>
      </div>
    </div>
  </div>
</section>

  <!-- Breadcrumb/Tabs Navigation -->
  <div class="breadcrumb-nav">
    <div class="container breadcrumb-wrapper">
      <button class="breadcrumb-nav-btn breadcrumb-nav-prev" id="breadcrumbPrev" aria-label="Previous">
        <i class="fa-solid fa-chevron-left"></i>
      </button>
      <div class="breadcrumb-container" id="breadcrumbContainer">
        <a href="dept-of-c-i" class="tab-breadcrumb" data-tab="overview">Overview</a>
        <span class="breadcrumb-separator">›</span>
        <a href="#" class="tab-breadcrumb active" data-tab="contact">Chhattisgarh State Industrial Development Corporation</a>
      </div>
      <button class="breadcrumb-nav-btn breadcrumb-nav-next" id="breadcrumbNext" aria-label="Next">
        <i class="fa-solid fa-chevron-right"></i>
      </button>
    </div>
  </div>

<section class="body-content-section">
  <div class="container">
    <div class="body-content-card">
      <div class="body-intro">
        <h2 class="body-content-title">Chhattisgarh State Industrial Development Corporation</h2>
        <p class="body-content-text">
          CSIDC is a Govt. of Chhattisgarh Undertaking under Commerce & Industry Department registered under companies Act 1951. It is the executive authority involved in industrial promotion and facilitation. Its functions include land allocation, entering into joint ventures managing PPPs and maintenance & upgradation of industrial areas. It is also the department agency for implementing and monitoring NMFP scheme.
        </p>
      </div>

      <div class="body-link-section">
        <a href="https://csidc.in" target="_blank" class="body-external-link">
          <i class="fa-solid fa-external-link"></i>
          <span>Visit Website: https://csidc.in</span>
        </a>
      </div>
    </div>
  </div>
</section>
@endsection



