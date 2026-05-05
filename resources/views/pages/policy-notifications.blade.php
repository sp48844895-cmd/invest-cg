@extends('layouts.app')

@section('title', 'Policy & Notifications')

@section('content')
    <!-- Hero Banner with Image -->
    <section class="sector-hero">
        <img src="assets/img/sectors/policy-notification-banner.jpg" class="hero-video" alt="Policy & Notifications Banner">
        <div class="hero-gradient-overlay"></div>
        <div class="container">
            <div class="hero-content-wrapper">
                <div class="hero-text">
                    <h1 class="hero-title">Policy & Notifications</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <div class="breadcrumb-nav">
        <div class="container breadcrumb-container">
            <a href="{{ route('pages.show', 'investment_promotion') }}">Investment Promotion</a>
            <span>›</span>
            <a href="{{ route('focus-sectors.index') }}">Focus Sectors</a>
            <span>›</span>
            <a href="{{ route('calculator.index') }}">Subsidy Calculator</a>
            <span>›</span>
            <a href="#" class="active">Policy & Notifications</a>
        </div>
    </div>

    <!-- Policy & Notifications Section -->
    <section class="policy-notifications-section">
        <div class="container-fluid">
            <!-- Sub Tab Navigation -->
            <div class="policy-tabs-wrapper">
                <ul class="policy-tabs nav nav-pills" id="policyTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="acts-tab" data-bs-toggle="pill" data-bs-target="#acts"
                            type="button" role="tab">
                            <i class="bi bi-file-earmark-text"></i>
                            <span>Acts</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="industrial-policy-tab" data-bs-toggle="pill"
                            data-bs-target="#industrial-policy" type="button" role="tab">
                            <i class="bi bi-file-earmark-check"></i>
                            <span>Industrial Policy Notification</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="policy-act-tab" data-bs-toggle="pill" data-bs-target="#policy-act"
                            type="button" role="tab">
                            <i class="bi bi-file-earmark-ruled"></i>
                            <span>Policy & Act</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rules-tab" data-bs-toggle="pill" data-bs-target="#rules" type="button"
                            role="tab">
                            <i class="bi bi-file-earmark-code"></i>
                            <span>Rules</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Administrative-tab" data-bs-toggle="pill"
                            data-bs-target="#administrative" type="button" role="tab">
                            <i class="bi bi-bar-chart-line"></i>
                            <span>Administrative Reports</span>
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Tab Content -->
            <div class="tab-content policy-tab-content" id="policyTabsContent">
                <!-- Acts Tab -->
                <div class="tab-pane fade show active" id="acts" role="tabpanel" aria-labelledby="acts-tab">
                    @if(count($actsPeriods) > 0)
                        <!-- Policy Period Accordion -->
                        <div class="accordion policy-period-accordion" id="actsAccordion">
                            @forelse($actsPeriods as $period)
                                @php
                                    $periodSlug = str_replace(['-', ' '], '', $period);
                                    $documents = $acts->get($period, collect());
                                @endphp
                                @if($documents->count() > 0)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="acts{{ $periodSlug }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-target="#collapseActs{{ $periodSlug }}" data-bs-parent="#actsAccordion"
                                                aria-expanded="false" aria-controls="collapseActs{{ $periodSlug }}">
                                                <i class="bi bi-calendar-range"></i>
                                                <span>Acts {{ $period }}</span>
                                            </button>
                                        </h2>
                                        <div id="collapseActs{{ $periodSlug }}" class="accordion-collapse collapse"
                                            data-bs-parent="#actsAccordion" aria-labelledby="acts{{ $periodSlug }}">
                                            <div class="accordion-body">
                                                <div class="policy-documents-grid">
                                                    @forelse($documents as $document)
                                                        <div class="policy-doc-card">
                                                            <div class="doc-header-row">
                                                                <div class="doc-icon-wrapper">
                                                                    <i class="bi bi-file-earmark-pdf"></i>
                                                                </div>
                                                                <span class="doc-size"><i class="bi bi-file-earmark"></i>
                                                                    {{ $document->formatted_file_size }}</span>
                                                            </div>
                                                            <div class="doc-content">
                                                                <h4>{{ $document->title }}</h4>
                                                                <!-- <p class="doc-meta">
                                                                            <i class="bi bi-calendar3"></i> Published: {{ $document->published_date->format('d M Y') }}
                                                                        </p> -->
                                                            </div>
                                                            <div class="doc-actions">
                                                                <a href="{{ route('policy-documents.view', $document->id) }}?download=1"
                                                                    class="doc-download-btn" download="{{ $document->download_filename }}">
                                                                    <i class="bi bi-download"></i>
                                                                    <span>Download</span>
                                                                </a>
                                                                <a href="{{ route('policy-documents.view', $document->id) }}"
                                                                    class="doc-view-btn" target="_blank">
                                                                    <i class="bi bi-eye"></i>
                                                                    <span>View</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="col-12 text-center py-5">
                                                            <p class="text-muted">No documents available for this period.</p>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">No policy periods available.</p>
                                </div>
                            @endforelse
                        </div>
                    @else
                        <!-- No policy periods, show documents directly -->
                        <div class="policy-documents-grid">
                            @php
                                $actsWithoutPeriod = $acts->get(null, collect());
                            @endphp
                            @forelse($actsWithoutPeriod as $document)
                                <div class="policy-doc-card">
                                    <div class="doc-header-row">
                                        <div class="doc-icon-wrapper">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                        </div>
                                        <span class="doc-size"><i class="bi bi-file-earmark"></i>
                                            {{ $document->formatted_file_size }}</span>
                                    </div>
                                    <div class="doc-content">
                                        <h4>{{ $document->title }}</h4>
                                        <!-- <p class="doc-meta">
                                                <i class="bi bi-calendar3"></i> Published: {{ $document->published_date->format('d M Y') }}
                                            </p> -->
                                    </div>
                                    <div class="doc-actions">
                                        <a href="{{ route('policy-documents.view', $document->id) }}?download=1"
                                            class="doc-download-btn" download="{{ $document->download_filename }}">
                                            <i class="bi bi-download"></i>
                                            <span>Download</span>
                                        </a>
                                        <a href="{{ route('policy-documents.view', $document->id) }}" class="doc-view-btn"
                                            target="_blank">
                                            <i class="bi bi-eye"></i>
                                            <span>View</span>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">No documents available in this category.</p>
                                </div>
                            @endforelse
                        </div>
                    @endif
                </div>

                <!-- Industrial Policy Notification Tab -->
                <div class="tab-pane fade" id="industrial-policy" role="tabpanel" aria-labelledby="industrial-policy-tab">
                    @if(count($industrialPolicyPeriods) > 0)
                        <!-- Policy Period Accordion -->
                        <div class="accordion policy-period-accordion" id="industrialPolicyAccordion">
                            @forelse($industrialPolicyPeriods as $period)
                                @php
                                    $periodSlug = str_replace(['-', ' '], '', $period);
                                    $documents = $industrialPolicies->get($period, collect());
                                @endphp
                                @if($documents->count() > 0)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="industrialPolicy{{ $periodSlug }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-target="#collapseIndustrialPolicy{{ $periodSlug }}"
                                                data-bs-parent="#industrialPolicyAccordion" aria-expanded="false"
                                                aria-controls="collapseIndustrialPolicy{{ $periodSlug }}">
                                                <i class="bi bi-calendar-range"></i>
                                                <span>Industrial Policy {{ $period }}</span>
                                            </button>
                                        </h2>
                                        <div id="collapseIndustrialPolicy{{ $periodSlug }}" class="accordion-collapse collapse"
                                            data-bs-parent="#industrialPolicyAccordion"
                                            aria-labelledby="industrialPolicy{{ $periodSlug }}">
                                            <div class="accordion-body">
                                                <div class="policy-documents-grid">
                                                    @forelse($documents as $document)
                                                        <div class="policy-doc-card">
                                                            <div class="doc-header-row">
                                                                <div class="doc-icon-wrapper">
                                                                    <i class="bi bi-file-earmark-pdf"></i>
                                                                </div>
                                                                <span class="doc-size"><i class="bi bi-file-earmark"></i>
                                                                    {{ $document->formatted_file_size }}</span>
                                                            </div>
                                                            <div class="doc-content">
                                                                <h4>{{ $document->title }}</h4>
                                                                <!-- <p class="doc-meta">
                                                                            <i class="bi bi-calendar3"></i> Published: {{ $document->published_date->format('d M Y') }}
                                                                        </p> -->
                                                            </div>
                                                            <div class="doc-actions">
                                                                <a href="{{ route('policy-documents.view', $document->id) }}?download=1"
                                                                    class="doc-download-btn" download="{{ $document->download_filename }}">
                                                                    <i class="bi bi-download"></i>
                                                                    <span>Download</span>
                                                                </a>
                                                                <a href="{{ route('policy-documents.view', $document->id) }}"
                                                                    class="doc-view-btn" target="_blank">
                                                                    <i class="bi bi-eye"></i>
                                                                    <span>View</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="col-12 text-center py-5">
                                                            <p class="text-muted">No documents available for this period.</p>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">No policy periods available.</p>
                                </div>
                            @endforelse
                        </div>
                    @else
                        <!-- No policy periods, show documents directly -->
                        <div class="policy-documents-grid">
                            @php
                                $industrialPoliciesWithoutPeriod = $industrialPolicies->get(null, collect());
                            @endphp
                            @forelse($industrialPoliciesWithoutPeriod as $document)
                                <div class="policy-doc-card">
                                    <div class="doc-header-row">
                                        <div class="doc-icon-wrapper">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                        </div>
                                        <span class="doc-size"><i class="bi bi-file-earmark"></i>
                                            {{ $document->formatted_file_size }}</span>
                                    </div>
                                    <div class="doc-content">
                                        <h4>{{ $document->title }}</h4>
                                        <!-- <p class="doc-meta">
                                                <i class="bi bi-calendar3"></i> Published: {{ $document->published_date->format('d M Y') }}
                                            </p> -->
                                    </div>
                                    <div class="doc-actions">
                                        <a href="{{ route('policy-documents.view', $document->id) }}?download=1"
                                            class="doc-download-btn" download="{{ $document->download_filename }}">
                                            <i class="bi bi-download"></i>
                                            <span>Download</span>
                                        </a>
                                        <a href="{{ route('policy-documents.view', $document->id) }}" class="doc-view-btn"
                                            target="_blank">
                                            <i class="bi bi-eye"></i>
                                            <span>View</span>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">No documents available in this category.</p>
                                </div>
                            @endforelse
                        </div>
                    @endif
                </div>

                <!-- Policy & Act Tab -->
                <div class="tab-pane fade" id="policy-act" role="tabpanel" aria-labelledby="policy-act-tab">
                    @if(count($policyActPeriods) > 0)
                        <!-- Policy Period Accordion -->
                        <div class="accordion policy-period-accordion" id="policyActAccordion">
                            @forelse($policyActPeriods as $period)
                                @php
                                    $periodSlug = str_replace(['-', ' '], '', $period);
                                    $documents = $policyActs->get($period, collect());
                                @endphp
                                @if($documents->count() > 0)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="policyAct{{ $periodSlug }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-target="#collapsePolicyAct{{ $periodSlug }}"
                                                data-bs-parent="#policyActAccordion" aria-expanded="false"
                                                aria-controls="collapsePolicyAct{{ $periodSlug }}">
                                                <i class="bi bi-calendar-range"></i>
                                                <span>Policy & Act {{ $period }}</span>
                                            </button>
                                        </h2>
                                        <div id="collapsePolicyAct{{ $periodSlug }}" class="accordion-collapse collapse"
                                            data-bs-parent="#policyActAccordion" aria-labelledby="policyAct{{ $periodSlug }}">
                                            <div class="accordion-body">
                                                <div class="policy-documents-grid">
                                                    @forelse($documents as $document)
                                                        <div class="policy-doc-card">
                                                            <div class="doc-header-row">
                                                                <div class="doc-icon-wrapper">
                                                                    <i class="bi bi-file-earmark-pdf"></i>
                                                                </div>
                                                                <span class="doc-size"><i class="bi bi-file-earmark"></i>
                                                                    {{ $document->formatted_file_size }}</span>
                                                            </div>
                                                            <div class="doc-content">
                                                                <h4>{{ $document->title }}</h4>
                                                                <!-- <p class="doc-meta">
                                                                            <i class="bi bi-calendar3"></i> Published: {{ $document->published_date->format('d M Y') }}
                                                                        </p> -->
                                                            </div>
                                                            <div class="doc-actions">
                                                                <a href="{{ route('policy-documents.view', $document->id) }}?download=1"
                                                                    class="doc-download-btn" download="{{ $document->download_filename }}">
                                                                    <i class="bi bi-download"></i>
                                                                    <span>Download</span>
                                                                </a>
                                                                <a href="{{ route('policy-documents.view', $document->id) }}"
                                                                    class="doc-view-btn" target="_blank">
                                                                    <i class="bi bi-eye"></i>
                                                                    <span>View</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="col-12 text-center py-5">
                                                            <p class="text-muted">No documents available for this period.</p>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">No policy periods available.</p>
                                </div>
                            @endforelse
                        </div>
                    @else
                        <!-- No policy periods, show documents directly -->
                        <div class="policy-documents-grid">
                            @php
                                $policyActsWithoutPeriod = $policyActs->get(null, collect());
                            @endphp
                            @forelse($policyActsWithoutPeriod as $document)
                                <div class="policy-doc-card">
                                    <div class="doc-header-row">
                                        <div class="doc-icon-wrapper">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                        </div>
                                        <span class="doc-size"><i class="bi bi-file-earmark"></i>
                                            {{ $document->formatted_file_size }}</span>
                                    </div>
                                    <div class="doc-content">
                                        <h4>{{ $document->title }}</h4>
                                        <!-- <p class="doc-meta">
                                                <i class="bi bi-calendar3"></i> Published: {{ $document->published_date->format('d M Y') }}
                                            </p> -->
                                    </div>
                                    <div class="doc-actions">
                                        <a href="{{ route('policy-documents.view', $document->id) }}?download=1"
                                            class="doc-download-btn" download="{{ $document->download_filename }}">
                                            <i class="bi bi-download"></i>
                                            <span>Download</span>
                                        </a>
                                        <a href="{{ route('policy-documents.view', $document->id) }}" class="doc-view-btn"
                                            target="_blank">
                                            <i class="bi bi-eye"></i>
                                            <span>View</span>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">No documents available in this category.</p>
                                </div>
                            @endforelse
                        </div>
                    @endif
                </div>

                <!-- Rules Tab -->
                <div class="tab-pane fade" id="rules" role="tabpanel" aria-labelledby="rules-tab">
                    @if(count($rulesPeriods) > 0)
                        <!-- Policy Period Accordion -->
                        <div class="accordion policy-period-accordion" id="rulesAccordion">
                            @forelse($rulesPeriods as $period)
                                @php
                                    $periodSlug = str_replace(['-', ' '], '', $period);
                                    $documents = $rules->get($period, collect());
                                @endphp
                                @if($documents->count() > 0)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="rules{{ $periodSlug }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-target="#collapseRules{{ $periodSlug }}" data-bs-parent="#rulesAccordion"
                                                aria-expanded="false" aria-controls="collapseRules{{ $periodSlug }}">
                                                <i class="bi bi-calendar-range"></i>
                                                <span>Rules {{ $period }}</span>
                                            </button>
                                        </h2>
                                        <div id="collapseRules{{ $periodSlug }}" class="accordion-collapse collapse"
                                            data-bs-parent="#rulesAccordion" aria-labelledby="rules{{ $periodSlug }}">
                                            <div class="accordion-body">
                                                <div class="policy-documents-grid">
                                                    @forelse($documents as $document)
                                                        <div class="policy-doc-card">
                                                            <div class="doc-header-row">
                                                                <div class="doc-icon-wrapper">
                                                                    <i class="bi bi-file-earmark-pdf"></i>
                                                                </div>
                                                                <span class="doc-size"><i class="bi bi-file-earmark"></i>
                                                                    {{ $document->formatted_file_size }}</span>
                                                            </div>
                                                            <div class="doc-content">
                                                                <h4>{{ $document->title }}</h4>
                                                                <!-- <p class="doc-meta">
                                                                            <i class="bi bi-calendar3"></i> Published: {{ $document->published_date->format('d M Y') }}
                                                                        </p> -->
                                                            </div>
                                                            <div class="doc-actions">
                                                                <a href="{{ route('policy-documents.view', $document->id) }}?download=1"
                                                                    class="doc-download-btn" download="{{ $document->download_filename }}">
                                                                    <i class="bi bi-download"></i>
                                                                    <span>Download</span>
                                                                </a>
                                                                <a href="{{ route('policy-documents.view', $document->id) }}"
                                                                    class="doc-view-btn" target="_blank">
                                                                    <i class="bi bi-eye"></i>
                                                                    <span>View</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="col-12 text-center py-5">
                                                            <p class="text-muted">No documents available for this period.</p>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">No policy periods available.</p>
                                </div>
                            @endforelse
                        </div>
                    @else
                        <!-- No policy periods, show documents directly -->
                        <div class="policy-documents-grid">
                            @php
                                $rulesWithoutPeriod = $rules->get(null, collect());
                            @endphp
                            @forelse($rulesWithoutPeriod as $document)
                                <div class="policy-doc-card">
                                    <div class="doc-header-row">
                                        <div class="doc-icon-wrapper">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                        </div>
                                        <span class="doc-size"><i class="bi bi-file-earmark"></i>
                                            {{ $document->formatted_file_size }}</span>
                                    </div>
                                    <div class="doc-content">
                                        <h4>{{ $document->title }}</h4>
                                        <!-- <p class="doc-meta">
                                                <i class="bi bi-calendar3"></i> Published: {{ $document->published_date->format('d M Y') }}
                                            </p> -->
                                    </div>
                                    <div class="doc-actions">
                                        <a href="{{ route('policy-documents.view', $document->id) }}?download=1"
                                            class="doc-download-btn" download="{{ $document->download_filename }}">
                                            <i class="bi bi-download"></i>
                                            <span>Download</span>
                                        </a>
                                        <a href="{{ route('policy-documents.view', $document->id) }}" class="doc-view-btn"
                                            target="_blank">
                                            <i class="bi bi-eye"></i>
                                            <span>View</span>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">No documents available in this category.</p>
                                </div>
                            @endforelse
                        </div>
                    @endif
                </div>

                <!-- Administrative Reports Tab -->
                <div class="tab-pane fade" id="administrative" role="tabpanel" aria-labelledby="Administrative-tab">
                    @if(count($administrativeReportsPeriods) > 0)
                        <!-- Policy Period Accordion -->
                        <div class="accordion policy-period-accordion" id="administrativeReportsAccordion">
                            @forelse($administrativeReportsPeriods as $period)
                                @php
                                    $periodSlug = str_replace(['-', ' '], '', $period);
                                    $documents = $administrativeReports->get($period, collect());
                                @endphp
                                @if($documents->count() > 0)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="administrativeReports{{ $periodSlug }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-target="#collapseAdministrativeReports{{ $periodSlug }}" data-bs-parent="#administrativeReportsAccordion"
                                                aria-expanded="false" aria-controls="collapseAdministrativeReports{{ $periodSlug }}">
                                                <i class="bi bi-calendar-range"></i>
                                                <span>Administrative Reports {{ $period }}</span>
                                            </button>
                                        </h2>
                                        <div id="collapseAdministrativeReports{{ $periodSlug }}" class="accordion-collapse collapse"
                                            data-bs-parent="#administrativeReportsAccordion" aria-labelledby="administrativeReports{{ $periodSlug }}">
                                            <div class="accordion-body">
                                                <div class="policy-documents-grid">
                                                    @forelse($documents as $document)
                                                        <div class="policy-doc-card">
                                                            <div class="doc-header-row">
                                                                <div class="doc-icon-wrapper">
                                                                    <i class="bi bi-file-earmark-pdf"></i>
                                                                </div>
                                                                <span class="doc-size"><i class="bi bi-file-earmark"></i>
                                                                    {{ $document->formatted_file_size }}</span>
                                                            </div>
                                                            <div class="doc-content">
                                                                <h4>{{ $document->title }}</h4>
                                                                <!-- <p class="doc-meta">
                                                                            <i class="bi bi-calendar3"></i> Published: {{ $document->published_date->format('d M Y') }}
                                                                        </p> -->
                                                            </div>
                                                            <div class="doc-actions">
                                                                <a href="{{ route('policy-documents.view', $document->id) }}?download=1"
                                                                    class="doc-download-btn" download="{{ $document->download_filename }}">
                                                                    <i class="bi bi-download"></i>
                                                                    <span>Download</span>
                                                                </a>
                                                                <a href="{{ route('policy-documents.view', $document->id) }}"
                                                                    class="doc-view-btn" target="_blank">
                                                                    <i class="bi bi-eye"></i>
                                                                    <span>View</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="col-12 text-center py-5">
                                                            <p class="text-muted">No documents available for this period.</p>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">No policy periods available.</p>
                                </div>
                            @endforelse
                        </div>
                    @else
                        <!-- No policy periods, show documents directly -->
                        <div class="policy-documents-grid">
                            @php
                                $administrativeReportsWithoutPeriod = $administrativeReports->get(null, collect());
                            @endphp
                            @forelse($administrativeReportsWithoutPeriod as $document)
                                <div class="policy-doc-card">
                                    <div class="doc-header-row">
                                        <div class="doc-icon-wrapper">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                        </div>
                                        <span class="doc-size"><i class="bi bi-file-earmark"></i>
                                            {{ $document->formatted_file_size }}</span>
                                    </div>
                                    <div class="doc-content">
                                        <h4>{{ $document->title }}</h4>
                                        <!-- <p class="doc-meta">
                                                <i class="bi bi-calendar3"></i> Published: {{ $document->published_date->format('d M Y') }}
                                            </p> -->
                                    </div>
                                    <div class="doc-actions">
                                        <a href="{{ route('policy-documents.view', $document->id) }}?download=1"
                                            class="doc-download-btn" download="{{ $document->download_filename }}">
                                            <i class="bi bi-download"></i>
                                            <span>Download</span>
                                        </a>
                                        <a href="{{ route('policy-documents.view', $document->id) }}" class="doc-view-btn"
                                            target="_blank">
                                            <i class="bi bi-eye"></i>
                                            <span>View</span>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">No documents available in this category.</p>
                                </div>
                            @endforelse
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Handle accordion toggle behavior for all accordion buttons
                const accordionButtons = document.querySelectorAll('.policy-period-accordion .accordion-button');

                accordionButtons.forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const targetId = this.getAttribute('data-bs-target');
                        const targetCollapse = document.querySelector(targetId);
                        const parentId = this.getAttribute('data-bs-parent');

                        if (targetCollapse) {
                            // Check if the collapse is currently shown
                            const isCurrentlyShown = targetCollapse.classList.contains('show');

                            if (isCurrentlyShown) {
                                // If already shown, close it
                                let bsCollapse = bootstrap.Collapse.getInstance(targetCollapse);
                                if (!bsCollapse) {
                                    bsCollapse = new bootstrap.Collapse(targetCollapse, {
                                        toggle: false
                                    });
                                }
                                bsCollapse.hide();

                                // Update button state
                                this.classList.add('collapsed');
                                this.setAttribute('aria-expanded', 'false');
                            } else {
                                // If collapsed, close all other accordions in the same parent first
                                if (parentId) {
                                    const parentElement = document.querySelector(parentId);
                                    if (parentElement) {
                                        const otherCollapses = parentElement.querySelectorAll('.accordion-collapse.show');
                                        otherCollapses.forEach(collapse => {
                                            if (collapse !== targetCollapse) {
                                                const otherBsCollapse = bootstrap.Collapse.getInstance(collapse);
                                                if (otherBsCollapse) {
                                                    otherBsCollapse.hide();
                                                }
                                                // Update other button states
                                                const otherButton = parentElement.querySelector(`[data-bs-target="#${collapse.id}"]`);
                                                if (otherButton) {
                                                    otherButton.classList.add('collapsed');
                                                    otherButton.setAttribute('aria-expanded', 'false');
                                                }
                                            }
                                        });
                                    }
                                }

                                // Open this accordion
                                let bsCollapse = bootstrap.Collapse.getInstance(targetCollapse);
                                if (!bsCollapse) {
                                    bsCollapse = new bootstrap.Collapse(targetCollapse, {
                                        toggle: false
                                    });
                                }
                                bsCollapse.show();

                                // Update button state
                                this.classList.remove('collapsed');
                                this.setAttribute('aria-expanded', 'true');
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection