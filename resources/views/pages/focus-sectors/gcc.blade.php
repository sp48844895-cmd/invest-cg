@extends('layouts.app')

@section('content')
  <!-- Hero Banner with Image -->
  <section class="sector-hero">
    <img src="{{ asset('assets/img/sectors/gcc_banner.jpg') }}" class="hero-video" alt="">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
      <div class="hero-content-wrapper">
        <div class="hero-text">
          <h1 class="hero-title">Global Capability Centre (GCC)</h1>
          <div class="hero-actions">
            <a href="../storage/policy-brochure/GCC Sector.pdf" target="_blank" class="cta-btn secondary">
              <i class="fas fa-download"></i>
              <span>Download Brochure</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <div class="breadcrumb-nav">
    <div class="container breadcrumb-container">
      <a href="{{ route('pages.show', 'investment_promotion') }}">Investment Promotion</a>
      <span>›</span>
      <a href="{{ route('focus-sectors.index') }}">Focus Sectors</a>
      <span>›</span>
      <a href="#" class="active">Global Capability Centre (GCC)</a>
      <span>›</span>
      <a href="{{ route('calculator.index') }}">Subsidy Calculator</a>
      <span>›</span>
    <a href="{{ route('pages.show', 'policy-notifications') }}">Policy & Notifications</a>
    </div>
  </div>

  <!-- Opportunities Explorer -->
  <section class="opportunities-section" id="explore">
    <div class="container">
      <div class="section-header-modern">
        <h2 class="section-title-modern">Explore Investment Opportunities</h2>
        <p class="section-desc-modern">
          Discover comprehensive incentive packages and benefits tailored for global capability centre investments
        </p>
      </div>

      <div class="opportunities-grid">

         <!-- MSME Package -->
        <div class="opportunity-card featured"
          onclick="openModal('Level 1 GCC', '{{ asset('assets/img/sectors/Level-1-GCC.webp') }}', [])">
          <div class="opportunity-header">
            <div class="opportunity-icon-box">
              <i class="fas fa-industry"></i>
            </div>
            <span class="opportunity-tag">Level - 1 GCC</span>
          </div>
          <div class="opportunity-body">
            <h3>Investment 10 ≤ ₹50 Cr</h3>
            <p>Comprehensive benefits for Level - 1 GCC enterprises</p>
          </div>
          <div class="opportunity-footer">
            <button class="explore-btn">
              <span>View Incentives</span>
              <i class="fas fa-arrow-right"></i>
            </button>
          </div>
        </div>

        <!-- Special Package -->
        <div class="opportunity-card premium"
          onclick="openModal('Advance GCC', '{{ asset('assets/img/sectors/GCC-Advance.webp') }}', [])">
          <div class="opportunity-header">
            <div class="opportunity-icon-box">
              <i class="fas fa-building"></i>
            </div>
            <span class="opportunity-tag gold">Advance GCC</span>
          </div>
          <div class="opportunity-body">
            <h3>Investment > ₹50 Cr</h3>
            <p>Exclusive incentives for Advance GCC facilities</p>
          </div>
          <div class="opportunity-footer">
            <button class="explore-btn">
              <span>View Incentives</span>
              <i class="fas fa-arrow-right"></i>
            </button>
          </div>
        </div>

        <!-- Calculator Card -->
        <div class="opportunity-card tool">
          <a href="{{ route('calculator.index') }}" class="card-full-link">
            <div class="opportunity-header">
              <div class="opportunity-icon-box">
                <i class="fas fa-calculator"></i>
              </div>
              <span class="opportunity-tag blue">Calculator</span>
            </div>
            <div class="opportunity-body">
              <h3>Calculate Subsidy</h3>
              <p>Potential incentives based on your investment size</p>
            </div>
            <div class="opportunity-footer">
              <button class="explore-btn">
                <span>Calculate Now</span>
                <i class="fas fa-arrow-right"></i>
              </button>
            </div>
          </a>
        </div>

        <!-- Download Card -->
        <div class="opportunity-card document">
          <a href="{{ Storage::url('pdfs/sample-sheet/GCC Sector_ Incentives on Investment (Illustrative).pdf') }}"
            download="GCC Sector: Incentives on Investment (Illustrative)" class="card-full-link">
            <div class="opportunity-header">
              <div class="opportunity-icon-box">
                <i class="fa-solid fa-file-pdf"></i>
              </div>
              <span class="opportunity-tag green">Illustrative</span>
            </div>
            <div class="opportunity-body">
              <h3>Incentives on Investment</h3>
              <p>Detailed examples with calculations for various investment scenarios</p>
            </div>
            <div class="opportunity-footer">
              <button class="explore-btn">
                <span>Download PDF</span>
                <i class="fas fa-download"></i>
              </button>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Growth Ecosystem -->
  <section class="ecosystem-section">
    <div class="container">
      <div class="section-header-modern">
        <span class="section-tag">Competitive Advantages</span>
        <h2 class="section-title-modern">Growth Drivers</h2>
        <p class="section-desc-modern">Strategic advantages that make Chhattisgarh an ideal destination for global
          capability centre investments</p>
      </div>

      <div class="ecosystem-features">
        <div class="feature-row">
          <div class="feature-item">
            <div class="feature-number">01</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-city"></i>
              </div>
              <h4>Greenfield Smart City</h4>
              <p>Nava Raipur, India’s first greenfield smart city – ideal for GCC</p>
            </div>
          </div>

          <div class="feature-item">
            <div class="feature-number">02</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-shield-alt"></i>
              </div>
              <h4>Low Disaster Risk</h4>
              <p>Minimal frequency of natural disasters</p>
            </div>
          </div>
          <div class="feature-item">
            <div class="feature-number">03</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-user-graduate"></i>
              </div>
              <h4>Premier Institutions</h4>
              <p>Presence of premier institutions like IIM, IIT, NIT, and IIIT for skilled workforce availability</p>
            </div>
          </div>
        </div>

        <div class="feature-row">
          <div class="feature-item">
            <div class="feature-number">04</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-plug"></i>
              </div>
              <h4>Uninterrupted Power</h4>
              <p>Uninterrupted power supply</p>
            </div>
          </div>
          <div class="feature-item">
            <div class="feature-number">05</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-globe"></i>
              </div>
              <h4>Market Access</h4>
              <p>Access to 7 adjacent States, more than 50 crore population</p>
            </div>
          </div>
          <div class="feature-item">
            <div class="feature-number">06</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <h4>Cost Efficiency</h4>
              <p>Low cost of doing business and low cost of living</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Industry Partners -->
  <!-- <section class="partners-section">
    <div class="container-fluid text-center">
      <div class="section-header-modern">
        <h2 class="section-title-modern">Leading Companies in Chhattisgarh</h2>
        <p class="section-desc-modern">Join the growing community of global capability centre leaders choosing
          Chhattisgarh</p>
      </div>

      <div class="partners-showcase">
        <div class="swiper partnersSwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/gcc_img-1.jpg') }}" alt="Partner 1">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/gcc_img-2.jpg') }}" alt="Partner 2">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/gcc_img-3.jpg') }}" alt="Partner 3">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/gcc_img-4.jpg') }}" alt="Partner 4">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/gcc_img-5.jpg') }}" alt="Partner 5">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-controls">

          <div class="swiper-pagination partners-pagination"></div>

        </div>
      </div>
  </section> -->
  <!-- CTA Banner with Sectors Slider -->
  <div class="cta-banner">
    <div class="cta-content">
      <div class="cta-header">
        <h3>Explore Other Focus Sectors</h3>
        <p>Discover investment opportunities across diverse industries</p>
      </div>

      <div class="sectors-slider-wrapper">
        <div class="swiper sectorsSwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <a href="{{ route('focus-sectors.show', 'agro-food-processing') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-seedling"></i>
                </div>
                <span class="sector-mini-name">Agro & Food</span>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="{{ route('focus-sectors.show', 'it-ites') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-laptop-code"></i>
                </div>
                <span class="sector-mini-name">IT & Data Centre</span>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="{{ route('focus-sectors.show', 'pharma-sector') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-flask"></i>
                </div>
                <span class="sector-mini-name">Pharma & Medical Devices</span>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="{{ route('focus-sectors.show', 'textile') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-tshirt"></i>
                </div>
                <span class="sector-mini-name">Textile</span>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="{{ route('focus-sectors.show', 'electronic') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-microchip"></i>
                </div>
                <span class="sector-mini-name">Electronics</span>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="{{ route('focus-sectors.show', 'defence-aerospace') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-fighter-jet"></i>
                </div>
                <span class="sector-mini-name">Defence & Aerospace</span>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="{{ route('focus-sectors.show', 'steel') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-industry"></i>
                </div>
                <span class="sector-mini-name">Steel</span>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="{{ route('focus-sectors.show', 'tourism') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-plane"></i>
                </div>
                <span class="sector-mini-name">Tourism</span>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="{{ route('focus-sectors.show', 'automobile-engineering') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-car"></i>
                </div>
                <span class="sector-mini-name">Automobile</span>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="{{ route('focus-sectors.show', 'ai-robotics') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-robot"></i>
                </div>
                <span class="sector-mini-name">AI & Robotics</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Navigation -->
        <div class="sectors-nav">
          <button class="sectors-prev">
            <i class="fas fa-chevron-left"></i>
          </button>
          <button class="sectors-next">
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  </div>


  <!-- Enhanced Modal -->
  <div class="modal fade incentive-modal" id="infoModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-header-content">
            <h5 class="modal-title" id="modalTitle">Incentives</h5>
          </div>
          <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <div class="row g-4">
            <div class="col-lg-6">
              <div class="modal-visual">
                <img id="modalImage" src="" class="img-fluid" alt="Incentive">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="modal-benefits">
                <h6 class="benefits-title">Key Benefits & Incentives</h6>
                <ul id="modalContent" class="benefits-list"></ul>
                <div id="investmentNote" class="investment-notice d-none">
                  <i class="fas fa-info-circle"></i>
                  <span>Applicable for investment of more than Rs. 50 crores in plant and machinery</span>
                </div>
                <div class="modal-actions">
                  <a href="{{ route('calculator.index') }}" class="modal-action-btn primary">
                    <i class="fas fa-calculator"></i>
                    <span>Calculate Benefits</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Modal Function
    function openModal(title, image, points) {
      let updatedPoints = {
          "Level 1 GCC": [
          {
            "Fixed capital investment subsidy": "Fixed capital investment subsidy - 35% up to Rs. 15 crores",
            "Employment booster": "Employment booster - 1.1X for 100 employees, 1.2X for 200, 1.3X for 500, 1.4X for 700, and 1.5X for 1000"
          },
          "Interest Subsidy: 50% of Interest paid or 6% w.e.l. for 5 years, up to Rs. 1 crore per year",
          "Electricity duty exemption for 12 years",
          "New Electricity Connection - 50% Charges reimbursed",
          "100% stamp duty exemption",
          "50% reimbursement of land registration fee",
          "50% exemption on land diversion fee up to 50 acres",
          "20% Operation expenditure for 5 years, up to 2% of FCI per year",
          "75% EPF reimbursement for 5 years, up to 2% of FCI per year",
          "Payroll Subisdy- 20% of salary for 5 years, upto 2 Lakh per month per employee",
          "Skill Development: 50% or Rs. 50,000 per employee w.e.l. for 5 years",
          "Special Subsidy for establishing incubation center for state bases atartups",
          "Among other subsidies"
        ],
        "Advance GCC": [
          {
            "Fixed capital investment subsidy": "Fixed capital investment subsidy - 35% up to Rs. 60 crores",
            "Employment booster": "Employment booster - 1.1X for 100 employees, 1.2X for 200, 1.3X for 500, 1.4X for 700, and 1.5X for 1000"
          },
          "Interest Subsidy: 40% of Interest paid or 6% w.e.l. for 5 years, up to Rs. 2 crore per year",
          "Electricity duty exemption for 12 years",
          "New Electricity Connection - 50% Charges reimbursed",
          "100% stamp duty exemption",
          "50% reimbursement of land registration fee",
          "50% exemption on land diversion fee up to 50 acres",
          "20% Operation expenditure for 5 years, up to 2% of FCI per year",
          "75% EPF reimbursement for 5 years, up to 2% of FCI per year",
          "Payroll Subisdy- 20% of salary for 5 years, upto 2 Lakh per month per employee",
          "Skill Development: 50% or Rs. 50,000 per employee w.e.l. for 5 years",
          "Special Subsidy for establishing incubation center for state bases atartups",
          "Among other subsidies"
        ]
      };

      document.getElementById('modalTitle').innerText = title;
      document.getElementById('modalImage').src = image;

      let contentList = document.getElementById('modalContent');
      contentList.innerHTML = "";

      let modalPoints = updatedPoints[title] || points;

      modalPoints.forEach(point => {
        let li = document.createElement('li');
        if (typeof point === 'object' && point !== null) {
          li.classList.add('benefit-main');
          li.innerHTML = `
                            <div class="benefit-icon"><i class="fas fa-star"></i></div>
                            <div class="benefit-text">${point["Fixed capital investment subsidy"]}</div>
                        `;
          contentList.appendChild(li);

          let subLi = document.createElement('li');
          subLi.classList.add('benefit-sub');
          subLi.innerHTML = `
                            <div class="benefit-icon"><i class="fas fa-angle-right"></i></div>
                            <div class="benefit-text">${point["Employment booster"]}</div>
                        `;
          contentList.appendChild(subLi);
        } else {
          li.innerHTML = `
                            <div class="benefit-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="benefit-text">${point}</div>
                        `;
          contentList.appendChild(li);
        }
      });

      let smallText = document.getElementById('investmentNote');
      smallText.classList.toggle('d-none', title !== "Advance GCC");

      var modal = new bootstrap.Modal(document.getElementById('infoModal'));
      modal.show();
    }

    // Video Modal
    document.addEventListener("DOMContentLoaded", () => {
      const playButton = document.getElementById("play-button_gcc");
      const videoPopup = document.getElementById("video-popup_gcc");
      const popupVideo = document.getElementById("popup-video_gcc");
      const closeButtons = document.querySelectorAll("#close-popup_gcc");

      if (playButton) {
        playButton.addEventListener("click", () => {
          videoPopup.classList.add('active');
          popupVideo.setAttribute("src", "assets/videos/GCC.mp4");
          popupVideo.play();
        });
      }

      closeButtons.forEach(btn => {
        btn.addEventListener("click", () => {
          videoPopup.classList.remove('active');
          popupVideo.pause();
          popupVideo.currentTime = 0;
          popupVideo.removeAttribute("src");
        });
      });

      // Partners Swiper
      const partnersSwiper = new Swiper(".partnersSwiper", {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".partners-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".partners-next",
          prevEl: ".partners-prev",
        },
        breakpoints: {
          640: { slidesPerView: 3, spaceBetween: 20 },
          768: { slidesPerView: 4, spaceBetween: 25 },
          1024: { slidesPerView: 5, spaceBetween: 30 },
        }
      });

      // Smooth Scroll
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute('href'));
          if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
          }
        });
      });
    });
  </script>
@endsection