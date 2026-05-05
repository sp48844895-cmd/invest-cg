@extends('layouts.app')

@section('content')
<!-- Hero Banner with Image -->
<section class="sector-hero">
    <img src="{{ asset('assets/img/sectors/startup-banner.jpg') }}" class="hero-video" alt="Startup Chhattisgarh Banner">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
        <div class="hero-content-wrapper">
            <div class="hero-text">
                <h1 class="hero-title">Startup Chhattisgarh</h1>
            </div>
        </div>
    </div>
</section>

@include('partials.startup-tabs', ['active' => 'overview'])

<div class="container startup-page ">
    <!-- Introduction -->
    <section class="startup-intro">
        <div class="intro-card-startup">
            <div class="intro-icon-large">
                <img src="{{ asset('assets/img/Startup_Logo_Colour_PNG.png') }}" alt="Startup Chhattisgarh Logo">
            </div>
          
            <div class="intro-text-startup">
                <p>
                    Startup Chhattisgarh is a transformative initiative by the Department of Commerce &
                    Industries, Government of Chhattisgarh, designed to position the state as a dynamic center for
                    innovation and entrepreneurship. Startup Chhattisgarh has emerged as a dynamic initiative to
                    nurture entrepreneurial talent and promote innovation across the state. Under startup package
                    2024-2030 the state aspires to support startups at every stage of their journey from ideation to
                    scaling and also support incubators, academic institutions and other stakeholders through
                    various incentives and capacity development.
                </p>
            </div>
        </div>
    </section>

    <!-- Policy Overview Cards -->
    <section class="policy-overview-section">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="policy-overview-card">
                    <div class="policy-card-icon">
                        <i class="fa-solid fa-lightbulb"></i>
                    </div>
                          <a href="{{ route('startup.show', 'policy-guidelines') }}#cg-policy" class="policy-card-link">
                    <h3>Chhattisgarh Innovation and Startup Promotion Policy (2025-30)</h3>   </a>
                    <p>
                        The state provides support to startups at different stages of life cycle. Sector agnostic schemes
                        such as, Student Start-up and Innovation Policy provides support to start-ups at idea stage, whereas
                        Chhattisgarh Innovation and Startup Promotion Policy aims for assistance for Startups/ Innovation
                        provides support to start-ups at seed funding and scale up stage.
                    </p>
                    <div class="col-lg-4">
                    <a href="{{ asset('storage/pdfs/Chhattisgarh Innovation and Startup Promotion Policy 2025-2030.pdf') }}" target="_blank" class="download-btn">
                        <i class="policy-icon-in-btn fas fa-file-alt"></i>
                <span>Download Policy</span>
                <i class="fa-solid fa-download"></i>
              </a>
                    </div>

                 
                </div>
            </div>
            
            {{-- <div class="col-lg-6">
                <div class="policy-overview-card">
                    <div class="policy-card-icon">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h3>Student Startup Innovation Policy</h3>
                    <p>
                        In today's rapidly evolving global economy, innovation and entrepreneurship have emerged as key drivers of
                        growth and transformation. Recognizing the immense potential of young minds, the Student Startup Innovation
                        Policy (SSIP) aims to foster a culture of creativity, problem-solving, and enterprise among students.
                    </p>
                    <a href="{{ route('startup.show', 'policy-guidelines') }}#student-policy" class="policy-card-link">
                        Learn More <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div> --}}
        </div>
    </section>

    <!-- CTA Section -->
    <section class="startup-cta">
        <div class="cta-card-startup enhanced-cta-card">
            <h2 class="cta-title-startup">Ready to Transform Your Idea into Reality?</h2>
            <p class="cta-text-startup">Join Chhattisgarh's thriving startup ecosystem today</p>
            <div class="cta-buttons">
                <a href="https://swsportal.cgstate.gov.in/website/registration" target="_blank" class="btn-primary-startup">
                    <i class="fa-solid fa-rocket"></i>
                    Register Your Startup
                </a>
                <a href="https://oneclick.invest.cg.gov.in/mentorpublic/mentor-registration" target="_blank" class="btn-primary-startup">
                    <i class="fa-solid fa-user-tie"></i>
                    Register as Mentor
                </a>
                <a href="#" target="_blank" class="btn-primary-startup">
                    <i class="fa-solid fa-building"></i>
                    Register as Incubator
                </a>
            </div>
            <a href="https://swsportal.cgstate.gov.in/login" target="_blank" class="existing-user">
                <i class="fa-solid fa-user"></i> Existing User Login
            </a>
        </div>
    </section>
</div>
@endsection
