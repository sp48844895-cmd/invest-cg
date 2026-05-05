@extends('layouts.app')

@section('content')
<!-- Hero Banner with Image -->
<section class="sector-hero">
  <img src="assets/img/sectors/one-click-banner.jpg" class="hero-video" alt="">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">One Click <br> Single Window System</h1>
   
      </div>
    </div>
  </div>
</section>

<!-- Introduction Section -->
<section class="single-window-intro">
  <div class="container">
    <div class="intro-content">
     
      <p class="intro-text">
        As part of Chhattisgarh's overarching promise of <strong>"Business Made Easy,"</strong> OneClick is the state's
        new single-window portal that brings speed, simplicity, and transparency to the business environment. From
        approvals and clearances to bill payments, land allotment, and compliance — everything an entrepreneur or
        investor needs is now just one click away.
      </p>
      <p class="intro-tagline">
        Because here in Chhattisgarh, <span class="highlight">ease is not just a promise — it's a system.</span>
      </p>
    </div>
  </div>
</section>

<!-- Services Layout Section -->
<section class="services-layout">
  <div class="container">
    <div class="services-wrapper">
      <!-- Left Side Services -->
      <div class="services-left">
        <a href="https://swsportal.cgstate.gov.in/website/registration">
          <div class="service-item">
            <div class="service-icon">
              <i class="fa-solid fa-user-plus"></i>
            </div>
            <div class="service-info">
              <h4 class="service-name">Registration</h4>
              <p class="service-description">Quick and hassle-free business registration</p>
            </div>
          </div>
        </a>
         <a href="https://swsportal.cgstate.gov.in/login">
          <div class="service-item">
                <div class="service-icon">
              <i class="fa-solid fa-certificate"></i>
            </div>
            <div class="service-info">
              <h4 class="service-name">Production Certificate</h4>
              <p class="service-description">Certifies the commencement of commercial production to avail incentives</p>
            </div>
        
          </div>
        </a>
         <a href="https://swsportal.cgstate.gov.in/login">
          <div class="service-item">
            <div class="service-icon">
              <i class="fa-solid fa-gift"></i>
            </div>
            <div class="service-info">
              <h4 class="service-name">Incentives</h4>
              <p class="service-description">Apply for subsidies under IDP 2024–30</p>
            </div>
          </div>
        </a>
        <a href="https://invest.cg.gov.in/oneclick/onclick-service">
          <div class="service-item">
            <div class="service-icon">
              <i class="fa-solid fa-file-circle-check"></i>
            </div>
            <div class="service-info">
              <h4 class="service-name">Approvals</h4>
              <p class="service-description">Access 132 approvals across 10 departments</p>
            </div>
          </div>
        </a>
       
       
      </div>
     
      <!-- Center Logo -->
      <div class="center-logo">
        <div class="logo-wrapper">
          <img src="assets/img/Logo_OneClick_Final_White.png" alt="OneClick Logo">
        </div>
      </div>

      <!-- Right Side Services -->
      <div class="services-right">
       
        <a href="https://csidc.cgstate.gov.in/website/home" target="_blank">
          <div class="service-item">
            <div class="service-info text-end">
              <h4 class="service-name">Land Management</h4>
              <p class="service-description">Land Allotment and related support</p>
            </div>
            <div class="service-icon">
              <i class="fa-solid fa-map-location-dot"></i>
            </div>
          </div>
        </a>
        <a href="https://swsportal.cgstate.gov.in/login" >
          <div class="service-item">
            <div class="service-info text-end">
              <h4 class="service-name">Boiler Registration</h4>
              <p class="service-description">Mandatory registration & compliance for safe boiler operations</p>
            </div>
            <div class="service-icon">
              <i class="fa-solid fa-industry"></i>
            </div>
          </div>
        </a>
         <a href="https://invest.cg.gov.in/oneclick/approval">
          <div class="service-item">
          
            <div class="service-info text-end">
              <h4 class="service-name">Know Your Approvals</h4>
              <p class="service-description">Identify approvals & licenses required for your project</p>
            </div>
              <div class="service-icon">
              <i class="fa-solid fa-clipboard-list"></i>
            </div>
          </div>
        </a>
        <a href="{{ route('pages.show', 'one-click-help-and-support') }}">
          <div class="service-item">
           
            <div class="service-info text-end">
              <h4 class="service-name">Help Desk</h4>
              <p class="service-description">Support to resolve queries & grievances</p>
            </div>
             <div class="service-icon">
              <i class="fa-solid fa-headset"></i>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Life Cycle Section - Horizontal -->
