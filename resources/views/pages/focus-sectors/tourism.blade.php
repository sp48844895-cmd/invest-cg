@extends('layouts.app')

@section('content')
  <!-- Hero Banner with Image -->
  <section class="sector-hero">
    <img src="{{ asset('assets/img/sectors/tourism-banner.jpg') }}" class="hero-video" alt="Tourism Sector">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
      <div class="hero-content-wrapper">
        <div class="hero-text">
          <h1 class="hero-title">Tourism</h1>

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
      <a href="#" class="active">Tourism</a>
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
          Discover incentives and benefits for tourism infrastructure and hospitality projects
        </p>
      </div>

      <div class="opportunities-grid">
        <!-- MSME Package -->
        <div class="opportunity-card featured"
          onclick="openModal('MSME', '{{ asset('assets/img/sectors/msme_tourism.jpg') }}')">
          <div class="opportunity-header">
            <div class="opportunity-icon-box">
              <i class="fas fa-hotel"></i>
            </div>
            <span class="opportunity-tag">MSME</span>
          </div>
          <div class="opportunity-body">
            <h3>Investment ≤ ₹50 Cr</h3>
            <p>Comprehensive benefits for small & medium enterprises</p>
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
          onclick="openModal('Large Enterprise', '{{ asset('assets/img/sectors/large_tourism.jpg') }}', [])">
          <div class="opportunity-header">
            <div class="opportunity-icon-box">
              <i class="fas fa-mountain"></i>
            </div>
            <span class="opportunity-tag gold">Large</span>
          </div>
            <div class="opportunity-body">
            <h3>Investment > ₹50 Cr</h3>
            <p>Exclusive incentives for large-scale manufacturing</p>
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
          <a href="{{ Storage::url('pdfs/sample-sheet/Tourism Sector_ Incentives on Investment (Illustrative).pdf') }}"
            download="Tourism Sector: Incentives on Investment (Illustrative)" class="card-full-link">
            <div class="opportunity-header">
              <div class="opportunity-icon-box">
                <i class="fa-solid fa-file-pdf"></i>
              </div>
              <span class="opportunity-tag green">Illustrative</span>
            </div>
            <div class="opportunity-body">
              <h3>Incentives on Investment</h3>
              <p>Detailed examples with calculations for tourism projects</p>
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
        <p class="section-desc-modern">Why Chhattisgarh is India’s next tourism hotspot</p>
      </div>

      <div class="ecosystem-features">
        <div class="feature-row">
          <div class="feature-item">
            <div class="feature-number">01</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-users"></i>
              </div>
              <h4>Large Catchment</h4>
              <p>Large catchment population – 7 bordering States with access to 60+ crore population</p>
            </div>
          </div>

          <div class="feature-item">
            <div class="feature-number">02</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-road"></i>
              </div>
              <h4>Strong Connectivity</h4>
              <p>Strong connectivity through air, road and rail</p>
            </div>
          </div>

          <div class="feature-item">
            <div class="feature-number">03</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-tree"></i>
              </div>
              <h4>Natural Attractions</h4>
              <p>44% forest cover, 3 National Parks, 11 Wildlife Sanctuaries, 2 Elephant Reserves</p>
            </div>
          </div>
        </div>

        <div class="feature-row">
          <div class="feature-item">
            <div class="feature-number">04</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-pray"></i>
              </div>
              <h4>Spiritual & Cultural</h4>
              <p>Bastar Dusshera, Ram Van Gaman Path, Dholkal Ganesh, Five Shakti Peeths, Bhoramdeo Temple, Sirpur
                Buddhist Sites</p>
            </div>
          </div>

          <div class="feature-item">
            <div class="feature-number">05</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-water"></i>
              </div>
              <h4>Tourism Near Dams</h4>
              <p>Tourism opportunities near forest and dams/reservoirs</p>
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
        <h2 class="section-title-modern">Leading Tourism Players</h2>
        <p class="section-desc-modern">Join the growing tourism ecosystem in Chhattisgarh</p>
      </div>

      <div class="partners-showcase">
        <div class="swiper partnersSwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/tourism_img-1.jpg') }}" alt="Tourism Partner 1">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/tourism_img-2.jpg') }}" alt="Tourism Partner 2">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/tourism_img-3.jpg') }}" alt="Tourism Partner 3">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/tourism_img-4.jpg') }}" alt="Tourism Partner 4">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/tourism_img-5.jpg') }}" alt="Tourism Partner 5">
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
              <a href="{{ route('focus-sectors.show', 'automobile-engineering') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-car"></i>
                </div>
                <span class="sector-mini-name">Automobile</span>
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
              <a href="{{ route('focus-sectors.show', 'ai-robotics') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-robot"></i>
                </div>
                <span class="sector-mini-name">AI & Robotics</span>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="{{ route('focus-sectors.show', 'gcc') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-building"></i>
                </div>
                <span class="sector-mini-name">GCC</span>
              </a>
            </div>
          </div>
        </div>

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
    <div class="modal-dialog modal-dialog-centered modal-xl">
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
                <div id="investmentNote" class="investment-notice">
                  <i class="fas fa-info-circle"></i>
                  <span>Applicable for investment of minimum Rs. 50 crores in plant and machinery</span>
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
    function openModal(title, image, points) {
      let updatedPoints = {
        "MSME": [
              {
            "Fixed capital investment subsidy": "35% to 45% Capital Subsidy up to Rs. 8 Cr",
            "Employment booster": "Employment booster - 1.1X for 100 employees, 1.2X for 200, 1.3X for 500, 1.4X for 700, and 1.5X for 1000"
          },
          "Net SGST Reimbursement for 10 years (in lieu of FCI subsidy)",
          "Interest Subsidy - 45% to 55% for 6 to 8 years",
          "Electricity Duty Exemption - 6 to 10 years",
          "100% Stamp Duty Exemption",
          "Training subsidy - 1 month's wage up to Rs. 15,000",
          "75% EPF reimbursement for 5 years",
          "Employment assistance - 20% salary reimbursement for CG domiciles for 5 years (for 50+ employees)",
          "PWD, retired Agniveers and surrendered Naxalites employment subsidy: 40% of net salary for 5 years up to INR 5 lakh per year",
          "Subsidies for project report, quality certification, technical patent and technology purchase"
        ],
        "Large Enterprise": [
          {
            "Fixed capital investment subsidy": "30% Capital Subsidy up to Rs. 140 Cr",
            "Employment booster": "Employment booster - 1.1X for 100 employees, 1.2X for 200, 1.3X for 500, 1.4X for 700, and 1.5X for 1000"
          },
          "Net SGST reimbursement for 10 years (in lieu of FCI subsidy)",
          "Electricity duty exemption up to 7 years",
          "100% stamp duty exemption",
          "Land Registration Fee Reimbursement: 50% reimbursement",
          "Land Diversion fee exemption: 50% up to 50 acres",
          "75% EPF reimbursement for 5 years",
          "Training subsidy - one month's wage up to Rs. 15,000",
          "PWD, retired Agniveers and surrendered Naxalites employment subsidy: 40% of net salary for 5 years up to INR 5 lakh per year"
        ]
      };

      document.getElementById('modalTitle').innerText = title;
      document.getElementById('modalImage').src = image;

      let contentList = document.getElementById('modalContent');
      contentList.innerHTML = "";

      let modalPoints = updatedPoints[title] || points;

      modalPoints.forEach(point => {
        if (typeof point === 'object' && point !== null) {
          let li = document.createElement('li');
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
          let li = document.createElement('li');
          li.innerHTML = `
                <div class="benefit-icon"><i class="fas fa-check-circle"></i></div>
                <div class="benefit-text">${point}</div>
              `;
          contentList.appendChild(li);
        }
      });

      let smallText = document.getElementById('investmentNote');
      smallText.classList.toggle('d-none', title !== "Large Enterprise");

      var modal = new bootstrap.Modal(document.getElementById('infoModal'));
      modal.show();
    }

    document.addEventListener("DOMContentLoaded", () => {
      const partnersSwiper = new Swiper(".partnersSwiper", {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        autoplay: { delay: 3000, disableOnInteraction: false },
        pagination: { el: ".partners-pagination", clickable: true },
        navigation: { nextEl: ".partners-next", prevEl: ".partners-prev" },
        breakpoints: {
          640: { slidesPerView: 3 },
          768: { slidesPerView: 4 },
          1024: { slidesPerView: 5 }
        }
      });

      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute('href'));
          if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
      });
    });
  </script>
@endsection