@extends('layouts.app')

@section('content')
<section class="sector-hero ecosystem-page-hero">
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

@include('partials.startup-tabs', ['active' => 'ecosystem'])

@php
    $activeSubTab = request('subTab', 'cg-startup-cell');

    $subTabIcons = [
        'cg-startup-cell' => 'fa-chess-king',
        'incubators-accelerators' => 'fa-building-columns',
        'college-innovation-startup-cells' => 'fa-graduation-cap',
        'mentors' => 'fa-user-ninja',
        'investor' => 'fa-handshake',
    ];

    $subTabs = [
             [
            'label' => 'Startup Cell CG',
            'slug' => 'cg-startup-cell',
            'url' => route('startup.show', 'ecosystem') . '?subTab=cg-startup-cell',
        ],
              [
            'label' => 'Incubators & Accelerators',
            'slug' => 'incubators-accelerators',
            'url' => route('startup.show', 'ecosystem') . '?subTab=incubators-accelerators',
        ],
             [
            'label' => 'Mentors',
            'slug' => 'mentors',
            'url' => route('startup.show', 'ecosystem') . '?subTab=mentors',
        ],

  
        [
            'label' => 'College Innovation Startup Cells',
            'slug' => 'college-innovation-startup-cells',
            'url' => route('startup.show', 'ecosystem') . '?subTab=college-innovation-startup-cells',
        ],

        [
            'label' => 'Investors',
            'slug' => 'investor',
            'url' => route('startup.show', 'ecosystem') . '?subTab=investor',
        ],
           
   
    ];
@endphp

<div class="container startup-page ecosystem-page-container py-5">
    <!-- <div class="startup-card ecosystem-intro">
        <div class="startup-card-body">
            <h2 class="startup-title mb-3"><i class="fa-solid fa-network-wired me-2"></i>Ecosystem</h2>
            <p class="mb-0">
                Explore the Startup Chhattisgarh ecosystem — governance, incubators, campus innovation cells,
                and mentors. Switch tabs to view the relevant details without leaving this page.
            </p>
        </div>
    </div> -->

    <div class="startup-card ecosystem-tabs">
        <div class="startup-card-body">
            <div class="tab-buttons">
                @foreach ($subTabs as $subTab)
                    <a href="{{ $subTab['url'] }}" class="tab-button {{ $activeSubTab === $subTab['slug'] ? 'active' : '' }}">
                        <span class="tab-icon">
                            <i class="fa-solid {{ $subTabIcons[$subTab['slug']] }}"></i>
                        </span>
                        <span class="tab-label">{{ $subTab['label'] }}</span>
                    </a>
                @endforeach
            </div>
            <div class="tab-content">
                @include("pages.startup.ecosystem.{$activeSubTab}")
            </div>
        </div>
    </div>
</div>
@endsection