<section class="lifecycle-section">
  <div class="container-fluid">
    <div class="lifecycle-header">
      <h2 class="lifecycle-title">Single Window System Life Cycle</h2>
      <p class="lifecycle-description">
        Single Window System life cycle involves application submission, processing, coordination, approval, and
        clearance through a unified Industrial platform.
      </p>
    </div>

    <div class="lifecycle-scroll-container">
      <!-- <button class="scroll-btn scroll-left">
        <i class="fa-solid fa-chevron-left"></i>
      </button> -->

      <div class="lifecycle-horizontal-wrapper">
        <div class="lifecycle-horizontal">
          <!-- Start Point -->
          <!-- <div class="lifecycle-start">
            <div class="start-badge">
              <i class="fa-solid fa-flag"></i>
              <span>Start</span>
            </div>
          </div> -->

          <!-- Timeline Item 1 -->
          <div class="timeline-step">
            <div class="step-connector"></div>
            <div class="step-content">
              <div class="step-number">01</div>
              <div class="step-icon">
                <i class="fa-solid fa-user-check"></i>
              </div>
              <h4 class="step-title">Entity Registration & Account Activation</h4>
         
            </div>
          </div>

          <!-- Arrow -->
          <div class="step-arrow">
            <i class="fa-solid fa-arrow-right"></i>
          </div>

          <!-- Timeline Item 2 -->
          <div class="timeline-step">
            <div class="step-connector"></div>
            <div class="step-content">
              <div class="step-number">02</div>
              <div class="step-icon">
                <i class="fa-solid fa-chart-line"></i>
              </div>
              <h4 class="step-title">Udyam Akanksha</h4>
           
            </div>
          </div>

          <!-- Arrow -->
          <div class="step-arrow">
            <i class="fa-solid fa-arrow-right"></i>
          </div>

          <!-- Timeline Item 3 -->
          <div class="timeline-step">
            <div class="step-connector"></div>
            <div class="step-content">
              <div class="step-number">03</div>
              <div class="step-icon">
                <i class="fa-solid fa-file-invoice-dollar"></i>
              </div>
              <h4 class="step-title">Departmental Subsidies</h4>
         
            </div>
          </div>

          <!-- Arrow -->
          <div class="step-arrow">
            <i class="fa-solid fa-arrow-right"></i>
          </div>

          <!-- Timeline Item 4 -->
          <div class="timeline-step">
            <div class="step-connector"></div>
            <div class="step-content">
              <div class="step-number">04</div>
              <div class="step-icon">
                <i class="fa-solid fa-magnifying-glass-chart"></i>
              </div>
              <h4 class="step-title">Application Tracking</h4>
        
            </div>
          </div>

          <!-- Arrow -->
          <div class="step-arrow">
            <i class="fa-solid fa-arrow-right"></i>
          </div>

          <!-- Timeline Item 5 -->
          <div class="timeline-step">
            <div class="step-connector"></div>
            <div class="step-content">
              <div class="step-number">05</div>
              <div class="step-icon">
                <i class="fa-solid fa-award"></i>
              </div>
              <h4 class="step-title">Certificate Generation</h4>
         
            </div>
          </div>

          <!-- Arrow -->
          <div class="step-arrow">
            <i class="fa-solid fa-arrow-right"></i>
          </div>

          <!-- Timeline Item 6 -->
          <div class="timeline-step">
            <div class="step-connector"></div>
            <div class="step-content">
              <div class="step-number">06</div>
              <div class="step-icon">
                <i class="fa-solid fa-hand-holding-dollar"></i>
              </div>
              <h4 class="step-title">Subsidy Disbursement</h4>
         
            </div>
          </div>
          <!-- Arrow -->
          <div class="step-arrow">
            <i class="fa-solid fa-arrow-right"></i>
          </div>
          <!-- End Point -->
          <div class="lifecycle-end">
            <div class="end-badge">
              <i class="fa-solid fa-circle-check"></i>
              <span>Complete</span>
            </div>
          </div>
        </div>
      </div>

      <!-- <button class="scroll-btn scroll-right">
        <i class="fa-solid fa-chevron-right"></i>
      </button> -->
    </div>
  </div>
</section>

<!-- Video Modal -->
<div class="video-modal" id="videoModal">
  <div class="video-modal-overlay"></div>
  <div class="video-modal-content">
    <button class="video-modal-close">
      <i class="fa-solid fa-xmark"></i>
    </button>
    <div class="video-wrapper">
      <iframe id="videoFrame" src="" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
    </div>
  </div>
</div>

