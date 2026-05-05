@extends('layouts.app')

@section('content')
<section class="sector-hero">
  <img src="{{ asset('assets/img/sectors/dept-of-ci-banner.jpg') }}" class="hero-video" alt="Boiler Inspectorate">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">Boiler Inspectorate</h1>
      </div>
    </div>
  </div>
</section>

@php($activeBoilerTab = 'boiler-list')
@include('partials.boiler-breadcrumb')

<section class="body-content-section">
  <div class="container">
    <div class="body-content-card">
      <div class="body-intro">
        <h2 class="body-content-title">Boiler Inspectorate</h2>
        <p class="body-content-text">
          The Boiler Inspectorate has been established in the state as per the guidelines of the Indian Boiler Act, 1923.
          The Indian Boiler Regulations, 1950 has been made under Indian Boiler Act, 1923. The Boiler Inspectorate carries out
          the implementation of rules and regulations of the Act and conducts inspections and monitoring of the boilers in the state
          to maintain the industrial safety standards.
        </p>
      </div>

      <div class="body-link-section">
        <a href="https://swsportal.cgstate.gov.in/login" target="_blank" class="body-external-link">
          <i class="fa-solid fa-external-link"></i>
          <span>Login</span>
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
