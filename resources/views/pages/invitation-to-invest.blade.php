@extends('layouts.app')

@section('content')
<!-- Hero Banner -->
<section class="sector-hero">
    <img src="assets/img/sectors/invitation-to-invest.jpg" class="hero-video" alt="Invitation to Invest Banner">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
        <div class="hero-content-wrapper">
            <div class="hero-text">
                <h1 class="hero-title">Invitation to Invest</h1>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <!-- Introduction Card -->
    <section class="startup-intro">
        <div class="intro-card-startup">
            <div class="intro-icon-large">
                <i class="fa-solid fa-handshake"></i>
            </div>

            <h2 class="content-title">Invitation to Invest</h2>

            <div class="intro-text-startup">
                <p>
                    The State Investment Promotion Board (SIPB) issues an Invitation to Invest Certificate to investors
                    proposing projects with an investment of ₹100 crore and above, signifying the State Government’s
                    commitment to extend priority support, expedited approvals, and proactive facilitation for large and
                    strategic investments in Chhattisgarh.
                </p>

                <div class="mt-4">
                    <a href="https://swsportal.cgstate.gov.in/login"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn btn-primary">
                        Apply Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About SIPB -->
    <section class="priority-sectors mt-5">
        <h3 class="subsection-title">About SIPB</h3>

           
                <p class="">
                    Constituted under the Chhattisgarh Audyogik Nivesh Protsahan Adhiniyam, 2002, SIPB functions as the apex
                    single-window facilitation authority for investors in the State. It acts as a single point of contact,
                    ensuring coordinated, time-bound clearances and effective handholding throughout the investment lifecycle.
                </p>
           
        </div>
    </section>
</div>
@endsection