<!-- Important Links Section -->
<section class="info-shortcuts">
  <div class="info-shortcuts-inner">
    <div class="section-header-modern text-center mb-5">
      <h2 class="section-title-modern">Important Links</h2>
      <p class="section-desc-modern">Quick access to essential resources and information</p>
    </div>
    <div class="shortcut-grid">
      <a class="shortcut-card" href="https://invest.cg.gov.in/oneclick/dashboard/serviceCharter" rel="noopener">
        <div class="shortcut-icon"><i class="fa-solid fa-file-contract"></i></div>
        <div class="shortcut-content">
          <span class="shortcut-title">Service Charter</span>
          <span class="shortcut-desc">View service charter and guidelines</span>
        </div>
        <span class="shortcut-arrow">→</span>
      </a>

      <a class="shortcut-card" href="{{ route('pages.show', 'mode-of-contact') }}">
        <div class="shortcut-icon"><i class="fa-solid fa-address-book"></i></div>
        <div class="shortcut-content">
          <span class="shortcut-title">Mode of Contract</span>
          <span class="shortcut-desc">Contract documents and templates</span>
          {{-- <span class="shortcut-badge">View</span> --}}
        </div>
        <span class="shortcut-arrow">→</span>
      </a>

      <a class="shortcut-card" href="https://invest.cg.gov.in/oneclick/verification" rel="noopener">
        <div class="shortcut-icon"><i class="fa-solid fa-certificate"></i></div>
        <div class="shortcut-content">
          <span class="shortcut-title">Certificate Verification</span>
          <span class="shortcut-desc">Verify your certificates online</span>
        </div>
        <span class="shortcut-arrow">→</span>
      </a>

      <a class="shortcut-card" href="https://dashboard.invest.cg.gov.in/publicdashboard/" target="_blank" rel="noopener">
        <div class="shortcut-icon"><i class="fa-solid fa-chart-line"></i></div>
        <div class="shortcut-content">
          <span class="shortcut-title">Dashboard</span>
          <span class="shortcut-desc">View Application Dashboard</span>
        </div>
        <span class="shortcut-arrow">→</span>
      </a>
      <a class="shortcut-card" href="https://invest.cg.gov.in/oneclick/verification/2" rel="noopener">
        <div class="shortcut-icon"><i class="fa-solid fa-circle-check"></i>
</div>
        <div class="shortcut-content">
          <span class="shortcut-title">e-Challan Verification</span>
          <span class="shortcut-desc">Verify e-Challans online</span>
        </div>
        <span class="shortcut-arrow">→</span>
      </a>
    </div>
  </div>
</section>

<script>
  // Horizontal Scroll Functionality
  document.addEventListener('DOMContentLoaded', function () {
    const scrollContainer = document.querySelector('.lifecycle-horizontal-wrapper');
    const scrollLeftBtn = document.querySelector('.scroll-left');
    const scrollRightBtn = document.querySelector('.scroll-right');

    // Scroll amount
    const scrollAmount = 400;

    // Check scroll position and update button visibility
    function updateScrollButtons() {
      const scrollLeft = scrollContainer.scrollLeft;
      const maxScroll = scrollContainer.scrollWidth - scrollContainer.clientWidth;

      if (scrollLeft <= 0) {
        scrollLeftBtn.style.opacity = '0.3';
        scrollLeftBtn.style.pointerEvents = 'none';
      } else {
        scrollLeftBtn.style.opacity = '1';
        scrollLeftBtn.style.pointerEvents = 'auto';
      }

      if (scrollLeft >= maxScroll - 10) {
        scrollRightBtn.style.opacity = '0.3';
        scrollRightBtn.style.pointerEvents = 'none';
      } else {
        scrollRightBtn.style.opacity = '1';
        scrollRightBtn.style.pointerEvents = 'auto';
      }
    }

    // Scroll left
    scrollLeftBtn.addEventListener('click', function () {
      scrollContainer.scrollBy({
        left: -scrollAmount,
        behavior: 'smooth'
      });
    });

    // Scroll right
    scrollRightBtn.addEventListener('click', function () {
      scrollContainer.scrollBy({
        left: scrollAmount,
        behavior: 'smooth'
      });
    });

    // Update buttons on scroll
    scrollContainer.addEventListener('scroll', updateScrollButtons);

    // Initial check
    updateScrollButtons();

    // Mouse drag to scroll
    let isDown = false;
    let startX;
    let scrollLeftPos;

    scrollContainer.addEventListener('mousedown', (e) => {
      isDown = true;
      scrollContainer.style.cursor = 'grabbing';
      startX = e.pageX - scrollContainer.offsetLeft;
      scrollLeftPos = scrollContainer.scrollLeft;
    });

    scrollContainer.addEventListener('mouseleave', () => {
      isDown = false;
      scrollContainer.style.cursor = 'grab';
    });

    scrollContainer.addEventListener('mouseup', () => {
      isDown = false;
      scrollContainer.style.cursor = 'grab';
    });

    scrollContainer.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - scrollContainer.offsetLeft;
      const walk = (x - startX) * 2;
      scrollContainer.scrollLeft = scrollLeftPos - walk;
    });

    // Video Modal Functionality
    const videoModal = document.getElementById('videoModal');
    const videoFrame = document.getElementById('videoFrame');
    const closeBtn = document.querySelector('.video-modal-close');
    const overlay = document.querySelector('.video-modal-overlay');
    const playButtons = document.querySelectorAll('.video-play-btn');

    // Open modal
    playButtons.forEach(button => {
      button.addEventListener('click', function () {
        const videoUrl = this.getAttribute('data-video');
        videoFrame.src = videoUrl + '?autoplay=1';
        videoModal.classList.add('active');
        document.body.style.overflow = 'hidden';
      });
    });

    // Close modal
    function closeModal() {
      videoModal.classList.remove('active');
      videoFrame.src = '';
      document.body.style.overflow = 'auto';
    }

    closeBtn.addEventListener('click', closeModal);
    overlay.addEventListener('click', closeModal);

    // Close on ESC key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && videoModal.classList.contains('active')) {
        closeModal();
      }
    });
  });
</script>
@endsection
