@extends('layouts.app')

@section('content')
<!-- Hero Banner with Image -->
<section class="sector-hero">
  <img src="{{ asset('assets/img/sectors/focus_sector.jpg') }}" class="hero-video" alt="">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">Focus Sectors</h1>
   
      </div>
    </div>
  </div>
</section>

<!-- Breadcrumb -->
<div class="breadcrumb-nav">
    <div class="container breadcrumb-container">

        <a href="{{ route('pages.show', 'investment_promotion') }}">Investment Promotion</a>
        <span>›</span>
        <a href="#" class="active">Focus Sectors</a>
        <span>›</span>

        <a href="{{ route('calculator.index') }}">Subsidy Calculator</a>
        <span>›</span>
        <a href="{{ route('pages.show', 'policy-notifications') }}">Policy & Notifications</a>
    </div>
</div>


<!-- Focus Sectors Section -->
<section class="focus-sectors">
    <div class="container">

        <div class="row g-4">
            <!-- Pharma & Medical Devices -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('focus-sectors.show', 'pharma-sector') }}">
                    <div class="focus-card">
                        <div class="focus-img">
                            <img src="assets/img/sector-logo/pharma.png" alt="Pharma & Medical Devices">
                        </div>
                        <div class="focus-content">
                            <h5>Pharma & Medical Devices</h5>
                            <p>Accelerating healthcare innovation and advanced manufacturing.</p>
                            <i class="fa-solid fa-arrow-up-right-from-square float-end"></i>
                        </div>
                    </div>

                </a>

            </div>

            <!-- Agro & Food Processing -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('focus-sectors.show', 'agro-food-processing') }}">
                    <div class="focus-card">
                        <div class="focus-img">
                            <img src="assets/img/sector-logo/agro-food.png" alt="Agro & Food Processing">
                        </div>
                        <div class="focus-content">
                            <h5>Agro & Food Processing</h5>
                            <p>Building value chains from farm to market with sustainable growth.</p>
                            <i class="fa-solid fa-arrow-up-right-from-square float-end"></i>
                        </div>
                    </div>
                </a>

            </div>

            <!-- IT, ITeS and Data Centre -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('focus-sectors.show', 'it-ites') }}">
                    <div class="focus-card">
                        <div class="focus-img">
                            <img src="assets/img/sector-logo/It-ites.png" alt="IT, ITeS and Data Centre">
                        </div>
                        <div class="focus-content">
                            <h5>IT, ITeS & Data Centre</h5>
                            <p>Empowering digital transformation and smart infrastructure.</p>
                            <i class="fa-solid fa-arrow-up-right-from-square float-end"></i>
                        </div>
                    </div>
                </a>

            </div>

            <!-- AI & Robotics -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('focus-sectors.show', 'ai-robotics') }}">
                    <div class="focus-card">
                        <div class="focus-img">
                            <img src="assets/img/sector-logo/CG_Driven_by_Intelligence.png" alt="AI & Robotics">
                        </div>
                        <div class="focus-content">
                            <h5>AI & Robotics</h5>
                            <p>Innovating automation with smart, future-ready solutions.</p>
                            <i class="fa-solid fa-arrow-up-right-from-square float-end"></i>
                        </div>
                    </div>
                </a>

            </div>

            <!-- Textile -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('focus-sectors.show', 'textile') }}">
                    <div class="focus-card">
                        <div class="focus-img">
                            <img src="assets/img/sector-logo/textile.png" alt="Textile">
                        </div>
                        <div class="focus-content">
                            <h5>Textile</h5>
                            <p>Blending tradition and technology for modern textile production.</p>
                            <i class="fa-solid fa-arrow-up-right-from-square float-end"></i>
                        </div>
                    </div>
                </a>

            </div>

            <!-- Electrical & Electronics -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('focus-sectors.show', 'electronic') }}">
                    <div class="focus-card">
                        <div class="focus-img">
                            <img src="assets/img/sector-logo/electronic.png" alt="Electrical & Electronics">
                        </div>
                        <div class="focus-content">
                            <h5>Electrical & Electronics</h5>
                            <p>Powering progress through innovation and smart manufacturing.</p>
                            <i class="fa-solid fa-arrow-up-right-from-square float-end"></i>
                        </div>
                    </div>
                </a>

            </div>

            <!-- Defense, Aerospace & Space Tech -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('focus-sectors.show', 'defence-aerospace') }}">
                    <div class="focus-card">
                        <div class="focus-img">
                            <img src="assets/img/sector-logo/defence.png" alt="Defense, Aerospace & Space Tech">
                        </div>
                        <div class="focus-content">
                            <h5>Defense, Aerospace & Space Tech</h5>
                            <p>Building a secure, high-tech ecosystem for defense innovation.</p>
                            <i class="fa-solid fa-arrow-up-right-from-square float-end"></i>
                        </div>
                    </div>
                </a>

            </div>

            <!-- GCC (Global Capability Center) -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('focus-sectors.show', 'gcc') }}">
                    <div class="focus-card">
                        <div class="focus-img">
                            <img src="assets/img/sector-logo/gcc.png" alt="GCC">
                        </div>
                        <div class="focus-content">
                            <h5>Global Capability Center (GCC)</h5>
                            <p>Empowering businesses with digital, analytical, and operational excellence from India’s
                                heartland.</p>
                            <i class="fa-solid fa-arrow-up-right-from-square float-end"></i>
                        </div>
                    </div>
                </a>

            </div>


            <!-- Steel -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('focus-sectors.show', 'steel') }}">
                    <div class="focus-card">
                        <div class="focus-img">
                            <img src="assets/img/sector-logo/steel.png" alt="Steel">
                        </div>
                        <div class="focus-content">
                            <h5>Steel</h5>
                            <p>Strengthening India's industrial foundation with world-class steel.</p>
                            <i class="fa-solid fa-arrow-up-right-from-square float-end"></i>
                        </div>
                    </div>
                </a>

            </div>

            <!-- Tourism -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('focus-sectors.show', 'tourism') }}">
                    <div class="focus-card">
                        <div class="focus-img">
                            <img src="assets/img/sector-logo/CG_Tourism_Logo.png" alt="Tourism">
                        </div>
                        <div class="focus-content">
                            <h5>Tourism</h5>
                            <p>Showcasing Chhattisgarh’s culture, nature, and vibrant destinations.</p>
                            <i class="fa-solid fa-arrow-up-right-from-square float-end"></i>
                        </div>
                    </div>
                </a>

            </div>

            <!-- Automobile & Engineering -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('focus-sectors.show', 'automobile-engineering') }}">
                    <div class="focus-card">
                        <div class="focus-img">
                            <img src="assets/img/sector-logo/automobile.png" alt="Automobile & Engineering">
                        </div>
                        <div class="focus-content">
                            <h5>Automobile & Engineering</h5>
                            <p>Driving industrial innovation with advanced design and production.</p>
                            <i class="fa-solid fa-arrow-up-right-from-square float-end"></i>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</section>


 <section class="policy-section pt-5">
    <div class="container">
      <div class="row">
        <!-- Card 1 -->
        <div class="col-lg-4">
          <div class="policy-card">
            <div class="policy-card-body">
              <h3>Industrial Development Policy 2024-30</h3>
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
              <h3>Industrial Policy Brochure</h3>
            </div>
            <div class="policy-card-footer">
              <a href="storage/pdfs/Policy Brochure.pdf" target="_blank" class="download-btn">
                <i class="policy-icon-in-btn fas fa-book"></i>
                <span>Download Brochure</span>
                <i class="fa-solid fa-download"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="col-lg-4">
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
@endsection
