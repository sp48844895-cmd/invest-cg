@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="hero-section">
  <video autoplay muted loop playsinline class="hero-video">
    <source src="assets/videos/bg-vid.mp4" type="video/mp4" />
  </video>

  <div class="hero-overlay"></div>

  <div class="hero-content">
    <div class="hero-grid">
      <div class="hero-center-logo">
      <img src="assets/img/cg-logo.png" class="img-fluid" width="100" alt="">
      </div>

      <!-- CENTERED TITLE -->
      <h1 class="hero-title">#CGBusinessEasy</h1>

      <!-- INFO BUTTONS ROW -->
      <div class="hero-buttons">
         <a href="{{ route('pages.show', 'investment_promotion') }}" class="info-button">
          <div class="info-button-content">
            <div class="info-icon-wrapper">
       <i class="fa-regular fa-handshake"></i>
            </div>
            <div class="info-button-text">
              <h5 class="info-button-title">Investment Opportunities</h5>
                <small class="text-white">Chhattisgarh Welcomes You</small>
            </div>
          </div>
        </a>

        <a href="{{ route('pages.show', 'one-click') }}" class="info-button">
          <div class="info-button-content">
            <div class="info-icon-wrapper">
             <i class="fa-solid fa-arrow-pointer"></i>
            </div>
            <div class="info-button-text">
              <h5 class="info-button-title">One Click Single Window</h5>
              <small class="text-white">Everything Your Business Needs</small>
            </div>
          </div>
        </a>

        <a href="https://csidc.cgstate.gov.in/website/home" target="_blank" class="info-button">
          <div class="info-button-content">
            <div class="info-icon-wrapper">
          <i class="fa-regular fa-map"></i>
            </div>
            <div class="info-button-text">
              <h5 class="info-button-title">Land Management</h5>
                     <small class="text-white">At Your Fingertips</small>
            </div>
          </div>
        </a>
     
      </div>
    </div>
  </div>
</section>

