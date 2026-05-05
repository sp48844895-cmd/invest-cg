@extends('layouts.app')

@section('content')
<!-- Hero Banner with Image -->
<section class="sector-hero">
    <img src="assets/img/sectors/startup-banner.jpg" class="hero-video" alt="Startup Chhattisgarh Banner">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
        <div class="hero-content-wrapper">
            <div class="hero-text">
                <h1 class="hero-title">P</h1>

            </div>
        </div>
    </div>
</section>

@include('partials.startup-nav', ['active' => 'policy-guidelines'])



<div class="container policy-stack">
    @include('partials.policy.chhattisgarh-innovation-section')
    <hr class="policy-divider my-5">
    @include('partials.policy.student-policy-section')
</div>
@endsection
