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

@include('partials.startup-tabs', ['active' => 'information-wizard'])

<div class="container startup-page py-5">
    <!-- <section class="startup-intro">
        <div class="intro-card-startup">
            <div class="intro-icon-large">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
            </div>
            <h2 class="content-title">Information Wizard</h2>
            <div class="intro-text-startup">
                <p>Information Wizard content will be added here.</p>
            </div>
        </div>
    </section> -->

    <section class="startup-card">
        <div class="startup-card-head">
            <div class="startup-icon"><i class="fa-solid fa-folder-open"></i></div>
            <div>
                <h2 class="startup-title">Resources</h2>
            </div>
        </div>
        <div class="startup-card-body">
            <div class="d-flex flex-column flex-md-row flex-wrap gap-3">
                <a href="#" class="startup-btn primary">
                    <i class="fa-solid fa-newspaper me-2"></i>
                    Newsletters
                </a>
                <a href="#" class="startup-btn primary">
                    <i class="fa-solid fa-graduation-cap me-2"></i>
                    Learning Module
                </a>
                <a href="#" class="startup-btn primary">
                    <i class="fa-solid fa-file-lines me-2"></i>
                    Research Report
                </a>
                <a href="#" class="startup-btn primary">
                    <i class="fa-solid fa-book-open me-2"></i>
                    Research Article
                </a>
                <a href="#" class="startup-btn primary">
                    <i class="fa-solid fa-database me-2"></i>
                    Open Data Source
                </a>
            </div>
        </div>
    </section>

    <section class="startup-card wizard-links-card">
     
        <div class="startup-card-body">
            <div class="d-flex flex-column flex-md-row flex-wrap gap-3">
                <a href="#" class="startup-btn primary">
                    <i class="fa-solid fa-layer-group me-2"></i>
                    Priority Sectors
                </a>
                <a href="#" class="startup-btn primary">
                    <i class="fa-solid fa-briefcase me-2"></i>
                    Exiting Business
                </a>
                <a href="#" class="startup-btn primary">
                    <i class="fa-solid fa-shield-halved me-2"></i>
                    Intellectual Property
                </a>
                <a href="#" class="startup-btn primary">
                    <i class="fa-solid fa-store me-2"></i>
                    Market Access
                </a>
                <a href="#" class="startup-btn primary">
                    <i class="fa-solid fa-lightbulb me-2"></i>
                    Problem Statements
                </a>
            </div>
        </div>
    </section>
</div>
@endsection