<div class="bg-wrapper">
  <div class="overlay"></div>
  <!-- Message from the Ministers -->

  <section class="message-section position-relative ">
    <div id="messageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner">
        <!-- <img src="assets/img/message_bg.jpg" class="bg-img" alt="Background" /> -->
        <!-- <div class="overlay"></div> -->
        <!-- Slide 1 -->
        <div class="container">
          <div class="carousel-item active">
            <div class="row align-items-center content-area">
              <div class="col-lg-6 col-md-7 text-light">
                <h6 class="fw-semibold cg-text">Chhattisgarh</h6>
                <h2 class="fw-bold mb-3 text-white">Welcomes Investors!</h2>
                <p class="lead mb-3">
                  Our progressive Industrial Development Policy 2024–30 makes
                  it easy to do business, with incentives for multiple sectors
                  such as Pharma, Textiles, Electronics, IT, and more.
                </p>
                <p class="mb-4">
                  Simplified processes, online approvals, and attractive
                  incentives — we’ve got you covered. Come, grow with us!
                </p>
                <div class="author">
                  <p class="fw-semibold text-white mb-0">
                    — Shri Vishnu Deo Sai
                  </p>
                  <small class="text-white-50">Chief Minister, Chhattisgarh</small>
                </div>
              </div>

              <div class="col-lg-6 col-md-5 text-center position-relative">
                <img src="assets/img/cm-quote.png" alt="CM" class="img-fluid cm-photo" />
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
        </div>


      </div>

    </div>
  </section>
  <!-- End Message from the Ministers -->
  <!-- Why invest in chhattisgarh? -->
  <section class="why-invest-section" id="why-invest">
    <div class="container">
      <div class="why-invest-box">
        <div class="row align-items-center g-4">
          <!-- Left Content -->
          <div class="col-lg-9">
            <div class="why-left">
              <h3 class="why-subtitle">Invest in </h3>
              <h2 class="why-title">Chhattisgarh</h2>
           
            </div>
          </div>

          <!-- Right Buttons -->
          <div class="col-lg-3 ms-auto">
            <div class="why-buttons">
              <a href="{{ route('pages.show', 'investment_promotion') }}" class="btn-invest">Investment Promotion <i
                  class="fa-solid fa-arrow-up-right-from-square"></i></a>
              <a href="{{ route('focus-sectors.index') }}" class="btn-invest">Focus Sectors <i
                  class="fa-solid fa-arrow-up-right-from-square"></i></a>
              <a href="{{ route('calculator.index') }}" class="btn-invest">Subsidy Calculator <i
                  class="fa-solid fa-arrow-up-right-from-square"></i></a>

              <a href="{{ route('startup.index') }}" class="btn-invest">Start-up Chhattisgarh <i
                  class="fa-solid fa-arrow-up-right-from-square"></i></a>
              <a href="{{ route('pages.show', 'export') }}" class="btn-invest">Export <i class="fa-solid fa-arrow-up-right-from-square"></i></a>


            </div>
          </div>
        </div>

        <!-- Decorative Image -->
        <img src="assets/img/why_invest_image.png" alt="Why Invest in Chhattisgarh" class="why-img" />
      </div>
    </div>
  </section>
  <!-- End Why invest in chhattisgarh? -->

  <!-- Why invest in chhattisgarh? -->
  <section class="why-invest-section" id="why-invest">
    <div class="container">
      <div class="why-invest-box">
        <div class="row align-items-center g-4">
          <!-- Left Content -->
          <div class="col-lg-9">
            <div class="why-left">
            <h3 class="why-subtitle">Chhattisgarh</h3>
            <h2 class="why-title">Business Made Easy</h2>
         
            </div>
          </div>

          <!-- Right Buttons -->
          <div class="col-lg-3 ms-auto">
            <div class="why-buttons">
            <a href="{{ route('pages.show', 'one-click') }}" class="btn-invest">One Click - SWS
                <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              <a href="https://csidc.cgstate.gov.in/website/home" target="_blank" class="btn-invest">Land Management
                <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              <a href="{{ route('pages.show', 'invitation-to-invest') }}" class="btn-invest">Invitation to Invest
                <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              <a href="https://swsportal.cgstate.gov.in/login" target="_blank" class="btn-invest">Boiler Inspectorate
                <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              <a href="https://rfas.cg.nic.in/" target="_blank" class="btn-invest">Registrar, Firms & Societies
                <i class="fa-solid fa-arrow-up-right-from-square"></i></a>


            </div>
          </div>
        </div>

        <!-- Decorative Image -->
        <img src="assets/img/how_to_invest.png" alt="Why Invest in Chhattisgarh" class="why-img" />
      </div>
    </div>
  </section>
  <!-- End Why invest in chhattisgarh? -->


  <section class="policy-section">
    <div class="container">
      <div class="row">
        <!-- Card 1 -->
        <div class="col-lg-4">
          <div class="policy-card">
            <div class="policy-card-body">
              <h3>CG Industrial Development Policy <br> 2024-30</h3>
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
        <div class="col-lg-4">
          <div class="policy-card">
            <div class="policy-card-body">
              <h3>CG Innovation & Startup Promotion Policy 2025-30</h3>
            </div>
            <div class="policy-card-footer">
              <a href="{{ asset('storage/pdfs/Chhattisgarh Innovation and Startup Promotion Policy 2025-2030.pdf') }}" target="_blank" class="download-btn">
                <i class="policy-icon-in-btn fas fa-book"></i>
                <span>Download Policy</span>
                <i class="fa-solid fa-download"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="col-lg-4">
          <div class="policy-card">
            <div class="policy-card-body">
              <h3>CG Logistics Policy <br> 2025</h3>
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

  
  <section class="about-cg-section" id="about-chhattisgarh">
    <div class="container">
      <div class="about-carousel-wrapper">
        <div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <!-- Slide 1 - At A Glance -->
            <div class="carousel-item active">
              <div class="about-slide">
                <div class="row align-items-center g-4">
                  <div class="col-lg-5">
                    <div class="about-image-wrapper">
                      <div class="image-decoration"></div>
                      <img src="assets/img/CG_at_a_Glance.png" alt="Chhattisgarh at a Glance"
                        class="img-fluid about-image">
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="about-content">
                      <h3 class="about-title"><span class="highlight-text">Chhattisgarh</span><br>At A Glance!</h3>
                      <div class="about-list">
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            9th largest State - 1.35 lakh sq.km.
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            3 crore population
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            Centrally located bordering 7 States
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            Robust connectivity through air, road and rail transport
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            INR 5.68 lakh crore GSDP at 11% growth
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            Industry contribution to GSDP – 48%
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            Leading producer of Iron, Steel, Cement, Aluminium
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            44% forest cover
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            Surplus power – 26000+ MW installed capacity
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            Premier institutions - IIT, IIM, NIT, IIIT, NLU, NIFT and AIIMS
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Navigation Inside Slide -->
                <div class="carousel-navigation-inside">
                  <button class="carousel-nav-btn prev-btn" type="button" data-bs-target="#aboutCarousel"
                    data-bs-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                  </button>
                  <button class="carousel-nav-btn next-btn" type="button" data-bs-target="#aboutCarousel"
                    data-bs-slide="next">
                    <i class="fas fa-chevron-right"></i>
                  </button>
                </div>
              </div>
            </div>

            <!-- Slide 2 - Industrial Infrastructure -->
            <div class="carousel-item">
              <div class="about-slide">
                <div class="row align-items-center g-4">
                  <div class="col-lg-5">
                    <div class="about-image-wrapper">
                      <div class="image-decoration"></div>
                      <img src="assets/img/industrial_infra.png" alt="Industrial Infrastructure"
                        class="img-fluid about-image">
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="about-content">
                      <h3 class="about-title"><span class="highlight-text">Industrial Infrastructure</span></h3>
                      <div class="about-list">
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            70+ well developed industrial areas
                          </div>
                        </div>
                     
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            MSME Technology Centre in Durg and Bilaspur (upcoming)
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            Multi Modal Logistics Park at Nava Raipur
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            Sector specific parks for Metal, Engineering, Electronics, Food Processing, Textiles,
                            Ready-Made Garment, Plastics, Pharma
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            Upcoming parks – Smart Industrial Areas, Gems & Jewellery, Space Manufacturing, Furniture
                            Cluster, Electronics Manufacturing Cluster 2.0
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            Industrial Corridor proposed
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            NABL certified testing lab in Bhilai
                          </div>
                        </div>
                        <div class="list-item">
                          <div class="list-icon">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <div class="list-content">
                            Apparel training and design centre in Raipur
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Navigation Inside Slide -->
                <div class="carousel-navigation-inside">
                  <button class="carousel-nav-btn prev-btn" type="button" data-bs-target="#aboutCarousel"
                    data-bs-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                  </button>
                  <button class="carousel-nav-btn next-btn" type="button" data-bs-target="#aboutCarousel"
                    data-bs-slide="next">
                    <i class="fas fa-chevron-right"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End About Chhattisgarh -->



  <!-- NEWS SECTION -->
  <section class="news-section pb-5" id="news">
    <div class="container">
      <div class="news-box">
        <!-- News Swiper -->
        <div class="swiper news-swiper">
          <div class="swiper-wrapper">
            @php
              $homeNews = $newsData ?? collect();
              if (is_array($homeNews)) {
                $homeNews = collect($homeNews);
              }
            @endphp

            @if($homeNews->isEmpty())
              <div class="swiper-slide">
                <div class="news-card">
                  <div class="news-content">
                    <h5>No media updates have been published yet.</h5>
                  </div>
                </div>
              </div>
            @else
              @foreach($homeNews as $item)
                <div class="swiper-slide">
                  <div class="news-card">
                    <div class="news-img">
                      <img src="{{ $item['img'] ?? asset('assets/img/message_bg.jpg') }}" alt="{{ $item['title'] ?? 'News' }}" />
                    </div>
                    <div class="news-content">
                      <a href="{{ $item['link'] ?? '#' }}" target="_blank">
                        <h5>{{ $item['title'] ?? '' }}</h5>
                      </a>
                      <p>{{ $item['desc'] ?? '' }}</p>
                      <a href="{{ $item['link'] ?? '#' }}" class="read-more" target="_blank">Read more <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
        </div>

        <!-- Pagination (outside swiper, below cards) -->
        <div class="swiper-pagination news-pagination"></div>

        <!-- Footer View All -->
        <div class="news-footer text-center py-2">
          <a href="{{ route('media-updates.index') }}" class="view-all-btn">View All News <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
      </div>
    </div>
  </section>





  <!-- Investor Testimonials Section -->
  <section class="investor-testimonials ">
    <div class="container">
      <!-- Swiper Slider -->
      <div class="swiper testimonial-swiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
          <div class="swiper-slide">
            <div class="testimonial-box">

              <div class="testimonial-profile">
                <img src="assets/img/NarendraSen.jpeg" alt="Founder & CEO, RackBank Datacenters" />
              </div>
              <div class="testimonial-content">
                <i class="fa-solid fa-quote-left quote-icon"></i>
                <p class="testimonial-text">
                Our experience working with the Government of Chhattisgarh has been extremely positive. The support and responsiveness made the investment process smooth, and it was a natural choice for us to build India’s first AI Data Centre Park here. We believe the state has the potential to become a major hub for digital infrastructure.

                </p>
                <h5 class="testimonial-name">Mr. Narendra Sen</h5>
                <p class="testimonial-position">Founder & CEO, RackBank Datacenters</p>
              </div>
            </div>
          </div>
          <!-- Slide 1 -->
          <div class="swiper-slide">
            <div class="testimonial-box">

              <div class="testimonial-profile">
                <img src="assets/img/EswaraRao.jpg" alt="Managing Director & CEO, Polymatech Electronics" />
              </div>
              <div class="testimonial-content">
                <i class="fa-solid fa-quote-left quote-icon"></i>
                <p class="testimonial-text">
                 Chhattisgarh stands out as a forward-looking destination for high-technology manufacturing. The state’s proactive facilitation and strong ease-of-doing-business environment enabled a smooth and efficient investment process for us. We are pleased to establish our second plant here and look forward to contributing to the state’s emerging semiconductor ecosystem.

                </p>
                <h5 class="testimonial-name">Mr. Eswara Rao Nandam</h5>
                <p class="testimonial-position">Managing Director & CEO, Polymatech Electronics</p>
              </div>
            </div>
          </div>
            <!-- Slide 1 -->
          <div class="swiper-slide">
            <div class="testimonial-box">

              <div class="testimonial-profile">
                <img src="assets/img/MaloyRoy.png" alt="Founder & CEO, VRIZE" />
              </div>
              <div class="testimonial-content">
                <i class="fa-solid fa-quote-left quote-icon"></i>
                <p class="testimonial-text">
                We found Chhattisgarh to be a very welcoming place to set up and grow our operations. The support from the state and the availability of young talent make it a great location for companies in the IT and digital services space. We’re happy to be building and expanding our presence here.

                </p>
                <h5 class="testimonial-name">Mr. Maloy Roy</h5>
                <p class="testimonial-position">Founder & CEO, VRIZE</p>
              </div>
            </div>
          </div>
            <!-- Slide 1 -->
          <div class="swiper-slide">
            <div class="testimonial-box">

              <div class="testimonial-profile">
                <img src="assets/img/drools.svg" alt="Founder, Drools Pet Food Pvt. Ltd." />
              </div>
              <div class="testimonial-content">
                <i class="fa-solid fa-quote-left quote-icon"></i>
                <p class="testimonial-text">
              Chhattisgarh has been home to our journey from the very beginning. The state offers the right ecosystem for food processing and manufacturing, and the support from the Government of Chhattisgarh has helped us scale our operations with confidence. As we expand our project here, we are excited to continue building Drools into a global pet food brand from Chhattisgarh.

                </p>
                <h5 class="testimonial-name">Mr. Fahim Sultan Ali</h5>
                <p class="testimonial-position">Founder, Drools Pet Food Pvt. Ltd.</p>
              </div>
            </div>
          </div>
          <!-- Slide 1 -->
          <div class="swiper-slide">
            <div class="testimonial-box">

              <div class="testimonial-profile">
                <img src="assets/img/S.B.-Khyalia.webp" alt="CEO, Adani Power Limited" />
              </div>
              <div class="testimonial-content">
                <i class="fa-solid fa-quote-left quote-icon"></i>
                <p class="testimonial-text">
                  Chhattisgarh has established itself as a leader in the power sector, thanks to its forward-thinking
                  policies, abundant natural resources, and emphasis on sustainable development. The state's
                  investor-friendly policies, governance and robust ecosystem make it an ideal destination for powering
                  India's energy needs.

                </p>
                <h5 class="testimonial-name">Shri S. B. Khayalia</h5>
                <p class="testimonial-position">CEO, Adani Power Limited</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="testimonial-box">
              <div class="testimonial-profile">
                <img src="assets/img/naveen_jindal.jpg" alt="Investor 1" />
              </div>
              <div class="testimonial-content">
                <i class="fa-solid fa-quote-left quote-icon"></i>
                <p class="testimonial-text">
                  Chhattisgarh stands as a powerful emblem of India’s industrial evolution, seamlessly blending abundant
                  natural resources, cutting-edge infrastructure, and progressive policies to fuel growth. With its
                  unwavering commitment to boundless industrial advancement, Chhattisgarh is setting new standards for
                  future-ready states. At Jindal Steel & Power, we are proud to be part of this transformative journey,
                  championing inclusive and sustainable development alongside Chhattisgarh’s visionary ambitions.

                </p>
                <h5 class="testimonial-name">Mr. Naveen Jindal</h5>
                <p class="testimonial-position">Chairman, Jindal Steel & Power Ltd.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Swiper Navigation -->
        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
      </div>
    </div>
  </section>
  <!-- Industry Partners -->
  <section class="partners-section">
    <div class="container-fluid text-center">
      <div class="section-header-modern">
        <h2 class="section-title-modern">Key Investors</h2>
        
      </div>

      <div class="partners-showcase">
        <div class="swiper partnersSwiper">
          <div class="swiper-wrapper">
               <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/CGCompany/RackBank.jpg') }}" alt="RackBank">
                </div>
              </div>
            </div>
              <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/CGCompany/Polymatech.png') }}" alt="Polymatech">
                </div>
              </div>
            </div>
           <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/CGCompany/vrize.jpeg') }}" alt="vrize">
                </div>
              </div>
            </div>
              <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/CGCompany/Drools.jpg') }}" alt="drools">
                </div>
              </div>
            </div>
              <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/CGCompany/BombayHospital.png') }}" alt="Bombay hospital">
                </div>
              </div>
            </div>
           <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/CGCompany/GAIL.png')  }}" alt="GAIL">
                </div>
              </div>
            </div>
         
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/CGCompany/BEML.jpg') }}" alt="BEML">
                </div>
              </div>
            </div>
          
           
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/CGCompany/GOELD.jpg') }}" alt="GOELD">
                </div>
              </div>
            </div>
          
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/CGCompany/RAS.png') }}" alt="RAS">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/CGCompany/swift-merchandise.png') }}" alt="Swift Merchandise">
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="partner-card">
                <div class="partner-logo">
                  <img src="{{ asset('assets/img/CGCompany/Zoff.jpg') }}" alt="Zoff">
                </div>
              </div>
            </div>          
          </div>
        </div>
        <div class="swiper-controls">

          <div class="swiper-pagination partners-pagination"></div>

        </div>
      </div>


    </div>
  </section>
  <script>
   

    // Video Modal
    document.addEventListener("DOMContentLoaded", () => {
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
          768: { slidesPerView: 5, spaceBetween: 25 },
          1024: { slidesPerView: 8, spaceBetween: 30 },
        }
      });

    });
  </script>
@endsection
