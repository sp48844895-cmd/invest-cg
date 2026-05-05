@extends('layouts.app')

@section('content')
<!-- Hero Banner with Image -->
<section class="sector-hero">
    <img src="assets/img/sectors/startup-banner.jpg" class="hero-video" alt="Startup Chhattisgarh Banner">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
        <div class="hero-content-wrapper">
            <div class="hero-text">
                <h1 class="hero-title">Startup Chhattisgarh</h1>

            </div>
        </div>
    </div>
</section>
@include('partials.startup-nav', ['active' => 'chhattisgarh-innovation'])

<div class="container">
    @include('partials.policy.chhattisgarh-innovation-section')
</div>
@endsection

