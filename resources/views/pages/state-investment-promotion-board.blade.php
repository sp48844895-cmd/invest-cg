@extends('layouts.app')

@section('content')
  <!-- Hero Banner -->
  <section class="sector-hero">
    <img src="assets/img/sectors/dept-of-ci-banner.jpg" class="hero-video" alt="State Investment Promotion Board">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
      <div class="hero-content-wrapper">
        <div class="hero-text">
          <h1 class="hero-title">State Investment Promotion Board</h1>
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
        <a href="#" class="tab-breadcrumb active" data-tab="contact">State Investment Promotion Board</a>
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
          <h2 class="body-content-title">State Investment Promotion Board</h2>
          <p class="body-content-text">
            The State Investment Promotion Board (SIPB) has been established under the Chairmanship of Hon. Chief Minister
            under the Chhattisgarh Industrial Investment Promotion Act, 2002. It has been created to facilitate proposals
            with investment above INR 10 Crores. The Board act as empowered single point of contact for investments in the
            state. The SIPB is headed by Chief Minister, and consists of departmentally related ministers and Government
            officials, so as to ensure inter-departmental co-ordination. SIPB exercises powers of the State Government &
            Cabinet in so far as all matters relating to investment promotion are concerned.
          </p>
          <p class="body-content-text">
            At district level District Investment Promotion Committees (DIPC) are constituted for promoting & facilitating
            the implementation of industrial & other projects. The DIPC are chaired by Collector of the Revenue District.
          </p>
        </div>

        <div class="body-link-section">
          <a href="{{ asset('storage/pdfs/SIPB Act-2002 (English).pdf') }}" target="_blank"
            class="body-external-link">
            <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt=""> SIPB Act-2002 (English)
          </a>

        </div>
      </div>
    </div>
  </section>
@endsection