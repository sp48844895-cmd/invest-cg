@extends('layouts.app')

@section('content')
  <!-- Hero Banner with Image -->
  <section class="sector-hero">
    <img src="{{ asset('assets/img/sectors/ai-robotics.jpg') }}" class="hero-video" alt="AI & Robotics">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
      <div class="hero-content-wrapper">
        <div class="hero-text">
          <h1 class="hero-title">AI & Robotics</h1>
          <div class="hero-actions">
            <a href="../storage/policy-brochure/AI, Robotics Booklet.pdf" target="_blank" class="cta-btn secondary">
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
      <a href="#" class="active">AI & Robotics</a>
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
          Discover comprehensive incentive packages and benefits tailored for AI and robotics investments
        </p>
      </div>

      <div class="opportunities-grid">
        <!-- MSME Package -->
        <div class="opportunity-card featured"
          onclick="openModal('MSME', '{{ asset('assets/img/sectors/ai_msme.avif') }}')">
          <div class="opportunity-header">
            <div class="opportunity-icon-box">
              <i class="fas fa-industry"></i>
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
          onclick="openModal('Large Enterprise', '{{ asset('assets/img/sectors/ai_large.jpg') }}', [])">
          <div class="opportunity-header">
            <div class="opportunity-icon-box">
              <i class="fas fa-robot"></i>
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
          <a href="{{ Storage::url('pdfs/sample-sheet/IT, ITES & AI Sector_ Incentives on Investment (Illustrative).pdf') }}"
            download="AI & Robotics Sector: Incentives on Investment (Illustrative)" class="card-full-link">
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
        <p class="section-desc-modern">Strategic advantages that make Chhattisgarh a hub for AI and robotics innovation
        </p>
      </div>

      <div class="ecosystem-features">
        <div class="feature-row">
          <div class="feature-item">
            <div class="feature-number">01</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-microchip"></i>
              </div>
              <h4>AI Data Centre Park</h4>
              <p>Chhattisgarh's first AI-based Data Centre Park launched in Nava Raipur, spanning 14 acres</p>
            </div>
          </div>

          <div class="feature-item">
            <div class="feature-number">02</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-city"></i>
              </div>
              <h4>Plug & Play Infra</h4>
              <p>EMC, IT Region, Logistics Park, and CBD with plug-and-play infrastructure</p>
            </div>
          </div>

          <div class="feature-item">
            <div class="feature-number">03</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-graduation-cap"></i>
              </div>
              <h4>Digital Literacy</h4>
              <p>Strong focus on digital literacy and technical training through NIELIT</p>
            </div>
          </div>
        </div>

        <div class="feature-row">
          <div class="feature-item">
            <div class="feature-number">04</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-seedling"></i>
              </div>
              <h4>AI in Agriculture</h4>
              <p>AI-driven solutions in agriculture, education, and governance</p>
            </div>
          </div>

          <div class="feature-item">
            <div class="feature-number">05</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-cogs"></i>
              </div>
              <h4>Public Services</h4>
              <p>Integration of emerging technologies to strengthen public services and rural development</p>
            </div>
          </div>

          <div class="feature-item">
            <div class="feature-number">06</div>
            <div class="feature-content-centered">
              <div class="feature-icon-circle">
                <i class="fas fa-user-graduate"></i>
              </div>
              <h4>Skilled Workforce</h4>
              <p>Presence of IIM, IIT, NIT, and IIIT ensuring availability of skilled talent</p>
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
        <p class="section-desc-modern">Join the AI & Robotics revolution in Chhattisgarh</p>
      </div>

      <div class="partners-showcase">
        <div class="swiper partnersSwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/ai_img-1.jpg') }}" alt="AI Partner 1">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/ai_img-2.jpg') }}" alt="AI Partner 2">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/ai_img-3.jpg') }}" alt="AI Partner 3">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/ai_img-4.jpg') }}" alt="AI Partner 4">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/partners/ai_img-5.jpg') }}" alt="AI Partner 5">
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
              <a href="{{ route('focus-sectors.show', 'it-ites') }}" class="sector-mini-card">
                <div class="sector-mini-icon">
                  <i class="fas fa-laptop-code"></i>
                </div>
                <span class="sector-mini-name">IT & Data Centre</span>
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
          "Fixed Capital Investment Subsidy: Up to 45% up to INR 8 crores up to 5 years",
          "Up to 55% interest subsidy for 8 years up to INR 50 lakhs",
          "Electricity duty exemption for 10 years",
          "100% stamp duty exemption",
          "Divyang retired Agniveers and surrendered Naxalites employment subsidy: 40% of net salary for 5 years up to INR 5 lakh per year",
          "Training Stipend Reimbursement: One-time subsidy up to INR 15000 per employee for those earning less than ₹50000/month over 5 years maximum limit at 100% of fixed capital investment",
          "75% EPF reimbursement for 5 years, up to 2% of FCI per year",
          "Employment assistance  (for 50+ employment) - 20% of salary for 5 years",
          "Subsidies for project report, quality certification, technical patent, technology purchase, environmental project management, water and energy efficiency expenditure"
        ],
        "Large Enterprise": [
          "Fixed Capital Investment Subsidy: 35% up to INR 60 crores",
          "Net SGST Reimbursement for 12 years",
          "50% interest subsidy for 5 years up to INR 20 crores per year",
          {
            "Fixed capital investment subsidy": "Fixed capital investment subsidy - 50% up to Rs. 450 crores for 6 years, in equal annual installments",
            "Employment booster": "Employment assistance - 20% salary reimbursement for CG domiciles (₹≤50K/month) for up to 7 years"
          },
          "Interest Subsidy: 50% int. or 6% int. (whichever is lower) for 5 years, up to ₹20 crore/year",
          "100% stamp duty exemption on land - 100% additional subsidy on land & building acquired for R&D",
          "50% reimbursement of land registration fee",
          "50% exemption on land diversion fee up to 50 acres",
          "75% EPF reimbursement for 5 years, up to 2% of FCI per year",
          "Training cost reimbursement: ₹15,000 or 1-month salary (whichever is lower) reimbursed for local employees (<₹50K/month), up to 5 years",
          "Electricity duty Exemption for 12 years - 50% subsidy for new electricity connection",
          "50% export certification reimbursement, up to 15 lakh per product for 10 products",
          "20% subsidy on R&D plant and machinery up to maximum Rs. 3 Crore",
          "Subsidies for Project Report, Quality Certification, Technical Patent, Technology Purchase, Water and Energy Efficiency Expenditure, Transportation Subsidy"
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