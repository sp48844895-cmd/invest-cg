@extends('layouts.app')

@section('content')
<!-- Hero Banner with Image -->
<section class="sector-hero">
  <img src="assets/img/sectors/investment_promotion_banner.jpg" class="hero-video" alt="">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">Investment Promotion</h1>
     <div class="hero-actions">
            <a href="storage/pdfs/Policy Brochure.pdf" target="_blank"
              class="cta-btn secondary">
              <i class="fas fa-download"></i>
              <span>CG IDP 24-30 Brochure</span>
            </a>
          </div>
      </div>
    </div>
  </div>
</section>

<!-- Breadcrumb -->
<div class="breadcrumb-nav">
  <div class="container breadcrumb-container">
    <a href="#" class="active">Investment Promotion</a>
    <span>›</span>
    <a href="{{ route('focus-sectors.index') }}">Focus Sectors</a>
    <span>›</span>
    <a href="{{ route('calculator.index') }}">Subsidy Calculator</a>
    <span>›</span>
    <a href="{{ route('pages.show', 'policy-notifications') }}">Policy & Notifications</a>
  </div>
</div>

 <section class="policy-section pt-5">
    <div class="container">
      <div class="row">
        <!-- Card 1 -->
        <div class="col-lg-6">
          <div class="policy-card">
            <div class="policy-card-body">
              <h3>Chhattisgarh Industrial Development Policy 2024-30</h3>
            </div>
            <div class="policy-card-footer">
              <a href="storage/pdfs/Industrial Policy 2024-30.pdf" target="_blank" class="download-btn">
                <i class="policy-icon-in-btn fas fa-file-alt"></i>
                <span>Download Policy</span>
                <i class="fa-solid fa-download"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <!-- <div class="col-lg-4">
          <div class="policy-card">
            <div class="policy-card-body">
              <h3>CG Industrial Policy Brochure</h3>
            </div>
            <div class="policy-card-footer">
              <a href="storage/pdfs/Policy Brochure.pdf" target="_blank" class="download-btn">
                <i class="policy-icon-in-btn fas fa-book"></i>
                <span>Download Brochure</span>
                <i class="fa-solid fa-download"></i>
              </a>
            </div>
          </div>
        </div> -->
        <!-- Card 3 -->
        <div class="col-lg-6">
          <div class="policy-card">
            <div class="policy-card-body">
              <h3>Chhattisgarh Logistics Policy 2025</h3>
            </div>
            <div class="policy-card-footer">
              <a href="storage/pdfs/CG Logistics Policy 2025.pdf" target="_blank" class="download-btn">
                <i class="policy-icon-in-btn fas fa-truck"></i>
                <span>Download Policy</span>
                <i class="fa-solid fa-download"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Key Features Section -->
<section class="key-features-section">
  <div class="container">
    <div class="section-header ">
      <h2 class="section-title">Key Features</h2>
      <!-- <p class="section-subtitle">Industrial Development Policy 2024–30</p> -->
    </div>

    <!-- Swiper Wrapper -->
    <div class="swiper keyFeaturesSwiper">
      <div class="swiper-wrapper">
        <!-- Card 1 -->
        <div class="swiper-slide feature-card">
          <div class="feature-icon">
            <i class="bi bi-geo-alt"></i>
          </div>
          <h3>100%</h3>
          <p>Stamp Duty Exemption</p>
        </div>

        <!-- Card 2 -->
        <div class="swiper-slide feature-card">
          <div class="feature-icon">
            <i class="bi bi-globe2"></i>
          </div>
          <h3>50%</h3>
          <p>ETP Subsidy</p>
        </div>

        <!-- Card 3 -->
        <div class="swiper-slide feature-card">
          <div class="feature-icon">
            <i class="bi bi-gear"></i>
          </div>
          <h3>50%</h3>
          <p>Technical Patent Subsidy</p>
        </div>

      

        <!-- Card 5 -->
        <div class="swiper-slide feature-card">
          <div class="feature-icon">
            <i class="bi bi-bank"></i>
          </div>
          <h3>50%</h3>
          <p>Capital Investment Subsidy</p>
        </div>

        <!-- Card 6 -->
        <div class="swiper-slide feature-card">
          <div class="feature-icon">
            <i class="bi bi-cpu"></i>
          </div>
          <h3>50%</h3>
          <p>Technology Purchase Subsidy</p>
        </div>

        <!-- Card 7 -->
        <div class="swiper-slide feature-card">
          <div class="feature-icon">
            <i class="bi bi-percent"></i>
          </div>
          <h3>50%</h3>
          <p>Interest Subsidy</p>
        </div>

        <!-- Card 8 -->
        <div class="swiper-slide feature-card">
          <div class="feature-icon">
            <i class="bi bi-people"></i>
          </div>
          <h3>20%</h3>
          <p>Employment Assistance</p>
        </div>

        <!-- Card 9 -->
        <div class="swiper-slide feature-card">
          <div class="feature-icon">
            <i class="bi bi-shield-check"></i>
          </div>
          <h3>75%</h3>
          <p>EPF Reimbursement</p>
        </div>
      </div>

      <!-- Navigation -->
  
    </div>

    <!-- Pagination (moved outside the swiper box) -->
    {{-- <div class="swiper-pagination keyPagination"></div> --}}
  </div>
