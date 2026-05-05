@extends('layouts.app')

@section('content')
<!-- Hero Banner -->
<section class="sector-hero">
  <img src="assets/img/sectors/ease-of-doing-business-banner.jpg" class="hero-video" alt="Ease of Doing Business">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">Ease of Doing Business</h1>
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
      <a href="{{ route('pages.show', 'dept-of-c-i') }}" class="tab-breadcrumb">Dept of C&I</a>
      <span class="breadcrumb-separator">›</span>
      <a href="#" class="tab-breadcrumb active">Ease of Doing Business</a>
    </div>
    <button class="breadcrumb-nav-btn breadcrumb-nav-next" id="breadcrumbNext" aria-label="Next">
      <i class="fa-solid fa-chevron-right"></i>
    </button>
  </div>
</div>

<section class="eodb-content-section">
  <div class="container">
    <!-- Introduction Section -->
    <div class="eodb-intro-card">
      <div class="eodb-intro-content">
        <p class="eodb-intro-text">
          The Department for Promotion of Industry and Internal Trade (DPIIT), Ministry of Commerce and Industry, Government of India, in coordination with States and Union Territories (UTs), has been implementing a series of reforms to improve the business climate in the country. It has conducted a comprehensive pan-India business-to-government (B2G) feedback exercise to corroborate the status of the implementation of the Business Reform Action Plan (BRAP) as declared by States and Union Territories.
        </p>
        <p class="eodb-intro-text">
          Starting with a 98-point Reform Action Plan in 2014, successive Business Reform Action Plans (BRAPs) have been released by DPIIT, expanding its coverage by including more reform areas. This profile for the State of Chhattisgarh outlines the results of the validation survey/feedback exercise for BRAP.
        </p>
      </div>
    </div>

    <!-- BRAP Parameters Table -->
    <div class="eodb-table-section">
      <div class="eodb-section-header">
        <h2 class="eodb-section-title">BRAP Parameters & Progress</h2>
        <p class="eodb-section-subtitle">Business Reform Action Plan implementation across different assessment periods</p>
      </div>
      
      <div class="eodb-table-wrapper">
        <table class="eodb-table">
          <thead>
            <tr>
              <th>S. No.</th>
              <th>Parameter</th>
              <th>2015</th>
              <th>2016</th>
              <th>2017–18</th>
              <th>2019</th>
              <th>2020</th>
              <th>2022</th>
              <th>2024</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Reforms Implemented</td>
              <td>285*B</td>
              <td>340*B</td>
              <td>372*B</td>
              <td>187*B</td>
              <td>301*B</td>
              <td>352*B-261 & *C-19</td>
              <td>287*B</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Assessment Method</td>
              <td>Evidence-based</td>
              <td>Evidence-based</td>
              <td>Evidence + Feedback (78 pts)</td>
              <td>100% Feedback-based</td>
              <td>100% Feedback-based</td>
              <td>100% Feedback-based</td>
              <td>100% Feedback-based</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Implementation Score (%)</td>
              <td>62.45%</td>
              <td>97.32%</td>
              <td>99.46%</td>
              <td>99.44%</td>
              <td>96.32%</td>
              <td>—</td>
              <td>—</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Feedback Score (%)</td>
              <td>NA</td>
              <td>NA</td>
              <td>97.31%</td>
              <td>28.71%</td>
              <td>Not Shared</td>
              <td>Awaited</td>
              <td>To be conducted</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Rank / Status</td>
              <td>04</td>
              <td>04</td>
              <td>06</td>
              <td>06</td>
              <td>Aspirer</td>
              <td>—</td>
              <td>—</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Key Highlights Section -->
    <div class="eodb-highlights-section">
      <div class="eodb-section-header">
        <h2 class="eodb-section-title">Key Highlights of BRAP Exercises</h2>
        <p class="eodb-section-subtitle">Comprehensive reforms across multiple sectors and processes</p>
      </div>

      <div class="eodb-highlights-grid">
        <div class="eodb-highlight-card">
          <div class="eodb-highlight-icon">
            <i class="fa-solid fa-chart-line"></i>
          </div>
          <h3 class="eodb-highlight-title">Investment Enablers</h3>
          <p class="eodb-highlight-text">Includes reforms in 'Access to Information and Transparency,' 'Investment Facilitation Centre/Agency,' and 'Online Single Window System'</p>
        </div>

        <div class="eodb-highlight-card">
          <div class="eodb-highlight-icon">
            <i class="fa-solid fa-window-maximize"></i>
          </div>
          <h3 class="eodb-highlight-title">Single Window System</h3>
          <p class="eodb-highlight-text">Features online application submission, fee payment, status tracking, certificate download, and third-party verification</p>
        </div>

        <div class="eodb-highlight-card">
          <div class="eodb-highlight-icon">
            <i class="fa-solid fa-industry"></i>
          </div>
          <h3 class="eodb-highlight-title">Sectoral Reforms</h3>
          <p class="eodb-highlight-text">New sectors include Tourism, Telecom, Hospitality, Trade License, Healthcare, Legal Metrology, Cinema Halls, and Movie Shooting</p>
        </div>

        <div class="eodb-highlight-card">
          <div class="eodb-highlight-icon">
            <i class="fa-solid fa-shopping-cart"></i>
          </div>
          <h3 class="eodb-highlight-title">Public Procurement</h3>
          <p class="eodb-highlight-text">Added as a separate area by the Industries Department</p>
        </div>

        <div class="eodb-highlight-card">
          <div class="eodb-highlight-icon">
            <i class="fa-solid fa-file-contract"></i>
          </div>
          <h3 class="eodb-highlight-title">Renewals and Inspections</h3>
          <p class="eodb-highlight-text">Eliminates the need for certificate/license renewals and implements a computerized central random inspection system</p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Breadcrumb Navigation Scroll
  const breadcrumbContainer = document.getElementById('breadcrumbContainer');
  const breadcrumbPrev = document.getElementById('breadcrumbPrev');
  const breadcrumbNext = document.getElementById('breadcrumbNext');

  function updateBreadcrumbButtons() {
    if (breadcrumbContainer) {
      const scrollLeft = breadcrumbContainer.scrollLeft;
      const scrollWidth = breadcrumbContainer.scrollWidth;
      const clientWidth = breadcrumbContainer.clientWidth;

      if (breadcrumbPrev) {
        breadcrumbPrev.style.display = scrollLeft > 0 ? 'flex' : 'none';
      }
      if (breadcrumbNext) {
        breadcrumbNext.style.display = scrollLeft < scrollWidth - clientWidth - 10 ? 'flex' : 'none';
      }
    }
  }

  if (breadcrumbPrev) {
    breadcrumbPrev.addEventListener('click', () => {
      if (breadcrumbContainer) {
        breadcrumbContainer.scrollBy({ left: -200, behavior: 'smooth' });
      }
    });
  }

  if (breadcrumbNext) {
    breadcrumbNext.addEventListener('click', () => {
      if (breadcrumbContainer) {
        breadcrumbContainer.scrollBy({ left: 200, behavior: 'smooth' });
      }
    });
  }

  if (breadcrumbContainer) {
    breadcrumbContainer.addEventListener('scroll', updateBreadcrumbButtons);
    updateBreadcrumbButtons();
  }
});
</script>
@endsection

