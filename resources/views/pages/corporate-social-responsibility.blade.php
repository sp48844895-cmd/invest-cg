@extends('layouts.app')
@section('content')
    <!-- Hero Banner -->
    <section class="sector-hero">
        <img src="assets/img/sectors/dept-of-ci-banner.jpg" class="hero-video" alt="Department of Commerce and Industries">
        <div class="hero-gradient-overlay"></div>
        <div class="container">
            <div class="hero-content-wrapper">
                <div class="hero-text">
                    <h1 class="hero-title">Corporate Social Responsibility (CSR)</h1>
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
                <a href="./" class="tab-breadcrumb " data-tab="overview">Home</a>
                <span class="breadcrumb-separator">›</span>
                <a href="#" class="tab-breadcrumb active" data-tab="contact">Corporate Social Responsibility (CSR)</a>
            </div>
            <button class="breadcrumb-nav-btn breadcrumb-nav-next" id="breadcrumbNext" aria-label="Next">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>


    <!-- Tab Content -->
    <div class="department-content-area">
        <!-- Overview Tab -->
        <div class="tab-panel active" id="overview">
            <div class="container">
                <!-- Department Introduction -->
                <section class="department-intro">
                    <div class="intro-card">
                        <h2 class="content-title">Corporate Social Responsibility (CSR)</h2>
                        <div class="intro-text">
                            <p>
                                Corporate Social Responsibility (CSR) refers to the commitment of businesses to operate in
                                an ethical and sustainable manner while contributing to the social, economic, and
                                environmental well-being of society. It goes beyond profit-making, encouraging companies to
                                actively participate in initiatives such as education, healthcare, environmental
                                conservation, and community development. CSR helps build trust, strengthens brand value, and
                                creates a positive impact on communities.
                            </p>
                            <p>

                                The Department of Commerce and Industries is committed to bringing real change, and this
                                portal is a step towards achieving that goal. It enables government departments to list
                                their CSR requirements, while industries can explore and support projects or even contribute
                                to specific components of a project. This collaborative approach ensures targeted and
                                meaningful impact. Click on the link below to get started.
                            </p>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="bodies-grid-csr">
                                        <a href="#" class="body-card-csr">
                                            <div class="body-icon">
                                                <i class="fa-solid fa-industry"></i>
                                            </div>
                                            <h3 class="body-name">Get Started</h3>
                                            <span class="body-arrow">→</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

@endsection