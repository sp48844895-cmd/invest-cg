@extends('layouts.app')

@section('content')
<!-- Hero Banner with Image -->
<section class="sector-hero">
    <img src="assets/img/sectors/export-banner.jpg" class="hero-video" alt="">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
        <div class="hero-content-wrapper">
            <div class="hero-text">
                <h1 class="hero-title">District Export Action Plan (DEAP)</h1>
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<div class="breadcrumb-nav">
    <div class="container breadcrumb-container">
        <a href="{{ route('pages.show', 'export') }}">Export</a>
        <span>›</span>
        <a href="#" class="active">DEAP</a>
    </div>
</div>

@php
    $districts = [
        'BALOD',
        'BALODABAZAR-BHATAPARA',
        'BALRAMPUR-RAMANUJGANJ',
        'BASTAR',
        'BEMETARA',
        'BIJAPUR',
        'BILASPUR',
        'DANTEWADA',
        'DHAMTARI',
        'DURG',
        'GAURELA-PENDRA-MARWAHI',
        'GARIABAND',
        'JANJGIR-CHAMPA',
        'JASHPUR',
        'KABIRDHAM',
        'KANKER',
        'KHAIRAGARH-CHHUIKHADAN-GANDAI',
        'KONDAGAON',
        'KORBA',
        'KORIYA',
        'MAHASAMUND',
        'MANENDRAGARH',
        'MANPUR-MOHLA',
        'MUNGELI',
        'NARAYANPUR',
        'RAIGARH',
        'RAIPUR',
        'RAJNANDGAON',
        'SARANGARH-BILAIGARH',
        'SAKTI',
        'SUKMA',
        'SURAJPUR',
        'SURGUJA',
    ];
@endphp

<section class="export-content-area" style="padding: 40px 0;">
    <div class="container">
        <section class="export-resources-section">
            <h2 class="content-title">DEAP PDFs (District-wise)</h2>

            <div class="resources-list">
                @foreach($districts as $district)
                    @php
                        $districtLabel = strtoupper($district);
                        $fileName = 'DEAP ' . $district . '.pdf';
                        $fileUrl = asset('storage/pdfs/deap/' . rawurlencode($fileName));
                    @endphp

                    <a href="{{ $fileUrl }}" target="_blank" class="resource-link">
                        <span class="resource-text">{{ $districtLabel }}</span>
                        <span class="resource-arrow"><img src="{{ asset('assets/img/pdf-icon.png') }}" width="30" alt=""></span>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
</section>
@endsection