</section>
<style>
  .creative-card {
    width: 100%;
    height: auto;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
  }
  .creative-card:hover {
    transform: translateX(5px);
  }
  .creative-card img {
    width: 100%;
    height: auto;
    display: block;
    cursor: grab;
  }

</style>


<!-- Reforms Section -->
<section class="reforms-section">
  <div class="container">
    <div class="section-header ">
      <h2 class="section-title">Reforms</h2>
      <!-- <p class="section-subtitle">Simplifying processes and empowering businesses for growth</p> -->
    </div>

    <!-- Reforms Grid -->
    <div class="reforms-grid">
      <!-- Reform Card 1 - Labour -->
      <div class="reform-card">
        <div class="reform-card-inner">
          <div class="reform-front">
            <div class="reform-icon-wrapper">
              <i class="fas fa-hard-hat"></i>
            </div>
            <h3 class="reform-title">Labour</h3>
            <span class="flip-hint">Click to explore <i class="fas fa-arrow-right"></i></span>
          </div>
          <div class="reform-back">
            <h3 class="reform-title-back"><i class="fas fa-hard-hat"></i> Labour</h3>
            <ul class="reform-list">
              <li><i class="fas fa-check-circle"></i> Increased validity - factory license 10 years</li>
              <li><i class="fas fa-check-circle"></i> Eliminated requirement of renewal - Shops & Establishments</li>
              <li><i class="fas fa-check-circle"></i> Introduced single integrated annual return under all labour laws
              </li>
              <li><i class="fas fa-check-circle"></i> Reduced 140 compliances</li>
              <li><i class="fas fa-check-circle"></i> 24X7 operations allowed</li>
              <li><i class="fas fa-check-circle"></i> Permission based to condition based system - Night shifts allowed
                for women</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Reform Card 2 - Utility Permits -->
      <div class="reform-card">
        <div class="reform-card-inner">
          <div class="reform-front">
            <div class="reform-icon-wrapper">
              <i class="fas fa-plug"></i>
            </div>
            <h3 class="reform-title">Utility Permits</h3>
            <span class="flip-hint">Click to explore <i class="fas fa-arrow-right"></i></span>
          </div>
          <div class="reform-back">
            <h3 class="reform-title-back"><i class="fas fa-plug"></i> Utility Permits</h3>
            <ul class="reform-list">
              <li><i class="fas fa-check-circle"></i> Online water connection/electricity connection</li>
              <li><i class="fas fa-check-circle"></i> Requirement of only 3 documents for electricity connection</li>
              <li><i class="fas fa-check-circle"></i> Issuance of electricity connection within 7 days (excluding ROW)
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Reform Card 3 - Inspection -->
      <div class="reform-card">
        <div class="reform-card-inner">
          <div class="reform-front">
            <div class="reform-icon-wrapper">
              <i class="fas fa-search"></i>
            </div>
            <h3 class="reform-title">Inspection</h3>
            <span class="flip-hint">Click to explore <i class="fas fa-arrow-right"></i></span>
          </div>
          <div class="reform-back">
            <h3 class="reform-title-back"><i class="fas fa-search"></i> Inspection</h3>
            <ul class="reform-list">
              <li><i class="fas fa-check-circle"></i> CIS implemented across 4 Departments</li>
              <li><i class="fas fa-check-circle"></i> Random allocation of inspectors</li>
              <li><i class="fas fa-check-circle"></i> Risk based inspections</li>
              <li><i class="fas fa-check-circle"></i> Submission of inspection report within 48 hours</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Reform Card 4 - Environment -->
      <div class="reform-card">
        <div class="reform-card-inner">
          <div class="reform-front">
            <div class="reform-icon-wrapper">
              <i class="fas fa-leaf"></i>
            </div>
            <h3 class="reform-title">Environment</h3>
            <span class="flip-hint">Click to explore <i class="fas fa-arrow-right"></i></span>
          </div>
          <div class="reform-back">
            <h3 class="reform-title-back"><i class="fas fa-leaf"></i> Environment</h3>
            <ul class="reform-list">
              <li><i class="fas fa-check-circle"></i> Implementation of "Online Consent Management System" in CECB to
                allow industries for CTE/CTO</li>
              <li><i class="fas fa-check-circle"></i> Online auto-renewal for CTE based on self-certification</li>
              <li><i class="fas fa-check-circle"></i> Third party certification of CTO and CTE</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Reform Card 5 - Land & Building -->
      <div class="reform-card">
        <div class="reform-card-inner">
          <div class="reform-front">
            <div class="reform-icon-wrapper">
              <i class="fas fa-coins"></i>
            </div>
            <h3 class="reform-title">Land & Building Construction</h3>
            <span class="flip-hint">Click to explore <i class="fas fa-arrow-right"></i></span>
          </div>
          <div class="reform-back">
            <h3 class="reform-title-back"><i class="fas fa-coins"></i> Land & Building Construction</h3>
            <ul class="reform-list">
              <li><i class="fas fa-check-circle"></i> Integrated System for Online Building Permit (AAI, NMA, Fire)</li>
              <li><i class="fas fa-check-circle"></i> Bhuiyan offers land details – transaction deed, RoR, tax dues,
                court cases (Revenue & Civil)</li>
              <li><i class="fas fa-check-circle"></i> Higher FAR and coverage, with reduced setbacks—optimizing
                industrial space usage</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Reform Card 6 - Land Allotment -->
      <div class="reform-card">
        <div class="reform-card-inner">
          <div class="reform-front">
            <div class="reform-icon-wrapper">
              <i class="fas fa-check"></i>
            </div>
            <h3 class="reform-title">Land Allotment</h3>
            <span class="flip-hint">Click to explore <i class="fas fa-arrow-right"></i></span>
          </div>
          <div class="reform-back">
            <h3 class="reform-title-back"><i class="fas fa-check"></i> Land Allotment</h3>
            <ul class="reform-list">
              <li><i class="fas fa-check-circle"></i> Streamlined Use of Adjacent Land - Regularization allowed up to
                15% adjoining leased land</li>
              <li><i class="fas fa-check-circle"></i> Housing for industrial workers now permitted within industrial
                zones</li>
              <li><i class="fas fa-check-circle"></i> Extension of deadline by 1 year each for first and second
                extensions</li>
              <li><i class="fas fa-check-circle"></i> Provision of appeal against rejected land allotment applications
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Key Features Section -->
<section class="instagramcreative-section">
  <div class="container-fluid">

    <!-- Swiper Wrapper -->
    <div class="swiper instagramCreativeSwiper">
      <div class="swiper-wrapper">
        <!-- Card 1 -->
        <div class="swiper-slide creative-card">
         <img src="{{ asset('assets/img/instagram/1.webp') }}" alt="">
        </div>
     
        <!-- Card 1 -->
        <div class="swiper-slide creative-card">
         <img src="{{ asset('assets/img/instagram/2.webp') }}" alt="">
        </div>
     
        <!-- Card 1 -->
        <div class="swiper-slide creative-card">
         <img src="{{ asset('assets/img/instagram/3.webp') }}" alt="">
        </div>
     
        <!-- Card 1 -->
        <div class="swiper-slide creative-card">
         <img src="{{ asset('assets/img/instagram/4.webp') }}" alt="">
        </div>
     
        <!-- Card 1 -->
        <div class="swiper-slide creative-card">
         <img src="{{ asset('assets/img/instagram/5.webp') }}" alt="">
        </div>    
        <!-- Card 1 -->
        <div class="swiper-slide creative-card">
         <img src="{{ asset('assets/img/instagram/6.webp') }}" alt="">
        </div>    
        <!-- Card 1 -->
        <div class="swiper-slide creative-card">
         <img src="{{ asset('assets/img/instagram/7.webp') }}" alt="">
        </div>    
        <!-- Card 1 -->
        <div class="swiper-slide creative-card">
         <img src="{{ asset('assets/img/instagram/8.webp') }}" alt="">
        </div>    
        <!-- Card 1 -->
        <div class="swiper-slide creative-card">
         <img src="{{ asset('assets/img/instagram/9.webp') }}" alt="">
        </div>    
      </div>

      <!-- Navigation -->
  
    </div>

    <!-- Pagination (moved outside the swiper box) -->
    {{-- <div class="swiper-pagination instagramCreativeSwiperPagination"></div> --}}
  </div>
</section>
@endsection
