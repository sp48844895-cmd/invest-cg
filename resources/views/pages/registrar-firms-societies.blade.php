@extends('layouts.app')

@section('content')
<!-- Hero Banner -->
<section class="sector-hero">
  <img src="assets/img/sectors/dept-of-ci-banner.jpg" class="hero-video" alt="Registrar, Firms & Societies">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">Registrar, Firms & Societies</h1>
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
        <a href="#" class="tab-breadcrumb active" data-tab="contact">Registrar, Firms & Societies</a>
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
        <h2 class="body-content-title">Registrar, Firm and Societies</h2>
        <p class="body-content-text">
          The Registrar, Firms & Societies was established on 1/Nov/2000. The office of Assistant Registrar, Firms and Institutions division is located in Bilaspur. The Registrar of Firms & Societies has been entrusted with the registration and administration under following Acts:
        </p>
      </div>

      <div class="body-acts-section">
        <div class="body-acts-list">
          <div class="body-act-item">
            <i class="fa-solid fa-gavel"></i>
            <span>Indian Partnership Act, 1932</span>
          </div>
          <div class="body-act-item">
            <i class="fa-solid fa-gavel"></i>
            <span>Chhattisgarh Societies Registration Act 1973 (Revised 1998)</span>
          </div>
        </div>
        <p class="body-content-text" style="margin-top: 20px;">
          Under the Act a total of 56168 committees have been registered. (Check)
        </p>
      </div>

      <div class="body-link-section">
        <a href="https://rfas.cg.nic.in/" target="_blank" class="body-external-link">
          <i class="fa-solid fa-external-link"></i>
          <span>Visit Website: https://rfas.cg.nic.in/</span>
        </a>
      </div>
    </div>
  </div>
</section>
@endsection



