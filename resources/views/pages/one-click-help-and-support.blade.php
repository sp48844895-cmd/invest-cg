@extends('layouts.app')

@section('content')

    <!-- Hero Banner -->
    <section class="sector-hero">
        <img src="{{ asset('assets/img/sectors/one-click-banner.jpg') }}" class="hero-video" alt="">
        <div class="hero-gradient-overlay"></div>
        <div class="container">
            <div class="hero-content-wrapper">
                <div class="hero-text">
                    <h1 class="hero-title">One Click Help & Support</h1>
                    <h2 class="hero-subtitle">Guides, FAQs & Support</h2>
                </div>
            </div>
        </div>
    </section>

    <style>
        .querybtn {
            min-width: 180px;
            background: linear-gradient(135deg, #0077ff, #00b8a9);
            font-size: 14px;
        }
        @media (max-width: 575.98px) {
            .querybtn {
                width: 100%;
                min-width: unset;
                 font-size: 12px;
            }
        }
    </style>

    <!-- Breadcrumb/Tabs Navigation -->
    <div class="breadcrumb-nav">
        <div class="container breadcrumb-wrapper">
            <button class="breadcrumb-nav-btn breadcrumb-nav-prev" id="breadcrumbPrev" aria-label="Previous">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <div class="breadcrumb-container" id="breadcrumbContainer">
                <a href="{{ route('pages.show', 'one-click') }}" class="tab-breadcrumb">One Click</a>
                <span class="breadcrumb-separator">›</span>
                <a href="#" class="tab-breadcrumb active" data-tab="manual">
                    User Manual
                </a>
                <span class="breadcrumb-separator">›</span>
                <a href="#" class="tab-breadcrumb" data-tab="faq">
                    FAQ
                </a>
            </div>
            <button class="breadcrumb-nav-btn breadcrumb-nav-next" id="breadcrumbNext" aria-label="Next">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>

        <section class="mode-of-contact-section">
    <div class="container">
        <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3 mb-4">
            <div>
                <h2 class="h4 mb-1">Help Center</h2>
                <p class="text-muted mb-0">Find step-by-step user manuals and answers to common questions.</p>
            </div>
            <div class="d-flex gap-2 justify-content-between">
                <a href="https://invest.cg.gov.in/oneclick/raise-query" class="btn text-white querybtn">
                    <i class="bi bi-chat-dots me-2"></i>Raise your query
                </a>
                <a href="https://invest.cg.gov.in/oneclick/check-query-status" class="btn text-white querybtn">
                    <i class="bi bi-box-arrow-in-up-right me-2"></i>Check query status
                </a>
            </div>
        </div>

            <div class="help-support-wrapper">

                <div class="tab-panel active" id="manual">
                    <div class="content-card">

                        <!-- Desktop Table View -->
                        @if(isset($manuals) && $manuals->isNotEmpty())
                            <div class="table-responsive ">
                                <table class="mode-contact-table">
                                    <thead>
                                        <tr>

                                            <th>Department Name</th>
                                            <th>Type</th>
                                            <th>PDF</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($manuals as $manual)
                                            <tr>

                                                <td>{{ $manual->dept_name }}</td>
                                                <td>{{ $manual->type }}</td>
                                                <td>
                                                    <a href="{{ $manual->pdf_url }}" target="_blank" class="">
                                                        <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                        @else
                            <div class="alert alert-light border mb-0">
                                No user manuals are available right now.
                            </div>
                        @endif
                    </div>
                </div>



                <div class="tab-panel" id="faq">
                    <div class="border rounded p-4">
                        <div class="row g-3 align-items-end mb-4">
                            <div class="col-12 col-lg-7">
                                <label for="faqSearch" class="form-label mb-1">Search FAQs</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                                    <input id="faqSearch" type="text" class="form-control"
                                        placeholder="Search questions and answers" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 text-lg-end">
                                <div class="text-muted">
                                    <span id="faqCount">0</span> FAQ(s) found
                                </div>
                            </div>
                        </div>

                        @if(empty($faqs))
                            <div class="alert alert-light border mb-0">
                                No FAQs are available right now.
                            </div>
                        @else
                            <div class="accordion" id="faqAccordion">
                                @foreach($faqs as $index => $faq)
                                    @php
                                        $faqId = 'faq_' . $index;
                                        $faqQuestion = $faq['question'] ?? '';
                                        $faqAnswer = $faq['answer'] ?? '';
                                        $faqSearch = strtolower(trim($faqQuestion . ' ' . $faqAnswer));
                                    @endphp
                                    <div class="accordion-item faq-item" data-search="{{ $faqSearch }}">
                                        <h2 class="accordion-header" id="heading_{{ $faqId }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse_{{ $faqId }}" aria-expanded="false"
                                                aria-controls="collapse_{{ $faqId }}">
                                                <div
                                                    class="w-100 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2">
                                                    <span class="fw-semibold">{{ $faqQuestion }}</span>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapse_{{ $faqId }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading_{{ $faqId }}" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <div class="text-muted">{!! nl2br(e($faqAnswer)) !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="faqEmpty" class="alert alert-light border mt-3 d-none">
                                No FAQs matched your search.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        
    </div>
    </section>

@endsection

@push('scripts')
    <script>
        (function () {
            function normalize(str) {
                return (str || '').toString().toLowerCase().trim();
            }

            function filterList(inputEl, itemSelector, emptyEl, countEl, extraRowSelector) {
                if (!inputEl) return;

                var q = normalize(inputEl.value);
                var items = Array.prototype.slice.call(document.querySelectorAll(itemSelector));
                var visibleCount = 0;

                items.forEach(function (item) {
                    var hay = normalize(item.getAttribute('data-search'));
                    var show = !q || hay.indexOf(q) !== -1;
                    item.classList.toggle('d-none', !show);
                    if (show) visibleCount++;
                });

                if (countEl) {
                    countEl.textContent = visibleCount;
                }

                if (emptyEl) {
                    emptyEl.classList.toggle('d-none', visibleCount !== 0);
                }

                if (extraRowSelector) {
                    var rows = Array.prototype.slice.call(document.querySelectorAll(extraRowSelector));
                    rows.forEach(function (row) {
                        var parent = row.closest(itemSelector);
                        if (!parent) return;
                        if (parent.classList.contains('d-none')) return;
                        var rowHay = normalize(row.getAttribute('data-search'));
                        var rowShow = !q || rowHay.indexOf(q) !== -1;
                        row.classList.toggle('d-none', !rowShow);
                    });
                }
            }

            var manualSearch = document.getElementById('manualSearch');
            var faqSearch = document.getElementById('faqSearch');

            function runManualFilter() {
                if (!manualSearch) return;

                var q = normalize(manualSearch.value);
                var deptItems = Array.prototype.slice.call(document.querySelectorAll('.manual-item'));
                var manualEmpty = document.getElementById('manualEmpty');
                var manualCount = document.getElementById('manualCount');
                var visibleRowsTotal = 0;

                deptItems.forEach(function (deptItem) {
                    var deptName = normalize(deptItem.getAttribute('data-dept'));
                    var deptMatches = !!q && deptName && deptName.indexOf(q) !== -1;

                    var rows = Array.prototype.slice.call(deptItem.querySelectorAll('.manual-row'));
                    var visibleRowsInDept = 0;

                    rows.forEach(function (row) {
                        var rowHay = normalize(row.getAttribute('data-search'));
                        var showRow = !q || deptMatches || rowHay.indexOf(q) !== -1;
                        row.classList.toggle('d-none', !showRow);
                        if (showRow) visibleRowsInDept++;
                    });

                    var showDept = !q || visibleRowsInDept > 0 || deptMatches;
                    deptItem.classList.toggle('d-none', !showDept);

                    visibleRowsTotal += visibleRowsInDept;
                });

                if (manualCount) {
                    manualCount.textContent = visibleRowsTotal;
                }

                if (manualEmpty) {
                    manualEmpty.classList.toggle('d-none', visibleRowsTotal !== 0);
                }
            }

            function runFaqFilter() {
                filterList(
                    faqSearch,
                    '.faq-item',
                    document.getElementById('faqEmpty'),
                    document.getElementById('faqCount')
                );
            }

            if (manualSearch) {
                manualSearch.addEventListener('input', runManualFilter);
            }
            if (faqSearch) {
                faqSearch.addEventListener('input', runFaqFilter);
            }

            runManualFilter();
            runFaqFilter();

            // Breadcrumb tab switching (same approach used in other pages: data-tab + tab-panel)
            function initHelpSupportTabs() {
                var tabBreadcrumbs = document.querySelectorAll('#breadcrumbContainer .tab-breadcrumb[data-tab]');
                var tabPanels = document.querySelectorAll('.help-support-wrapper .tab-panel');
                if (!tabBreadcrumbs.length || !tabPanels.length) return;

                function switchTab(targetTab) {
                    tabBreadcrumbs.forEach(function (b) { b.classList.remove('active'); });
                    tabPanels.forEach(function (p) { p.classList.remove('active'); });

                    var activeBreadcrumb = document.querySelector('#breadcrumbContainer [data-tab="' + targetTab + '"]');
                    var activePanel = document.getElementById(targetTab);

                    if (activeBreadcrumb) {
                        activeBreadcrumb.classList.add('active');
                    }
                    if (activePanel) {
                        activePanel.classList.add('active');
                    }
                }

                tabBreadcrumbs.forEach(function (breadcrumb) {
                    breadcrumb.addEventListener('click', function (e) {
                        e.preventDefault();
                        var targetTab = this.getAttribute('data-tab');
                        if (targetTab) {
                            switchTab(targetTab);
                        }
                    });
                });

                // Default + optional deep link support
                var hash = (window.location && window.location.hash) ? window.location.hash.replace('#', '') : '';
                if (hash === 'faq' || hash === 'manual') {
                    switchTab(hash);
                } else {
                    switchTab('manual');
                }
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initHelpSupportTabs);
            } else {
                initHelpSupportTabs();
            }

            // Ensure accordion items close when clicking an already-open header
            document.addEventListener('click', function (e) {
                var btn = e.target.closest('.accordion-button');
                if (!btn) return;

                var targetSel = btn.getAttribute('data-bs-target');
                if (!targetSel) return;

                var collapseEl = document.querySelector(targetSel);
                if (!collapseEl) return;

                var isExpanded = btn.getAttribute('aria-expanded') === 'true';
                var isOpen = collapseEl.classList.contains('show') || collapseEl.classList.contains('collapsing');

                if (isExpanded && isOpen && window.bootstrap && window.bootstrap.Collapse) {
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    var inst = window.bootstrap.Collapse.getOrCreateInstance(collapseEl, { toggle: false });
                    inst.hide();
                }
            }, true);
        })();
    </script>
@endpush