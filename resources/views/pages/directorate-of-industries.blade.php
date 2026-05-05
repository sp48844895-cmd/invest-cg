@extends('layouts.app')

@section('content')
<!-- Hero Banner -->
<section class="sector-hero">
  <img src="assets/img/sectors/dept-of-ci-banner.jpg" class="hero-video" alt="Directorate of Industries">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">Directorate of Industries</h1>
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
        <a href="#" class="tab-breadcrumb active" data-tab="contact">Directorate of Industries</a>
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
        <h2 class="body-content-title">Directorate of Industries</h2>
        <p class="body-content-text">
          The DOI of CG plays a pivotal role in planning, establishment, growth and advancement of Industry in the state. The focus of DOI is to find opportunity for fast pace development of small, medium and large scale industries in the state. The DOI plays following important roles:
        </p>
      </div>

      <div class="body-roles-section">
        <h3 class="body-section-title">Important Roles</h3>
        <div class="body-roles-grid">
          <div class="body-role-item">
            <i class="fa-solid fa-check-circle"></i>
            <span>Development of Industries (Excluding Rural & Cottage industries)</span>
          </div>
          <div class="body-role-item">
            <i class="fa-solid fa-check-circle"></i>
            <span>Granting concessions and exemptions</span>
          </div>
          <div class="body-role-item">
            <i class="fa-solid fa-check-circle"></i>
            <span>Regulation of Purchase of stores by Government Departments and Public Enterprises</span>
          </div>
          <div class="body-role-item">
            <i class="fa-solid fa-check-circle"></i>
            <span>Regulation of Unincorporated Business, Literary, Scientific, Religious and other Organizations / Associations</span>
          </div>
          <div class="body-role-item">
            <i class="fa-solid fa-check-circle"></i>
            <span>Regulation of Boilers</span>
          </div>
          <div class="body-role-item">
            <i class="fa-solid fa-check-circle"></i>
            <span>Handling Export & Imports related matters</span>
          </div>
          <div class="body-role-item">
            <i class="fa-solid fa-check-circle"></i>
            <span>Establishment of New Industrial Zones</span>
          </div>
          <div class="body-role-item">
            <i class="fa-solid fa-check-circle"></i>
            <span>Infrastructural development in existing Industrial Zones</span>
          </div>
        </div>
      </div>

      <div class="body-acts-section">
        <h3 class="body-section-title">Acts & Rules</h3>
        <p class="body-content-text">The Directorate is governed by following Acts & Rules:</p>
        <div class="body-acts-list">
          <div class="body-act-item">
            <i class="fa-solid fa-gavel"></i>
            <span>Chhattisgarh Industrial Investment Promotion Act 2002</span>
          </div>
          <div class="body-act-item">
            <i class="fa-solid fa-gavel"></i>
            <span>Chhattisgarh Societies Registration Act 1973</span>
          </div>
          <div class="body-act-item">
            <i class="fa-solid fa-gavel"></i>
            <span>The Indian Boilers Act, 1923</span>
          </div>
          <div class="body-act-item">
            <i class="fa-solid fa-gavel"></i>
            <span>Micro Small and Medium Enterprises Development act 2006</span>
          </div>
          <div class="body-act-item">
            <i class="fa-solid fa-gavel"></i>
            <span>Sick Industrial Companies (Special Provisions) Act</span>
          </div>
          <div class="body-act-item">
            <i class="fa-solid fa-gavel"></i>
            <span>The Chhattisgarh Industries (Allotment of Sheds, Plots and Land) Rules, 1974</span>
          </div>
        </div>
      </div>

      
    </div>
  </div>
</section>
@endsection

